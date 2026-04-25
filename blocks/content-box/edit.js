import { useBlockProps, InspectorControls, RichText, MediaUpload, MediaUploadCheck, InnerBlocks } from '@wordpress/block-editor';
import { PanelBody, SelectControl, RangeControl, TextControl, TextareaControl, Button } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

export default function Edit({ attributes, setAttributes, clientId }) {
  const {
    boxWidth,
    borderWidth,
    borderStyle,
    borderColor,
    borderRadius,
    backgroundColor,
    boxPadding,
    boxMargin,
    iconImageUrl,
    iconImageId,
    iconPosition,
    iconSize,
    title,
    titleTag,
    titleClass,
    titleColor,
    titleFontSize,
    customCSS
  } = attributes;

  const blockProps = useBlockProps({
    className: `content-box icon-position-${iconPosition}`
  });

  // Get alignment class based on position
  const getAlignmentClass = () => {
    switch (iconPosition) {
      case 'left':
        return 'flex-row items-start';
      case 'right':
        return 'flex-row-reverse items-start';
      case 'center':
      default:
        return 'flex-col items-center';
    }
  };

  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Block Settings', 'mbn-theme')} initialOpen={true}>
          <TextControl
            label={__('Box Width', 'mbn-theme')}
            value={boxWidth}
            onChange={(value) => setAttributes({ boxWidth: value })}
            placeholder={__('e.g., 100%, 500px, auto', 'mbn-theme')}
            help={__('CSS width value', 'mbn-theme')}
          />
          <TextControl
            label={__('Background Color', 'mbn-theme')}
            value={backgroundColor}
            onChange={(value) => setAttributes({ backgroundColor: value })}
            placeholder={__('e.g., #ffffff or white', 'mbn-theme')}
            help={__('CSS color value', 'mbn-theme')}
          />
          <RangeControl
            label={__('Border Width (px)', 'mbn-theme')}
            value={borderWidth}
            onChange={(value) => setAttributes({ borderWidth: value })}
            min={0}
            max={20}
            step={1}
            help={__('0 = no border', 'mbn-theme')}
          />
          {borderWidth > 0 && (
            <>
              <SelectControl
                label={__('Border Style', 'mbn-theme')}
                value={borderStyle}
                options={[
                  { label: __('Solid', 'mbn-theme'), value: 'solid' },
                  { label: __('Dashed', 'mbn-theme'), value: 'dashed' },
                  { label: __('Dotted', 'mbn-theme'), value: 'dotted' },
                  { label: __('Double', 'mbn-theme'), value: 'double' },
                ]}
                onChange={(value) => setAttributes({ borderStyle: value })}
              />
              <TextControl
                label={__('Border Color', 'mbn-theme')}
                value={borderColor}
                onChange={(value) => setAttributes({ borderColor: value })}
                placeholder={__('e.g., #cccccc or gray', 'mbn-theme')}
                help={__('CSS color value', 'mbn-theme')}
              />
            </>
          )}
          <RangeControl
            label={__('Border Radius (px)', 'mbn-theme')}
            value={borderRadius}
            onChange={(value) => setAttributes({ borderRadius: value })}
            min={0}
            max={100}
            step={1}
          />
          <TextControl
            label={__('Padding', 'mbn-theme')}
            value={boxPadding}
            onChange={(value) => setAttributes({ boxPadding: value })}
            placeholder={__('e.g., 20px or 1rem 2rem', 'mbn-theme')}
            help={__('CSS padding value', 'mbn-theme')}
          />
          <TextControl
            label={__('Margin', 'mbn-theme')}
            value={boxMargin}
            onChange={(value) => setAttributes({ boxMargin: value })}
            placeholder={__('e.g., 10px 0 or 1rem auto', 'mbn-theme')}
            help={__('CSS margin value', 'mbn-theme')}
          />
        </PanelBody>

        <PanelBody title={__('Icon Settings', 'mbn-theme')} initialOpen={false}>
          <MediaUploadCheck>
            <MediaUpload
              onSelect={(media) => setAttributes({
                iconImageUrl: media.url,
                iconImageId: media.id
              })}
              allowedTypes={['image']}
              value={iconImageId}
              render={({ open }) => (
                <div>
                  <Button onClick={open} variant="primary">
                    {iconImageUrl ? __('Replace Image', 'mbn-theme') : __('Select Image', 'mbn-theme')}
                  </Button>
                  {iconImageUrl && (
                    <>
                      <div style={{ marginTop: '10px' }}>
                        <img src={iconImageUrl} alt="" style={{ maxWidth: '100px', height: 'auto' }} />
                      </div>
                      <Button
                        onClick={() => setAttributes({ iconImageUrl: '', iconImageId: 0 })}
                        isDestructive
                        variant="secondary"
                        style={{ marginTop: '10px' }}
                      >
                        {__('Remove Image', 'mbn-theme')}
                      </Button>
                    </>
                  )}
                </div>
              )}
            />
          </MediaUploadCheck>

          <SelectControl
            label={__('Icon Position', 'mbn-theme')}
            value={iconPosition}
            options={[
              { label: __('Left', 'mbn-theme'), value: 'left' },
              { label: __('Center', 'mbn-theme'), value: 'center' },
              { label: __('Right', 'mbn-theme'), value: 'right' },
            ]}
            onChange={(value) => setAttributes({ iconPosition: value })}
            help={__('Position of the icon relative to content', 'mbn-theme')}
            style={{ marginTop: '15px' }}
          />

          <RangeControl
            label={__('Icon Size (px)', 'mbn-theme')}
            value={iconSize}
            onChange={(value) => setAttributes({ iconSize: value })}
            min={24}
            max={200}
            step={4}
          />
        </PanelBody>

        <PanelBody title={__('Title Settings', 'mbn-theme')} initialOpen={false}>
          <SelectControl
            label={__('Title Tag', 'mbn-theme')}
            value={titleTag}
            options={[
              { label: 'H1', value: 'h1' },
              { label: 'H2', value: 'h2' },
              { label: 'H3', value: 'h3' },
              { label: 'H4', value: 'h4' },
              { label: 'H5', value: 'h5' },
              { label: 'Div', value: 'div' },
              { label: 'Span', value: 'span' },
            ]}
            onChange={(value) => setAttributes({ titleTag: value })}
          />
          <TextControl
            label={__('Title Custom Class', 'mbn-theme')}
            value={titleClass}
            onChange={(value) => setAttributes({ titleClass: value })}
            help={__('Add custom CSS class(es) to the title', 'mbn-theme')}
            placeholder="custom-class another-class"
          />
          <TextControl
            label={__('Title Color', 'mbn-theme')}
            value={titleColor}
            onChange={(value) => setAttributes({ titleColor: value })}
            placeholder={__('e.g., #000000 or black', 'mbn-theme')}
            help={__('CSS color value', 'mbn-theme')}
          />
          <RangeControl
            label={__('Title Font Size (px)', 'mbn-theme')}
            value={titleFontSize}
            onChange={(value) => setAttributes({ titleFontSize: value })}
            min={0}
            max={100}
            step={1}
            help={__('0 = default theme size', 'mbn-theme')}
          />
        </PanelBody>

        <PanelBody title={__('Custom CSS', 'mbn-theme')} initialOpen={false}>
          <TextareaControl
            label={__('CSS Styles', 'mbn-theme')}
            value={customCSS}
            onChange={(value) => setAttributes({ customCSS: value })}
            help={__('Write custom CSS with class names', 'mbn-theme')}
            rows={10}
            placeholder=".my-custom-class {&#10;  background: #f5f5f5;&#10;  padding: 30px;&#10;  border-radius: 10px;&#10;}"
          />
        </PanelBody>
      </InspectorControls>

      {customCSS && (
        <style>{customCSS}</style>
      )}
      
      <div {...blockProps} style={{
        width: boxWidth || undefined,
        backgroundColor: backgroundColor || undefined,
        border: borderWidth > 0 ? `${borderWidth}px ${borderStyle} ${borderColor || '#000'}` : undefined,
        borderRadius: borderRadius ? `${borderRadius}px` : undefined,
        padding: boxPadding || undefined,
        margin: boxMargin || undefined
      }}>
        <div className={`content-box-inner flex gap-4 ${getAlignmentClass()}`}>
          {/* Icon Display */}
          {iconImageUrl && (
            <div className="content-box-icon" style={{ flexShrink: 0 }}>
              <img
                src={iconImageUrl}
                alt=""
                style={{ width: `${iconSize}px`, height: `${iconSize}px`, objectFit: 'contain' }}
              />
            </div>
          )}

          {/* Content Wrapper */}
          <div className="content-box-content" style={{ flex: 1, width: '100%' }}>
            {/* Title */}
            <RichText
              tagName={titleTag}
              value={title}
              onChange={(value) => setAttributes({ title: value })}
              placeholder={__('Enter title...', 'mbn-theme')}
              className={`content-box-title${titleClass ? ' ' + titleClass : ''}`}
              style={{
                color: titleColor || undefined,
                fontSize: titleFontSize ? `${titleFontSize}px` : undefined
              }}
            />

            {/* Inner Blocks for nested content */}
            <div className="content-box-blocks">
              <InnerBlocks
                renderAppender={InnerBlocks.ButtonBlockAppender}
              />
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
