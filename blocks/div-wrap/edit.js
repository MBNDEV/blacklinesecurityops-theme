import { 
  useBlockProps, 
  InspectorControls, 
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck 
} from '@wordpress/block-editor';
import { 
  PanelBody, 
  SelectControl, 
  Button,
  TextareaControl,
  TextControl,
  ToggleControl,
  __experimentalVStack as VStack 
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

export default function Edit({ attributes, setAttributes }) {
  const {
    backgroundImageUrl,
    backgroundImageId,
    backgroundVideoUrl,
    backgroundVideoId,
    backgroundType,
    backgroundSize,
    backgroundPosition,
    backgroundRepeat,
    backgroundAttachment,
    videoLoop,
    videoMuted,
    videoAutoplay,
    customCSS,
    customClassName,
    minHeight,
    borderWidth,
    borderStyle,
    borderColor,
    borderRadius
  } = attributes;

  const blockProps = useBlockProps({
    className: `div-wrap-block ${customClassName}`,
    style: {
      minHeight: minHeight || undefined,
      backgroundImage: backgroundType === 'image' && backgroundImageUrl 
        ? `url(${backgroundImageUrl})` 
        : undefined,
      backgroundSize: backgroundType === 'image' ? backgroundSize : undefined,
      backgroundPosition: backgroundType === 'image' ? backgroundPosition : undefined,
      backgroundRepeat: backgroundType === 'image' ? backgroundRepeat : undefined,
      backgroundAttachment: backgroundType === 'image' ? backgroundAttachment : undefined,
      borderWidth: borderWidth || undefined,
      borderStyle: borderWidth ? borderStyle : undefined,
      borderColor: borderWidth && borderColor ? borderColor : undefined,
      borderRadius: borderRadius || undefined,
    }
  });

  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Background Settings', 'mbn-theme')} initialOpen={true}>
          <SelectControl
            label={__('Background Type', 'mbn-theme')}
            value={backgroundType}
            options={[
              { label: __('None', 'mbn-theme'), value: 'none' },
              { label: __('Image', 'mbn-theme'), value: 'image' },
              { label: __('Video', 'mbn-theme'), value: 'video' }
            ]}
            onChange={(value) => setAttributes({ backgroundType: value })}
          />

          {backgroundType === 'image' && (
            <VStack spacing={3}>
              <MediaUploadCheck>
                <MediaUpload
                  onSelect={(media) => setAttributes({
                    backgroundImageUrl: media.url,
                    backgroundImageId: media.id
                  })}
                  allowedTypes={['image']}
                  value={backgroundImageId}
                  render={({ open }) => (
                    <div>
                      <Button onClick={open} variant="primary">
                        {backgroundImageUrl 
                          ? __('Replace Image', 'mbn-theme') 
                          : __('Select Image', 'mbn-theme')
                        }
                      </Button>
                      {backgroundImageUrl && (
                        <>
                          <img 
                            src={backgroundImageUrl} 
                            alt="" 
                            style={{ marginTop: '10px', maxWidth: '100%', height: 'auto' }}
                          />
                          <Button 
                            onClick={() => setAttributes({ 
                              backgroundImageUrl: '', 
                              backgroundImageId: undefined 
                            })}
                            variant="link"
                            isDestructive
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
                label={__('Background Size', 'mbn-theme')}
                value={backgroundSize}
                options={[
                  { label: __('Cover', 'mbn-theme'), value: 'cover' },
                  { label: __('Contain', 'mbn-theme'), value: 'contain' },
                  { label: __('Auto', 'mbn-theme'), value: 'auto' }
                ]}
                onChange={(value) => setAttributes({ backgroundSize: value })}
              />

              <SelectControl
                label={__('Background Position', 'mbn-theme')}
                value={backgroundPosition}
                options={[
                  { label: __('Center Center', 'mbn-theme'), value: 'center center' },
                  { label: __('Top Center', 'mbn-theme'), value: 'top center' },
                  { label: __('Bottom Center', 'mbn-theme'), value: 'bottom center' },
                  { label: __('Left Center', 'mbn-theme'), value: 'left center' },
                  { label: __('Right Center', 'mbn-theme'), value: 'right center' }
                ]}
                onChange={(value) => setAttributes({ backgroundPosition: value })}
              />

              <SelectControl
                label={__('Background Repeat', 'mbn-theme')}
                value={backgroundRepeat}
                options={[
                  { label: __('No Repeat', 'mbn-theme'), value: 'no-repeat' },
                  { label: __('Repeat', 'mbn-theme'), value: 'repeat' },
                  { label: __('Repeat X', 'mbn-theme'), value: 'repeat-x' },
                  { label: __('Repeat Y', 'mbn-theme'), value: 'repeat-y' }
                ]}
                onChange={(value) => setAttributes({ backgroundRepeat: value })}
              />

              <SelectControl
                label={__('Background Attachment', 'mbn-theme')}
                value={backgroundAttachment}
                options={[
                  { label: __('Scroll', 'mbn-theme'), value: 'scroll' },
                  { label: __('Fixed', 'mbn-theme'), value: 'fixed' }
                ]}
                onChange={(value) => setAttributes({ backgroundAttachment: value })}
              />
            </VStack>
          )}

          {backgroundType === 'video' && (
            <VStack spacing={3}>
              <MediaUploadCheck>
                <MediaUpload
                  onSelect={(media) => setAttributes({
                    backgroundVideoUrl: media.url,
                    backgroundVideoId: media.id
                  })}
                  allowedTypes={['video']}
                  value={backgroundVideoId}
                  render={({ open }) => (
                    <div>
                      <Button onClick={open} variant="primary">
                        {backgroundVideoUrl 
                          ? __('Replace Video', 'mbn-theme') 
                          : __('Select Video', 'mbn-theme')
                        }
                      </Button>
                      {backgroundVideoUrl && (
                        <>
                          <video 
                            src={backgroundVideoUrl} 
                            style={{ marginTop: '10px', maxWidth: '100%', height: 'auto' }}
                            controls
                          />
                          <Button 
                            onClick={() => setAttributes({ 
                              backgroundVideoUrl: '', 
                              backgroundVideoId: undefined 
                            })}
                            variant="link"
                            isDestructive
                            style={{ marginTop: '10px' }}
                          >
                            {__('Remove Video', 'mbn-theme')}
                          </Button>
                        </>
                      )}
                    </div>
                  )}
                />
              </MediaUploadCheck>

              <ToggleControl
                label={__('Loop Video', 'mbn-theme')}
                checked={videoLoop}
                onChange={(value) => setAttributes({ videoLoop: value })}
              />

              <ToggleControl
                label={__('Mute Video', 'mbn-theme')}
                checked={videoMuted}
                onChange={(value) => setAttributes({ videoMuted: value })}
              />

              <ToggleControl
                label={__('Autoplay', 'mbn-theme')}
                checked={videoAutoplay}
                onChange={(value) => setAttributes({ videoAutoplay: value })}
              />
            </VStack>
          )}
        </PanelBody>

        <PanelBody title={__('Layout Settings', 'mbn-theme')} initialOpen={false}>
          <TextControl
            label={__('Min Height (e.g., 400px, 50vh)', 'mbn-theme')}
            value={minHeight}
            onChange={(value) => setAttributes({ minHeight: value })}
            help={__('Set minimum height for the container', 'mbn-theme')}
          />

          <TextControl
            label={__('Custom Class Name', 'mbn-theme')}
            value={customClassName}
            onChange={(value) => setAttributes({ customClassName: value })}
            help={__('Add custom CSS classes', 'mbn-theme')}
          />
        </PanelBody>

        <PanelBody title={__('Border Settings', 'mbn-theme')} initialOpen={false}>
          <VStack spacing={3}>
            <TextControl
              label={__('Border Width (e.g., 1px, 2px)', 'mbn-theme')}
              value={borderWidth}
              onChange={(value) => setAttributes({ borderWidth: value })}
              help={__('Set border width', 'mbn-theme')}
            />

            <SelectControl
              label={__('Border Style', 'mbn-theme')}
              value={borderStyle}
              options={[
                { label: __('Solid', 'mbn-theme'), value: 'solid' },
                { label: __('Dashed', 'mbn-theme'), value: 'dashed' },
                { label: __('Dotted', 'mbn-theme'), value: 'dotted' },
                { label: __('Double', 'mbn-theme'), value: 'double' },
                { label: __('Groove', 'mbn-theme'), value: 'groove' },
                { label: __('Ridge', 'mbn-theme'), value: 'ridge' },
                { label: __('Inset', 'mbn-theme'), value: 'inset' },
                { label: __('Outset', 'mbn-theme'), value: 'outset' }
              ]}
              onChange={(value) => setAttributes({ borderStyle: value })}
            />

            <TextControl
              label={__('Border Color (e.g., #000000, red)', 'mbn-theme')}
              value={borderColor}
              onChange={(value) => setAttributes({ borderColor: value })}
              help={__('Set border color', 'mbn-theme')}
            />

            <TextControl
              label={__('Border Radius (e.g., 10px, 50%)', 'mbn-theme')}
              value={borderRadius}
              onChange={(value) => setAttributes({ borderRadius: value })}
              help={__('Set border radius for rounded corners', 'mbn-theme')}
            />
          </VStack>
        </PanelBody>

        <PanelBody title={__('Custom CSS', 'mbn-theme')} initialOpen={false}>
          <TextareaControl
            label={__('Custom CSS', 'mbn-theme')}
            value={customCSS}
            onChange={(value) => setAttributes({ customCSS: value })}
            help={__('Add custom CSS for this block (will be scoped to this block)', 'mbn-theme')}
            rows={10}
          />
        </PanelBody>
      </InspectorControls>

      <div {...blockProps}>
        {backgroundType === 'video' && backgroundVideoUrl && (
          <div className="div-wrap-video-background">
            <video
              autoPlay={videoAutoplay}
              loop={videoLoop}
              muted={videoMuted}
              playsInline
              className="div-wrap-video"
            >
              <source src={backgroundVideoUrl} type="video/mp4" />
            </video>
          </div>
        )}
        <div className="div-wrap-content">
          <InnerBlocks />
        </div>
      </div>

      {customCSS && (
        <style>{customCSS}</style>
      )}
    </>
  );
}
