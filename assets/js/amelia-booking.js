(function () {
  function init() {
    if (!document.querySelector('.amelia-v2-booking')) return;

    document.querySelectorAll('.amelia-v2-booking .am-ff__item-content__inner:not([data-bl])').forEach(function (box) {
      if (box.scrollHeight <= 110) return;
      box.setAttribute('data-bl', '1');
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'bl-toggle';
      btn.textContent = 'Show more ▾';
      btn.setAttribute('aria-expanded', 'false');
      btn.addEventListener('click', function () {
        var open = box.classList.toggle('is-expanded');
        btn.textContent = open ? 'Show less ▴' : 'Show more ▾';
        btn.setAttribute('aria-expanded', open);
        if (!open) box.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
      });
      box.insertAdjacentElement('afterend', btn);
    });
  }

  // Amelia builds its form after page load, so keep watching for it.
  new MutationObserver(init).observe(document.body, { childList: true, subtree: true });
  document.addEventListener('DOMContentLoaded', init);
})();
