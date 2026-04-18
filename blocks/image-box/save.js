import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
  const {
    imageUrl,
    imagePosition,
    imageWidth,
    title,
    titleTag,
    content,
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

  const imageStyles = imagePosition !== 'background' ? {
    width: imageWidth,
    flexShrink: 0
  } : {};

  return (
    <div {...blockProps} style={containerStyle}>
      <div className="image-box-inner">
        {imagePosition !== 'background' && imageUrl && (
          <div className="image-box-image" style={imageStyles}>
            <img src={imageUrl} alt="" />
          </div>
        )}
        
        <div className="image-box-content">
          {title && (
            <RichText.Content
              tagName={titleTag}
              value={title}
              className="image-box-title"
            />
          )}

          {content && (
            <RichText.Content
              tagName="div"
              value={content}
              className="image-box-text"
            />
          )}

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
  );
}
