let mix = require('laravel-mix');
const webpack = require('webpack');
const dist = './../src/web/assets/dist'
const src = './../build/src/'

const CSS = [
  'shared.css',
  'notice.css',
  'carousel.css'
];
const JS = [
  'swiper.js',
  'notice.js',
  'alpine.js',
  'cookie.js'
];

mix.webpackConfig({
  plugins: [
    new webpack.optimize.LimitChunkCountPlugin({
      maxChunks: 1,
    }),
  ]
})

mix.options({
  processCssUrls: false,
  postCss: [
    require('postcss-custom-properties')
  ]
})

mix.setPublicPath(dist);

// Javascript
JS.forEach(file =>{
  mix.js(src + 'js/' + file, 'js');
})

CSS.forEach(file =>{
  mix.styles(['./../build/src/css/'+ file], dist + '/css/' + file);
})
