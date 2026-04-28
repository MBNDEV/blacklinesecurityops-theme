import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
  const {
    imageUrl,
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

  const blockProps = useBlockProps.save({
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
          {title && (
            <RichText.Content
              tagName={titleTag}
              value={title}
              className={['image-box-title', titleClass].filter(Boolean).join(' ')}
              style={{
                color: titleColor || undefined,
                fontSize: titleFontSize ? `${titleFontSize}px` : undefined
              }}
            />
          )}

          {content && (
            <RichText.Content
              tagName="div"
              value={content}
              className="image-box-text"
              style={{
                color: contentColor || undefined,
                fontSize: contentFontSize ? `${contentFontSize}px` : undefined
              }}
            />
          )}

          {showList && listContent && (
            <RichText.Content
              tagName={listType}
              value={listContent}
              className="image-box-list"
              style={{
                color: listColor || undefined,
                fontSize: listFontSize ? `${listFontSize}px` : undefined
              }}
            />
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
  );
}
