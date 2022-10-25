<?php

namespace wabisoft\components\services;

use wabisoft\components\Plugin;
use wabisoft\framework\services\TemplateLoader;
use craft\helpers\ArrayHelper;
use craft\helpers\StringHelper;

class ComponentTemplate
{
    public static function load(array $variables = []): string {
        $templates = self::getPathHierarchy(ArrayHelper::getValue($variables, 'path') ?: '');
        return TemplateLoader::load($templates, $variables);
    }

    public static function getPathHierarchy($base) {
        $overridePath = StringHelper::trim(Plugin::getInstance()->getSettings()->overrideComponentsPath, '/');
        if ($overridePath)  $templates[] = $overridePath . '/' . $base;
        $templates[] = Plugin::getInstance()->getSettings()->defaultComponentsPath . $base;
        return $templates;
    }
}
