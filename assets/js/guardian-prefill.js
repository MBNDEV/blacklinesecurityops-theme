/**
 * Guardian donation form pre-fill from URL parameters (Klaviyo "complete your gift" links).
 *
 *   first_name, last_name, email, phone
 *   gift_type = monthly | one-time
 *   tier      = guardian | defender | protector | sentinel | founders_circle  (monthly)
 *   amount    = number, no $ (one-time: a $25/$50/$100 preset, else "Other")
 *
 * Form IDs come from inc/includes-guardian-prefill.php; field IDs are the same on every form it lists.
 */
(function ($) {
  var FORM_IDS = window.blacklinesecurityopsGuardianPrefillForms || [];
  var FIELDS = {
    oneTime: 2,
    otherAmount: 34,
    tier: 4,
    firstName: 19,
    lastName: 20,
    email: 21,
    phone: 22
  };
  var done = {};

  var params = new URLSearchParams(window.location.search);
  var hasParams = ['first_name', 'last_name', 'email', 'phone', 'gift_type'].some(function (key) {
    return params.has(key);
  });
  if (!hasParams) return;

  function param(key) {
    return (params.get(key) || '').trim();
  }

  function formatPhone(value) {
    var digits = value.replace(/\D/g, '');
    if (digits.length === 11 && digits.charAt(0) === '1') digits = digits.slice(1);
    if (digits.length !== 10) return value;
    return '(' + digits.slice(0, 3) + ') ' + digits.slice(3, 6) + '-' + digits.slice(6);
  }

  // Never overwrites what the donor already typed.
  function setText(formId, fieldId, value) {
    var input = document.getElementById('input_' + formId + '_' + fieldId);
    if (!input || !value || input.value) return;
    input.value = value;
    input.dispatchEvent(new Event('input', { bubbles: true }));
    input.dispatchEvent(new Event('change', { bubbles: true }));
  }

  function choices(formId, fieldId) {
    return Array.prototype.slice.call(
      document.querySelectorAll('#field_' + formId + '_' + fieldId + ' input[name="input_' + fieldId + '"]')
    );
  }

  // Choice values are "value|price", e.g. "guardian|10", "$25|25", "Other|0".
  function findChoice(formId, fieldId, matches) {
    return choices(formId, fieldId).filter(function (input) {
      return matches(input.value.split('|')[0].toLowerCase());
    })[0];
  }

  function clearGroup(formId, fieldId) {
    choices(formId, fieldId).forEach(function (input) {
      if (!input.checked) return;
      input.checked = false;
      $(input).trigger('change');
    });
  }

  // A real click, not `.checked = true`, so GF conditional logic, totals and the theme's
  // card/exclusivity handlers all run. Skipped when already checked: the theme's deselect
  // script would otherwise treat the click as "uncheck".
  function select(input) {
    if (!input) return false;
    if (!input.checked) input.click();
    return input.checked;
  }

  function selectOtherAmount(formId, amount) {
    select(findChoice(formId, FIELDS.oneTime, function (v) {
      return v === 'other';
    }));
    // Field 34 is disabled until conditional logic reacts to the "Other" click.
    setTimeout(function () {
      var other = document.getElementById('input_' + formId + '_' + FIELDS.otherAmount);
      if (!other) return;
      other.disabled = false;
      other.value = '';
      setText(formId, FIELDS.otherAmount, String(amount));
      $(other).trigger('keyup').trigger('change');
    }, 50);
  }

  function prefill(formId) {
    var wrapper = document.getElementById('gform_wrapper_' + formId);
    // A re-render after a failed submission already holds the donor's own edits.
    if (done[formId] || !wrapper || wrapper.classList.contains('gform_validation_error')) return;
    done[formId] = true;

    var type = param('gift_type').toLowerCase();
    var amount = parseFloat(param('amount').replace(/[^0-9.]/g, ''));
    var tier = param('tier').toLowerCase().replace(/[^a-z]+/g, '_').replace(/^_|_$/g, '');
    var section = '.gf-section-contact';

    if (type === 'monthly' && tier) {
      clearGroup(formId, FIELDS.oneTime);
      select(findChoice(formId, FIELDS.tier, function (v) {
        return v === tier;
      }));
      section = '.gf-section-shipping';
    } else if (type === 'one-time' && amount > 0) {
      clearGroup(formId, FIELDS.tier);
      // Only plain "$25"-style values: field 2 also holds an HTML "email us" note as a choice.
      var preset = findChoice(formId, FIELDS.oneTime, function (v) {
        return /^\$?\d+(\.\d+)?$/.test(v) && parseFloat(v.replace('$', '')) === amount;
      });
      if (!select(preset)) selectOtherAmount(formId, amount);
    }

    setText(formId, FIELDS.firstName, param('first_name'));
    setText(formId, FIELDS.lastName, param('last_name'));
    setText(formId, FIELDS.email, param('email'));
    setText(formId, FIELDS.phone, formatPhone(param('phone')));

    setTimeout(function () {
      // GF 2.9+ recalculates via its products module (gform.state); the legacy call
      // there is a deprecated no-op that floods the console with warnings.
      var legacyTotals = !(window.gform && window.gform.state) && window.gformCalculateTotalPrice;
      if (legacyTotals) window.gformCalculateTotalPrice(formId);
      var target = wrapper.querySelector(section);
      if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }, 150);
  }

  $(document).on('gform_post_render', function (event, formId) {
    formId = parseInt(formId, 10);
    if (FORM_IDS.indexOf(formId) === -1) return;
    // Let the theme / Kicbac scripts bind their handlers first.
    setTimeout(function () {
      prefill(formId);
    }, 100);
  });
})(jQuery);
