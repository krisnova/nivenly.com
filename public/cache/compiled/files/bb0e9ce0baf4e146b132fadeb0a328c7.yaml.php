<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/user/plugins/color-tools/blueprints.yaml',
    'modified' => 1663773946,
    'size' => 771,
    'data' => [
        'name' => 'Color Tools',
        'slug' => 'color-tools',
        'type' => 'plugin',
        'version' => '1.1.1',
        'description' => 'Color Tools for PHP and Twig',
        'icon' => 'paint-brush',
        'author' => [
            'name' => 'Trilby Media, LLC',
            'email' => 'hello@trilby.media'
        ],
        'homepage' => 'https://github.com/trilbymedia/grav-plugin-color-tools',
        'keywords' => 'grav, plugin, colors, utility',
        'bugs' => 'https://github.com/trilbymedia/grav-plugin-color-tools/issues',
        'docs' => 'https://github.com/trilbymedia/grav-plugin-color-tools/blob/develop/README.md',
        'license' => 'MIT',
        'dependencies' => [
            0 => [
                'name' => 'grav',
                'version' => '>=1.6.28'
            ]
        ],
        'form' => [
            'validation' => 'loose',
            'fields' => [
                'enabled' => [
                    'type' => 'toggle',
                    'label' => 'PLUGIN_ADMIN.PLUGIN_STATUS',
                    'highlight' => 1,
                    'default' => 0,
                    'options' => [
                        1 => 'PLUGIN_ADMIN.ENABLED',
                        0 => 'PLUGIN_ADMIN.DISABLED'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ]
            ]
        ]
    ]
];
