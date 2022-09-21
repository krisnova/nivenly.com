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

/* forms/fields/range/range.html.twig */
class __TwigTemplate_ab105dfbe6fe6c8a9109fb0ff2d1f779d65461ef009d770487d0ca3a200e6583 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'input_attributes' => [$this, 'block_input_attributes'],
            'append' => [$this, 'block_append'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/range/range.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input_attributes($context, array $blocks = [])
    {
        // line 4
        echo "    type=\"range\"
    class=\"rangefield ";
        // line 5
        if ($this->getAttribute(($context["field"] ?? null), "classes", [], "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo " ";
        }
        echo "\"
    ";
        // line 6
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", [])) {
            echo "min=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", []), "html", null, true);
            echo "\"";
        }
        // line 7
        echo "    ";
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", [])) {
            echo "max=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", []), "html", null, true);
            echo "\"";
        }
        // line 8
        echo "    ";
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "step", [])) {
            echo "step=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "step", []), "html", null, true);
            echo "\"";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("input_attributes", $context, $blocks);
        echo "
";
    }

    // line 11
    public function block_append($context, array $blocks = [])
    {
        // line 12
        echo "    <input
        type=\"number\"
        class=\"rangefield ";
        // line 14
        if ($this->getAttribute(($context["field"] ?? null), "classes", [], "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo " ";
        }
        echo "\"
        ";
        // line 15
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", [])) {
            echo "min=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", []), "html", null, true);
            echo "\"";
        }
        // line 16
        echo "        ";
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", [])) {
            echo "max=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", []), "html", null, true);
            echo "\"";
        }
        // line 17
        echo "        ";
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "step", [])) {
            echo "step=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "step", []), "html", null, true);
            echo "\"";
        }
        // line 18
        echo "        ";
        if (array_key_exists("value", $context)) {
            // line 19
            echo "            value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"
        ";
        } elseif ($this->getAttribute(        // line 20
($context["field"] ?? null), "default", [], "any", true, true)) {
            // line 21
            echo "            value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "default", []), "html", null, true);
            echo "\"
        ";
        } else {
            // line 23
            echo "            value=\"0\"
        ";
        }
        // line 25
        echo "    />
    <span class=\"range-append\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "append", []), "html", null, true);
        echo "</span>

";
    }

    public function getTemplateName()
    {
        return "forms/fields/range/range.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 26,  134 => 25,  130 => 23,  124 => 21,  122 => 20,  117 => 19,  114 => 18,  107 => 17,  100 => 16,  94 => 15,  87 => 14,  83 => 12,  80 => 11,  73 => 9,  66 => 8,  59 => 7,  53 => 6,  46 => 5,  43 => 4,  40 => 3,  30 => 1,);
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

{% block input_attributes %}
    type=\"range\"
    class=\"rangefield {% if field.classes is defined %}{{ field.classes }} {% endif %}\"
    {% if field.validate.min %}min=\"{{ field.validate.min }}\"{% endif %}
    {% if field.validate.max %}max=\"{{ field.validate.max }}\"{% endif %}
    {% if field.validate.step %}step=\"{{ field.validate.step }}\"{% endif %}
    {{ parent() }}
{% endblock %}
{% block append %}
    <input
        type=\"number\"
        class=\"rangefield {% if field.classes is defined %}{{ field.classes }} {% endif %}\"
        {% if field.validate.min %}min=\"{{ field.validate.min }}\"{% endif %}
        {% if field.validate.max %}max=\"{{ field.validate.max }}\"{% endif %}
        {% if field.validate.step %}step=\"{{ field.validate.step }}\"{% endif %}
        {% if value is defined %}
            value=\"{{ value }}\"
        {% elseif field.default is defined %}
            value=\"{{ field.default }}\"
        {% else %}
            value=\"0\"
        {% endif %}
    />
    <span class=\"range-append\">{{ field.append }}</span>

{% endblock append %}
", "forms/fields/range/range.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/range/range.html.twig");
    }
}
