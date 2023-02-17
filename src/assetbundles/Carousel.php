<?php

namespace wabisoft\components\assetbundles;

use craft\web\AssetBundle;

class Carousel extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@wabisoft/components/web/assets/dist";
        $scripts = [];
        $scripts[] = 'js/swiper.js';
        $this->js = $scripts;
        $this->css = [
            'css/carousel.css',
        ];
        parent::init();
    }
}
