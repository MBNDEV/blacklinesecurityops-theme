import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
  const {
    backgroundImageUrl,
    backgroundVideoUrl,
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

  const blockProps = useBlockProps.save({
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
          <InnerBlocks.Content />
        </div>
      </div>

      {customCSS && (
        <style>{customCSS}</style>
      )}
    </>
  );
}
