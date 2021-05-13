/**
 * Laravel Mix configuration file
 */

let mix = require('laravel-mix');

// transform `src/js/theme.js` to vanilla-js and output it to `js/theme.js`
mix.js(['src/js/theme.js', 'src/js/nav.js', 'src/js/servings.js'], 'js/theme.js');

// transform `src/sass/theme.scss` to css and output it to `css/theme.css`
mix.sass('src/sass/theme.scss', 'css/');
