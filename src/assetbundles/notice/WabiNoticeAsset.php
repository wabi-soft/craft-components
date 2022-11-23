<?php

namespace wabisoft\components\assetbundles\notice;


use Craft;
use craft\web\AssetBundle;
use craft\web\assets;

class WabiNoticeAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@wabisoft/components/assetbundles/notice/dist";
        $this->js = [
            'js/notice.js',
        ];
        $this->css = [
            'css/notice.css',
        ];
        parent::init();
    }
}
