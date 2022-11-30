<?php
namespace wabisoft\components\services;

use craft\helpers\StringHelper;
use wabisoft\components\Plugin;
use Craft;

class ApplyClasses
{
    public static function components($name, $options): string
    {
        $applyLayoutClasses = Plugin::getInstance()->getSettings()->includeLayoutClasses;
        $classes = '';
        if($applyLayoutClasses && array_key_exists($name, $options['classesLayout'])) {
            $classes = $options['classesLayout'][$name] ?? '';
        }
        if(array_key_exists('classes', $options )) {
            if(array_key_exists($name, $options['classes'])) {
                $classes = $classes . ' ' . ($options['classes'][$name] ?? '');
            }
        }
        return StringHelper::trim($classes);
    }
}
