<?php

namespace wabisoft\components\variables;

use wabisoft\components\services\UnsecureCookie;

class CookiesVariable
{
    public function get($name, $default = false) {
       return UnsecureCookie::get($name, $default);
    }

    public function getBool($name, $default = false) {
        return boolval(self::get($name, $default));
    }
}
