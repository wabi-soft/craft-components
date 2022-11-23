<?php

namespace wabisoft\components\models;


use craft\base\Model;

class Settings extends Model
{
    public string $defaultComponentsPath = '_wabi-components/';
    public string | bool $overrideComponentsPath = false;
    public bool $includeLayoutClasses = true;
    public string $dateLongFormat = "M d, Y";
    public string $dateShortFormat = "d, Y";
    public array | bool $includeJs = [
        'alpine' => false,
        'docCookie' => true,
    ];

    public array $componentsPaths = [
      'post-meta' => '_post-meta'
    ];


    public array $componentsOptions = [
        /*
         * Post meta defaults
         */
        'post-meta' => [
            'date' => true,
            'profile' => true,
            'tags' => true,
            'classes' => [
                'container' => 'text-sm text-wabi-900',
                'date' => 'text-wabi-400',
                'profile-container' => '',
                'profile-image' => 'w-12 h-12 rounded-full',
                'profile-name' => 'font-bold',
                'tags-container' => '',
                'tags-label' => 'text-wabi-900',
                'tags-tag' => '',
            ],
            'classesLayout' => [
                'container' => 'flex gap-6 items-center',
                'date' => '',
                'profile-container' => 'flex gap-2 items-center',
                'profile-image' => '',
                'profile-name' => '',
                'tags-container' => 'flex gap-3 items-center',
                'tags-label' => '',
                'tags-tag' => '',
            ]
        ],
        'notice' => [
            'button' => [
              'label' => 'X',
            ],
            'classes' => [
                'container' => 'text-white bg-gray-500',
                'inner' => '',
                'button' => ''
            ],
            'classesLayout' => [
                'container' => 'w-full bg-gray-500',
                'inner' => 'p-6 flex items-center w-full',
                'button' => 'ml-auto'
            ]
        ]
    ];
}
