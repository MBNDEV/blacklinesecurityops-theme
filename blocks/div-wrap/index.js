import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import './style.css';

const deprecated = [
  {
    // v1: before divId attribute and className fix
    attributes: {
      backgroundImageUrl: { type: 'string', default: '' },
      backgroundImageId: { type: 'number' },
      backgroundVideoUrl: { type: 'string', default: '' },
      backgroundVideoId: { type: 'number' },
      backgroundType: { type: 'string', default: 'none', enum: ['none', 'image', 'video'] },
      backgroundSize: { type: 'string', default: 'cover' },
      backgroundPosition: { type: 'string', default: 'center center' },
      backgroundRepeat: { type: 'string', default: 'no-repeat' },
      backgroundAttachment: { type: 'string', default: 'scroll' },
      videoLoop: { type: 'boolean', default: true },
      videoMuted: { type: 'boolean', default: true },
      videoAutoplay: { type: 'boolean', default: true },
      customCSS: { type: 'string', default: '' },
      customClassName: { type: 'string', default: '' },
      minHeight: { type: 'string', default: '' },
      borderWidth: { type: 'string', default: '' },
      borderStyle: { type: 'string', default: 'solid' },
      borderColor: { type: 'string', default: '' },
      borderRadius: { type: 'string', default: '' },
    },
    save( { attributes } ) {
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
        borderRadius,
      } = attributes;

      const blockProps = useBlockProps.save( {
        className: `div-wrap-block ${ customClassName }`,
        style: {
          minHeight: minHeight || undefined,
          backgroundImage:
            backgroundType === 'image' && backgroundImageUrl
              ? `url(${ backgroundImageUrl })`
              : undefined,
          backgroundSize: backgroundType === 'image' ? backgroundSize : undefined,
          backgroundPosition: backgroundType === 'image' ? backgroundPosition : undefined,
          backgroundRepeat: backgroundType === 'image' ? backgroundRepeat : undefined,
          backgroundAttachment: backgroundType === 'image' ? backgroundAttachment : undefined,
          borderWidth: borderWidth || undefined,
          borderStyle: borderWidth ? borderStyle : undefined,
          borderColor: borderWidth && borderColor ? borderColor : undefined,
          borderRadius: borderRadius || undefined,
        },
      } );

      return (
        <>
          <div { ...blockProps }>
            { backgroundType === 'video' && backgroundVideoUrl && (
              <div className="div-wrap-video-background">
                <video
                  autoPlay={ videoAutoplay }
                  loop={ videoLoop }
                  muted={ videoMuted }
                  playsInline
                  className="div-wrap-video"
                >
                  <source src={ backgroundVideoUrl } type="video/mp4" />
                </video>
              </div>
            ) }
            <div className="div-wrap-content">
              <InnerBlocks.Content />
            </div>
          </div>
          { customCSS && <style>{ customCSS }</style> }
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
