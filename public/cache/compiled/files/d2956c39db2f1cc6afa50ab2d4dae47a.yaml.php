<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/system/languages/es.yaml',
    'modified' => 1662660087,
    'size' => 2515,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
título: %1$s
---

# Error: Prefacio no válido

Ruta: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1ios',
                '/s$/i' => 's',
                '/$/' => 's'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'equipamiento',
                1 => 'información',
                2 => 'arroz',
                3 => 'dinero',
                4 => 'especies',
                5 => 'series',
                6 => 'pescado',
                7 => 'oveja'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'personas',
                'man' => 'hombres',
                'child' => 'niños',
                'sex' => 'sexos',
                'move' => 'movido'
            ],
            'INFLECTOR_ORDINALS' => [
                'first' => 'ro',
                'second' => 'do',
                'third' => 'ro'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'No se proporcionó fecha',
                'BAD_DATE' => 'Fecha errónea',
                'AGO' => 'antes',
                'FROM_NOW' => 'desde ahora',
                'JUST_NOW' => 'hace un momento',
                'SECOND' => 'segundo',
                'MINUTE' => 'minuto',
                'HOUR' => 'hora',
                'DAY' => 'día',
                'WEEK' => 'semana',
                'MONTH' => 'mes',
                'YEAR' => 'año',
                'DECADE' => 'década',
                'SEC' => 'seg',
                'MIN' => 'min',
                'HR' => 'h',
                'WK' => 'sem',
                'MO' => 'mes',
                'YR' => 'año',
                'DEC' => 'déc',
                'SECOND_PLURAL' => 'segundos',
                'MINUTE_PLURAL' => 'minutos',
                'HOUR_PLURAL' => 'horas',
                'DAY_PLURAL' => 'días',
                'WEEK_PLURAL' => 'semanas',
                'MONTH_PLURAL' => 'meses',
                'YEAR_PLURAL' => 'años',
                'DECADE_PLURAL' => 'décadas',
                'SEC_PLURAL' => 'segs',
                'MIN_PLURAL' => 'mins',
                'HR_PLURAL' => 'hs',
                'WK_PLURAL' => 'sem',
                'MO_PLURAL' => 'mes',
                'YR_PLURAL' => 'años',
                'DEC_PLURAL' => 'décadas'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Falló la validación: </b>',
                'INVALID_INPUT' => 'Dato inválido en: ',
                'MISSING_REQUIRED_FIELD' => 'Falta el campo requerido: ',
                'XSS_ISSUES' => 'Se detectaron potenciales problemas XSS en el campo \'%s\''
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Enero',
                1 => 'Febrero',
                2 => 'Marzo',
                3 => 'Abril',
                4 => 'Mayo',
                5 => 'Junio',
                6 => 'Julio',
                7 => 'Agosto',
                8 => 'Septiembre',
                9 => 'Octubre',
                10 => 'Noviembre',
                11 => 'Diciembre'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Lunes',
                1 => 'Martes',
                2 => 'Miércoles',
                3 => 'Jueves',
                4 => 'Viernes',
                5 => 'Sábado',
                6 => 'Domingo'
            ],
            1 => 'Sí',
            '' => 'No',
            'CRON' => [
                'EVERY' => 'cada',
                'EVERY_HOUR' => 'cada hora',
                'EVERY_MINUTE' => 'cada minuto',
                'EVERY_DAY_OF_WEEK' => 'cada día de la semana',
                'EVERY_DAY_OF_MONTH' => 'cada día del mes',
                'EVERY_MONTH' => 'cada mes',
                'TEXT_PERIOD' => 'Cada <b />',
                'TEXT_MINS' => ' a <b /> minuto(s) después de la hora',
                'TEXT_TIME' => ' a <b />:<b />',
                'TEXT_DOW' => ' en <b />',
                'TEXT_MONTH' => ' de<b />',
                'TEXT_DOM' => ' en<b />',
                'ERROR1' => '¡La etiqueta %s no está soportada!',
                'ERROR2' => 'El número de elementos es erróneo',
                'ERROR3' => 'El jquery_element debería establecerse en la configuración del jqCron',
                'ERROR4' => 'Expresión no reconocida'
            ]
        ]
    ]
];
