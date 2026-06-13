# CLAUDE.md — blacklinesecurityops-theme

This is a copy of **mbn-theme**. All development conventions from mbn-theme apply here.

---

## Theme Architecture

| Layer | File(s) | Purpose |
|---|---|---|
| Bootstrap | `functions.php` | Loads all inc/ files in order |
| Admin UI | `inc/includes-theme-options.php` | Appearance > Theme Options (typography, accent colors, performance, global HTML) |
| CSS variables | `inc/includes-theme-preset-options-render.php` | Reads theme options → outputs `:root { --cbb-font-heading; --cbb-font-body; --cbb-accent-primary; --cbb-accent-secondary }` inline on every page and in the block editor |
| HTML injection | `inc/includes-html-injection.php` | Global HTML slots (head/before_body/after_body/footer); per-page override via post meta |
| Post meta | `inc/includes-post-meta.php` | Per-page Custom HTML meta box; saves to `_blgf_post_html_*` |
| Block templates | `inc/includes-block-templates.php` | `mbn_block_template` CPT; header-template + footer-template seeded from `template-parts/*.php` |
| Page template sync | `inc/includes-template-page-sync.php` | Syncs `page-templates/*.php` files → Block Template posts |
| Template sync tools | `inc/includes-template-sync-tools.php` | Admin UI: Block Templates > Sync Tools (import/export header/footer/layouts) |
| Page content sync | `inc/includes-page-sync.php` | Tools > Page Content Sync (export pages to `template-parts/page-patterns/*.php`) |
| Nav menu sync | `inc/includes-nav-menu-sync.php` | Tools > Nav Menu Sync (export menus to `template-parts/nav-menus/*.php`) |
| Section shell | `inc/includes-theme-block-section.php` | Shared block section: bg image/video/color, responsive images, inner container |
| Block registry | `block-registry.php` | Auto-discovers and registers all blocks from `build/blocks/` |
| Tailwind | `tailwind-loader.php` | Inlines compiled Tailwind CSS; handles both frontend and block editor |
| Performance | `optimize.php` | Removes emoji scripts; block asset removal currently hardcoded OFF (Header/Footer templates need them) |

### CSS Variable Bridge
Blocks consume theme options exclusively through CSS variables — they never call PHP theme option functions directly:
- `--cbb-font-heading` → heading font stack
- `--cbb-font-body` → body font stack
- `--cbb-accent-primary` → primary accent color
- `--cbb-accent-secondary` → secondary accent color

### Option Key Convention
All theme options use the `blgf_` prefix (stored in `wp_options`). The compat wrapper `blgf_get_theme_option()` maps old `crb_*` Carbon Fields keys. Most code calls `get_option('blgf_*')` directly.

---

## Block Development Rules

**These rules are mandatory. Every generated or modified block must follow all of them.**

### 1. Always include `deprecated[]` in every block

Every `index.js` **must** have a `deprecated` array. When you create a new block, the initial
`deprecated` array is empty (`[]`) but must be present. When you change `save.js` on any existing
block, copy the old `save()` function verbatim into a new entry at the **top** of `deprecated`
before changing `save.js`.

```js
// index.js — minimum structure
import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import save from './save';
import metadata from './block.json';

const deprecated = []; // always present; add entries when save() ever changes

registerBlockType( metadata.name, {
  edit: Edit,
  save,
  deprecated,
} );
```

**Why:** Without `deprecated[]`, any change to `save.js` causes "Block contains unexpected or
invalid content" errors for every previously saved block. There is no recovery except clicking
"Attempt recovery" on each block one by one.

### 2. Never build className with bare template literals

**Wrong — produces extra spaces or "undefined" in the class string:**
```js
// Trailing space when customClassName is ""
className: `my-block ${ customClassName }`,

// Double spaces when booleans are false
className: `my-block ${ isActive ? 'active' : '' } ${ isLarge ? 'large' : '' }`,
```

**Correct — always use array + filter + join:**
```js
className: [ 'my-block', customClassName, isActive && 'active', isLarge && 'large' ]
  .filter( Boolean )
  .join( ' ' ),
```

**Why:** Extra spaces are serialised into the stored block HTML. If the output ever changes
(e.g. a boolean flips), the class string no longer matches what was stored → validation error.

### 3. Never return `null` conditionally from `save()` based on attribute values

**Wrong:**
```js
export default function save( { attributes } ) {
  if ( ! attributes.title && ! attributes.content ) {
    return null; // ← causes validation errors when content is later added or cleared
  }
  return <div>...</div>;
}
```

**Correct — always return consistent markup; let CSS or JS handle empty-state visibility:**
```js
export default function save( { attributes } ) {
  const blockProps = useBlockProps.save();
  return (
    <div { ...blockProps }>
      { attributes.title && <h3>{ attributes.title }</h3> }
      { attributes.content && <p>{ attributes.content }</p> }
    </div>
  );
}
```

**Why:** `save()` is called with the *stored* attributes on every editor load to validate the
stored HTML. If the null condition evaluates differently between saves, the stored markup won't
match the null output → validation error.

### 4. `save()` and `edit()` must be structurally identical

The HTML structure, CSS class names, and attribute usage in `save()` must exactly mirror `edit()`.
Any element present in `save()` must have an equivalent in `edit()`, and vice versa. Divergence
between the two causes the saved content to fail validation when the editor recomputes `save()`.

### 5. Server-side rendered blocks should have `save() { return null; }`

If a block declares `"render": "file:./render.php"` in `block.json`, the `save()` function
**must** return `null`. A non-null `save()` on a dynamic block will create a permanent mismatch
between the PHP-rendered frontend and the JS-rendered editor.

### 6. New block checklist

Before committing a new block:
- [ ] `block.json` has `"apiVersion": 3` and `"textdomain": "mbn-theme"`
- [ ] `index.js` registers with `deprecated: []`
- [ ] `save.js` uses `.filter(Boolean).join(' ')` for all className construction
- [ ] `save.js` never conditionally returns `null` based on attribute values
- [ ] `save.js` structure matches `edit.js` structure exactly
- [ ] If `render.php` exists, `save()` returns `null`
- [ ] Block is in `blocks/<block-name>/` (source) and gets built to `build/blocks/<block-name>/`

### 7. When changing an existing block's `save.js`

1. Copy the **current** `save()` function into `deprecated[0]` in `index.js` (push it to the front)
2. Update `save.js` with the new version
3. Run `npm run build:blocks`
4. Test: open a page with the old block — it should load without "Block contains unexpected content"

---

## Sync Workflows

### Template Sync (Block Templates → Git)
**Admin:** Block Templates > Sync Tools
- Edit header/footer in WP admin → Export to Files → commit `template-parts/header-template.php`, `template-parts/footer-template.php` → push
- On staging: pull → Import from Files

### Page Content Sync (Pages → Git)
**Admin:** Tools > Page Content Sync
- Export pages to `template-parts/page-patterns/*.php` → commit → push
- On staging: pull → Import All Pages from Files

### Nav Menu Sync (Menus → Git)
**Admin:** Tools > Nav Menu Sync
- Edit menus in Appearance > Menus → Export → commit `template-parts/nav-menus/*.php` → push
- On staging: pull → Import All Menus from Files
- Post/page links stored as slugs (portable); custom links should use relative URLs (e.g. `/contact`)

### Dependency order on a fresh environment
1. Import Block Templates (header/footer)
2. Import Pages from Files (so slugs exist for nav menu resolution)
3. Import Nav Menus from Files

---

## Build Commands

```bash
npm run build:blocks   # compile blocks only (src/ → build/)
npm run build:css      # compile Tailwind CSS
npm run build          # both of the above
```

Blocks source: `blocks/<name>/`  
Blocks output: `build/blocks/<name>/`

---

## Known Architecture Notes

- **Performance toggles are disconnected**: The "Remove core block assets" and "Remove classic theme styles" checkboxes in Theme Options are registered but `optimize.php` hardcodes `return true` in `custom_theme_needs_block_assets()` — the toggles have no effect. Header/Footer block templates require block assets on every page.
- **`blgf_get_theme_option()` is rarely called**: Most code calls `get_option('blgf_*')` directly. The wrapper exists for Carbon Fields backwards compatibility only.
- **`custom_theme_after_body` is a custom action**: The "After Body" HTML slot only fires if `do_action('custom_theme_after_body')` is called from an active template.
- **Navigation block vs classic menus**: The Nav Menu Sync tool manages classic WordPress menus (registered via `register_nav_menus`). If the header template uses a Navigation block with inline content, that syncs via the Block Template Sync instead.
