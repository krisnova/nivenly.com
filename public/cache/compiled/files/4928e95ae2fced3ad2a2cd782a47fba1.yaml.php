<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/system/languages/pt.yaml',
    'modified' => 1662660087,
    'size' => 3777,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Erro: Frontmatter Inválido

Localização: `%2$s`

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
                0 => 'equipamento',
                1 => 'informação',
                2 => 'arroz',
                3 => 'dinheiro',
                4 => 'espécie',
                5 => 'série',
                6 => 'peixe',
                7 => 'ovelha'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'pessoas',
                'man' => 'homens',
                'child' => 'crianças',
                'sex' => 'sexos',
                'move' => 'movimentos'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'º',
                'first' => 'º',
                'second' => 'º',
                'third' => 'º'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Nenhuma data fornecida',
                'BAD_DATE' => 'Data inválida',
                'AGO' => 'atrás',
                'FROM_NOW' => 'a partir de agora',
                'JUST_NOW' => 'mesmo agora',
                'SECOND' => 'segundo',
                'MINUTE' => 'minuto',
                'HOUR' => 'hora',
                'DAY' => 'dia',
                'WEEK' => 'semana',
                'MONTH' => 'mês',
                'YEAR' => 'ano',
                'DECADE' => 'década',
                'SEC' => 'seg',
                'MIN' => 'min',
                'HR' => 'hora',
                'WK' => 'semana',
                'MO' => 'mês',
                'YR' => 'ano',
                'DEC' => 'década',
                'SECOND_PLURAL' => 'segundos',
                'MINUTE_PLURAL' => 'minutos',
                'HOUR_PLURAL' => 'horas',
                'DAY_PLURAL' => 'dias',
                'WEEK_PLURAL' => 'semanas',
                'MONTH_PLURAL' => 'meses',
                'YEAR_PLURAL' => 'anos',
                'DECADE_PLURAL' => 'décadas',
                'SEC_PLURAL' => 'segs',
                'MIN_PLURAL' => 'mins',
                'HR_PLURAL' => 'hrs',
                'WK_PLURAL' => 'sems',
                'MO_PLURAL' => 'meses',
                'YR_PLURAL' => 'anos',
                'DEC_PLURAL' => 'décadas'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Falha na validação:</b>',
                'INVALID_INPUT' => 'Dados inseridos são inválidos em',
                'MISSING_REQUIRED_FIELD' => 'Campo obrigatório em falta:',
                'XSS_ISSUES' => 'Potenciais problemas de XSS detectados no campo \'%s\''
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Janeiro',
                1 => 'Fevereiro',
                2 => 'Março',
                3 => 'Abril',
                4 => 'Maio',
                5 => 'Junho',
                6 => 'Julho',
                7 => 'Agosto',
                8 => 'Setembro',
                9 => 'Outubro',
                10 => 'Novembro',
                11 => 'Dezembro'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Segunda-feira',
                1 => 'Terça-feira',
                2 => 'Quarta-feira',
                3 => 'Quinta-feira',
                4 => 'Sexta-feira',
                5 => 'Sábado',
                6 => 'Domingo'
            ],
            1 => 'Sim',
            '' => 'Não',
            'CRON' => [
                'EVERY' => 'cada',
                'EVERY_HOUR' => 'cada hora',
                'EVERY_MINUTE' => 'cada minuto',
                'EVERY_DAY_OF_WEEK' => 'todos os dias da semana',
                'EVERY_DAY_OF_MONTH' => 'todos os dias do mês',
                'EVERY_MONTH' => 'todos os meses',
                'TEXT_PERIOD' => 'Cada <b />',
                'TEXT_MINS' => ' em <b /> minuto(s) após a hora',
                'TEXT_TIME' => ' em <b />:<b />',
                'TEXT_DOW' => ' em <b />',
                'TEXT_MONTH' => ' de <b />',
                'TEXT_DOM' => ' em <b />',
                'ERROR1' => 'A tag %s não é suportada!',
                'ERROR2' => 'Número de elementos inválido',
                'ERROR3' => 'O jquery_element deve ser definido nas configurações do jqCron',
                'ERROR4' => 'Expressão não reconhecida'
            ]
        ]
    ]
];
