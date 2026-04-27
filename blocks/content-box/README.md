# Content Box Block

A flexible container block with icon/image, title, and support for nested blocks.

## Features

- **Icon/Image**: Upload and position icon (left, center, right)
- **Icon Size**: Adjustable from 24px to 200px
- **Title**: Editable title with custom heading tags
- **Heading Options**: H1, H2, H3, H4, H5, Div, Span
- **Custom Classes**: Add CSS classes to title
- **Nested Blocks**: Use InnerBlocks to add any blocks inside
- **Custom CSS**: Add inline custom CSS styles
- **Responsive**: Auto-stacks on mobile for left/right layouts
- **Auto-hide**: Empty icon and title automatically hidden

## Attributes

- `iconImageUrl`: string - URL of uploaded image
- `iconImageId`: number - Media library ID
- `iconPosition`: 'left' | 'center' | 'right' - Icon position
- `iconSize`: number - Icon size in pixels (default: 64)
- `title`: string - Title text
- `titleTag`: 'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'div' | 'span' - HTML tag for title
- `titleClass`: string - Custom CSS class(es) for title
- `customCSS`: string - Custom inline CSS styles

## Usage

1. Add the Content Box block from the block inserter
2. **In Sidebar → Icon Settings:**
   - Upload an icon/image
   - Select icon position (left/center/right)
   - Adjust icon size with slider
3. **In Sidebar → Title Settings:**
   - Choose heading tag (H1-H5, Div, Span)
   - Add custom CSS classes
4. **In Content Area:**
   - Type title directly
   - Click "+" button to add nested blocks (paragraphs, images, buttons, etc.)
5. **In Sidebar → Custom CSS:**
   - Add custom styles (e.g., `background: #f5f5f5; padding: 30px;`)

## Responsive Behavior

- **Desktop**: Icon and content side-by-side (left/right) or stacked (center)
- **Tablet**: Slightly reduced spacing and icon size
- **Mobile**: All layouts stack vertically with centered alignment

## Example Custom CSS

```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
padding: 40px;
border-radius: 15px;
box-shadow: 0 10px 30px rgba(0,0,0,0.1);
```

## InnerBlocks Support

You can add any WordPress blocks inside:
- Paragraphs
- Images
- Buttons
- Lists
- Custom blocks
- And more...

## Use Cases

- Feature boxes with icons and expandable content
- Service sections with structured content
- Team member profiles
- Product showcases
- Testimonials with media
- Call-to-action sections
