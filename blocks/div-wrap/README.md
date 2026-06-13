# Div Wrap Block

A flexible container block that functions like WordPress Group/Row blocks with enhanced features for background media and custom styling.

## Features

### Container Functionality
- **InnerBlocks Support**: Add any WordPress blocks inside
- **Full/Wide Alignment**: Supports alignwide and alignfull
- **Spacing Controls**: Native margin and padding controls
- **Color Support**: Background colors, text colors, and gradients

### Background Options

#### Image Background
- Upload/select background images
- Background Size: Cover, Contain, Auto
- Background Position: 9 position options
- Background Repeat: No-repeat, Repeat, Repeat-X, Repeat-Y
- Background Attachment: Scroll or Fixed (parallax effect)

#### Video Background
- Upload/select background videos (MP4)
- Loop: Auto-repeat video
- Mute: Control audio
- Autoplay: Start automatically
- Responsive: Automatically fills container

### Custom Styling
- **Custom CSS**: Add scoped CSS directly to the block
- **Custom Classes**: Add custom class names
- **Min Height**: Set minimum height (px, vh, etc.)

## Usage

1. Add the "Div Wrap" block to your page
2. Add content blocks inside it (text, images, buttons, etc.)
3. Configure background in the sidebar:
   - Choose background type (None, Image, or Video)
   - Upload your media
   - Adjust settings as needed
4. Optionally add custom CSS or classes

## Technical Details

**Block Name**: `mbn-theme/div-wrap`  
**Category**: Layout  
**Supports**: Align, Color, Spacing

## File Structure

```
blocks/div-wrap/
├── block.json          # Block metadata and attributes
├── index.js            # Block registration
├── edit.js             # Editor component (React)
├── save.js             # Frontend output (React)
└── style.css           # Frontend styles
```

## Examples

### Full-width hero with video background
1. Add Div Wrap block
2. Set alignment to "Full width"
3. Select "Video" background type
4. Upload your hero video
5. Set min height to "100vh"
6. Add heading and button blocks inside

### Section with image background
1. Add Div Wrap block
2. Select "Image" background type
3. Upload background image
4. Set background attachment to "Fixed" for parallax
5. Add content blocks inside

### Custom styled container
1. Add Div Wrap block
2. Add custom class: "my-section"
3. Add custom CSS:
   ```css
   .my-section {
     padding: 80px 20px;
     background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
   }
   ```

## Browser Compatibility

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Video backgrounds require HTML5 video support
- Fixed backgrounds may have limited mobile support
