import { 
  useBlockProps, 
  InspectorControls,
  RichText,
  MediaUpload,
  MediaUploadCheck,
  PanelColorSettings
} from '@wordpress/block-editor';
import { 
  PanelBody, 
  SelectControl, 
  Button,
  TextControl,
  ToggleControl,
  RangeControl,
  __experimentalVStack as VStack 
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

export default function Edit({ attributes, setAttributes }) {
  const {
    imageUrl,
    imageId,
    imagePosition,
    imageWidth,
    title,
    titleTag,
    titleColor,
    titleFontSize,
    content,
    contentColor,
    contentFontSize,
    buttonText,
    buttonUrl,
    buttonStyle,
    buttonTarget
  } = attributes;

  const blockProps = useBlockProps({
    className: `image-box image-position-${imagePosition}`,
  });

  // Generate dynamic styles for background image
  const containerStyle = imagePosition === 'background' && imageUrl ? {
    backgroundImage: `url(${imageUrl})`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
  } : {};

  const imageStyles = imagePosition !== 'background' ? {
    width: imageWidth,
    flexShrink: 0
  } : {};

  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Image Settings', 'mbn-theme')} initialOpen={true}>
          <MediaUploadCheck>
            <MediaUpload
              onSelect={(media) => setAttributes({
                imageUrl: media.url,
                imageId: media.id
              })}
              allowedTypes={['image']}
              value={imageId}
              render={({ open }) => (
                <VStack spacing={3}>
                  <Button onClick={open} variant="primary">
                    {imageUrl 
                      ? __('Replace Image', 'mbn-theme') 
                      : __('Select Image', 'mbn-theme')
                    }
                  </Button>
                  {imageUrl && (
                    <>
                      <img 
                        src={imageUrl} 
                        alt="" 
                        style={{ maxWidth: '100%', height: 'auto' }}
                      />
                      <Button 
                        onClick={() => setAttributes({ 
                          imageUrl: '', 
                          imageId: undefined 
                        })}
                        variant="link"
                        isDestructive
                      >
                        {__('Remove Image', 'mbn-theme')}
                      </Button>
                    </>
                  )}
                </VStack>
              )}
            />
          </MediaUploadCheck>

          <SelectControl
            label={__('Image Position', 'mbn-theme')}
            value={imagePosition}
            options={[
              { label: __('Left', 'mbn-theme'), value: 'left' },
              { label: __('Right', 'mbn-theme'), value: 'right' },
              { label: __('Background', 'mbn-theme'), value: 'background' }
            ]}
            onChange={(value) => setAttributes({ imagePosition: value })}
            help={__('Position image on left, right, or as background', 'mbn-theme')}
          />

          {imagePosition !== 'background' && (
            <TextControl
              label={__('Image Width', 'mbn-theme')}
              value={imageWidth}
              onChange={(value) => setAttributes({ imageWidth: value })}
              help={__('Set image width (e.g., 50%, 300px)', 'mbn-theme')}
            />
          )}
        </PanelBody>

        <PanelBody title={__('Title Settings', 'mbn-theme')} initialOpen={false}>
          <SelectControl
            label={__('Title Tag', 'mbn-theme')}
            value={titleTag}
            options={[
              { label: 'H2', value: 'h2' },
              { label: 'H3', value: 'h3' },
              { label: 'H4', value: 'h4' },
              { label: 'H5', value: 'h5' },
              { label: 'Span', value: 'span' }
            ]}
            onChange={(value) => setAttributes({ titleTag: value })}
            help={__('Choose heading level for SEO', 'mbn-theme')}
          />
        </PanelBody>

        <PanelColorSettings
          title={__('Title Color', 'mbn-theme')}
          colorSettings={[
            {
              value: titleColor,
              onChange: (value) => setAttributes({ titleColor: value }),
              label: __('Text Color', 'mbn-theme'),
            },
          ]}
        />

        <PanelBody title={__('Title Font Size', 'mbn-theme')} initialOpen={false}>
          <RangeControl
            label={__('Font Size (px)', 'mbn-theme')}
            value={titleFontSize}
            onChange={(value) => setAttributes({ titleFontSize: value })}
            min={0}
            max={100}
            step={1}
            help={__('0 = default theme size', 'mbn-theme')}
          />
        </PanelBody>

        <PanelColorSettings
          title={__('Content Color', 'mbn-theme')}
          colorSettings={[
            {
              value: contentColor,
              onChange: (value) => setAttributes({ contentColor: value }),
              label: __('Text Color', 'mbn-theme'),
            },
          ]}
        />

        <PanelBody title={__('Content Font Size', 'mbn-theme')} initialOpen={false}>
          <RangeControl
            label={__('Font Size (px)', 'mbn-theme')}
            value={contentFontSize}
            onChange={(value) => setAttributes({ contentFontSize: value })}
            min={0}
            max={100}
            step={1}
            help={__('0 = default theme size', 'mbn-theme')}
          />
        </PanelBody>

        <PanelBody title={__('Button Settings', 'mbn-theme')} initialOpen={false}>
          <VStack spacing={3}>
            <TextControl
              label={__('Button Text', 'mbn-theme')}
              value={buttonText}
              onChange={(value) => setAttributes({ buttonText: value })}
            />

            <TextControl
              label={__('Button URL', 'mbn-theme')}
              value={buttonUrl}
              onChange={(value) => setAttributes({ buttonUrl: value })}
              type="url"
            />

            <SelectControl
              label={__('Button Style', 'mbn-theme')}
              value={buttonStyle}
              options={[
                { label: __('Primary', 'mbn-theme'), value: 'primary' },
                { label: __('Secondary', 'mbn-theme'), value: 'secondary' },
                { label: __('Outline', 'mbn-theme'), value: 'outline' }
              ]}
              onChange={(value) => setAttributes({ buttonStyle: value })}
            />

            <ToggleControl
              label={__('Open in New Tab', 'mbn-theme')}
              checked={buttonTarget}
              onChange={(value) => setAttributes({ buttonTarget: value })}
            />
          </VStack>
        </PanelBody>
      </InspectorControls>

      <div {...blockProps} style={containerStyle}>
        <div className="image-box-inner">
          {imagePosition !== 'background' && imageUrl && (
            <div className="image-box-image" style={imageStyles}>
              <img src={imageUrl} alt="" />
            </div>
          )}
          
          <div className="image-box-content">
            <RichText
              tagName={titleTag}
              value={title}
              onChange={(value) => setAttributes({ title: value })}
              placeholder={__('Enter title...', 'mbn-theme')}
              className="image-box-title"
              style={{
                color: titleColor || undefined,
                fontSize: titleFontSize ? `${titleFontSize}px` : undefined
              }}
            />

            <RichText
              tagName="div"
              value={content}
              onChange={(value) => setAttributes({ content: value })}
              placeholder={__('Enter content...', 'mbn-theme')}
              className="image-box-text"
              multiline="p"
              allowedFormats={['core/bold', 'core/italic', 'core/link', 'core/underline', 'core/strikethrough']}
              style={{
                color: contentColor || undefined,
                fontSize: contentFontSize ? `${contentFontSize}px` : undefined
              }}
            />

            {buttonText && (
              <div className="image-box-button">
                <a 
                  href={buttonUrl} 
                  className={`btn-${buttonStyle}`}
                  target={buttonTarget ? '_blank' : undefined}
                  rel={buttonTarget ? 'noopener noreferrer' : undefined}
                >
                  {buttonText}
                </a>
              </div>
            )}
          </div>
        </div>
      </div>
    </>
  );
}
