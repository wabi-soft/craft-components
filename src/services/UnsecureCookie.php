<?php

namespace wabisoft\components\services;

class UnsecureCookie
{
    public static function get($name, $default = false) {
        if(!isset($_COOKIE[$name])) {
            return $default;
        } else {
            return $_COOKIE[$name];
        }
    }
}
