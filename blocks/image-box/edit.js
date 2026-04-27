import { 
  useBlockProps, 
  InspectorControls,
  RichText,
  MediaUpload,
  MediaUploadCheck
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
    titleClass,
    titleColor,
    titleFontSize,
    content,
    contentColor,
    contentFontSize,
    listContent,
    listType,
    listFontSize,
    listColor,
    showList,
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

  const imageStyles = (imagePosition !== 'background' && imagePosition !== 'top') ? {
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
              { label: __('Top', 'mbn-theme'), value: 'top' },
              { label: __('Background', 'mbn-theme'), value: 'background' }
            ]}
            onChange={(value) => setAttributes({ imagePosition: value })}
            help={__('Position image on left, right, top, or as background', 'mbn-theme')}
          />

          {(imagePosition !== 'background' && imagePosition !== 'top') && (
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
          <TextControl
            label={__('Title Class', 'mbn-theme')}
            value={titleClass}
            onChange={(value) => setAttributes({ titleClass: value })}
            placeholder={__('e.g., my-custom-class', 'mbn-theme')}
            help={__('Add custom CSS class name(s)', 'mbn-theme')}
          />
          <TextControl
            label={__('Title Color', 'mbn-theme')}
            value={titleColor}
            onChange={(value) => setAttributes({ titleColor: value })}
            placeholder={__('e.g., #000000 or black', 'mbn-theme')}
            help={__('CSS color value (hex, rgb, or name)', 'mbn-theme')}
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

        <PanelBody title={__('Content Settings', 'mbn-theme')} initialOpen={false}>
          <TextControl
            label={__('Content Color', 'mbn-theme')}
            value={contentColor}
            onChange={(value) => setAttributes({ contentColor: value })}
            placeholder={__('e.g., #333333 or gray', 'mbn-theme')}
            help={__('CSS color value (hex, rgb, or name)', 'mbn-theme')}
          />
          <RangeControl
            label={__('Content Font Size (px)', 'mbn-theme')}
            value={contentFontSize}
            onChange={(value) => setAttributes({ contentFontSize: value })}
            min={0}
            max={100}
            step={1}
            help={__('0 = default theme size', 'mbn-theme')}
          />
          <ToggleControl
            label={__('Show List', 'mbn-theme')}
            checked={showList}
            onChange={(value) => setAttributes({ showList: value })}
            help={__('Toggle to show or hide the list section', 'mbn-theme')}
          />
          {showList && (
            <>
              <SelectControl
                label={__('List Type', 'mbn-theme')}
                value={listType}
                options={[
                  { label: __('Unordered List (ul)', 'mbn-theme'), value: 'ul' },
                  { label: __('Ordered List (ol)', 'mbn-theme'), value: 'ol' }
                ]}
                onChange={(value) => setAttributes({ listType: value })}
                help={__('Choose list type for additional content', 'mbn-theme')}
              />
              <TextControl
                label={__('List Color', 'mbn-theme')}
                value={listColor}
                onChange={(value) => setAttributes({ listColor: value })}
                placeholder={__('e.g., #666666 or gray', 'mbn-theme')}
                help={__('CSS color value (hex, rgb, or name)', 'mbn-theme')}
              />
              <RangeControl
                label={__('List Font Size (px)', 'mbn-theme')}
                value={listFontSize}
                onChange={(value) => setAttributes({ listFontSize: value })}
                min={0}
                max={100}
                step={1}
                help={__('0 = default theme size', 'mbn-theme')}
              />
            </>
          )}
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
          {imagePosition === 'top' && imageUrl && (
            <div className="image-box-image image-box-image-top" style={{ width: '100%', marginBottom: '1rem' }}>
              <img src={imageUrl} alt="" />
            </div>
          )}

          {(imagePosition === 'left' || imagePosition === 'right') && imageUrl && (
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
              className={['image-box-title', titleClass].filter(Boolean).join(' ')}
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
              identifier="content"
            />

            {showList && (
              <div className="image-box-list-wrapper" style={{ marginTop: '12px' }}>
                <RichText
                  tagName={listType}
                  value={listContent}
                  onChange={(value) => setAttributes({ listContent: value })}
                  placeholder={__('• Add list items (press Enter for new item)', 'mbn-theme')}
                  className="image-box-list"
                  multiline="li"
                  allowedFormats={['core/bold', 'core/italic', 'core/link']}
                  style={{
                    color: listColor || undefined,
                    fontSize: listFontSize ? `${listFontSize}px` : undefined,
                    paddingLeft: listType === 'ul' ? '20px' : '25px'
                  }}
                  identifier="list"
                  __unstablePastePlainText
                />
              </div>
            )}

            {buttonText && (
              <div className="image-box-button">
                <a 
                  href={buttonUrl} 
                  className={`btn-${buttonStyle} wp-block-button__link`}
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
