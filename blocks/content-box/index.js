import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import './style.css';

// v1: save() before CSS sanitization was added.
const deprecated = [
  {
    attributes: metadata.attributes,
    save( { attributes } ) {
      const {
        boxWidth, borderWidth, borderStyle, borderColor, borderRadius,
        backgroundColor, boxPadding, boxMargin, iconImageUrl, iconPosition,
        iconSize, title, titleTag, titleClass, titleColor, titleFontSize, customCSS,
      } = attributes;

      if ( ! iconImageUrl && ! title ) {
        return (
          <>
            { customCSS && <style>{ customCSS }</style> }
            <div { ...useBlockProps.save( {
              className: 'content-box',
              style: {
                width: boxWidth || undefined,
                backgroundColor: backgroundColor || undefined,
                border: borderWidth > 0 ? `${ borderWidth }px ${ borderStyle } ${ borderColor || '#000' }` : undefined,
                borderRadius: borderRadius ? `${ borderRadius }px` : undefined,
                padding: boxPadding || undefined,
                margin: boxMargin || undefined,
              },
            } ) }>
              <div className="content-box-inner">
                <div className="content-box-content"><InnerBlocks.Content /></div>
              </div>
            </div>
          </>
        );
      }

      const blockProps = useBlockProps.save( { className: `content-box icon-position-${ iconPosition }` } );
      const getAlignmentClass = () => {
        switch ( iconPosition ) {
          case 'left': return 'flex-row items-start';
          case 'right': return 'flex-row-reverse items-start';
          default: return 'flex-col items-center';
        }
      };

      return (
        <>
          { customCSS && <style>{ customCSS }</style> }
          <div { ...blockProps } style={ {
            width: boxWidth || undefined,
            backgroundColor: backgroundColor || undefined,
            border: borderWidth > 0 ? `${ borderWidth }px ${ borderStyle } ${ borderColor || '#000' }` : undefined,
            borderRadius: borderRadius ? `${ borderRadius }px` : undefined,
            padding: boxPadding || undefined,
            margin: boxMargin || undefined,
          } }>
            <div className={ `content-box-inner flex gap-4 ${ getAlignmentClass() }` }>
              { iconImageUrl && (
                <div className="content-box-icon" style={ { flexShrink: 0 } }>
                  <img src={ iconImageUrl } alt="" style={ { width: `${ iconSize }px`, height: `${ iconSize }px`, objectFit: 'contain' } } />
                </div>
              ) }
              <div className="content-box-content" style={ { flex: 1, width: '100%' } }>
                { title && (
                  <RichText.Content
                    tagName={ titleTag }
                    value={ title }
                    className={ `content-box-title${ titleClass ? ' ' + titleClass : '' }` }
                    style={ { color: titleColor || undefined, fontSize: titleFontSize ? `${ titleFontSize }px` : undefined } }
                  />
                ) }
                <div className="content-box-blocks"><InnerBlocks.Content /></div>
              </div>
            </div>
          </div>
        </>
      );
    },
  },
];

registerBlockType( metadata.name, {
  edit: Edit,
  save,
  deprecated,
} );
