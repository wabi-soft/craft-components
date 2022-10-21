<?php
namespace wabisoft\components\services;

use craft\helpers\StringHelper;
use wabisoft\components\Plugin;

class ApplyClasses
{
    public static function components($name, $options): string
    {
        $applyLayoutClasses = Plugin::getInstance()->getSettings()->includeLayoutClasses;
        $classes = '';
        if($applyLayoutClasses) {
           $classes = $options['classesLayout'][$name] ?? '';
        }
        $classes = $classes . ' ' . ($options['classes'][$name] ?? '');
        return StringHelper::trim($classes);
    }
}
