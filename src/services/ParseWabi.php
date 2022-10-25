<?php

namespace wabisoft\components\services;
use wabisoft\framework\services\TemplateLoader;
use craft\helpers\ArrayHelper;

class ParseWabi
{
    public static function load(array $variables = []): string {
        $type = self::getType();
        if($type == 'component') {
            $path = ArrayHelper::getValue($variables, 'component') ?: '';
            $templates = ComponentTemplate::getPathHierarchy($path);
            return TemplateLoader::load($templates, $variables);
        }
        return false;
    }

    private static function getType() {
        return 'component';
    }
}
