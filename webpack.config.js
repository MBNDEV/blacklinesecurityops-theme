const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );
const glob = require( 'glob' );
const CopyPlugin = require( 'copy-webpack-plugin' );

// Auto-discover block entry points.
// Set BLOCK env var to filter: e.g. BLOCK=header-navigation
const blockFilter = process.env.BLOCK || '';
const blockEntries = {};

// Top-level blocks
const blockFiles = glob.sync( './blocks/*/index.{js,jsx,ts,tsx}' );
// Nested blocks (e.g., slider-item inside mbn-slider)
const nestedBlockFiles = glob.sync( './blocks/*/*/index.{js,jsx,ts,tsx}' );
const allBlockFiles = [ ...blockFiles, ...nestedBlockFiles ];

allBlockFiles.forEach( ( file ) => {
  // Normalize path separators for Windows compatibility
  const normalizedFile = file.replace( /\\/g, '/' );
  
  // Match both top-level and nested blocks
  let match = normalizedFile.match( /blocks\/([^/]+)\/index\./ );
  let blockPath = null;
  
  if ( match ) {
    // Top-level block
    blockPath = match[ 1 ];
  } else {
    // Nested block (e.g., mbn-slider/slider-item)
    match = normalizedFile.match( /blocks\/([^/]+)\/([^/]+)\/index\./ );
    if ( match ) {
      blockPath = `${ match[ 1 ] }/${ match[ 2 ] }`;
    }
  }
  
  if ( blockPath && ( ! blockFilter || blockPath.includes( blockFilter ) ) ) {
    blockEntries[ `blocks/${ blockPath }/index` ] = path.resolve( file );
  }
} );

// Copy block.json, style.css, render.php, and view.js into build/blocks/{name}/.
const copyPatterns = [];
const blockDirs = glob.sync( './blocks/*/' );
// Also include nested blocks
const nestedBlockDirs = glob.sync( './blocks/*/*/' );
const allBlockDirs = [ ...blockDirs, ...nestedBlockDirs ];

allBlockDirs.forEach( ( dir ) => {
  // Normalize path separators for Windows compatibility
  const normalizedDir = dir.replace( /\\/g, '/' );
  
  // Match both top-level and nested blocks
  let match = normalizedDir.match( /blocks\/([^/]+)\/?$/ );
  let blockPath = null;
  
  if ( match ) {
    // Top-level block
    blockPath = match[ 1 ];
  } else {
    // Nested block (e.g., mbn-slider/slider-item)
    match = normalizedDir.match( /blocks\/([^/]+)\/([^/]+)\/?$/ );
    if ( match ) {
      blockPath = `${ match[ 1 ] }/${ match[ 2 ] }`;
    }
  }
  
  if ( ! blockPath ) {
    return;
  }
  if ( blockFilter && ! blockPath.includes( blockFilter ) ) {
    return;
  }
  
  copyPatterns.push(
    {
      from: path.resolve( dir, 'block.json' ),
      to: path.resolve( __dirname, `build/blocks/${ blockPath }/block.json` ),
    },
    {
      from: path.resolve( dir, 'style.css' ),
      to: path.resolve( __dirname, `build/blocks/${ blockPath }/style.css` ),
      noErrorOnMissing: true,
    },
    {
      from: path.resolve( dir, 'render.php' ),
      to: path.resolve( __dirname, `build/blocks/${ blockPath }/render.php` ),
      noErrorOnMissing: true,
    },
    {
      from: path.resolve( dir, 'view.js' ),
      to: path.resolve( __dirname, `build/blocks/${ blockPath }/view.js` ),
      noErrorOnMissing: true,
    }
  );
} );

// Debug: Log copy patterns
if ( copyPatterns.length > 0 ) {
  console.log( `📋 Copying ${ copyPatterns.length } files for ${ allBlockDirs.length } blocks...` );
}

module.exports = {
  ...defaultConfig,
  entry: blockEntries,
  output: {
    ...defaultConfig.output,
    filename: '[name].js',
    path: path.resolve( __dirname, 'build' ),
    clean: ! blockFilter,
  },
  plugins: [
    ...( defaultConfig.plugins || [] ),
    ...( copyPatterns.length ? [ new CopyPlugin( { patterns: copyPatterns } ) ] : [] ),
  ],
};
