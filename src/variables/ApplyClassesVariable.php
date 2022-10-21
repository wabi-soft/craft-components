<?php

namespace wabisoft\components\variables;

use wabisoft\components\services\ApplyClasses;

class ApplyClassesVariable
{
    public static function components($name, $options): string
    {
        return ApplyClasses::components($name, $options);
    }
}
