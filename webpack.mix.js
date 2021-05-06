/**
 * Laravel Mix configuration file
 */

const mix = require('laravel-mix');

// transform `src/js/theme.js` to vanilla-js and output it to `js/theme.js`
mix.js('src/js/theme.js', 'js/');

// transform `src/sass/theme.scss` to css and output it to `css/theme.css`
mix.sass('src/sass/theme.scss', 'css/');
