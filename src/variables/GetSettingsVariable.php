<?php

namespace wabisoft\components\variables;

use wabisoft\components\Plugin;

class GetSettingsVariable
{
    public static function components() {
        return Plugin::getInstance()->getSettings()->componentsOptions;
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
