<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/user/plugins/flex-objects/blueprints/flex-objects/pages.yaml',
    'modified' => 1662660087,
    'size' => 523,
    'data' => [
        'title' => 'Pages (Admin)',
        'description' => 'Manage your Grav Pages in the new Flex Pages admin. This allows you to use Flex Pages only in Admin plugin, while still using the old pages in the frontend.',
        'type' => 'flex-objects',
        'extends@' => [
            'type' => 'pages',
            'context' => 'blueprints://flex'
        ],
        'form' => [
            'fields' => [
                'lang' => [
                    'type' => 'hidden',
                    'value' => ''
                ],
                'tabs' => [
                    'fields' => [
                        'security' => [
                            'type' => 'tab',
                            'title' => 'PLUGIN_ADMIN.SECURITY',
                            'import@' => [
                                'type' => 'partials/security',
                                'context' => 'blueprints://pages'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
