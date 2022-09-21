<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* forms/fields/multilevel/multilevel.html.twig */
class __TwigTemplate_e0eaf1612f63d4be45345f429d119c8b4b6962b7021f1e54be35073eb5d9734f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'global_attributes' => [$this, 'block_global_attributes'],
            'input' => [$this, 'block_input'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 85
        $context["macro"] = $this;
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/multilevel/multilevel.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 87
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 88
        echo "    data-grav-array-name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
    data-grav-array-keyname=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_key", [])), "html", null, true);
        echo "\"
    data-grav-array-valuename=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", [])), "html", null, true);
        echo "\"
    ";
        // line 91
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    // line 94
    public function block_input($context, array $blocks = [])
    {
        // line 95
        echo "    <div data-id=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->randomStringFunc(), "html", null, true);
        echo "\" data-grav-multilevel-field data-grav-array-type=\"container\" data-grav-array-mode=\"value_only\"";
        echo (((twig_length_filter($this->env, ($context["value"] ?? null)) <= 1)) ? (" class=\"one-child\"") : (""));
        echo ">
        ";
        // line 96
        if (twig_length_filter($this->env, ($context["value"] ?? null))) {
            // line 97
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["content"]) {
                // line 98
                echo "<div class=\"element-wrapper\">
                    ";
                // line 99
                echo $context["macro"]->getrenderer($context["key"], $context["content"], ($context["field"] ?? null), ($context["scope"] ?? null), 0, (("[" . $context["key"]) . "]"), true);
                echo "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['content'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 104
            echo "            <div class=\"element-wrapper\">
                <div class=\"form-row array-field-value_only js__multilevel-field\"
                    data-grav-array-type=\"row\">

                    <input
                        type=\"text\"
                        name=\"";
            // line 110
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
            echo "\"
                        placeholder=\"Enter value\"
                        value=\"\" />

                    <span class=\"fa fa-minus js__remove-item\"></span>
                    <span class=\"fa fa-plus js__add-sibling hidden\" data-level=\"0\" ></span>
                    <span class=\"fa fa-plus-circle js__add-children hidden\" data-level=\"0\"></span>
                </div>
            </div>";
        }
        // line 120
        echo "    </div>
";
    }

    // line 6
    public function getfield($__value__ = null, $__key__ = null, $__level__ = null, $__globalvars__ = null, $__disable_name__ = null, $__hidden__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "value" => $__value__,
            "key" => $__key__,
            "level" => $__level__,
            "globalvars" => $__globalvars__,
            "disable_name" => $__disable_name__,
            "hidden" => $__hidden__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 7
            echo "        ";
            $context["name"] = ((("data[" . twig_replace_filter($this->getAttribute($this->getAttribute(($context["globalvars"] ?? null), "field", []), "name", []), ["." => "]["])) . "]") . ($context["key"] ?? null));
            // line 8
            echo "        <div class=\"form-row array-field-value_only js__multilevel-field ";
            echo (((($context["level"] ?? null) == 0)) ? ("top") : (""));
            echo "\"
            data-grav-array-type=\"row\" ";
            // line 9
            if ((((array_key_exists("hidden", $context)) ? (_twig_default_filter(($context["hidden"] ?? null), false)) : (false)) == true)) {
                echo "style=\"display: none\"";
            }
            echo ">
            ";
            // line 10
            $context["marginDir"] = (( !$this->getAttribute(($context["language_codes"] ?? null), "rtl", [0 => $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", []), "language", [])], "method")) ? ("margin-left") : ("margin-right"));
            // line 11
            echo "            <input
                type=\"text\"
                ";
            // line 13
            if ((($context["disable_name"] ?? null) != true)) {
                echo "name=\"";
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "\"";
            }
            // line 14
            echo "                data-attr-name=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\"
                placeholder=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", [])), "html", null, true);
            echo "\"
                style=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["marginDir"] ?? null), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, (($context["level"] ?? null) * 50), "html", null, true);
            echo "px\"
                value=\"";
            // line 17
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" />

            <span class=\"fa fa-minus js__remove-item\"></span>
            <span class=\"fa fa-plus js__add-sibling hidden\" data-level=\"";
            // line 20
            echo twig_escape_filter($this->env, ($context["level"] ?? null), "html", null, true);
            echo "\"></span>
            <span class=\"fa fa-plus-circle js__add-children hidden\" data-level=\"";
            // line 21
            echo twig_escape_filter($this->env, ($context["level"] ?? null), "html", null, true);
            echo "\"></span>
        </div>
    ";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 3
    public function getrenderer($__key__ = null, $__content__ = null, $__field__ = null, $__scope__ = null, $__level__ = null, $__parent_key__ = null, $__up_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "key" => $__key__,
            "content" => $__content__,
            "field" => $__field__,
            "scope" => $__scope__,
            "level" => $__level__,
            "parent_key" => $__parent_key__,
            "up_level" => $__up_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 4
            echo "    ";
            $context["self"] = $this;
            // line 5
            echo "
    ";
            // line 24
            echo "
    ";
            // line 25
            if ((($context["level"] ?? null) == 0)) {
                // line 26
                echo "
        ";
                // line 27
                echo $context["self"]->getfield(($context["key"] ?? null), "", ($context["level"] ?? null), $context, true, ((is_numeric(($context["key"] ?? null))) ? (true) : (false)));
                echo "

        ";
                // line 29
                if ( !twig_test_iterable(($context["content"] ?? null))) {
                    // line 30
                    echo "            ";
                    $context["level2"] = (($context["level"] ?? null) + 1);
                    // line 31
                    echo "
            <div class=\"children-wrapper\">
                <div class=\"element-wrapper\">
                    ";
                    // line 34
                    echo $context["self"]->getfield(($context["content"] ?? null), (("[" . ($context["key"] ?? null)) . "]"), ($context["level2"] ?? null), $context);
                    echo "
                </div>
            </div>
        ";
                }
                // line 38
                echo "    ";
            }
            // line 39
            echo "
    ";
            // line 40
            if (($context["up_level"] ?? null)) {
                // line 41
                echo "        ";
                $context["level"] = (($context["level"] ?? null) + 1);
                // line 42
                echo "    ";
            }
            // line 43
            echo "    <div class=\"children-wrapper\">
        ";
            // line 44
            $context["unique_child"] = (((is_array(($context["content"] ?? null)) && ($this->getAttribute(($context["content"] ?? null), "length", []) > 1))) ? (true) : (false));
            // line 45
            echo "
        ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["content"] ?? null));
            foreach ($context['_seq'] as $context["inner_key"] => $context["inner_content"]) {
                // line 47
                echo "<div class=\"element-wrapper\">
                ";
                // line 48
                if ( !is_numeric($context["inner_key"])) {
                    // line 49
                    echo "                    ";
                    if ((twig_length_filter($this->env, ($context["content"] ?? null)) > 1)) {
                        // line 50
                        echo "                        ";
                        echo $context["self"]->getfield($context["inner_key"], ($context["parent_key"] ?? null), ($context["level"] ?? null), $context, true);
                        echo "
                    ";
                    } else {
                        // line 52
                        echo "                        ";
                        echo $context["self"]->getfield($context["inner_key"], ($context["parent_key"] ?? null), ($context["level"] ?? null), $context);
                        echo "
                    ";
                    }
                    // line 54
                    echo "                    ";
                    $context["level2"] = (($context["level"] ?? null) + 1);
                    // line 55
                    echo "                    ";
                    $context["up_level"] = true;
                    // line 56
                    echo "                ";
                } else {
                    // line 57
                    echo "                    ";
                    $context["up_level"] = false;
                    // line 58
                    echo "                    ";
                    $context["level2"] = ($context["level"] ?? null);
                    // line 59
                    echo "                ";
                }
                // line 60
                echo "
                ";
                // line 61
                if ( !twig_test_iterable($context["inner_content"])) {
                    // line 62
                    echo "
                    ";
                    // line 63
                    if ( !is_numeric($context["inner_key"])) {
                        // line 64
                        echo "                        <div class=\"children-wrapper\">
                            <div class=\"element-wrapper\">
                    ";
                    }
                    // line 67
                    echo "
                    ";
                    // line 68
                    $context["last_key"] = ((is_numeric($context["inner_key"])) ? ("") : ($context["inner_key"]));
                    // line 69
                    echo "                    ";
                    echo $context["self"]->getfield($context["inner_content"], (((($context["parent_key"] ?? null) . "[") . $context["inner_key"]) . "]"), ($context["level2"] ?? null), $context);
                    echo "

                    ";
                    // line 71
                    if ( !is_numeric($context["inner_key"])) {
                        // line 72
                        echo "                            </div>
                        </div>
                    ";
                    }
                    // line 75
                    echo "                ";
                } else {
                    // line 76
                    echo "
                    ";
                    // line 77
                    $context["inner_parent_key"] = (((($context["parent_key"] ?? null) . "[") . $context["inner_key"]) . "]");
                    // line 78
                    echo "                    ";
                    echo $context["self"]->getrenderer($context["inner_key"], $context["inner_content"], ($context["field"] ?? null), ($context["scope"] ?? null), ($context["level"] ?? null), ($context["inner_parent_key"] ?? null), ($context["up_level"] ?? null));
                    echo "
                ";
                }
                // line 80
                echo "            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['inner_key'], $context['inner_content'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "    </div>
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "forms/fields/multilevel/multilevel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  378 => 82,  371 => 80,  365 => 78,  363 => 77,  360 => 76,  357 => 75,  352 => 72,  350 => 71,  344 => 69,  342 => 68,  339 => 67,  334 => 64,  332 => 63,  329 => 62,  327 => 61,  324 => 60,  321 => 59,  318 => 58,  315 => 57,  312 => 56,  309 => 55,  306 => 54,  300 => 52,  294 => 50,  291 => 49,  289 => 48,  286 => 47,  282 => 46,  279 => 45,  277 => 44,  274 => 43,  271 => 42,  268 => 41,  266 => 40,  263 => 39,  260 => 38,  253 => 34,  248 => 31,  245 => 30,  243 => 29,  238 => 27,  235 => 26,  233 => 25,  230 => 24,  227 => 5,  224 => 4,  206 => 3,  188 => 21,  184 => 20,  178 => 17,  172 => 16,  168 => 15,  163 => 14,  157 => 13,  153 => 11,  151 => 10,  145 => 9,  140 => 8,  137 => 7,  120 => 6,  115 => 120,  103 => 110,  95 => 104,  85 => 99,  82 => 98,  77 => 97,  75 => 96,  68 => 95,  65 => 94,  59 => 91,  55 => 90,  51 => 89,  46 => 88,  43 => 87,  38 => 1,  36 => 85,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/field.html.twig\" %}

{% macro renderer(key, content, field, scope, level, parent_key, up_level) %}
    {% import _self as self %}

    {% macro field(value, key, level, globalvars, disable_name, hidden) %}
        {% set name = 'data[' ~ globalvars.field.name|replace({'.': ']['}) ~ ']' ~ key %}
        <div class=\"form-row array-field-value_only js__multilevel-field {{ level == 0 ? 'top' : '' }}\"
            data-grav-array-type=\"row\" {% if (hidden|default(false) == true) %}style=\"display: none\"{% endif %}>
            {% set marginDir = not language_codes.rtl(grav.user.language) ? 'margin-left' : 'margin-right' %}
            <input
                type=\"text\"
                {% if (disable_name != true) %}name=\"{{ name }}\"{% endif %}
                data-attr-name=\"{{ name }}\"
                placeholder=\"{{ field.placeholder_value|t }}\"
                style=\"{{ marginDir }}: {{ level * 50 }}px\"
                value=\"{{ value }}\" />

            <span class=\"fa fa-minus js__remove-item\"></span>
            <span class=\"fa fa-plus js__add-sibling hidden\" data-level=\"{{level}}\"></span>
            <span class=\"fa fa-plus-circle js__add-children hidden\" data-level=\"{{level}}\"></span>
        </div>
    {% endmacro %}

    {% if level == 0 %}

        {{ self.field(key, '', level, _context, true, (is_numeric(key) ? true : false)) }}

        {% if content is not iterable %}
            {% set level2 = level + 1 %}

            <div class=\"children-wrapper\">
                <div class=\"element-wrapper\">
                    {{ self.field(content, '[' ~ key ~ ']', level2, _context) }}
                </div>
            </div>
        {% endif %}
    {% endif %}

    {% if up_level %}
        {% set level = level + 1 %}
    {% endif %}
    <div class=\"children-wrapper\">
        {% set unique_child = (is_array(content) and content.length > 1) ? true : false %}

        {% for inner_key, inner_content in content -%}
            <div class=\"element-wrapper\">
                {% if not is_numeric(inner_key) %}
                    {% if (content|length > 1) %}
                        {{ self.field(inner_key, parent_key, level, _context, true) }}
                    {% else %}
                        {{ self.field(inner_key, parent_key, level, _context) }}
                    {% endif %}
                    {% set level2 = level + 1 %}
                    {% set up_level = true %}
                {% else %}
                    {% set up_level = false %}
                    {% set level2 = level %}
                {% endif %}

                {% if inner_content is not iterable %}

                    {% if not is_numeric(inner_key) %}
                        <div class=\"children-wrapper\">
                            <div class=\"element-wrapper\">
                    {% endif %}

                    {% set last_key = (is_numeric(inner_key)) ? '' : inner_key %}
                    {{ self.field(inner_content, parent_key ~ '[' ~ inner_key ~ ']', level2, _context) }}

                    {% if not is_numeric(inner_key) %}
                            </div>
                        </div>
                    {% endif %}
                {% else %}

                    {% set inner_parent_key = parent_key ~ '[' ~ inner_key ~ ']' %}
                    {{ self.renderer(inner_key, inner_content, field, scope, level, inner_parent_key, up_level) }}
                {% endif %}
            </div>
        {% endfor %}
    </div>
{% endmacro %}

{% import _self as macro %}

{% block global_attributes %}
    data-grav-array-name=\"{{ (scope ~ field.name)|fieldName }}\"
    data-grav-array-keyname=\"{{ field.placeholder_key|t }}\"
    data-grav-array-valuename=\"{{ field.placeholder_value|t }}\"
    {{ parent() }}
{% endblock %}

{% block input %}
    <div data-id=\"{{random_string()}}\" data-grav-multilevel-field data-grav-array-type=\"container\" data-grav-array-mode=\"value_only\"{{ value|length <= 1 ? ' class=\"one-child\"' : '' }}>
        {% if value|length %}
            {% for key, content in value -%}
                <div class=\"element-wrapper\">
                    {{ macro.renderer(key, content, field, scope, 0, '[' ~ key ~ ']', true) }}
                </div>
            {% endfor %}
        {%- else -%}
            {# Empty value, mock the entry field#}
            <div class=\"element-wrapper\">
                <div class=\"form-row array-field-value_only js__multilevel-field\"
                    data-grav-array-type=\"row\">

                    <input
                        type=\"text\"
                        name=\"{{ (scope ~ field.name)|fieldName }}\"
                        placeholder=\"Enter value\"
                        value=\"\" />

                    <span class=\"fa fa-minus js__remove-item\"></span>
                    <span class=\"fa fa-plus js__add-sibling hidden\" data-level=\"0\" ></span>
                    <span class=\"fa fa-plus-circle js__add-children hidden\" data-level=\"0\"></span>
                </div>
            </div>
        {%- endif %}
    </div>
{% endblock %}
", "forms/fields/multilevel/multilevel.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/multilevel/multilevel.html.twig");
    }
}
