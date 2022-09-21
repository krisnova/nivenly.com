<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/system/languages/mn.yaml',
    'modified' => 1662660087,
    'size' => 4576,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
Гарчиг: %1$s
---

# Алдаа: Буруу Формат

Зам: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1зүүд',
                '/^(ox)$/i' => '\\1ууд',
                '/([m|l])ouse$/i' => '\\1ууд',
                '/(matr|vert|ind)ix|ex$/i' => '\\1иксүүд',
                '/(x|ch|ss|sh)$/i' => '\\1үүд',
                '/([^aeiouy]|qu)ies$/i' => '\\1үүд',
                '/([^aeiouy]|qu)y$/i' => '\\1үүд',
                '/(hive)$/i' => '\\1үүд',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2үүд',
                '/sis$/i' => 'үүд',
                '/([ti])um$/i' => '\\1үүд',
                '/(buffal|tomat)o$/i' => '\\1үүд',
                '/(bu)s$/i' => '\\1үүд',
                '/(alias|status)/i' => '\\1үүд',
                '/(octop|vir)us$/i' => '\\1үүд',
                '/(ax|test)is$/i' => '\\1үүд',
                '/s$/i' => 'үүд',
                '/$/' => 'үүд'
            ],
            'INFLECTOR_SINGULAR' => [
                '/(quiz)zes$/i' => '\\1',
                '/(matr)ices$/i' => '\\1икс',
                '/(vert|ind)ices$/i' => '\\1икс',
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/([octop|vir])i$/i' => '\\1',
                '/(cris|ax|test)es$/i' => '\\1',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/([m|l])ice$/i' => '\\1',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(m)ovies$/i' => '\\1',
                '/(s)eries$/i' => '\\1',
                '/([^aeiouy]|qu)ies$/i' => '\\1үүд',
                '/([lr])ves$/i' => '\\1',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1',
                '/([^f])ves$/i' => '\\1',
                '/(^analy)ses$/i' => '\\1',
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2үүд',
                '/([ti])a$/i' => '\\1',
                '/(n)ews$/i' => '\\1'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'тоног төхөөрөмж',
                1 => 'Мэдээлэл',
                2 => 'будаа',
                3 => 'мөнгө',
                4 => 'төрөл зүйл',
                5 => 'цуврал',
                6 => 'загас',
                7 => 'хонь'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'хүмүүс',
                'man' => 'эрчүүд',
                'child' => 'хүүхэд',
                'sex' => 'хүйс',
                'move' => 'хөдөлгөөн'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'th',
                'first' => 'st',
                'second' => 'nd',
                'third' => 'rd'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Огноо алга',
                'BAD_DATE' => 'Буруу огноо',
                'AGO' => 'өмнө',
                'FROM_NOW' => 'одооноос',
                'JUST_NOW' => 'дөнгөж сая',
                'SECOND' => 'секунд',
                'MINUTE' => 'минут',
                'HOUR' => 'цаг',
                'DAY' => 'өдөр',
                'WEEK' => 'долоо хоног',
                'MONTH' => 'сар',
                'YEAR' => 'он',
                'DECADE' => 'арван жил',
                'SEC' => 'сек',
                'MIN' => 'мин',
                'HR' => 'цаг',
                'WK' => 'д.х.',
                'MO' => 'сар',
                'YR' => 'он',
                'DEC' => 'арван жил',
                'SECOND_PLURAL' => 'секунд',
                'MINUTE_PLURAL' => 'минут',
                'HOUR_PLURAL' => 'цаг',
                'DAY_PLURAL' => 'өдрүүд',
                'WEEK_PLURAL' => 'долоо хоногууд',
                'MONTH_PLURAL' => 'сарууд',
                'YEAR_PLURAL' => 'онууд',
                'DECADE_PLURAL' => 'арван жилүүд',
                'SEC_PLURAL' => 'сек.-үүд',
                'MIN_PLURAL' => 'мин.-ууд',
                'HR_PLURAL' => 'цагууд',
                'WK_PLURAL' => 'д.х.-ууд',
                'MO_PLURAL' => 'сарууд',
                'YR_PLURAL' => 'жилүүд',
                'DEC_PLURAL' => 'арван жилүүд'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Баталгаажуулалт амжилтгүй боллоо:</b>',
                'INVALID_INPUT' => 'Буруу өгөгдөл дараахид',
                'MISSING_REQUIRED_FIELD' => 'Шаардлагатай талбар дутуу байна:',
                'XSS_ISSUES' => '\'%s\' талбарт XSS -ийн болзошгүй асуудлууд илэрсэн'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => '1-р сар',
                1 => '2-р сар',
                2 => '3-р сар',
                3 => '4-р сар',
                4 => '5 сар',
                5 => '6 сар',
                6 => '7 сар',
                7 => '8 сар',
                8 => '9 сар',
                9 => '10 сар',
                10 => '11 сар',
                11 => '12 сар'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Даваа гараг',
                1 => 'Мягмар гараг',
                2 => 'Лхагва гараг',
                3 => 'Пүрэв гараг',
                4 => 'Баасан гараг',
                5 => 'Бямба гараг',
                6 => 'Ням гараг'
            ],
            1 => 'Тийм',
            '' => 'Үгүй',
            'CRON' => [
                'EVERY' => 'бүрийн',
                'EVERY_HOUR' => 'цаг бүрийн',
                'EVERY_MINUTE' => 'минут бүрийн',
                'EVERY_DAY_OF_WEEK' => 'долоо хоногийн өдөр болгонд',
                'EVERY_DAY_OF_MONTH' => 'сарын өдөр болгонд',
                'EVERY_MONTH' => 'сар болгон',
                'TEXT_PERIOD' => 'Бүрийн  <b />',
                'TEXT_MINS' => '  <b /> энэ сүүлийн цагийн минутад',
                'TEXT_TIME' => '  <b />:<b /> -д',
                'TEXT_DOW' => '  <b /> -д',
                'TEXT_MONTH' => '  <b /> -ын',
                'TEXT_DOM' => '  <b /> -т',
                'ERROR1' => '%s -н утга нь дэмжигддэггүй!',
                'ERROR2' => 'Элементүүдийн тоо хэмжээ буруу',
                'ERROR3' => 'jquery_element нь jqCron тохиргоонд хийгдсэн байх ёстой',
                'ERROR4' => 'Танигдаагүй илэрхийлэл'
            ]
        ]
    ]
];
