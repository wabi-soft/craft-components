<?php

namespace wabisoft\components\assetbundles;

use craft\web\AssetBundle;
use wabisoft\components\Plugin;

class Notice extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@wabisoft/components/web/assets/dist";
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
