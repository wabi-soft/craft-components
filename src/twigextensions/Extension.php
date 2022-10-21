<?php

namespace wabisoft\components\twigextensions;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use wabisoft\components\services\ComponentTemplate;

class Extension extends AbstractExtension {
    public function getFunctions(): array
    {
        return [
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
