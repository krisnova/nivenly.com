<?php
return [
    '@class' => 'Grav\\Common\\Config\\CompiledConfig',
    'timestamp' => 1663774176,
    'checksum' => '7eab663956fda3a05e51159e01749e2c',
    'files' => [
        'user/config' => [
            'media' => [
                'file' => 'user/config/media.yaml',
                'modified' => 1663774175
            ],
            'security' => [
                'file' => 'user/config/security.yaml',
                'modified' => 1663771441
            ],
            'site' => [
                'file' => 'user/config/site.yaml',
                'modified' => 1662660087
            ],
            'system' => [
                'file' => 'user/config/system.yaml',
                'modified' => 1662660087
            ],
            'versions' => [
                'file' => 'user/config/versions.yaml',
                'modified' => 1663771441
            ]
        ],
        'system/config' => [
            'backups' => [
                'file' => 'system/config/backups.yaml',
                'modified' => 1662660087
            ],
            'media' => [
                'file' => 'system/config/media.yaml',
                'modified' => 1662660087
            ],
            'mime' => [
                'file' => 'system/config/mime.yaml',
                'modified' => 1662660087
            ],
            'permissions' => [
                'file' => 'system/config/permissions.yaml',
                'modified' => 1662660087
            ],
            'security' => [
                'file' => 'system/config/security.yaml',
                'modified' => 1662660087
            ],
            'site' => [
                'file' => 'system/config/site.yaml',
                'modified' => 1662660087
            ],
            'system' => [
                'file' => 'system/config/system.yaml',
                'modified' => 1662660087
            ]
        ],
        'user/plugins' => [
            'plugins/error' => [
                'file' => 'user/plugins/error/error.yaml',
                'modified' => 1662660087
            ],
            'plugins/login' => [
                'file' => 'user/plugins/login/login.yaml',
                'modified' => 1662660087
            ],
            'plugins/form' => [
                'file' => 'user/plugins/form/form.yaml',
                'modified' => 1662660087
            ],
            'plugins/admin' => [
                'file' => 'user/plugins/admin/admin.yaml',
                'modified' => 1662660087
            ],
            'plugins/color-tools' => [
                'file' => 'user/plugins/color-tools/color-tools.yaml',
                'modified' => 1663773946
            ],
            'plugins/shortcode-core' => [
                'file' => 'user/plugins/shortcode-core/shortcode-core.yaml',
                'modified' => 1663773948
            ],
            'plugins/problems' => [
                'file' => 'user/plugins/problems/problems.yaml',
                'modified' => 1662660087
            ],
            'plugins/markdown-notices' => [
                'file' => 'user/plugins/markdown-notices/markdown-notices.yaml',
                'modified' => 1662660087
            ],
            'plugins/email' => [
                'file' => 'user/plugins/email/email.yaml',
                'modified' => 1662660087
            ],
            'plugins/flex-objects' => [
                'file' => 'user/plugins/flex-objects/flex-objects.yaml',
                'modified' => 1662660087
            ]
        ],
        'user/themes' => [
            'themes/quark' => [
                'file' => 'user/themes/quark/quark.yaml',
                'modified' => 1662660087
            ]
        ]
    ],
    'data' => [
        'themes' => [
            'quark' => [
                'enabled' => true,
                'production-mode' => true,
                'grid-size' => 'grid-lg',
                'header-fixed' => true,
                'header-animated' => true,
                'header-dark' => false,
                'header-transparent' => false,
                'sticky-footer' => true,
                'blog-page' => '/blog',
                'spectre' => [
                    'exp' => false,
                    'icons' => false
                ]
            ]
        ],
        'plugins' => [
            'error' => [
                'enabled' => true,
                'routes' => [
                    404 => '/error'
                ]
            ],
            'login' => [
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
            ],
            'form' => [
                'enabled' => true,
                'built_in_css' => true,
                'inline_css' => true,
                'refresh_prevention' => false,
                'client_side_validation' => true,
                'inline_errors' => false,
                'files' => [
                    'multiple' => false,
                    'limit' => 10,
                    'destination' => 'self@',
                    'avoid_overwriting' => false,
                    'random_name' => false,
                    'filesize' => 0,
                    'accept' => [
                        0 => 'image/*'
                    ]
                ],
                'recaptcha' => [
                    'version' => '2-checkbox',
                    'theme' => 'light',
                    'site_key' => NULL,
                    'secret_key' => NULL
                ]
            ],
            'admin' => [
                'enabled' => true,
                'route' => '/admin',
                'cache_enabled' => true,
                'theme' => 'grav',
                'logo_text' => '',
                'body_classes' => '',
                'content_padding' => true,
                'twofa_enabled' => true,
                'sidebar' => [
                    'activate' => 'tab',
                    'hover_delay' => 100,
                    'size' => 'auto'
                ],
                'dashboard' => [
                    'days_of_stats' => 7
                ],
                'widgets_display' => [
                    'dashboard-maintenance' => true,
                    'dashboard-statistics' => true,
                    'dashboard-notifications' => true,
                    'dashboard-feed' => true,
                    'dashboard-pages' => true
                ],
                'pages' => [
                    'show_parents' => 'both',
                    'show_modular' => true
                ],
                'session' => [
                    'timeout' => 1800
                ],
                'edit_mode' => 'normal',
                'frontend_preview_target' => 'inline',
                'show_github_msg' => true,
                'admin_icons' => 'line-awesome',
                'enable_auto_updates_check' => true,
                'notifications' => [
                    'feed' => true,
                    'dashboard' => true,
                    'plugins' => true,
                    'themes' => true
                ],
                'popularity' => [
                    'enabled' => true,
                    'ignore' => [
                        0 => '/test*',
                        1 => '/modular'
                    ],
                    'history' => [
                        'daily' => 30,
                        'monthly' => 12,
                        'visitors' => 20
                    ]
                ],
                'whitelabel' => [
                    'quicktray_recompile' => false,
                    'codemirror_theme' => 'paper',
                    'codemirror_fontsize' => 'md',
                    'codemirror_md_font' => 'sans',
                    'logo_custom' => NULL,
                    'logo_login' => NULL,
                    'color_scheme' => [
                        'accents' => [
                            'primary-accent' => 'button',
                            'secondary-accent' => 'notice',
                            'tertiary-accent' => 'critical'
                        ],
                        'colors' => [
                            'logo-bg' => '#323640',
                            'logo-link' => '#FFFFFF',
                            'nav-bg' => '#3D424E',
                            'nav-text' => '#B7B9BD',
                            'nav-link' => '#ffffff',
                            'nav-selected-bg' => '#323640',
                            'nav-selected-link' => '#ffffff',
                            'nav-hover-bg' => '#434753',
                            'nav-hover-link' => '#ffffff',
                            'toolbar-bg' => '#ffffff',
                            'toolbar-text' => '#3D424E',
                            'page-bg' => '#F6F6F6',
                            'page-text' => '#6f7b8a',
                            'page-link' => '#0090D9',
                            'content-bg' => '#ffffff',
                            'content-text' => '#6f7b8a',
                            'content-link' => '#0090D9',
                            'content-link2' => '#da4b46',
                            'content-header' => '#414147',
                            'content-tabs-bg' => '#e6e6e6',
                            'content-tabs-text' => '#808080',
                            'button-bg' => '#0090D9',
                            'button-text' => '#ffffff',
                            'notice-bg' => '#06A599',
                            'notice-text' => '#ffffff',
                            'update-bg' => '#77559D',
                            'update-text' => '#ffffff',
                            'critical-bg' => '#F45857',
                            'critical-text' => '#ffffff'
                        ]
                    ]
                ]
            ],
            'color-tools' => [
                'enabled' => true
            ],
            'shortcode-core' => [
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
            ],
            'problems' => [
                'enabled' => true,
                'built_in_css' => true
            ],
            'markdown-notices' => [
                'enabled' => true,
                'built_in_css' => true,
                'base_classes' => 'notices',
                'level_classes' => [
                    0 => 'yellow',
                    1 => 'red',
                    2 => 'blue',
                    3 => 'green'
                ]
            ],
            'email' => [
                'enabled' => true,
                'from' => NULL,
                'from_name' => NULL,
                'to' => NULL,
                'to_name' => NULL,
                'queue' => [
                    'enabled' => false,
                    'flush_frequency' => '* * * * *',
                    'flush_msg_limit' => 10,
                    'flush_time_limit' => 100
                ],
                'mailer' => [
                    'engine' => 'sendmail',
                    'smtp' => [
                        'server' => 'localhost',
                        'port' => 25,
                        'encryption' => 'none',
                        'user' => '',
                        'password' => '',
                        'auth_mode' => ''
                    ],
                    'sendmail' => [
                        'bin' => '/usr/sbin/sendmail -bs'
                    ]
                ],
                'content_type' => 'text/html',
                'debug' => false
            ],
            'flex-objects' => [
                'enabled' => true,
                'built_in_css' => true,
                'extra_admin_twig_path' => 'theme://admin/templates',
                'admin_list' => [
                    'per_page' => 15,
                    'order' => [
                        'by' => 'updated_timestamp',
                        'dir' => 'desc'
                    ]
                ],
                'directories' => [
                    0 => 'blueprints://flex-objects/pages.yaml',
                    1 => 'blueprints://flex-objects/user-accounts.yaml',
                    2 => 'blueprints://flex-objects/user-groups.yaml'
                ]
            ]
        ],
        'backups' => [
            'purge' => [
                'trigger' => 'space',
                'max_backups_count' => 25,
                'max_backups_space' => 5,
                'max_backups_time' => 365
            ],
            'profiles' => [
                0 => [
                    'name' => 'Default Site Backup',
                    'root' => '/',
                    'schedule' => false,
                    'schedule_at' => '0 3 * * *',
                    'exclude_paths' => '/backup
/cache
/images
/logs
/tmp',
                    'exclude_files' => '.DS_Store
.git
.svn
.hg
.idea
.vscode
node_modules'
                ]
            ]
        ],
        'media' => [
            'types' => [
                'defaults' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb.png',
                    'mime' => 'application/octet-stream',
                    'image' => [
                        'filters' => [
                            'default' => [
                                0 => 'enableProgressive'
                            ]
                        ]
                    ]
                ],
                'jpg' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-jpg.png',
                    'mime' => 'image/jpeg'
                ],
                'jpe' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-jpg.png',
                    'mime' => 'image/jpeg'
                ],
                'jpeg' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-jpg.png',
                    'mime' => 'image/jpeg'
                ],
                'png' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-png.png',
                    'mime' => 'image/png'
                ],
                'webp' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-webp.png',
                    'mime' => 'image/webp'
                ],
                'avif' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb.png',
                    'mime' => 'image/avif'
                ],
                'gif' => [
                    'type' => 'animated',
                    'thumb' => 'media/thumb-gif.png',
                    'mime' => 'image/gif'
                ],
                'svg' => [
                    'type' => 'vector',
                    'thumb' => 'media/thumb-svg.png',
                    'mime' => 'image/svg+xml'
                ],
                'mp4' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-mp4.png',
                    'mime' => 'video/mp4'
                ],
                'mov' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-mov.png',
                    'mime' => 'video/quicktime'
                ],
                'm4v' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-m4v.png',
                    'mime' => 'video/x-m4v'
                ],
                'swf' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-swf.png',
                    'mime' => 'video/x-flv'
                ],
                'flv' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-flv.png',
                    'mime' => 'video/x-flv'
                ],
                'webm' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-webm.png',
                    'mime' => 'video/webm'
                ],
                'ogv' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-ogg.png',
                    'mime' => 'video/ogg'
                ],
                'mp3' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-mp3.png',
                    'mime' => 'audio/mp3'
                ],
                'ogg' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-ogg.png',
                    'mime' => 'audio/ogg'
                ],
                'wma' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-wma.png',
                    'mime' => 'audio/wma'
                ],
                'm4a' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-m4a.png',
                    'mime' => 'audio/m4a'
                ],
                'wav' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-wav.png',
                    'mime' => 'audio/wav'
                ],
                'aiff' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-aif.png',
                    'mime' => 'audio/aiff'
                ],
                'aif' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-aif.png',
                    'mime' => 'audio/aiff'
                ],
                'txt' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-txt.png',
                    'mime' => 'text/plain'
                ],
                'xml' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-xml.png',
                    'mime' => 'application/xml'
                ],
                'doc' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-doc.png',
                    'mime' => 'application/msword'
                ],
                'docx' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-docx.png',
                    'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ],
                'xls' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-xls.png',
                    'mime' => 'application/vnd.ms-excel'
                ],
                'xlsx' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-xlsx.png',
                    'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ],
                'ppt' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-ppt.png',
                    'mime' => 'application/vnd.ms-powerpoint'
                ],
                'pptx' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-pptx.png',
                    'mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                ],
                'pps' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-pps.png',
                    'mime' => 'application/vnd.ms-powerpoint'
                ],
                'rtf' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-rtf.png',
                    'mime' => 'application/rtf'
                ],
                'bmp' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-bmp.png',
                    'mime' => 'image/bmp'
                ],
                'tiff' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-tiff.png',
                    'mime' => 'image/tiff'
                ],
                'mpeg' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-mpg.png',
                    'mime' => 'video/mpeg'
                ],
                'mpg' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-mpg.png',
                    'mime' => 'video/mpeg'
                ],
                'mpe' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-mpe.png',
                    'mime' => 'video/mpeg'
                ],
                'avi' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-avi.png',
                    'mime' => 'video/msvideo'
                ],
                'wmv' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-wmv.png',
                    'mime' => 'video/x-ms-wmv'
                ],
                'html' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-html.png',
                    'mime' => 'text/html'
                ],
                'htm' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-html.png',
                    'mime' => 'text/html'
                ],
                'ics' => [
                    'type' => 'iCal',
                    'thumb' => 'media/thumb-ics.png',
                    'mime' => 'text/calendar'
                ],
                'pdf' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-pdf.png',
                    'mime' => 'application/pdf'
                ],
                'ai' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-ai.png',
                    'mime' => 'image/ai'
                ],
                'psd' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-psd.png',
                    'mime' => 'image/psd'
                ],
                'zip' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-zip.png',
                    'mime' => 'application/zip'
                ],
                '7z' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-7z.png',
                    'mime' => 'application/x-7z-compressed'
                ],
                'gz' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-gz.png',
                    'mime' => 'application/x-gzip'
                ],
                'tar' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-tar.png',
                    'mime' => 'application/x-tar'
                ],
                'css' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-css.png',
                    'mime' => 'text/css'
                ],
                'js' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-js.png',
                    'mime' => 'text/javascript'
                ],
                'json' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-json.png',
                    'mime' => 'application/json'
                ]
            ]
        ],
        'mime' => [
            'types' => [
                123 => [
                    0 => 'application/vnd.lotus-1-2-3'
                ],
                'wof' => [
                    0 => 'application/font-woff'
                ],
                'php' => [
                    0 => 'application/php',
                    1 => 'application/x-httpd-php',
                    2 => 'application/x-httpd-php-source',
                    3 => 'application/x-php',
                    4 => 'text/php',
                    5 => 'text/x-php'
                ],
                'otf' => [
                    0 => 'application/x-font-otf',
                    1 => 'font/otf'
                ],
                'ttf' => [
                    0 => 'application/x-font-ttf',
                    1 => 'font/ttf'
                ],
                'ttc' => [
                    0 => 'application/x-font-ttf',
                    1 => 'font/collection'
                ],
                'zip' => [
                    0 => 'application/x-gzip',
                    1 => 'application/zip',
                    2 => 'application/x-zip-compressed'
                ],
                'amr' => [
                    0 => 'audio/amr'
                ],
                'mp3' => [
                    0 => 'audio/mpeg'
                ],
                'mpga' => [
                    0 => 'audio/mpeg'
                ],
                'mp2' => [
                    0 => 'audio/mpeg'
                ],
                'mp2a' => [
                    0 => 'audio/mpeg'
                ],
                'm2a' => [
                    0 => 'audio/mpeg'
                ],
                'm3a' => [
                    0 => 'audio/mpeg'
                ],
                'jpg' => [
                    0 => 'image/jpeg'
                ],
                'jpeg' => [
                    0 => 'image/jpeg'
                ],
                'jpe' => [
                    0 => 'image/jpeg'
                ],
                'bmp' => [
                    0 => 'image/x-ms-bmp',
                    1 => 'image/bmp'
                ],
                'ez' => [
                    0 => 'application/andrew-inset'
                ],
                'aw' => [
                    0 => 'application/applixware'
                ],
                'atom' => [
                    0 => 'application/atom+xml'
                ],
                'atomcat' => [
                    0 => 'application/atomcat+xml'
                ],
                'atomsvc' => [
                    0 => 'application/atomsvc+xml'
                ],
                'ccxml' => [
                    0 => 'application/ccxml+xml'
                ],
                'cdmia' => [
                    0 => 'application/cdmi-capability'
                ],
                'cdmic' => [
                    0 => 'application/cdmi-container'
                ],
                'cdmid' => [
                    0 => 'application/cdmi-domain'
                ],
                'cdmio' => [
                    0 => 'application/cdmi-object'
                ],
                'cdmiq' => [
                    0 => 'application/cdmi-queue'
                ],
                'cu' => [
                    0 => 'application/cu-seeme'
                ],
                'davmount' => [
                    0 => 'application/davmount+xml'
                ],
                'dbk' => [
                    0 => 'application/docbook+xml'
                ],
                'dssc' => [
                    0 => 'application/dssc+der'
                ],
                'xdssc' => [
                    0 => 'application/dssc+xml'
                ],
                'ecma' => [
                    0 => 'application/ecmascript'
                ],
                'emma' => [
                    0 => 'application/emma+xml'
                ],
                'epub' => [
                    0 => 'application/epub+zip'
                ],
                'exi' => [
                    0 => 'application/exi'
                ],
                'pfr' => [
                    0 => 'application/font-tdpfr'
                ],
                'gml' => [
                    0 => 'application/gml+xml'
                ],
                'gpx' => [
                    0 => 'application/gpx+xml'
                ],
                'gxf' => [
                    0 => 'application/gxf'
                ],
                'stk' => [
                    0 => 'application/hyperstudio'
                ],
                'ink' => [
                    0 => 'application/inkml+xml'
                ],
                'inkml' => [
                    0 => 'application/inkml+xml'
                ],
                'ipfix' => [
                    0 => 'application/ipfix'
                ],
                'jar' => [
                    0 => 'application/java-archive'
                ],
                'ser' => [
                    0 => 'application/java-serialized-object'
                ],
                'class' => [
                    0 => 'application/java-vm'
                ],
                'js' => [
                    0 => 'application/javascript'
                ],
                'json' => [
                    0 => 'application/json'
                ],
                'jsonml' => [
                    0 => 'application/jsonml+json'
                ],
                'lostxml' => [
                    0 => 'application/lost+xml'
                ],
                'hqx' => [
                    0 => 'application/mac-binhex40'
                ],
                'cpt' => [
                    0 => 'application/mac-compactpro'
                ],
                'mads' => [
                    0 => 'application/mads+xml'
                ],
                'mrc' => [
                    0 => 'application/marc'
                ],
                'mrcx' => [
                    0 => 'application/marcxml+xml'
                ],
                'ma' => [
                    0 => 'application/mathematica'
                ],
                'nb' => [
                    0 => 'application/mathematica'
                ],
                'mb' => [
                    0 => 'application/mathematica'
                ],
                'mathml' => [
                    0 => 'application/mathml+xml'
                ],
                'mbox' => [
                    0 => 'application/mbox'
                ],
                'mscml' => [
                    0 => 'application/mediaservercontrol+xml'
                ],
                'metalink' => [
                    0 => 'application/metalink+xml'
                ],
                'meta4' => [
                    0 => 'application/metalink4+xml'
                ],
                'mets' => [
                    0 => 'application/mets+xml'
                ],
                'mods' => [
                    0 => 'application/mods+xml'
                ],
                'm21' => [
                    0 => 'application/mp21'
                ],
                'mp21' => [
                    0 => 'application/mp21'
                ],
                'mp4s' => [
                    0 => 'application/mp4'
                ],
                'doc' => [
                    0 => 'application/msword'
                ],
                'dot' => [
                    0 => 'application/msword'
                ],
                'mxf' => [
                    0 => 'application/mxf'
                ],
                'bin' => [
                    0 => 'application/octet-stream'
                ],
                'dms' => [
                    0 => 'application/octet-stream'
                ],
                'lrf' => [
                    0 => 'application/octet-stream'
                ],
                'mar' => [
                    0 => 'application/octet-stream'
                ],
                'so' => [
                    0 => 'application/octet-stream'
                ],
                'dist' => [
                    0 => 'application/octet-stream'
                ],
                'distz' => [
                    0 => 'application/octet-stream'
                ],
                'pkg' => [
                    0 => 'application/octet-stream'
                ],
                'bpk' => [
                    0 => 'application/octet-stream'
                ],
                'dump' => [
                    0 => 'application/octet-stream'
                ],
                'elc' => [
                    0 => 'application/octet-stream'
                ],
                'deploy' => [
                    0 => 'application/octet-stream'
                ],
                'oda' => [
                    0 => 'application/oda'
                ],
                'opf' => [
                    0 => 'application/oebps-package+xml'
                ],
                'ogx' => [
                    0 => 'application/ogg'
                ],
                'omdoc' => [
                    0 => 'application/omdoc+xml'
                ],
                'onetoc' => [
                    0 => 'application/onenote'
                ],
                'onetoc2' => [
                    0 => 'application/onenote'
                ],
                'onetmp' => [
                    0 => 'application/onenote'
                ],
                'onepkg' => [
                    0 => 'application/onenote'
                ],
                'oxps' => [
                    0 => 'application/oxps'
                ],
                'xer' => [
                    0 => 'application/patch-ops-error+xml'
                ],
                'pdf' => [
                    0 => 'application/pdf'
                ],
                'pgp' => [
                    0 => 'application/pgp-encrypted'
                ],
                'asc' => [
                    0 => 'application/pgp-signature'
                ],
                'sig' => [
                    0 => 'application/pgp-signature'
                ],
                'prf' => [
                    0 => 'application/pics-rules'
                ],
                'p10' => [
                    0 => 'application/pkcs10'
                ],
                'p7m' => [
                    0 => 'application/pkcs7-mime'
                ],
                'p7c' => [
                    0 => 'application/pkcs7-mime'
                ],
                'p7s' => [
                    0 => 'application/pkcs7-signature'
                ],
                'p8' => [
                    0 => 'application/pkcs8'
                ],
                'ac' => [
                    0 => 'application/pkix-attr-cert'
                ],
                'cer' => [
                    0 => 'application/pkix-cert'
                ],
                'crl' => [
                    0 => 'application/pkix-crl'
                ],
                'pkipath' => [
                    0 => 'application/pkix-pkipath'
                ],
                'pki' => [
                    0 => 'application/pkixcmp'
                ],
                'pls' => [
                    0 => 'application/pls+xml'
                ],
                'ai' => [
                    0 => 'application/postscript'
                ],
                'eps' => [
                    0 => 'application/postscript'
                ],
                'ps' => [
                    0 => 'application/postscript'
                ],
                'cww' => [
                    0 => 'application/prs.cww'
                ],
                'pskcxml' => [
                    0 => 'application/pskc+xml'
                ],
                'rdf' => [
                    0 => 'application/rdf+xml'
                ],
                'rif' => [
                    0 => 'application/reginfo+xml'
                ],
                'rnc' => [
                    0 => 'application/relax-ng-compact-syntax'
                ],
                'rl' => [
                    0 => 'application/resource-lists+xml'
                ],
                'rld' => [
                    0 => 'application/resource-lists-diff+xml'
                ],
                'rs' => [
                    0 => 'application/rls-services+xml'
                ],
                'gbr' => [
                    0 => 'application/rpki-ghostbusters'
                ],
                'mft' => [
                    0 => 'application/rpki-manifest'
                ],
                'roa' => [
                    0 => 'application/rpki-roa'
                ],
                'rsd' => [
                    0 => 'application/rsd+xml'
                ],
                'rss' => [
                    0 => 'application/rss+xml'
                ],
                'rtf' => [
                    0 => 'application/rtf'
                ],
                'sbml' => [
                    0 => 'application/sbml+xml'
                ],
                'scq' => [
                    0 => 'application/scvp-cv-request'
                ],
                'scs' => [
                    0 => 'application/scvp-cv-response'
                ],
                'spq' => [
                    0 => 'application/scvp-vp-request'
                ],
                'spp' => [
                    0 => 'application/scvp-vp-response'
                ],
                'sdp' => [
                    0 => 'application/sdp'
                ],
                'setpay' => [
                    0 => 'application/set-payment-initiation'
                ],
                'setreg' => [
                    0 => 'application/set-registration-initiation'
                ],
                'shf' => [
                    0 => 'application/shf+xml'
                ],
                'smi' => [
                    0 => 'application/smil+xml'
                ],
                'smil' => [
                    0 => 'application/smil+xml'
                ],
                'rq' => [
                    0 => 'application/sparql-query'
                ],
                'srx' => [
                    0 => 'application/sparql-results+xml'
                ],
                'gram' => [
                    0 => 'application/srgs'
                ],
                'grxml' => [
                    0 => 'application/srgs+xml'
                ],
                'sru' => [
                    0 => 'application/sru+xml'
                ],
                'ssdl' => [
                    0 => 'application/ssdl+xml'
                ],
                'ssml' => [
                    0 => 'application/ssml+xml'
                ],
                'tei' => [
                    0 => 'application/tei+xml'
                ],
                'teicorpus' => [
                    0 => 'application/tei+xml'
                ],
                'tfi' => [
                    0 => 'application/thraud+xml'
                ],
                'tsd' => [
                    0 => 'application/timestamped-data'
                ],
                'plb' => [
                    0 => 'application/vnd.3gpp.pic-bw-large'
                ],
                'psb' => [
                    0 => 'application/vnd.3gpp.pic-bw-small'
                ],
                'pvb' => [
                    0 => 'application/vnd.3gpp.pic-bw-var'
                ],
                'tcap' => [
                    0 => 'application/vnd.3gpp2.tcap'
                ],
                'pwn' => [
                    0 => 'application/vnd.3m.post-it-notes'
                ],
                'aso' => [
                    0 => 'application/vnd.accpac.simply.aso'
                ],
                'imp' => [
                    0 => 'application/vnd.accpac.simply.imp'
                ],
                'acu' => [
                    0 => 'application/vnd.acucobol'
                ],
                'atc' => [
                    0 => 'application/vnd.acucorp'
                ],
                'acutc' => [
                    0 => 'application/vnd.acucorp'
                ],
                'air' => [
                    0 => 'application/vnd.adobe.air-application-installer-package+zip'
                ],
                'fcdt' => [
                    0 => 'application/vnd.adobe.formscentral.fcdt'
                ],
                'fxp' => [
                    0 => 'application/vnd.adobe.fxp'
                ],
                'fxpl' => [
                    0 => 'application/vnd.adobe.fxp'
                ],
                'xdp' => [
                    0 => 'application/vnd.adobe.xdp+xml'
                ],
                'xfdf' => [
                    0 => 'application/vnd.adobe.xfdf'
                ],
                'ahead' => [
                    0 => 'application/vnd.ahead.space'
                ],
                'azf' => [
                    0 => 'application/vnd.airzip.filesecure.azf'
                ],
                'azs' => [
                    0 => 'application/vnd.airzip.filesecure.azs'
                ],
                'azw' => [
                    0 => 'application/vnd.amazon.ebook'
                ],
                'acc' => [
                    0 => 'application/vnd.americandynamics.acc'
                ],
                'ami' => [
                    0 => 'application/vnd.amiga.ami'
                ],
                'apk' => [
                    0 => 'application/vnd.android.package-archive'
                ],
                'cii' => [
                    0 => 'application/vnd.anser-web-certificate-issue-initiation'
                ],
                'fti' => [
                    0 => 'application/vnd.anser-web-funds-transfer-initiation'
                ],
                'atx' => [
                    0 => 'application/vnd.antix.game-component'
                ],
                'mpkg' => [
                    0 => 'application/vnd.apple.installer+xml'
                ],
                'm3u8' => [
                    0 => 'application/vnd.apple.mpegurl'
                ],
                'swi' => [
                    0 => 'application/vnd.aristanetworks.swi'
                ],
                'iota' => [
                    0 => 'application/vnd.astraea-software.iota'
                ],
                'aep' => [
                    0 => 'application/vnd.audiograph'
                ],
                'mpm' => [
                    0 => 'application/vnd.blueice.multipass'
                ],
                'bmi' => [
                    0 => 'application/vnd.bmi'
                ],
                'rep' => [
                    0 => 'application/vnd.businessobjects'
                ],
                'cdxml' => [
                    0 => 'application/vnd.chemdraw+xml'
                ],
                'mmd' => [
                    0 => 'application/vnd.chipnuts.karaoke-mmd'
                ],
                'cdy' => [
                    0 => 'application/vnd.cinderella'
                ],
                'cla' => [
                    0 => 'application/vnd.claymore'
                ],
                'rp9' => [
                    0 => 'application/vnd.cloanto.rp9'
                ],
                'c4g' => [
                    0 => 'application/vnd.clonk.c4group'
                ],
                'c4d' => [
                    0 => 'application/vnd.clonk.c4group'
                ],
                'c4f' => [
                    0 => 'application/vnd.clonk.c4group'
                ],
                'c4p' => [
                    0 => 'application/vnd.clonk.c4group'
                ],
                'c4u' => [
                    0 => 'application/vnd.clonk.c4group'
                ],
                'c11amc' => [
                    0 => 'application/vnd.cluetrust.cartomobile-config'
                ],
                'c11amz' => [
                    0 => 'application/vnd.cluetrust.cartomobile-config-pkg'
                ],
                'csp' => [
                    0 => 'application/vnd.commonspace'
                ],
                'cdbcmsg' => [
                    0 => 'application/vnd.contact.cmsg'
                ],
                'cmc' => [
                    0 => 'application/vnd.cosmocaller'
                ],
                'clkx' => [
                    0 => 'application/vnd.crick.clicker'
                ],
                'clkk' => [
                    0 => 'application/vnd.crick.clicker.keyboard'
                ],
                'clkp' => [
                    0 => 'application/vnd.crick.clicker.palette'
                ],
                'clkt' => [
                    0 => 'application/vnd.crick.clicker.template'
                ],
                'clkw' => [
                    0 => 'application/vnd.crick.clicker.wordbank'
                ],
                'wbs' => [
                    0 => 'application/vnd.criticaltools.wbs+xml'
                ],
                'pml' => [
                    0 => 'application/vnd.ctc-posml'
                ],
                'ppd' => [
                    0 => 'application/vnd.cups-ppd'
                ],
                'car' => [
                    0 => 'application/vnd.curl.car'
                ],
                'pcurl' => [
                    0 => 'application/vnd.curl.pcurl'
                ],
                'dart' => [
                    0 => 'application/vnd.dart'
                ],
                'rdz' => [
                    0 => 'application/vnd.data-vision.rdz'
                ],
                'uvf' => [
                    0 => 'application/vnd.dece.data'
                ],
                'uvvf' => [
                    0 => 'application/vnd.dece.data'
                ],
                'uvd' => [
                    0 => 'application/vnd.dece.data'
                ],
                'uvvd' => [
                    0 => 'application/vnd.dece.data'
                ],
                'uvt' => [
                    0 => 'application/vnd.dece.ttml+xml'
                ],
                'uvvt' => [
                    0 => 'application/vnd.dece.ttml+xml'
                ],
                'uvx' => [
                    0 => 'application/vnd.dece.unspecified'
                ],
                'uvvx' => [
                    0 => 'application/vnd.dece.unspecified'
                ],
                'uvz' => [
                    0 => 'application/vnd.dece.zip'
                ],
                'uvvz' => [
                    0 => 'application/vnd.dece.zip'
                ],
                'fe_launch' => [
                    0 => 'application/vnd.denovo.fcselayout-link'
                ],
                'dna' => [
                    0 => 'application/vnd.dna'
                ],
                'mlp' => [
                    0 => 'application/vnd.dolby.mlp'
                ],
                'dpg' => [
                    0 => 'application/vnd.dpgraph'
                ],
                'dfac' => [
                    0 => 'application/vnd.dreamfactory'
                ],
                'kpxx' => [
                    0 => 'application/vnd.ds-keypoint'
                ],
                'ait' => [
                    0 => 'application/vnd.dvb.ait'
                ],
                'svc' => [
                    0 => 'application/vnd.dvb.service'
                ],
                'geo' => [
                    0 => 'application/vnd.dynageo'
                ],
                'mag' => [
                    0 => 'application/vnd.ecowin.chart'
                ],
                'nml' => [
                    0 => 'application/vnd.enliven'
                ],
                'esf' => [
                    0 => 'application/vnd.epson.esf'
                ],
                'msf' => [
                    0 => 'application/vnd.epson.msf'
                ],
                'qam' => [
                    0 => 'application/vnd.epson.quickanime'
                ],
                'slt' => [
                    0 => 'application/vnd.epson.salt'
                ],
                'ssf' => [
                    0 => 'application/vnd.epson.ssf'
                ],
                'es3' => [
                    0 => 'application/vnd.eszigno3+xml'
                ],
                'et3' => [
                    0 => 'application/vnd.eszigno3+xml'
                ],
                'ez2' => [
                    0 => 'application/vnd.ezpix-album'
                ],
                'ez3' => [
                    0 => 'application/vnd.ezpix-package'
                ],
                'fdf' => [
                    0 => 'application/vnd.fdf'
                ],
                'mseed' => [
                    0 => 'application/vnd.fdsn.mseed'
                ],
                'seed' => [
                    0 => 'application/vnd.fdsn.seed'
                ],
                'dataless' => [
                    0 => 'application/vnd.fdsn.seed'
                ],
                'gph' => [
                    0 => 'application/vnd.flographit'
                ],
                'ftc' => [
                    0 => 'application/vnd.fluxtime.clip'
                ],
                'fm' => [
                    0 => 'application/vnd.framemaker'
                ],
                'frame' => [
                    0 => 'application/vnd.framemaker'
                ],
                'maker' => [
                    0 => 'application/vnd.framemaker'
                ],
                'book' => [
                    0 => 'application/vnd.framemaker'
                ],
                'fnc' => [
                    0 => 'application/vnd.frogans.fnc'
                ],
                'ltf' => [
                    0 => 'application/vnd.frogans.ltf'
                ],
                'fsc' => [
                    0 => 'application/vnd.fsc.weblaunch'
                ],
                'oas' => [
                    0 => 'application/vnd.fujitsu.oasys'
                ],
                'oa2' => [
                    0 => 'application/vnd.fujitsu.oasys2'
                ],
                'oa3' => [
                    0 => 'application/vnd.fujitsu.oasys3'
                ],
                'fg5' => [
                    0 => 'application/vnd.fujitsu.oasysgp'
                ],
                'bh2' => [
                    0 => 'application/vnd.fujitsu.oasysprs'
                ],
                'ddd' => [
                    0 => 'application/vnd.fujixerox.ddd'
                ],
                'xdw' => [
                    0 => 'application/vnd.fujixerox.docuworks'
                ],
                'xbd' => [
                    0 => 'application/vnd.fujixerox.docuworks.binder'
                ],
                'fzs' => [
                    0 => 'application/vnd.fuzzysheet'
                ],
                'txd' => [
                    0 => 'application/vnd.genomatix.tuxedo'
                ],
                'ggb' => [
                    0 => 'application/vnd.geogebra.file'
                ],
                'ggt' => [
                    0 => 'application/vnd.geogebra.tool'
                ],
                'gex' => [
                    0 => 'application/vnd.geometry-explorer'
                ],
                'gre' => [
                    0 => 'application/vnd.geometry-explorer'
                ],
                'gxt' => [
                    0 => 'application/vnd.geonext'
                ],
                'g2w' => [
                    0 => 'application/vnd.geoplan'
                ],
                'g3w' => [
                    0 => 'application/vnd.geospace'
                ],
                'gmx' => [
                    0 => 'application/vnd.gmx'
                ],
                'kml' => [
                    0 => 'application/vnd.google-earth.kml+xml'
                ],
                'kmz' => [
                    0 => 'application/vnd.google-earth.kmz'
                ],
                'gqf' => [
                    0 => 'application/vnd.grafeq'
                ],
                'gqs' => [
                    0 => 'application/vnd.grafeq'
                ],
                'gac' => [
                    0 => 'application/vnd.groove-account'
                ],
                'ghf' => [
                    0 => 'application/vnd.groove-help'
                ],
                'gim' => [
                    0 => 'application/vnd.groove-identity-message'
                ],
                'grv' => [
                    0 => 'application/vnd.groove-injector'
                ],
                'gtm' => [
                    0 => 'application/vnd.groove-tool-message'
                ],
                'tpl' => [
                    0 => 'application/vnd.groove-tool-template'
                ],
                'vcg' => [
                    0 => 'application/vnd.groove-vcard'
                ],
                'hal' => [
                    0 => 'application/vnd.hal+xml'
                ],
                'zmm' => [
                    0 => 'application/vnd.handheld-entertainment+xml'
                ],
                'hbci' => [
                    0 => 'application/vnd.hbci'
                ],
                'les' => [
                    0 => 'application/vnd.hhe.lesson-player'
                ],
                'hpgl' => [
                    0 => 'application/vnd.hp-hpgl'
                ],
                'hpid' => [
                    0 => 'application/vnd.hp-hpid'
                ],
                'hps' => [
                    0 => 'application/vnd.hp-hps'
                ],
                'jlt' => [
                    0 => 'application/vnd.hp-jlyt'
                ],
                'pcl' => [
                    0 => 'application/vnd.hp-pcl'
                ],
                'pclxl' => [
                    0 => 'application/vnd.hp-pclxl'
                ],
                'sfd-hdstx' => [
                    0 => 'application/vnd.hydrostatix.sof-data'
                ],
                'mpy' => [
                    0 => 'application/vnd.ibm.minipay'
                ],
                'afp' => [
                    0 => 'application/vnd.ibm.modcap'
                ],
                'listafp' => [
                    0 => 'application/vnd.ibm.modcap'
                ],
                'list3820' => [
                    0 => 'application/vnd.ibm.modcap'
                ],
                'irm' => [
                    0 => 'application/vnd.ibm.rights-management'
                ],
                'sc' => [
                    0 => 'application/vnd.ibm.secure-container'
                ],
                'icc' => [
                    0 => 'application/vnd.iccprofile'
                ],
                'icm' => [
                    0 => 'application/vnd.iccprofile'
                ],
                'igl' => [
                    0 => 'application/vnd.igloader'
                ],
                'ivp' => [
                    0 => 'application/vnd.immervision-ivp'
                ],
                'ivu' => [
                    0 => 'application/vnd.immervision-ivu'
                ],
                'igm' => [
                    0 => 'application/vnd.insors.igm'
                ],
                'xpw' => [
                    0 => 'application/vnd.intercon.formnet'
                ],
                'xpx' => [
                    0 => 'application/vnd.intercon.formnet'
                ],
                'i2g' => [
                    0 => 'application/vnd.intergeo'
                ],
                'qbo' => [
                    0 => 'application/vnd.intu.qbo'
                ],
                'qfx' => [
                    0 => 'application/vnd.intu.qfx'
                ],
                'rcprofile' => [
                    0 => 'application/vnd.ipunplugged.rcprofile'
                ],
                'irp' => [
                    0 => 'application/vnd.irepository.package+xml'
                ],
                'xpr' => [
                    0 => 'application/vnd.is-xpr'
                ],
                'fcs' => [
                    0 => 'application/vnd.isac.fcs'
                ],
                'jam' => [
                    0 => 'application/vnd.jam'
                ],
                'rms' => [
                    0 => 'application/vnd.jcp.javame.midlet-rms'
                ],
                'jisp' => [
                    0 => 'application/vnd.jisp'
                ],
                'joda' => [
                    0 => 'application/vnd.joost.joda-archive'
                ],
                'ktz' => [
                    0 => 'application/vnd.kahootz'
                ],
                'ktr' => [
                    0 => 'application/vnd.kahootz'
                ],
                'karbon' => [
                    0 => 'application/vnd.kde.karbon'
                ],
                'chrt' => [
                    0 => 'application/vnd.kde.kchart'
                ],
                'kfo' => [
                    0 => 'application/vnd.kde.kformula'
                ],
                'flw' => [
                    0 => 'application/vnd.kde.kivio'
                ],
                'kon' => [
                    0 => 'application/vnd.kde.kontour'
                ],
                'kpr' => [
                    0 => 'application/vnd.kde.kpresenter'
                ],
                'kpt' => [
                    0 => 'application/vnd.kde.kpresenter'
                ],
                'ksp' => [
                    0 => 'application/vnd.kde.kspread'
                ],
                'kwd' => [
                    0 => 'application/vnd.kde.kword'
                ],
                'kwt' => [
                    0 => 'application/vnd.kde.kword'
                ],
                'htke' => [
                    0 => 'application/vnd.kenameaapp'
                ],
                'kia' => [
                    0 => 'application/vnd.kidspiration'
                ],
                'kne' => [
                    0 => 'application/vnd.kinar'
                ],
                'knp' => [
                    0 => 'application/vnd.kinar'
                ],
                'skp' => [
                    0 => 'application/vnd.koan'
                ],
                'skd' => [
                    0 => 'application/vnd.koan'
                ],
                'skt' => [
                    0 => 'application/vnd.koan'
                ],
                'skm' => [
                    0 => 'application/vnd.koan'
                ],
                'sse' => [
                    0 => 'application/vnd.kodak-descriptor'
                ],
                'lasxml' => [
                    0 => 'application/vnd.las.las+xml'
                ],
                'lbd' => [
                    0 => 'application/vnd.llamagraphics.life-balance.desktop'
                ],
                'lbe' => [
                    0 => 'application/vnd.llamagraphics.life-balance.exchange+xml'
                ],
                'apr' => [
                    0 => 'application/vnd.lotus-approach'
                ],
                'pre' => [
                    0 => 'application/vnd.lotus-freelance'
                ],
                'nsf' => [
                    0 => 'application/vnd.lotus-notes'
                ],
                'org' => [
                    0 => 'application/vnd.lotus-organizer'
                ],
                'scm' => [
                    0 => 'application/vnd.lotus-screencam'
                ],
                'lwp' => [
                    0 => 'application/vnd.lotus-wordpro'
                ],
                'portpkg' => [
                    0 => 'application/vnd.macports.portpkg'
                ],
                'mcd' => [
                    0 => 'application/vnd.mcd'
                ],
                'mc1' => [
                    0 => 'application/vnd.medcalcdata'
                ],
                'cdkey' => [
                    0 => 'application/vnd.mediastation.cdkey'
                ],
                'mwf' => [
                    0 => 'application/vnd.mfer'
                ],
                'mfm' => [
                    0 => 'application/vnd.mfmp'
                ],
                'flo' => [
                    0 => 'application/vnd.micrografx.flo'
                ],
                'igx' => [
                    0 => 'application/vnd.micrografx.igx'
                ],
                'mif' => [
                    0 => 'application/vnd.mif'
                ],
                'daf' => [
                    0 => 'application/vnd.mobius.daf'
                ],
                'dis' => [
                    0 => 'application/vnd.mobius.dis'
                ],
                'mbk' => [
                    0 => 'application/vnd.mobius.mbk'
                ],
                'mqy' => [
                    0 => 'application/vnd.mobius.mqy'
                ],
                'msl' => [
                    0 => 'application/vnd.mobius.msl'
                ],
                'plc' => [
                    0 => 'application/vnd.mobius.plc'
                ],
                'txf' => [
                    0 => 'application/vnd.mobius.txf'
                ],
                'mpn' => [
                    0 => 'application/vnd.mophun.application'
                ],
                'mpc' => [
                    0 => 'application/vnd.mophun.certificate'
                ],
                'xul' => [
                    0 => 'application/vnd.mozilla.xul+xml'
                ],
                'cil' => [
                    0 => 'application/vnd.ms-artgalry'
                ],
                'cab' => [
                    0 => 'application/vnd.ms-cab-compressed'
                ],
                'xls' => [
                    0 => 'application/vnd.ms-excel'
                ],
                'xlm' => [
                    0 => 'application/vnd.ms-excel'
                ],
                'xla' => [
                    0 => 'application/vnd.ms-excel'
                ],
                'xlc' => [
                    0 => 'application/vnd.ms-excel'
                ],
                'xlt' => [
                    0 => 'application/vnd.ms-excel'
                ],
                'xlw' => [
                    0 => 'application/vnd.ms-excel'
                ],
                'xlam' => [
                    0 => 'application/vnd.ms-excel.addin.macroenabled.12'
                ],
                'xlsb' => [
                    0 => 'application/vnd.ms-excel.sheet.binary.macroenabled.12'
                ],
                'xlsm' => [
                    0 => 'application/vnd.ms-excel.sheet.macroenabled.12'
                ],
                'xltm' => [
                    0 => 'application/vnd.ms-excel.template.macroenabled.12'
                ],
                'eot' => [
                    0 => 'application/vnd.ms-fontobject'
                ],
                'chm' => [
                    0 => 'application/vnd.ms-htmlhelp'
                ],
                'ims' => [
                    0 => 'application/vnd.ms-ims'
                ],
                'lrm' => [
                    0 => 'application/vnd.ms-lrm'
                ],
                'thmx' => [
                    0 => 'application/vnd.ms-officetheme'
                ],
                'cat' => [
                    0 => 'application/vnd.ms-pki.seccat'
                ],
                'stl' => [
                    0 => 'application/vnd.ms-pki.stl'
                ],
                'ppt' => [
                    0 => 'application/vnd.ms-powerpoint'
                ],
                'pps' => [
                    0 => 'application/vnd.ms-powerpoint'
                ],
                'pot' => [
                    0 => 'application/vnd.ms-powerpoint'
                ],
                'ppam' => [
                    0 => 'application/vnd.ms-powerpoint.addin.macroenabled.12'
                ],
                'pptm' => [
                    0 => 'application/vnd.ms-powerpoint.presentation.macroenabled.12'
                ],
                'sldm' => [
                    0 => 'application/vnd.ms-powerpoint.slide.macroenabled.12'
                ],
                'ppsm' => [
                    0 => 'application/vnd.ms-powerpoint.slideshow.macroenabled.12'
                ],
                'potm' => [
                    0 => 'application/vnd.ms-powerpoint.template.macroenabled.12'
                ],
                'mpp' => [
                    0 => 'application/vnd.ms-project'
                ],
                'mpt' => [
                    0 => 'application/vnd.ms-project'
                ],
                'docm' => [
                    0 => 'application/vnd.ms-word.document.macroenabled.12'
                ],
                'dotm' => [
                    0 => 'application/vnd.ms-word.template.macroenabled.12'
                ],
                'wps' => [
                    0 => 'application/vnd.ms-works'
                ],
                'wks' => [
                    0 => 'application/vnd.ms-works'
                ],
                'wcm' => [
                    0 => 'application/vnd.ms-works'
                ],
                'wdb' => [
                    0 => 'application/vnd.ms-works'
                ],
                'wpl' => [
                    0 => 'application/vnd.ms-wpl'
                ],
                'xps' => [
                    0 => 'application/vnd.ms-xpsdocument'
                ],
                'mseq' => [
                    0 => 'application/vnd.mseq'
                ],
                'mus' => [
                    0 => 'application/vnd.musician'
                ],
                'msty' => [
                    0 => 'application/vnd.muvee.style'
                ],
                'taglet' => [
                    0 => 'application/vnd.mynfc'
                ],
                'nlu' => [
                    0 => 'application/vnd.neurolanguage.nlu'
                ],
                'ntf' => [
                    0 => 'application/vnd.nitf'
                ],
                'nitf' => [
                    0 => 'application/vnd.nitf'
                ],
                'nnd' => [
                    0 => 'application/vnd.noblenet-directory'
                ],
                'nns' => [
                    0 => 'application/vnd.noblenet-sealer'
                ],
                'nnw' => [
                    0 => 'application/vnd.noblenet-web'
                ],
                'ngdat' => [
                    0 => 'application/vnd.nokia.n-gage.data'
                ],
                'n-gage' => [
                    0 => 'application/vnd.nokia.n-gage.symbian.install'
                ],
                'rpst' => [
                    0 => 'application/vnd.nokia.radio-preset'
                ],
                'rpss' => [
                    0 => 'application/vnd.nokia.radio-presets'
                ],
                'edm' => [
                    0 => 'application/vnd.novadigm.edm'
                ],
                'edx' => [
                    0 => 'application/vnd.novadigm.edx'
                ],
                'ext' => [
                    0 => 'application/vnd.novadigm.ext'
                ],
                'odc' => [
                    0 => 'application/vnd.oasis.opendocument.chart'
                ],
                'otc' => [
                    0 => 'application/vnd.oasis.opendocument.chart-template'
                ],
                'odb' => [
                    0 => 'application/vnd.oasis.opendocument.database'
                ],
                'odf' => [
                    0 => 'application/vnd.oasis.opendocument.formula'
                ],
                'odft' => [
                    0 => 'application/vnd.oasis.opendocument.formula-template'
                ],
                'odg' => [
                    0 => 'application/vnd.oasis.opendocument.graphics'
                ],
                'otg' => [
                    0 => 'application/vnd.oasis.opendocument.graphics-template'
                ],
                'odi' => [
                    0 => 'application/vnd.oasis.opendocument.image'
                ],
                'oti' => [
                    0 => 'application/vnd.oasis.opendocument.image-template'
                ],
                'odp' => [
                    0 => 'application/vnd.oasis.opendocument.presentation'
                ],
                'otp' => [
                    0 => 'application/vnd.oasis.opendocument.presentation-template'
                ],
                'ods' => [
                    0 => 'application/vnd.oasis.opendocument.spreadsheet'
                ],
                'ots' => [
                    0 => 'application/vnd.oasis.opendocument.spreadsheet-template'
                ],
                'odt' => [
                    0 => 'application/vnd.oasis.opendocument.text'
                ],
                'odm' => [
                    0 => 'application/vnd.oasis.opendocument.text-master'
                ],
                'ott' => [
                    0 => 'application/vnd.oasis.opendocument.text-template'
                ],
                'oth' => [
                    0 => 'application/vnd.oasis.opendocument.text-web'
                ],
                'xo' => [
                    0 => 'application/vnd.olpc-sugar'
                ],
                'dd2' => [
                    0 => 'application/vnd.oma.dd2+xml'
                ],
                'oxt' => [
                    0 => 'application/vnd.openofficeorg.extension'
                ],
                'pptx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                ],
                'sldx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.presentationml.slide'
                ],
                'ppsx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow'
                ],
                'potx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.presentationml.template'
                ],
                'xlsx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ],
                'xltx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template'
                ],
                'docx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ],
                'dotx' => [
                    0 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template'
                ],
                'mgp' => [
                    0 => 'application/vnd.osgeo.mapguide.package'
                ],
                'dp' => [
                    0 => 'application/vnd.osgi.dp'
                ],
                'esa' => [
                    0 => 'application/vnd.osgi.subsystem'
                ],
                'pdb' => [
                    0 => 'application/vnd.palm'
                ],
                'pqa' => [
                    0 => 'application/vnd.palm'
                ],
                'oprc' => [
                    0 => 'application/vnd.palm'
                ],
                'paw' => [
                    0 => 'application/vnd.pawaafile'
                ],
                'str' => [
                    0 => 'application/vnd.pg.format'
                ],
                'ei6' => [
                    0 => 'application/vnd.pg.osasli'
                ],
                'efif' => [
                    0 => 'application/vnd.picsel'
                ],
                'wg' => [
                    0 => 'application/vnd.pmi.widget'
                ],
                'plf' => [
                    0 => 'application/vnd.pocketlearn'
                ],
                'pbd' => [
                    0 => 'application/vnd.powerbuilder6'
                ],
                'box' => [
                    0 => 'application/vnd.previewsystems.box'
                ],
                'mgz' => [
                    0 => 'application/vnd.proteus.magazine'
                ],
                'qps' => [
                    0 => 'application/vnd.publishare-delta-tree'
                ],
                'ptid' => [
                    0 => 'application/vnd.pvi.ptid1'
                ],
                'qxd' => [
                    0 => 'application/vnd.quark.quarkxpress'
                ],
                'qxt' => [
                    0 => 'application/vnd.quark.quarkxpress'
                ],
                'qwd' => [
                    0 => 'application/vnd.quark.quarkxpress'
                ],
                'qwt' => [
                    0 => 'application/vnd.quark.quarkxpress'
                ],
                'qxl' => [
                    0 => 'application/vnd.quark.quarkxpress'
                ],
                'qxb' => [
                    0 => 'application/vnd.quark.quarkxpress'
                ],
                'bed' => [
                    0 => 'application/vnd.realvnc.bed'
                ],
                'mxl' => [
                    0 => 'application/vnd.recordare.musicxml'
                ],
                'musicxml' => [
                    0 => 'application/vnd.recordare.musicxml+xml'
                ],
                'cryptonote' => [
                    0 => 'application/vnd.rig.cryptonote'
                ],
                'cod' => [
                    0 => 'application/vnd.rim.cod'
                ],
                'rm' => [
                    0 => 'application/vnd.rn-realmedia'
                ],
                'rmvb' => [
                    0 => 'application/vnd.rn-realmedia-vbr'
                ],
                'link66' => [
                    0 => 'application/vnd.route66.link66+xml'
                ],
                'st' => [
                    0 => 'application/vnd.sailingtracker.track'
                ],
                'see' => [
                    0 => 'application/vnd.seemail'
                ],
                'sema' => [
                    0 => 'application/vnd.sema'
                ],
                'semd' => [
                    0 => 'application/vnd.semd'
                ],
                'semf' => [
                    0 => 'application/vnd.semf'
                ],
                'ifm' => [
                    0 => 'application/vnd.shana.informed.formdata'
                ],
                'itp' => [
                    0 => 'application/vnd.shana.informed.formtemplate'
                ],
                'iif' => [
                    0 => 'application/vnd.shana.informed.interchange'
                ],
                'ipk' => [
                    0 => 'application/vnd.shana.informed.package'
                ],
                'twd' => [
                    0 => 'application/vnd.simtech-mindmapper'
                ],
                'twds' => [
                    0 => 'application/vnd.simtech-mindmapper'
                ],
                'mmf' => [
                    0 => 'application/vnd.smaf'
                ],
                'teacher' => [
                    0 => 'application/vnd.smart.teacher'
                ],
                'sdkm' => [
                    0 => 'application/vnd.solent.sdkm+xml'
                ],
                'sdkd' => [
                    0 => 'application/vnd.solent.sdkm+xml'
                ],
                'dxp' => [
                    0 => 'application/vnd.spotfire.dxp'
                ],
                'sfs' => [
                    0 => 'application/vnd.spotfire.sfs'
                ],
                'sdc' => [
                    0 => 'application/vnd.stardivision.calc'
                ],
                'sda' => [
                    0 => 'application/vnd.stardivision.draw'
                ],
                'sdd' => [
                    0 => 'application/vnd.stardivision.impress'
                ],
                'smf' => [
                    0 => 'application/vnd.stardivision.math'
                ],
                'sdw' => [
                    0 => 'application/vnd.stardivision.writer'
                ],
                'vor' => [
                    0 => 'application/vnd.stardivision.writer'
                ],
                'sgl' => [
                    0 => 'application/vnd.stardivision.writer-global'
                ],
                'smzip' => [
                    0 => 'application/vnd.stepmania.package'
                ],
                'sm' => [
                    0 => 'application/vnd.stepmania.stepchart'
                ],
                'sxc' => [
                    0 => 'application/vnd.sun.xml.calc'
                ],
                'stc' => [
                    0 => 'application/vnd.sun.xml.calc.template'
                ],
                'sxd' => [
                    0 => 'application/vnd.sun.xml.draw'
                ],
                'std' => [
                    0 => 'application/vnd.sun.xml.draw.template'
                ],
                'sxi' => [
                    0 => 'application/vnd.sun.xml.impress'
                ],
                'sti' => [
                    0 => 'application/vnd.sun.xml.impress.template'
                ],
                'sxm' => [
                    0 => 'application/vnd.sun.xml.math'
                ],
                'sxw' => [
                    0 => 'application/vnd.sun.xml.writer'
                ],
                'sxg' => [
                    0 => 'application/vnd.sun.xml.writer.global'
                ],
                'stw' => [
                    0 => 'application/vnd.sun.xml.writer.template'
                ],
                'sus' => [
                    0 => 'application/vnd.sus-calendar'
                ],
                'susp' => [
                    0 => 'application/vnd.sus-calendar'
                ],
                'svd' => [
                    0 => 'application/vnd.svd'
                ],
                'sis' => [
                    0 => 'application/vnd.symbian.install'
                ],
                'sisx' => [
                    0 => 'application/vnd.symbian.install'
                ],
                'xsm' => [
                    0 => 'application/vnd.syncml+xml'
                ],
                'bdm' => [
                    0 => 'application/vnd.syncml.dm+wbxml'
                ],
                'xdm' => [
                    0 => 'application/vnd.syncml.dm+xml'
                ],
                'tao' => [
                    0 => 'application/vnd.tao.intent-module-archive'
                ],
                'pcap' => [
                    0 => 'application/vnd.tcpdump.pcap'
                ],
                'cap' => [
                    0 => 'application/vnd.tcpdump.pcap'
                ],
                'dmp' => [
                    0 => 'application/vnd.tcpdump.pcap'
                ],
                'tmo' => [
                    0 => 'application/vnd.tmobile-livetv'
                ],
                'tpt' => [
                    0 => 'application/vnd.trid.tpt'
                ],
                'mxs' => [
                    0 => 'application/vnd.triscape.mxs'
                ],
                'tra' => [
                    0 => 'application/vnd.trueapp'
                ],
                'ufd' => [
                    0 => 'application/vnd.ufdl'
                ],
                'ufdl' => [
                    0 => 'application/vnd.ufdl'
                ],
                'utz' => [
                    0 => 'application/vnd.uiq.theme'
                ],
                'umj' => [
                    0 => 'application/vnd.umajin'
                ],
                'unityweb' => [
                    0 => 'application/vnd.unity'
                ],
                'uoml' => [
                    0 => 'application/vnd.uoml+xml'
                ],
                'vcx' => [
                    0 => 'application/vnd.vcx'
                ],
                'vsd' => [
                    0 => 'application/vnd.visio'
                ],
                'vst' => [
                    0 => 'application/vnd.visio'
                ],
                'vss' => [
                    0 => 'application/vnd.visio'
                ],
                'vsw' => [
                    0 => 'application/vnd.visio'
                ],
                'vis' => [
                    0 => 'application/vnd.visionary'
                ],
                'vsf' => [
                    0 => 'application/vnd.vsf'
                ],
                'wbxml' => [
                    0 => 'application/vnd.wap.wbxml'
                ],
                'wmlc' => [
                    0 => 'application/vnd.wap.wmlc'
                ],
                'wmlsc' => [
                    0 => 'application/vnd.wap.wmlscriptc'
                ],
                'wtb' => [
                    0 => 'application/vnd.webturbo'
                ],
                'nbp' => [
                    0 => 'application/vnd.wolfram.player'
                ],
                'wpd' => [
                    0 => 'application/vnd.wordperfect'
                ],
                'wqd' => [
                    0 => 'application/vnd.wqd'
                ],
                'stf' => [
                    0 => 'application/vnd.wt.stf'
                ],
                'xar' => [
                    0 => 'application/vnd.xara'
                ],
                'xfdl' => [
                    0 => 'application/vnd.xfdl'
                ],
                'hvd' => [
                    0 => 'application/vnd.yamaha.hv-dic'
                ],
                'hvs' => [
                    0 => 'application/vnd.yamaha.hv-script'
                ],
                'hvp' => [
                    0 => 'application/vnd.yamaha.hv-voice'
                ],
                'osf' => [
                    0 => 'application/vnd.yamaha.openscoreformat'
                ],
                'osfpvg' => [
                    0 => 'application/vnd.yamaha.openscoreformat.osfpvg+xml'
                ],
                'saf' => [
                    0 => 'application/vnd.yamaha.smaf-audio'
                ],
                'spf' => [
                    0 => 'application/vnd.yamaha.smaf-phrase'
                ],
                'cmp' => [
                    0 => 'application/vnd.yellowriver-custom-menu'
                ],
                'zir' => [
                    0 => 'application/vnd.zul'
                ],
                'zirz' => [
                    0 => 'application/vnd.zul'
                ],
                'zaz' => [
                    0 => 'application/vnd.zzazz.deck+xml'
                ],
                'vxml' => [
                    0 => 'application/voicexml+xml'
                ],
                'wgt' => [
                    0 => 'application/widget'
                ],
                'hlp' => [
                    0 => 'application/winhlp'
                ],
                'wsdl' => [
                    0 => 'application/wsdl+xml'
                ],
                'wspolicy' => [
                    0 => 'application/wspolicy+xml'
                ],
                '7z' => [
                    0 => 'application/x-7z-compressed'
                ],
                'abw' => [
                    0 => 'application/x-abiword'
                ],
                'ace' => [
                    0 => 'application/x-ace-compressed'
                ],
                'dmg' => [
                    0 => 'application/x-apple-diskimage'
                ],
                'aab' => [
                    0 => 'application/x-authorware-bin'
                ],
                'x32' => [
                    0 => 'application/x-authorware-bin'
                ],
                'u32' => [
                    0 => 'application/x-authorware-bin'
                ],
                'vox' => [
                    0 => 'application/x-authorware-bin'
                ],
                'aam' => [
                    0 => 'application/x-authorware-map'
                ],
                'aas' => [
                    0 => 'application/x-authorware-seg'
                ],
                'bcpio' => [
                    0 => 'application/x-bcpio'
                ],
                'torrent' => [
                    0 => 'application/x-bittorrent'
                ],
                'blb' => [
                    0 => 'application/x-blorb'
                ],
                'blorb' => [
                    0 => 'application/x-blorb'
                ],
                'bz' => [
                    0 => 'application/x-bzip'
                ],
                'bz2' => [
                    0 => 'application/x-bzip2'
                ],
                'boz' => [
                    0 => 'application/x-bzip2'
                ],
                'cbr' => [
                    0 => 'application/x-cbr'
                ],
                'cba' => [
                    0 => 'application/x-cbr'
                ],
                'cbt' => [
                    0 => 'application/x-cbr'
                ],
                'cbz' => [
                    0 => 'application/x-cbr'
                ],
                'cb7' => [
                    0 => 'application/x-cbr'
                ],
                'vcd' => [
                    0 => 'application/x-cdlink'
                ],
                'cfs' => [
                    0 => 'application/x-cfs-compressed'
                ],
                'chat' => [
                    0 => 'application/x-chat'
                ],
                'pgn' => [
                    0 => 'application/x-chess-pgn'
                ],
                'nsc' => [
                    0 => 'application/x-conference'
                ],
                'cpio' => [
                    0 => 'application/x-cpio'
                ],
                'csh' => [
                    0 => 'application/x-csh'
                ],
                'deb' => [
                    0 => 'application/x-debian-package'
                ],
                'udeb' => [
                    0 => 'application/x-debian-package'
                ],
                'dgc' => [
                    0 => 'application/x-dgc-compressed'
                ],
                'dir' => [
                    0 => 'application/x-director'
                ],
                'dcr' => [
                    0 => 'application/x-director'
                ],
                'dxr' => [
                    0 => 'application/x-director'
                ],
                'cst' => [
                    0 => 'application/x-director'
                ],
                'cct' => [
                    0 => 'application/x-director'
                ],
                'cxt' => [
                    0 => 'application/x-director'
                ],
                'w3d' => [
                    0 => 'application/x-director'
                ],
                'fgd' => [
                    0 => 'application/x-director'
                ],
                'swa' => [
                    0 => 'application/x-director'
                ],
                'wad' => [
                    0 => 'application/x-doom'
                ],
                'ncx' => [
                    0 => 'application/x-dtbncx+xml'
                ],
                'dtb' => [
                    0 => 'application/x-dtbook+xml'
                ],
                'res' => [
                    0 => 'application/x-dtbresource+xml'
                ],
                'dvi' => [
                    0 => 'application/x-dvi'
                ],
                'evy' => [
                    0 => 'application/x-envoy'
                ],
                'eva' => [
                    0 => 'application/x-eva'
                ],
                'bdf' => [
                    0 => 'application/x-font-bdf'
                ],
                'gsf' => [
                    0 => 'application/x-font-ghostscript'
                ],
                'psf' => [
                    0 => 'application/x-font-linux-psf'
                ],
                'pcf' => [
                    0 => 'application/x-font-pcf'
                ],
                'snf' => [
                    0 => 'application/x-font-snf'
                ],
                'pfa' => [
                    0 => 'application/x-font-type1'
                ],
                'pfb' => [
                    0 => 'application/x-font-type1'
                ],
                'pfm' => [
                    0 => 'application/x-font-type1'
                ],
                'afm' => [
                    0 => 'application/x-font-type1'
                ],
                'arc' => [
                    0 => 'application/x-freearc'
                ],
                'spl' => [
                    0 => 'application/x-futuresplash'
                ],
                'gca' => [
                    0 => 'application/x-gca-compressed'
                ],
                'ulx' => [
                    0 => 'application/x-glulx'
                ],
                'gnumeric' => [
                    0 => 'application/x-gnumeric'
                ],
                'gramps' => [
                    0 => 'application/x-gramps-xml'
                ],
                'gtar' => [
                    0 => 'application/x-gtar'
                ],
                'hdf' => [
                    0 => 'application/x-hdf'
                ],
                'install' => [
                    0 => 'application/x-install-instructions'
                ],
                'iso' => [
                    0 => 'application/x-iso9660-image'
                ],
                'jnlp' => [
                    0 => 'application/x-java-jnlp-file'
                ],
                'latex' => [
                    0 => 'application/x-latex'
                ],
                'lzh' => [
                    0 => 'application/x-lzh-compressed'
                ],
                'lha' => [
                    0 => 'application/x-lzh-compressed'
                ],
                'mie' => [
                    0 => 'application/x-mie'
                ],
                'prc' => [
                    0 => 'application/x-mobipocket-ebook'
                ],
                'mobi' => [
                    0 => 'application/x-mobipocket-ebook'
                ],
                'application' => [
                    0 => 'application/x-ms-application'
                ],
                'lnk' => [
                    0 => 'application/x-ms-shortcut'
                ],
                'wmd' => [
                    0 => 'application/x-ms-wmd'
                ],
                'wmz' => [
                    0 => 'application/x-ms-wmz',
                    1 => 'application/x-msmetafile'
                ],
                'xbap' => [
                    0 => 'application/x-ms-xbap'
                ],
                'mdb' => [
                    0 => 'application/x-msaccess'
                ],
                'obd' => [
                    0 => 'application/x-msbinder'
                ],
                'crd' => [
                    0 => 'application/x-mscardfile'
                ],
                'clp' => [
                    0 => 'application/x-msclip'
                ],
                'exe' => [
                    0 => 'application/x-msdownload'
                ],
                'dll' => [
                    0 => 'application/x-msdownload'
                ],
                'com' => [
                    0 => 'application/x-msdownload'
                ],
                'bat' => [
                    0 => 'application/x-msdownload'
                ],
                'msi' => [
                    0 => 'application/x-msdownload'
                ],
                'mvb' => [
                    0 => 'application/x-msmediaview'
                ],
                'm13' => [
                    0 => 'application/x-msmediaview'
                ],
                'm14' => [
                    0 => 'application/x-msmediaview'
                ],
                'wmf' => [
                    0 => 'application/x-msmetafile'
                ],
                'emf' => [
                    0 => 'application/x-msmetafile'
                ],
                'emz' => [
                    0 => 'application/x-msmetafile'
                ],
                'mny' => [
                    0 => 'application/x-msmoney'
                ],
                'pub' => [
                    0 => 'application/x-mspublisher'
                ],
                'scd' => [
                    0 => 'application/x-msschedule'
                ],
                'trm' => [
                    0 => 'application/x-msterminal'
                ],
                'wri' => [
                    0 => 'application/x-mswrite'
                ],
                'nc' => [
                    0 => 'application/x-netcdf'
                ],
                'cdf' => [
                    0 => 'application/x-netcdf'
                ],
                'nzb' => [
                    0 => 'application/x-nzb'
                ],
                'p12' => [
                    0 => 'application/x-pkcs12'
                ],
                'pfx' => [
                    0 => 'application/x-pkcs12'
                ],
                'p7b' => [
                    0 => 'application/x-pkcs7-certificates'
                ],
                'spc' => [
                    0 => 'application/x-pkcs7-certificates'
                ],
                'p7r' => [
                    0 => 'application/x-pkcs7-certreqresp'
                ],
                'rar' => [
                    0 => 'application/x-rar-compressed'
                ],
                'ris' => [
                    0 => 'application/x-research-info-systems'
                ],
                'sh' => [
                    0 => 'application/x-sh'
                ],
                'shar' => [
                    0 => 'application/x-shar'
                ],
                'swf' => [
                    0 => 'application/x-shockwave-flash'
                ],
                'xap' => [
                    0 => 'application/x-silverlight-app'
                ],
                'sql' => [
                    0 => 'application/x-sql'
                ],
                'sit' => [
                    0 => 'application/x-stuffit'
                ],
                'sitx' => [
                    0 => 'application/x-stuffitx'
                ],
                'srt' => [
                    0 => 'application/x-subrip'
                ],
                'sv4cpio' => [
                    0 => 'application/x-sv4cpio'
                ],
                'sv4crc' => [
                    0 => 'application/x-sv4crc'
                ],
                't3' => [
                    0 => 'application/x-t3vm-image'
                ],
                'gam' => [
                    0 => 'application/x-tads'
                ],
                'tar' => [
                    0 => 'application/x-tar'
                ],
                'tcl' => [
                    0 => 'application/x-tcl'
                ],
                'tex' => [
                    0 => 'application/x-tex'
                ],
                'tfm' => [
                    0 => 'application/x-tex-tfm'
                ],
                'texinfo' => [
                    0 => 'application/x-texinfo'
                ],
                'texi' => [
                    0 => 'application/x-texinfo'
                ],
                'obj' => [
                    0 => 'application/x-tgif'
                ],
                'ustar' => [
                    0 => 'application/x-ustar'
                ],
                'src' => [
                    0 => 'application/x-wais-source'
                ],
                'der' => [
                    0 => 'application/x-x509-ca-cert'
                ],
                'crt' => [
                    0 => 'application/x-x509-ca-cert'
                ],
                'fig' => [
                    0 => 'application/x-xfig'
                ],
                'xlf' => [
                    0 => 'application/x-xliff+xml'
                ],
                'xpi' => [
                    0 => 'application/x-xpinstall'
                ],
                'xz' => [
                    0 => 'application/x-xz'
                ],
                'z1' => [
                    0 => 'application/x-zmachine'
                ],
                'z2' => [
                    0 => 'application/x-zmachine'
                ],
                'z3' => [
                    0 => 'application/x-zmachine'
                ],
                'z4' => [
                    0 => 'application/x-zmachine'
                ],
                'z5' => [
                    0 => 'application/x-zmachine'
                ],
                'z6' => [
                    0 => 'application/x-zmachine'
                ],
                'z7' => [
                    0 => 'application/x-zmachine'
                ],
                'z8' => [
                    0 => 'application/x-zmachine'
                ],
                'xaml' => [
                    0 => 'application/xaml+xml'
                ],
                'xdf' => [
                    0 => 'application/xcap-diff+xml'
                ],
                'xenc' => [
                    0 => 'application/xenc+xml'
                ],
                'xhtml' => [
                    0 => 'application/xhtml+xml'
                ],
                'xht' => [
                    0 => 'application/xhtml+xml'
                ],
                'xml' => [
                    0 => 'application/xml'
                ],
                'xsl' => [
                    0 => 'application/xml'
                ],
                'dtd' => [
                    0 => 'application/xml-dtd'
                ],
                'xop' => [
                    0 => 'application/xop+xml'
                ],
                'xpl' => [
                    0 => 'application/xproc+xml'
                ],
                'xslt' => [
                    0 => 'application/xslt+xml'
                ],
                'xspf' => [
                    0 => 'application/xspf+xml'
                ],
                'mxml' => [
                    0 => 'application/xv+xml'
                ],
                'xhvml' => [
                    0 => 'application/xv+xml'
                ],
                'xvml' => [
                    0 => 'application/xv+xml'
                ],
                'xvm' => [
                    0 => 'application/xv+xml'
                ],
                'yang' => [
                    0 => 'application/yang'
                ],
                'yin' => [
                    0 => 'application/yin+xml'
                ],
                'adp' => [
                    0 => 'audio/adpcm'
                ],
                'au' => [
                    0 => 'audio/basic'
                ],
                'snd' => [
                    0 => 'audio/basic'
                ],
                'mid' => [
                    0 => 'audio/midi'
                ],
                'midi' => [
                    0 => 'audio/midi'
                ],
                'kar' => [
                    0 => 'audio/midi'
                ],
                'rmi' => [
                    0 => 'audio/midi'
                ],
                'm4a' => [
                    0 => 'audio/mp4'
                ],
                'mp4a' => [
                    0 => 'audio/mp4'
                ],
                'oga' => [
                    0 => 'audio/ogg'
                ],
                'ogg' => [
                    0 => 'audio/ogg'
                ],
                'spx' => [
                    0 => 'audio/ogg'
                ],
                's3m' => [
                    0 => 'audio/s3m'
                ],
                'sil' => [
                    0 => 'audio/silk'
                ],
                'uva' => [
                    0 => 'audio/vnd.dece.audio'
                ],
                'uvva' => [
                    0 => 'audio/vnd.dece.audio'
                ],
                'eol' => [
                    0 => 'audio/vnd.digital-winds'
                ],
                'dra' => [
                    0 => 'audio/vnd.dra'
                ],
                'dts' => [
                    0 => 'audio/vnd.dts'
                ],
                'dtshd' => [
                    0 => 'audio/vnd.dts.hd'
                ],
                'lvp' => [
                    0 => 'audio/vnd.lucent.voice'
                ],
                'pya' => [
                    0 => 'audio/vnd.ms-playready.media.pya'
                ],
                'ecelp4800' => [
                    0 => 'audio/vnd.nuera.ecelp4800'
                ],
                'ecelp7470' => [
                    0 => 'audio/vnd.nuera.ecelp7470'
                ],
                'ecelp9600' => [
                    0 => 'audio/vnd.nuera.ecelp9600'
                ],
                'rip' => [
                    0 => 'audio/vnd.rip'
                ],
                'weba' => [
                    0 => 'audio/webm'
                ],
                'aac' => [
                    0 => 'audio/x-aac'
                ],
                'aif' => [
                    0 => 'audio/x-aiff'
                ],
                'aiff' => [
                    0 => 'audio/x-aiff'
                ],
                'aifc' => [
                    0 => 'audio/x-aiff'
                ],
                'caf' => [
                    0 => 'audio/x-caf'
                ],
                'flac' => [
                    0 => 'audio/x-flac'
                ],
                'mka' => [
                    0 => 'audio/x-matroska'
                ],
                'm3u' => [
                    0 => 'audio/x-mpegurl'
                ],
                'wax' => [
                    0 => 'audio/x-ms-wax'
                ],
                'wma' => [
                    0 => 'audio/x-ms-wma'
                ],
                'ram' => [
                    0 => 'audio/x-pn-realaudio'
                ],
                'ra' => [
                    0 => 'audio/x-pn-realaudio'
                ],
                'rmp' => [
                    0 => 'audio/x-pn-realaudio-plugin'
                ],
                'wav' => [
                    0 => 'audio/x-wav'
                ],
                'xm' => [
                    0 => 'audio/xm'
                ],
                'cdx' => [
                    0 => 'chemical/x-cdx'
                ],
                'cif' => [
                    0 => 'chemical/x-cif'
                ],
                'cmdf' => [
                    0 => 'chemical/x-cmdf'
                ],
                'cml' => [
                    0 => 'chemical/x-cml'
                ],
                'csml' => [
                    0 => 'chemical/x-csml'
                ],
                'xyz' => [
                    0 => 'chemical/x-xyz'
                ],
                'woff' => [
                    0 => 'font/woff'
                ],
                'woff2' => [
                    0 => 'font/woff2'
                ],
                'cgm' => [
                    0 => 'image/cgm'
                ],
                'g3' => [
                    0 => 'image/g3fax'
                ],
                'gif' => [
                    0 => 'image/gif'
                ],
                'ief' => [
                    0 => 'image/ief'
                ],
                'ktx' => [
                    0 => 'image/ktx'
                ],
                'png' => [
                    0 => 'image/png'
                ],
                'btif' => [
                    0 => 'image/prs.btif'
                ],
                'sgi' => [
                    0 => 'image/sgi'
                ],
                'svg' => [
                    0 => 'image/svg+xml'
                ],
                'svgz' => [
                    0 => 'image/svg+xml'
                ],
                'tiff' => [
                    0 => 'image/tiff'
                ],
                'tif' => [
                    0 => 'image/tiff'
                ],
                'psd' => [
                    0 => 'image/vnd.adobe.photoshop'
                ],
                'uvi' => [
                    0 => 'image/vnd.dece.graphic'
                ],
                'uvvi' => [
                    0 => 'image/vnd.dece.graphic'
                ],
                'uvg' => [
                    0 => 'image/vnd.dece.graphic'
                ],
                'uvvg' => [
                    0 => 'image/vnd.dece.graphic'
                ],
                'djvu' => [
                    0 => 'image/vnd.djvu'
                ],
                'djv' => [
                    0 => 'image/vnd.djvu'
                ],
                'sub' => [
                    0 => 'image/vnd.dvb.subtitle',
                    1 => 'text/vnd.dvb.subtitle'
                ],
                'dwg' => [
                    0 => 'image/vnd.dwg'
                ],
                'dxf' => [
                    0 => 'image/vnd.dxf'
                ],
                'fbs' => [
                    0 => 'image/vnd.fastbidsheet'
                ],
                'fpx' => [
                    0 => 'image/vnd.fpx'
                ],
                'fst' => [
                    0 => 'image/vnd.fst'
                ],
                'mmr' => [
                    0 => 'image/vnd.fujixerox.edmics-mmr'
                ],
                'rlc' => [
                    0 => 'image/vnd.fujixerox.edmics-rlc'
                ],
                'mdi' => [
                    0 => 'image/vnd.ms-modi'
                ],
                'wdp' => [
                    0 => 'image/vnd.ms-photo'
                ],
                'npx' => [
                    0 => 'image/vnd.net-fpx'
                ],
                'wbmp' => [
                    0 => 'image/vnd.wap.wbmp'
                ],
                'xif' => [
                    0 => 'image/vnd.xiff'
                ],
                'webp' => [
                    0 => 'image/webp'
                ],
                '3ds' => [
                    0 => 'image/x-3ds'
                ],
                'ras' => [
                    0 => 'image/x-cmu-raster'
                ],
                'cmx' => [
                    0 => 'image/x-cmx'
                ],
                'fh' => [
                    0 => 'image/x-freehand'
                ],
                'fhc' => [
                    0 => 'image/x-freehand'
                ],
                'fh4' => [
                    0 => 'image/x-freehand'
                ],
                'fh5' => [
                    0 => 'image/x-freehand'
                ],
                'fh7' => [
                    0 => 'image/x-freehand'
                ],
                'ico' => [
                    0 => 'image/x-icon'
                ],
                'sid' => [
                    0 => 'image/x-mrsid-image'
                ],
                'pcx' => [
                    0 => 'image/x-pcx'
                ],
                'pic' => [
                    0 => 'image/x-pict'
                ],
                'pct' => [
                    0 => 'image/x-pict'
                ],
                'pnm' => [
                    0 => 'image/x-portable-anymap'
                ],
                'pbm' => [
                    0 => 'image/x-portable-bitmap'
                ],
                'pgm' => [
                    0 => 'image/x-portable-graymap'
                ],
                'ppm' => [
                    0 => 'image/x-portable-pixmap'
                ],
                'rgb' => [
                    0 => 'image/x-rgb'
                ],
                'tga' => [
                    0 => 'image/x-tga'
                ],
                'xbm' => [
                    0 => 'image/x-xbitmap'
                ],
                'xpm' => [
                    0 => 'image/x-xpixmap'
                ],
                'xwd' => [
                    0 => 'image/x-xwindowdump'
                ],
                'eml' => [
                    0 => 'message/rfc822'
                ],
                'mime' => [
                    0 => 'message/rfc822'
                ],
                'igs' => [
                    0 => 'model/iges'
                ],
                'iges' => [
                    0 => 'model/iges'
                ],
                'msh' => [
                    0 => 'model/mesh'
                ],
                'mesh' => [
                    0 => 'model/mesh'
                ],
                'silo' => [
                    0 => 'model/mesh'
                ],
                'dae' => [
                    0 => 'model/vnd.collada+xml'
                ],
                'dwf' => [
                    0 => 'model/vnd.dwf'
                ],
                'gdl' => [
                    0 => 'model/vnd.gdl'
                ],
                'gtw' => [
                    0 => 'model/vnd.gtw'
                ],
                'mts' => [
                    0 => 'model/vnd.mts'
                ],
                'vtu' => [
                    0 => 'model/vnd.vtu'
                ],
                'wrl' => [
                    0 => 'model/vrml'
                ],
                'vrml' => [
                    0 => 'model/vrml'
                ],
                'x3db' => [
                    0 => 'model/x3d+binary'
                ],
                'x3dbz' => [
                    0 => 'model/x3d+binary'
                ],
                'x3dv' => [
                    0 => 'model/x3d+vrml'
                ],
                'x3dvz' => [
                    0 => 'model/x3d+vrml'
                ],
                'x3d' => [
                    0 => 'model/x3d+xml'
                ],
                'x3dz' => [
                    0 => 'model/x3d+xml'
                ],
                'appcache' => [
                    0 => 'text/cache-manifest'
                ],
                'ics' => [
                    0 => 'text/calendar'
                ],
                'ifb' => [
                    0 => 'text/calendar'
                ],
                'css' => [
                    0 => 'text/css'
                ],
                'csv' => [
                    0 => 'text/csv'
                ],
                'html' => [
                    0 => 'text/html'
                ],
                'htm' => [
                    0 => 'text/html'
                ],
                'n3' => [
                    0 => 'text/n3'
                ],
                'txt' => [
                    0 => 'text/plain'
                ],
                'text' => [
                    0 => 'text/plain'
                ],
                'conf' => [
                    0 => 'text/plain'
                ],
                'def' => [
                    0 => 'text/plain'
                ],
                'list' => [
                    0 => 'text/plain'
                ],
                'log' => [
                    0 => 'text/plain'
                ],
                'in' => [
                    0 => 'text/plain'
                ],
                'dsc' => [
                    0 => 'text/prs.lines.tag'
                ],
                'rtx' => [
                    0 => 'text/richtext'
                ],
                'sgml' => [
                    0 => 'text/sgml'
                ],
                'sgm' => [
                    0 => 'text/sgml'
                ],
                'tsv' => [
                    0 => 'text/tab-separated-values'
                ],
                't' => [
                    0 => 'text/troff'
                ],
                'tr' => [
                    0 => 'text/troff'
                ],
                'roff' => [
                    0 => 'text/troff'
                ],
                'man' => [
                    0 => 'text/troff'
                ],
                'me' => [
                    0 => 'text/troff'
                ],
                'ms' => [
                    0 => 'text/troff'
                ],
                'ttl' => [
                    0 => 'text/turtle'
                ],
                'uri' => [
                    0 => 'text/uri-list'
                ],
                'uris' => [
                    0 => 'text/uri-list'
                ],
                'urls' => [
                    0 => 'text/uri-list'
                ],
                'vcard' => [
                    0 => 'text/vcard'
                ],
                'curl' => [
                    0 => 'text/vnd.curl'
                ],
                'dcurl' => [
                    0 => 'text/vnd.curl.dcurl'
                ],
                'mcurl' => [
                    0 => 'text/vnd.curl.mcurl'
                ],
                'scurl' => [
                    0 => 'text/vnd.curl.scurl'
                ],
                'fly' => [
                    0 => 'text/vnd.fly'
                ],
                'flx' => [
                    0 => 'text/vnd.fmi.flexstor'
                ],
                'gv' => [
                    0 => 'text/vnd.graphviz'
                ],
                '3dml' => [
                    0 => 'text/vnd.in3d.3dml'
                ],
                'spot' => [
                    0 => 'text/vnd.in3d.spot'
                ],
                'jad' => [
                    0 => 'text/vnd.sun.j2me.app-descriptor'
                ],
                'wml' => [
                    0 => 'text/vnd.wap.wml'
                ],
                'wmls' => [
                    0 => 'text/vnd.wap.wmlscript'
                ],
                's' => [
                    0 => 'text/x-asm'
                ],
                'asm' => [
                    0 => 'text/x-asm'
                ],
                'c' => [
                    0 => 'text/x-c'
                ],
                'cc' => [
                    0 => 'text/x-c'
                ],
                'cxx' => [
                    0 => 'text/x-c'
                ],
                'cpp' => [
                    0 => 'text/x-c'
                ],
                'h' => [
                    0 => 'text/x-c'
                ],
                'hh' => [
                    0 => 'text/x-c'
                ],
                'dic' => [
                    0 => 'text/x-c'
                ],
                'f' => [
                    0 => 'text/x-fortran'
                ],
                'for' => [
                    0 => 'text/x-fortran'
                ],
                'f77' => [
                    0 => 'text/x-fortran'
                ],
                'f90' => [
                    0 => 'text/x-fortran'
                ],
                'java' => [
                    0 => 'text/x-java-source'
                ],
                'nfo' => [
                    0 => 'text/x-nfo'
                ],
                'opml' => [
                    0 => 'text/x-opml'
                ],
                'p' => [
                    0 => 'text/x-pascal'
                ],
                'pas' => [
                    0 => 'text/x-pascal'
                ],
                'etx' => [
                    0 => 'text/x-setext'
                ],
                'sfv' => [
                    0 => 'text/x-sfv'
                ],
                'uu' => [
                    0 => 'text/x-uuencode'
                ],
                'vcs' => [
                    0 => 'text/x-vcalendar'
                ],
                'vcf' => [
                    0 => 'text/x-vcard'
                ],
                '3gp' => [
                    0 => 'video/3gpp'
                ],
                '3g2' => [
                    0 => 'video/3gpp2'
                ],
                'h261' => [
                    0 => 'video/h261'
                ],
                'h263' => [
                    0 => 'video/h263'
                ],
                'h264' => [
                    0 => 'video/h264'
                ],
                'jpgv' => [
                    0 => 'video/jpeg'
                ],
                'jpm' => [
                    0 => 'video/jpm'
                ],
                'jpgm' => [
                    0 => 'video/jpm'
                ],
                'mj2' => [
                    0 => 'video/mj2'
                ],
                'mjp2' => [
                    0 => 'video/mj2'
                ],
                'mp4' => [
                    0 => 'video/mp4'
                ],
                'mp4v' => [
                    0 => 'video/mp4'
                ],
                'mpg4' => [
                    0 => 'video/mp4'
                ],
                'mpeg' => [
                    0 => 'video/mpeg'
                ],
                'mpg' => [
                    0 => 'video/mpeg'
                ],
                'mpe' => [
                    0 => 'video/mpeg'
                ],
                'm1v' => [
                    0 => 'video/mpeg'
                ],
                'm2v' => [
                    0 => 'video/mpeg'
                ],
                'ogv' => [
                    0 => 'video/ogg'
                ],
                'qt' => [
                    0 => 'video/quicktime'
                ],
                'mov' => [
                    0 => 'video/quicktime'
                ],
                'uvh' => [
                    0 => 'video/vnd.dece.hd'
                ],
                'uvvh' => [
                    0 => 'video/vnd.dece.hd'
                ],
                'uvm' => [
                    0 => 'video/vnd.dece.mobile'
                ],
                'uvvm' => [
                    0 => 'video/vnd.dece.mobile'
                ],
                'uvp' => [
                    0 => 'video/vnd.dece.pd'
                ],
                'uvvp' => [
                    0 => 'video/vnd.dece.pd'
                ],
                'uvs' => [
                    0 => 'video/vnd.dece.sd'
                ],
                'uvvs' => [
                    0 => 'video/vnd.dece.sd'
                ],
                'uvv' => [
                    0 => 'video/vnd.dece.video'
                ],
                'uvvv' => [
                    0 => 'video/vnd.dece.video'
                ],
                'dvb' => [
                    0 => 'video/vnd.dvb.file'
                ],
                'fvt' => [
                    0 => 'video/vnd.fvt'
                ],
                'mxu' => [
                    0 => 'video/vnd.mpegurl'
                ],
                'm4u' => [
                    0 => 'video/vnd.mpegurl'
                ],
                'pyv' => [
                    0 => 'video/vnd.ms-playready.media.pyv'
                ],
                'uvu' => [
                    0 => 'video/vnd.uvvu.mp4'
                ],
                'uvvu' => [
                    0 => 'video/vnd.uvvu.mp4'
                ],
                'viv' => [
                    0 => 'video/vnd.vivo'
                ],
                'webm' => [
                    0 => 'video/webm'
                ],
                'f4v' => [
                    0 => 'video/x-f4v'
                ],
                'fli' => [
                    0 => 'video/x-fli'
                ],
                'flv' => [
                    0 => 'video/x-flv'
                ],
                'm4v' => [
                    0 => 'video/x-m4v'
                ],
                'mkv' => [
                    0 => 'video/x-matroska'
                ],
                'mk3d' => [
                    0 => 'video/x-matroska'
                ],
                'mks' => [
                    0 => 'video/x-matroska'
                ],
                'mng' => [
                    0 => 'video/x-mng'
                ],
                'asf' => [
                    0 => 'video/x-ms-asf'
                ],
                'asx' => [
                    0 => 'video/x-ms-asf'
                ],
                'vob' => [
                    0 => 'video/x-ms-vob'
                ],
                'wm' => [
                    0 => 'video/x-ms-wm'
                ],
                'wmv' => [
                    0 => 'video/x-ms-wmv'
                ],
                'wmx' => [
                    0 => 'video/x-ms-wmx'
                ],
                'wvx' => [
                    0 => 'video/x-ms-wvx'
                ],
                'avi' => [
                    0 => 'video/x-msvideo'
                ],
                'movie' => [
                    0 => 'video/x-sgi-movie'
                ],
                'smv' => [
                    0 => 'video/x-smv'
                ],
                'ice' => [
                    0 => 'x-conference/x-cooltalk'
                ]
            ]
        ],
        'permissions' => [
            'actions' => [
                'site' => [
                    'type' => 'access',
                    'label' => 'Site'
                ],
                'admin' => [
                    'type' => 'access',
                    'label' => 'Admin'
                ],
                'admin.pages' => [
                    'type' => 'access',
                    'label' => 'Pages'
                ],
                'admin.users' => [
                    'type' => 'access',
                    'label' => 'User Accounts'
                ]
            ],
            'types' => [
                'default' => [
                    'type' => 'access'
                ],
                'crud' => [
                    'type' => 'compact',
                    'letters' => [
                        'c' => [
                            'action' => 'create',
                            'label' => 'PLUGIN_ADMIN.CREATE'
                        ],
                        'r' => [
                            'action' => 'read',
                            'label' => 'PLUGIN_ADMIN.READ'
                        ],
                        'u' => [
                            'action' => 'update',
                            'label' => 'PLUGIN_ADMIN.UPDATE'
                        ],
                        'd' => [
                            'action' => 'delete',
                            'label' => 'PLUGIN_ADMIN.DELETE'
                        ]
                    ]
                ],
                'crudp' => [
                    'type' => 'crud',
                    'letters' => [
                        'p' => [
                            'action' => 'publish',
                            'label' => 'PLUGIN_ADMIN.PUBLISH'
                        ]
                    ]
                ],
                'crudl' => [
                    'type' => 'crud',
                    'letters' => [
                        'l' => [
                            'action' => 'list',
                            'label' => 'PLUGIN_ADMIN.LIST'
                        ]
                    ]
                ],
                'crudpl' => [
                    'type' => 'crud',
                    'use' => [
                        0 => 'crudp',
                        1 => 'crudl'
                    ]
                ]
            ]
        ],
        'security' => [
            'xss_whitelist' => [
                0 => 'admin.super'
            ],
            'xss_enabled' => [
                'on_events' => true,
                'invalid_protocols' => true,
                'moz_binding' => true,
                'html_inline_styles' => true,
                'dangerous_tags' => true
            ],
            'xss_invalid_protocols' => [
                0 => 'javascript',
                1 => 'livescript',
                2 => 'vbscript',
                3 => 'mocha',
                4 => 'feed',
                5 => 'data'
            ],
            'xss_dangerous_tags' => [
                0 => 'applet',
                1 => 'meta',
                2 => 'xml',
                3 => 'blink',
                4 => 'link',
                5 => 'style',
                6 => 'script',
                7 => 'embed',
                8 => 'object',
                9 => 'iframe',
                10 => 'frame',
                11 => 'frameset',
                12 => 'ilayer',
                13 => 'layer',
                14 => 'bgsound',
                15 => 'title',
                16 => 'base'
            ],
            'uploads_dangerous_extensions' => [
                0 => 'php',
                1 => 'html',
                2 => 'htm',
                3 => 'js',
                4 => 'exe'
            ],
            'sanitize_svg' => true,
            'salt' => 'PSQOpYKywjaXd9'
        ],
        'site' => [
            'title' => 'Grav',
            'default_lang' => 'en',
            'author' => [
                'name' => 'Joe Bloggs',
                'email' => 'joe@example.com'
            ],
            'taxonomies' => [
                0 => 'category',
                1 => 'tag'
            ],
            'metadata' => [
                'description' => 'Grav is an easy to use, yet powerful, open source flat-file CMS'
            ],
            'summary' => [
                'enabled' => true,
                'format' => 'short',
                'size' => 300,
                'delimiter' => '==='
            ],
            'redirects' => NULL,
            'routes' => NULL,
            'blog' => [
                'route' => '/blog'
            ]
        ],
        'system' => [
            'absolute_urls' => false,
            'timezone' => '',
            'default_locale' => NULL,
            'param_sep' => ':',
            'wrapped_site' => false,
            'reverse_proxy_setup' => false,
            'force_ssl' => false,
            'force_lowercase_urls' => true,
            'custom_base_url' => '',
            'username_regex' => '^[a-z0-9_-]{3,16}$',
            'pwd_regex' => '(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,}',
            'intl_enabled' => true,
            'http_x_forwarded' => [
                'protocol' => true,
                'host' => false,
                'port' => true,
                'ip' => true
            ],
            'languages' => [
                'supported' => [
                    
                ],
                'default_lang' => NULL,
                'include_default_lang' => true,
                'include_default_lang_file_extension' => true,
                'translations' => true,
                'translations_fallback' => true,
                'session_store_active' => false,
                'http_accept_language' => false,
                'override_locale' => false,
                'content_fallback' => [
                    
                ],
                'pages_fallback_only' => false
            ],
            'home' => [
                'alias' => '/home',
                'hide_in_urls' => false
            ],
            'pages' => [
                'type' => 'regular',
                'theme' => 'quark',
                'order' => [
                    'by' => 'default',
                    'dir' => 'asc'
                ],
                'list' => [
                    'count' => 20
                ],
                'dateformat' => [
                    'default' => NULL,
                    'short' => 'jS M Y',
                    'long' => 'F jS \\a\\t g:ia'
                ],
                'publish_dates' => true,
                'process' => [
                    'markdown' => true,
                    'twig' => false
                ],
                'twig_first' => false,
                'never_cache_twig' => false,
                'events' => [
                    'page' => true,
                    'twig' => true
                ],
                'markdown' => [
                    'extra' => false,
                    'auto_line_breaks' => false,
                    'auto_url_links' => false,
                    'escape_markup' => false,
                    'special_chars' => [
                        '>' => 'gt',
                        '<' => 'lt'
                    ],
                    'valid_link_attributes' => [
                        0 => 'rel',
                        1 => 'target',
                        2 => 'id',
                        3 => 'class',
                        4 => 'classes'
                    ]
                ],
                'types' => [
                    0 => 'html',
                    1 => 'htm',
                    2 => 'xml',
                    3 => 'txt',
                    4 => 'json',
                    5 => 'rss',
                    6 => 'atom'
                ],
                'append_url_extension' => '',
                'expires' => 604800,
                'cache_control' => NULL,
                'last_modified' => false,
                'etag' => true,
                'vary_accept_encoding' => false,
                'redirect_default_code' => 302,
                'redirect_trailing_slash' => 1,
                'redirect_default_route' => 0,
                'ignore_files' => [
                    0 => '.DS_Store'
                ],
                'ignore_folders' => [
                    0 => '.git',
                    1 => '.idea'
                ],
                'ignore_hidden' => true,
                'hide_empty_folders' => false,
                'url_taxonomy_filters' => true,
                'frontmatter' => [
                    'process_twig' => false,
                    'ignore_fields' => [
                        0 => 'form',
                        1 => 'forms'
                    ]
                ]
            ],
            'cache' => [
                'enabled' => true,
                'check' => [
                    'method' => 'file'
                ],
                'driver' => 'auto',
                'prefix' => 'g',
                'purge_at' => '0 4 * * *',
                'clear_at' => '0 3 * * *',
                'clear_job_type' => 'standard',
                'clear_images_by_default' => false,
                'cli_compatibility' => false,
                'lifetime' => 604800,
                'gzip' => false,
                'allow_webserver_gzip' => false,
                'redis' => [
                    'socket' => false,
                    'password' => NULL,
                    'database' => NULL
                ]
            ],
            'twig' => [
                'cache' => true,
                'debug' => true,
                'auto_reload' => true,
                'autoescape' => true,
                'undefined_functions' => true,
                'undefined_filters' => true,
                'safe_functions' => [
                    
                ],
                'safe_filters' => [
                    
                ],
                'umask_fix' => false
            ],
            'assets' => [
                'css_pipeline' => false,
                'css_pipeline_include_externals' => true,
                'css_pipeline_before_excludes' => true,
                'css_minify' => true,
                'css_minify_windows' => false,
                'css_rewrite' => true,
                'js_pipeline' => false,
                'js_pipeline_include_externals' => true,
                'js_pipeline_before_excludes' => true,
                'js_module_pipeline' => false,
                'js_module_pipeline_include_externals' => true,
                'js_module_pipeline_before_excludes' => true,
                'js_minify' => true,
                'enable_asset_timestamp' => false,
                'enable_asset_sri' => false,
                'collections' => [
                    'jquery' => 'system://assets/jquery/jquery-3.x.min.js'
                ]
            ],
            'errors' => [
                'display' => true,
                'log' => true
            ],
            'log' => [
                'handler' => 'file',
                'syslog' => [
                    'facility' => 'local6',
                    'tag' => 'grav'
                ]
            ],
            'debugger' => [
                'enabled' => false,
                'provider' => 'clockwork',
                'censored' => false,
                'shutdown' => [
                    'close_connection' => true
                ],
                'twig' => true
            ],
            'images' => [
                'default_image_quality' => 85,
                'cache_all' => false,
                'cache_perms' => '0755',
                'debug' => false,
                'auto_fix_orientation' => true,
                'seofriendly' => false,
                'cls' => [
                    'auto_sizes' => false,
                    'aspect_ratio' => false,
                    'retina_scale' => 1
                ],
                'defaults' => [
                    'loading' => 'auto'
                ],
                'watermark' => [
                    'image' => 'system://images/watermark.png',
                    'position_y' => 'center',
                    'position_x' => 'center',
                    'scale' => 33,
                    'watermark_all' => false
                ]
            ],
            'media' => [
                'enable_media_timestamp' => false,
                'unsupported_inline_types' => [
                    
                ],
                'allowed_fallback_types' => [
                    
                ],
                'auto_metadata_exif' => false
            ],
            'session' => [
                'enabled' => true,
                'initialize' => true,
                'timeout' => 1800,
                'name' => 'grav-site',
                'uniqueness' => 'path',
                'secure' => false,
                'secure_https' => true,
                'httponly' => true,
                'samesite' => 'Lax',
                'split' => true,
                'domain' => NULL,
                'path' => NULL
            ],
            'gpm' => [
                'releases' => 'stable',
                'official_gpm_only' => true,
                'verify_peer' => true
            ],
            'http' => [
                'method' => 'auto',
                'enable_proxy' => true,
                'proxy_url' => NULL,
                'proxy_cert_path' => NULL,
                'concurrent_connections' => 5,
                'verify_peer' => true,
                'verify_host' => true
            ],
            'accounts' => [
                'type' => 'regular',
                'storage' => 'file',
                'avatar' => 'gravatar'
            ],
            'flex' => [
                'cache' => [
                    'index' => [
                        'enabled' => true,
                        'lifetime' => 60
                    ],
                    'object' => [
                        'enabled' => true,
                        'lifetime' => 600
                    ],
                    'render' => [
                        'enabled' => true,
                        'lifetime' => 600
                    ]
                ]
            ],
            'strict_mode' => [
                'yaml_compat' => false,
                'twig_compat' => false,
                'blueprint_compat' => false
            ]
        ],
        'versions' => [
            'core' => [
                'grav' => [
                    'version' => '1.7.36',
                    'schema' => '1.7.0_2020-11-20_1'
                ]
            ]
        ]
    ]
];
