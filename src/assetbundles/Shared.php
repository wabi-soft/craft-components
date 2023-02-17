<?php

namespace wabisoft\components\assetbundles;

use craft\web\AssetBundle;

class Shared extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@wabisoft/components/web/assets/dist";
        $this->css = [
            'css/shared.css',
        ];
        parent::init();
    }
}
