import { useBlockProps, RichText } from '@wordpress/block-editor';
import { RawHTML } from '@wordpress/element';

export default function save({ attributes }) {
  const {
    iconType,
    iconImageUrl,
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

  // Don't render if no content at all
  if (!iconImageUrl && !iconSvgCode && !title && !description) {
    return null;
  }

  const blockProps = useBlockProps.save({
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

  return (
    <div {...blockProps}>
      <div className={`icon-box-inner flex gap-4 ${getAlignmentClass()}`}>
        {/* Icon Display - Auto-hide if empty */}
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
               >
                <RawHTML>{iconSvgCode}</RawHTML> {/* ← The fix */}
              </div>
            )}
          </div>
        )}

        {/* Content - Auto-hide if both title and description are empty */}
        {(title || description) && (
          <div className="icon-box-content" style={{ flex: 1 }}>
            {title && (
              <RichText.Content
                tagName={titleTag}
                value={title}
                className={`icon-box-title${titleClass ? ' ' + titleClass : ''}`}
                style={{
                  color: titleColor || undefined,
                  fontSize: titleFontSize ? `${titleFontSize}px` : undefined
                }}
              />
            )}

            {description && (
              <RichText.Content
                tagName="div"
                value={description}
                className="icon-box-description"
                style={{
                  color: descriptionColor || undefined,
                  fontSize: descriptionFontSize ? `${descriptionFontSize}px` : undefined
                }}
              />
            )}
          </div>
        )}
      </div>
    </div>
  );
}
