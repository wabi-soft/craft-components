<?php

namespace wabisoft\components\variables;

use craft\helpers\ArrayHelper;
use wabisoft\components\Plugin;

class GetSettingsVariable
{
    public static function components() {
        Craft::$app->deprecator->log('Use componentByName instead');
        return Plugin::getInstance()->getSettings()->componentsOptions;
    }

    public static function componentByName($name) {
        $overrides = Plugin::getInstance()->getSettings()->componentsOptions;
        $overrides = array_key_exists($name, $overrides) ? $overrides[$name] : false;
        if(!Plugin::getInstance()->getSettings()->includeDefaultClasses) {
            return $overrides;
        }
        $defaults = Plugin::getInstance()->getSettings()->defaultComponentsOptions[$name];
        if(!$overrides) {
            return $defaults;
        }
        return ArrayHelper::merge($defaults, $overrides);
    }

    public static function paths() {
        return Plugin::getInstance()->getSettings()->componentsPaths;
    }
    public static function overridePath() {
        return Plugin::getInstance()->getSettings()->overridePath ? Plugin::getInstance()->getSettings()->overridePath : false;
    }
    public static function longDateFormat() {
        return Plugin::getInstance()->getSettings()->dateLongFormat;
    }
    public static function shortDateFormat() {
        return Plugin::getInstance()->getSettings()->dateShortFormat;
    }
    public static function blitzCaching() {
        return Plugin::getInstance()->getSettings()->blitzCaching;
    }

}
