<?php

namespace wabisoft\components\twigextensions;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use wabisoft\components\services\ComponentTemplate;
use wabisoft\components\services\ParseWabi;

class Extension extends AbstractExtension {
    public function getFunctions(): array
    {
        return [

            new TwigFunction('wabi',[ParseWabi::class, 'load'],
                ['is_safe' => ['html',]]),
            new TwigFunction(
                'wabiComponents',
                [
                    ComponentTemplate::class,
                    'load'
                ],
                [
                    'is_safe' => [
                        'html',
                    ]
                ]
            ),

        ];
    }
}
