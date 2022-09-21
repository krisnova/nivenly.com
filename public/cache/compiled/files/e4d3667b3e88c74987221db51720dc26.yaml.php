<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/system/languages/id.yaml',
    'modified' => 1662660087,
    'size' => 3725,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Error: Frontmatter tidak valid

Lokasi: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ices',
                '/(x|ch|ss|sh)$/i' => '\\1es',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([^aeiouy]|qu)y$/i' => '\\1ies',
                '/(hive)$/i' => '\\1s',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2ves',
                '/sis$/i' => 'ses',
                '/([ti])um$/i' => '\\1a',
                '/(buffal|tomat)o$/i' => '\\1oes',
                '/(bu)s$/i' => '\\1ses',
                '/(alias|status)/i' => '\\1es',
                '/(octop|vir)us$/i' => '\\1i',
                '/(ax|test)is$/i' => '\\1es',
                '/s$/i' => 's',
                '/$/' => 's'
            ],
            'INFLECTOR_SINGULAR' => [
                '/(quiz)zes$/i' => '\\1',
                '/(matr)ices$/i' => '\\1ix',
                '/(vert|ind)ices$/i' => '\\1ex',
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/([octop|vir])i$/i' => '\\1us',
                '/(cris|ax|test)es$/i' => '\\1is',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/([m|l])ice$/i' => '\\1ouse',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(m)ovies$/i' => '\\1ovie',
                '/(s)eries$/i' => '\\1eries',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([lr])ves$/i' => '\\1f',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1',
                '/([^f])ves$/i' => '\\1fe',
                '/(^analy)ses$/i' => '\\1sis',
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2sis',
                '/([ti])a$/i' => '\\1um',
                '/(n)ews$/i' => '\\1ews'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'Peralatan',
                1 => 'Informasi ',
                2 => 'Nasi',
                3 => 'Uang',
                4 => 'Jenis',
                5 => 'Seri',
                6 => 'Ikan',
                7 => 'Domba'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'Orang-orang',
                'man' => 'Pria',
                'child' => 'Balita',
                'sex' => 'Jenis Kelamin',
                'move' => 'pindahkan'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'ke',
                'first' => 'pertama',
                'second' => 'nd',
                'third' => 'rd'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Tidak ada tanggal yang disediakan',
                'BAD_DATE' => 'Format tanggal salah',
                'AGO' => 'yang lalu',
                'FROM_NOW' => 'dari sekarang',
                'JUST_NOW' => 'baru saja',
                'SECOND' => 'detik',
                'MINUTE' => 'menit',
                'HOUR' => 'jam',
                'DAY' => 'hari',
                'WEEK' => 'pekan',
                'MONTH' => 'bulan',
                'YEAR' => 'tahun',
                'DECADE' => 'dekade',
                'SEC' => 'detik',
                'MIN' => 'menit',
                'HR' => ' jam',
                'WK' => 'minggu',
                'MO' => 'bulan',
                'YR' => 'tahun',
                'DEC' => 'desimal',
                'SECOND_PLURAL' => 'detik',
                'MINUTE_PLURAL' => 'menit',
                'HOUR_PLURAL' => 'jam',
                'DAY_PLURAL' => 'hari',
                'WEEK_PLURAL' => 'pekan',
                'MONTH_PLURAL' => 'bulan',
                'YEAR_PLURAL' => 'tahun',
                'DECADE_PLURAL' => 'dekade',
                'SEC_PLURAL' => 'detik',
                'MIN_PLURAL' => 'menit',
                'HR_PLURAL' => 'jam',
                'WK_PLURAL' => 'minggu',
                'MO_PLURAL' => 'bulan',
                'YR_PLURAL' => 'tahun',
                'DEC_PLURAL' => 'dekade'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validasi gagal:</b>',
                'INVALID_INPUT' => 'Input tidak valid di',
                'MISSING_REQUIRED_FIELD' => 'Data yang diperlukan belum terisi:',
                'XSS_ISSUES' => 'Isu berpotensial XSS terdeteksi dalam baris %s'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januari',
                1 => 'Februari',
                2 => 'Maret',
                3 => 'April',
                4 => 'Mei',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'Agustus',
                8 => 'September',
                9 => 'Oktober',
                10 => 'November',
                11 => 'Desember'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Senin',
                1 => 'Selasa',
                2 => 'Rabu',
                3 => 'Kamis',
                4 => 'Jum\'at',
                5 => 'Sabtu',
                6 => 'Minggu'
            ],
            1 => 'Ya',
            '' => 'Tidak',
            'CRON' => [
                'EVERY' => 'Setiap',
                'EVERY_HOUR' => 'Setiap jam',
                'EVERY_MINUTE' => 'Setiap menit',
                'EVERY_DAY_OF_WEEK' => 'Setiap hari selama seminggu',
                'EVERY_DAY_OF_MONTH' => 'Setiap hari dalam sebulan',
                'EVERY_MONTH' => 'setiap bulan',
                'TEXT_PERIOD' => 'Setiap <b />',
                'TEXT_MINS' => 'dalam <b />  menit setelah jam yang lalu',
                'TEXT_TIME' => ' pada <b />:<b />',
                'TEXT_DOW' => ' pada <b />',
                'TEXT_MONTH' => ' pada <b />',
                'TEXT_DOM' => ' pada <b />',
                'ERROR1' => 'Tag %s tidak didukung!',
                'ERROR2' => 'Jumlah elemen yang buruk',
                'ERROR3' => 'jquery_element harus diatur ke dalam pengaturan jqCron',
                'ERROR4' => 'Ekspresi tidak dikenal'
            ]
        ]
    ]
];
