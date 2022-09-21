<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/user/plugins/shortcode-core/shortcode-core.yaml',
    'modified' => 1663773948,
    'size' => 355,
    'data' => [
        'enabled' => true,
        'active' => true,
        'active_admin' => true,
        'admin_pages_only' => true,
        'parser' => 'regular',
        'include_default_shortcodes' => true,
        'css' => [
            'notice_enabled' => true
        ],
        'custom_shortcodes' => NULL,
        'fontawesome' => [
            'load' => true,
            'url' => '//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css',
            'v5' => false
        ],
        'nextgen-editor' => [
            'env' => 'production',
            'dev_host' => 'localhost',
            'dev_port' => 2001
        ]
    ]
];
