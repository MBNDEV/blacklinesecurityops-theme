import { useBlockProps, InspectorControls, RichText, MediaUpload, MediaUploadCheck, PanelColorSettings } from '@wordpress/block-editor';
import { PanelBody, SelectControl, RangeControl, TextareaControl, TextControl, Button, TabPanel } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

export default function Edit({ attributes, setAttributes }) {
  const {
    iconType,
    iconImageUrl,
    iconImageId,
    iconSvgCode,
    iconPosition,
    iconSize,
    title,
    titleTag,
    titleClass,
    titleColor,
    titleFontSize,
    description,
    descriptionColor,
    descriptionFontSize,
    borderWidth,
    borderStyle,
    borderColor,
    borderRadius,
    backgroundColor,
    padding,
    margin
  } = attributes;

  const blockProps = useBlockProps({
    className: `icon-box icon-position-${iconPosition}`,
    style: {
      borderWidth: borderWidth ? `${borderWidth}px` : undefined,
      borderStyle: borderStyle || undefined,
      borderColor: borderColor || undefined,
      borderRadius: borderRadius ? `${borderRadius}px` : undefined,
      backgroundColor: backgroundColor || undefined,
      padding: padding || undefined,
      margin: margin || undefined
    }
  });

  // Get alignment class based on position
  const getAlignmentClass = () => {
    switch (iconPosition) {
      case 'left':
        return 'flex-row items-start text-left';
      case 'right':
        return 'flex-row-reverse items-start text-left';
      case 'center':
      default:
        return 'flex-col items-center text-center';
    }
  };

  const decodeSvgCode = (str) => {
    if (!str) return '';
    const el = document.createElement('textarea');
    el.innerHTML = str;
    return el.value;
  };


  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Icon Settings', 'mbn-theme')} initialOpen={true}>
          <TabPanel
            className="icon-type-tabs"
            activeClass="is-active"
            initialTabName={iconType}
            tabs={[
              {
                name: 'image',
                title: __('Image', 'mbn-theme'),
              },
              {
                name: 'svg',
                title: __('SVG Code', 'mbn-theme'),
              },
            ]}
            onSelect={(tabName) => setAttributes({ iconType: tabName })}
          >
            {(tab) => (
              <>
                {tab.name === 'image' && (
                  <MediaUploadCheck>
                    <MediaUpload
                      onSelect={(media) => setAttributes({
                        iconImageUrl: media.url,
                        iconImageId: media.id,
                        iconType: 'image'
                      })}
                      allowedTypes={['image']}
                      value={iconImageId}
                      render={({ open }) => (
                        <div style={{ marginTop: '10px' }}>
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
                )}

                {tab.name === 'svg' && (
                  <div style={{ marginTop: '10px' }}>
                    <TextareaControl
                      label={__('SVG Code', 'mbn-theme')}
                      help={__('Paste your SVG code here', 'mbn-theme')}
                      value={iconSvgCode}
                      onChange={(value) => setAttributes({ iconSvgCode: value, iconType: 'svg' })}
                      rows={8}
                    />
                    {iconSvgCode && (
                      <div
                        style={{ marginTop: '10px', padding: '10px', border: '1px solid #ddd' }}
                        dangerouslySetInnerHTML={{ __html: decodeSvgCode(iconSvgCode) }}
                      />
                    )}
                  </div>
                )}
              </>
            )}
          </TabPanel>

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

        <PanelBody title={__('Content Settings', 'mbn-theme')}>
          <SelectControl
            label={__('Title Tag', 'mbn-theme')}
            value={titleTag}
            options={[
              { label: 'H2', value: 'h2' },
              { label: 'H3', value: 'h3' },
              { label: 'H4', value: 'h4' },
              { label: 'H5', value: 'h5' },
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
          title={__('Description Color', 'mbn-theme')}
          colorSettings={[
            {
              value: descriptionColor,
              onChange: (value) => setAttributes({ descriptionColor: value }),
              label: __('Text Color', 'mbn-theme'),
            },
          ]}
        />

        <PanelBody title={__('Description Font Size', 'mbn-theme')} initialOpen={false}>
          <RangeControl
            label={__('Font Size (px)', 'mbn-theme')}
            value={descriptionFontSize}
            onChange={(value) => setAttributes({ descriptionFontSize: value })}
            min={0}
            max={100}
            step={1}
            help={__('0 = default theme size', 'mbn-theme')}
          />
        </PanelBody>

        <PanelBody title={__('Border', 'mbn-theme')} initialOpen={false}>
          <RangeControl
            label={__('Border Width (px)', 'mbn-theme')}
            value={borderWidth}
            onChange={(value) => setAttributes({ borderWidth: value })}
            min={0}
            max={20}
            step={1}
            help={__('0 = no border', 'mbn-theme')}
          />
          <SelectControl
            label={__('Border Style', 'mbn-theme')}
            value={borderStyle}
            options={[
              { label: __('None', 'mbn-theme'), value: '' },
              { label: __('Solid', 'mbn-theme'), value: 'solid' },
              { label: __('Dashed', 'mbn-theme'), value: 'dashed' },
              { label: __('Dotted', 'mbn-theme'), value: 'dotted' },
              { label: __('Double', 'mbn-theme'), value: 'double' },
            ]}
            onChange={(value) => setAttributes({ borderStyle: value })}
          />
        </PanelBody>

        <PanelColorSettings
          title={__('Border Color', 'mbn-theme')}
          colorSettings={[
            {
              value: borderColor,
              onChange: (value) => setAttributes({ borderColor: value }),
              label: __('Color', 'mbn-theme'),
            },
          ]}
        />

        <PanelBody title={__('Border Radius', 'mbn-theme')} initialOpen={false}>
          <RangeControl
            label={__('Radius (px)', 'mbn-theme')}
            value={borderRadius}
            onChange={(value) => setAttributes({ borderRadius: value })}
            min={0}
            max={100}
            step={1}
            help={__('0 = no rounded corners', 'mbn-theme')}
          />
        </PanelBody>

        <PanelColorSettings
          title={__('Background Color', 'mbn-theme')}
          colorSettings={[
            {
              value: backgroundColor,
              onChange: (value) => setAttributes({ backgroundColor: value }),
              label: __('Color', 'mbn-theme'),
            },
          ]}
        />

        <PanelBody title={__('Spacing', 'mbn-theme')} initialOpen={false}>
          <TextControl
            label={__('Padding', 'mbn-theme')}
            value={padding}
            onChange={(value) => setAttributes({ padding: value })}
            help={__('e.g., 20px or 20px 40px', 'mbn-theme')}
            placeholder="20px"
          />
          <TextControl
            label={__('Margin', 'mbn-theme')}
            value={margin}
            onChange={(value) => setAttributes({ margin: value })}
            help={__('e.g., 20px or 20px 40px', 'mbn-theme')}
            placeholder="20px"
          />
        </PanelBody>
      </InspectorControls>

      <div {...blockProps}>
        <div className={`icon-box-inner flex gap-4 ${getAlignmentClass()}`}>
          {/* Icon Display */}
          {(iconImageUrl || iconSvgCode) && (
            <div className="icon-box-icon" style={{ flexShrink: 0 }}>
              {iconType === 'image' && iconImageUrl && (
                <img
                  src={iconImageUrl}
                  alt=""
                  style={{ width: `${iconSize}px`, height: `${iconSize}px`, objectFit: 'contain' }}
                />
              )}
              {iconType === 'svg' && iconSvgCode && (
                <div
                  className="icon-box-svg"
                  style={{ width: `${iconSize}px`, height: `${iconSize}px` }}
                  dangerouslySetInnerHTML={{ __html: iconSvgCode }}
                />
              )}
            </div>
          )}

          {/* Content */}
          <div className="icon-box-content" style={{ flex: 1 }}>
            <RichText
              tagName={titleTag}
              value={title}
              onChange={(value) => setAttributes({ title: value })}
              placeholder={__('Enter title...', 'mbn-theme')}
              className={`icon-box-title${titleClass ? ' ' + titleClass : ''}`}
              style={{
                color: titleColor || undefined,
                fontSize: titleFontSize ? `${titleFontSize}px` : undefined
              }}
            />

            <RichText
              tagName="div"
              value={description}
              onChange={(value) => setAttributes({ description: value })}
              placeholder={__('Enter description...', 'mbn-theme')}
              className="icon-box-description"
              allowedFormats={['core/bold', 'core/italic', 'core/link', 'core/paragraph']}
              multiline="p"
              style={{
                color: descriptionColor || undefined,
                fontSize: descriptionFontSize ? `${descriptionFontSize}px` : undefined
              }}
            />
          </div>
        </div>
      </div>
    </>
  );
}
