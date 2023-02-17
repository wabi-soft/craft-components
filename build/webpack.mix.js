const mix = require('laravel-mix');
const webpack = require('webpack');
const dist = '../src/web/assets/dist'
const src = './../src/web/assets/dev/'

mix.webpackConfig({
  plugins: [
    new webpack.optimize.LimitChunkCountPlugin({
      maxChunks: 1,
    }),
  ]
})

// Javascript
mix.js(src + 'js/swiper.js', 'js').setPublicPath(dist);
mix.js(src + 'js/notice.js', 'js').setPublicPath(dist);

// CSS
mix.postCss(src + 'css/shared.css', 'css').setPublicPath(dist);
// mix.postCss(src + 'css/notice.css', 'css').setPublicPath(dist);
// mix.postCss(src + 'css/carousel.css', 'css').setPublicPath(dist);
