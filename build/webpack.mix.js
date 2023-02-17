const mix = require('laravel-mix');
const webpack = require('webpack');
const dist = '../src/web/assets/dist'
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

// CSS
// CSS.forEach(css =>{
//   console.log(css);
//   mix.css(src + 'css/' + css, 'css').setPublicPath(dist);
// })
const cssPath = src + 'css/'

// mix.postCss(cssPath + 'shared.css', 'css').setPublicPath(dist)
//     .postCss(cssPath + 'carousel.css', 'css').setPublicPath(dist)
// //     .postCss(cssPath + 'notice.css', 'css').setPublicPath(dist);
// CSS.forEach((file) => {
//   mix.postCss('src/css/' + file, 'cssddd', [
//     require('tailwindcss')(),
//   ])
// })

mix.css(src + '/css/notice.css', 'css')
