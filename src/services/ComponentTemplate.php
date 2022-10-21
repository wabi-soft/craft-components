<?php

namespace wabisoft\components\services;

use wabisoft\components\Plugin;
use wabisoft\framework\services\TemplateLoader;
use craft\helpers\ArrayHelper;
use craft\helpers\StringHelper;

class ComponentTemplate
{
    public static function load(array $variables = []): string {
        $wabiPath = Plugin::getInstance()->getSettings()->defaultComponentsPath;
        $overridePath = Plugin::getInstance()->getSettings()->overrideComponentsPath;
        $path = ArrayHelper::getValue($variables, 'path') ?: '';
        if($overridePath) {
            $overridePath = StringHelper::trim($overridePath, '/');
            $templates[] = $overridePath . '/' . $path;
        }
        $templates[] = $wabiPath . $path;
        return TemplateLoader::load($templates, $variables);
    }
}
