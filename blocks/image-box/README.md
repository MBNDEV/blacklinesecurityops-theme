# Image Box Block

A flexible content box with image positioning, title, content, and call-to-action button.

## Features

### Image Options
- **Position**: Left, Right, or Background
- **Width Control**: Set custom width for left/right positioned images
- **Automatic Upload**: WordPress media library integration

### Title Settings
- **Heading Levels**: H2, H3, H4, H5, or Span
- **SEO-Friendly**: Choose appropriate semantic heading level
- **Auto-hide**: Title automatically hides if empty

### Content Field
- **Rich Text Editor**: Supports simple HTML formatting
- **Allowed Formats**: Bold, Italic, Link, Underline, Strikethrough
- **Multi-paragraph**: Supports multiple paragraphs
- **Auto-hide**: Content hides if empty

### Button Options
- **Text & URL**: Customizable button text and link
- **3 Styles**: Primary, Secondary, Outline
- **Target Control**: Open in new tab option
- **Auto-hide**: Button hides if text is empty

### Layout Support
- **Alignment**: Supports wide and full-width alignment
- **Spacing**: Native margin and padding controls
- **Colors**: Background, text, and gradient support
- **Responsive**: Mobile-friendly with automatic stacking

## Usage Examples

### 1. Left Image with Content
1. Add "Image Box" block
2. Upload image → Position: Left
3. Set image width: `40%`
4. Add title (H2), content, and button

### 2. Right Image Card
1. Add "Image Box" block
2. Upload image → Position: Right
3. Set image width: `50%`
4. Add content with button

### 3. Hero Section with Background Image
1. Add "Image Box" block
2. Upload image → Position: Background
3. Set title to H1 or H2
4. Add hero text and CTA button
5. Adjust padding for better spacing

## Auto-Hide Feature

All elements automatically hide when empty:
- Empty title → No title element rendered
- Empty content → No content wrapper rendered
- No button text → No button rendered

This keeps your HTML clean and prevents empty spacing.

## Technical Details

**Block Name**: `mbn-theme/image-box`  
**Category**: Layout  
**Supports**: Align, Color, Spacing

## File Structure

```
blocks/image-box/
├── block.json          # Block metadata and attributes
├── index.js            # Block registration
├── edit.js             # Editor component (React)
├── save.js             # Frontend output (React)
└── style.css           # Frontend styles
```

## Responsive Behavior

**Desktop (>768px)**:
- Left/Right images maintain position
- Content flows beside image

**Mobile (≤768px)**:
- Images stack above content
- Full width layout
- Reduced padding for backgrounds

## Button Styles

Uses theme button classes:
- `.btn-primary` - Primary branded button
- `.btn-secondary` - Secondary gray button
- `.btn-outline` - Outlined button

Make sure these classes are defined in your theme's Tailwind config or CSS.
