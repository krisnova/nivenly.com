<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => 'plugins://login/login.yaml',
    'modified' => 1662660087,
    'size' => 4297,
    'data' => [
        'enabled' => true,
        'built_in_css' => true,
        'redirect_to_login' => false,
        'redirect_after_login' => false,
        'redirect_after_logout' => true,
        'session_user_sync' => false,
        'route' => '/login',
        'route_after_login' => '/',
        'route_after_logout' => '/',
        'route_activate' => '/activate_user',
        'route_forgot' => '/forgot_password',
        'route_reset' => '/reset_password',
        'route_profile' => '/user_profile',
        'route_register' => '/user_register',
        'route_unauthorized' => '/user_unauthorized',
        'twofa_enabled' => false,
        'dynamic_page_visibility' => false,
        'parent_acl' => false,
        'protect_protected_page_media' => false,
        'rememberme' => [
            'enabled' => true,
            'timeout' => 604800,
            'name' => 'grav-rememberme'
        ],
        'max_pw_resets_count' => 2,
        'max_pw_resets_interval' => 60,
        'max_login_count' => 5,
        'max_login_interval' => 10,
        'ipv6_subnet_size' => 64,
        'user_registration' => [
            'enabled' => false,
            'fields' => [
                0 => 'username',
                1 => 'password',
                2 => 'email',
                3 => 'fullname',
                4 => 'title',
                5 => 'level',
                6 => 'twofa_enabled'
            ],
            'default_values' => [
                'level' => 'Newbie'
            ],
            'access' => [
                'site' => [
                    'login' => true
                ]
            ],
            'redirect_after_registration' => '',
            'redirect_after_activation' => '',
            'options' => [
                'validate_password1_and_password2' => true,
                'set_user_disabled' => false,
                'login_after_registration' => false,
                'send_activation_email' => false,
                'manually_enable' => false,
                'send_notification_email' => false,
                'send_welcome_email' => false
            ]
        ]
    ]
];
