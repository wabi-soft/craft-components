<?php

namespace wabisoft\components\assetbundles\notice;

use wabisoft\components\Plugin;
use Craft;
use craft\web\AssetBundle;
use craft\web\assets;


class WabiNoticeAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@wabisoft/components/assetbundles/notice/dist";
        $include = Plugin::getInstance()->getSettings()->includeJs;
        $scripts = [];
        $scripts[] = 'js/notice.js';
        if($include['docCookie']) {
            $scripts[] = 'js/cookie.js';
        }
        if($include['alpine']) {
            $scripts[] = 'js/alpine.js';
        }

        $this->js = $scripts;
        $this->css = [
            'css/notice.css',
        ];
        parent::init();
    }
}
