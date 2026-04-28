import { useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';
import { sanitizeCSS } from './utils';

export default function save({ attributes }) {
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
    iconPosition,
    iconSize,
    title,
    titleTag,
    titleClass,
    titleColor,
    titleFontSize,
    customCSS
  } = attributes;

  const safeCss = sanitizeCSS( customCSS );

  // Don't render if no content at all
  if (!iconImageUrl && !title) {
    return (
      <>
        {safeCss && (
          <style>{safeCss}</style>
        )}
        <div {...useBlockProps.save({ 
          className: 'content-box',
          style: {
            width: boxWidth || undefined,
            backgroundColor: backgroundColor || undefined,
            border: borderWidth > 0 ? `${borderWidth}px ${borderStyle} ${borderColor || '#000'}` : undefined,
            borderRadius: borderRadius ? `${borderRadius}px` : undefined,
            padding: boxPadding || undefined,
            margin: boxMargin || undefined
          }
        })}>
          <div className="content-box-inner">
            <div className="content-box-content">
              <InnerBlocks.Content />
            </div>
          </div>
        </div>
      </>
    );
  }

  const blockProps = useBlockProps.save({
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
      {safeCss && (
        <style>{safeCss}</style>
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
          {/* Icon Display - Auto-hide if empty */}
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
            {title && (
              <RichText.Content
                tagName={titleTag}
                value={title}
                className={`content-box-title${titleClass ? ' ' + titleClass : ''}`}
                style={{
                  color: titleColor || undefined,
                  fontSize: titleFontSize ? `${titleFontSize}px` : undefined
                }}
              />
            )}

            {/* Inner Blocks Content */}
            <div className="content-box-blocks">
              <InnerBlocks.Content />
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
