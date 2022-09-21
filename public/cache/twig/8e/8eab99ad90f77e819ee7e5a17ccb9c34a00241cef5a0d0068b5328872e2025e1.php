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

/* forms/fields/selectize/selectize.html.twig */
class __TwigTemplate_82ae8d8e8321e0c93a8a6251c8a1d472ea94a8e0d3fc154431209ad933304fd6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'global_attributes' => [$this, 'block_global_attributes'],
            'input_attributes' => [$this, 'block_input_attributes'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/selectize/selectize.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        if ($this->getAttribute(($context["field"] ?? null), "selectize", [], "any", true, true)) {
            // line 5
            echo "        ";
            $context["fieldSelectize"] = twig_array_merge(["create" => ((($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", [], "any", false, true), "create", [], "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", [], "any", false, true), "create", [])))) ? ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", [], "any", false, true), "create", [])) : (true))], ((($this->getAttribute(($context["field"] ?? null), "selectize", [], "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "selectize", [])))) ? ($this->getAttribute(($context["field"] ?? null), "selectize", [])) : ([])));
            // line 6
            echo "        ";
            if ($this->getAttribute(($context["field"] ?? null), "merge_items", [])) {
                // line 7
                echo "            ";
                $context["fieldSelectize"] = twig_array_merge(($context["fieldSelectize"] ?? null), ["items" => ($context["value"] ?? null)]);
                // line 8
                echo "        ";
            }
            // line 9
            echo "    ";
        } else {
            // line 10
            echo "        ";
            $context["fieldSelectize"] = ["create" => true];
            // line 11
            echo "    ";
        }
        // line 12
        echo "    data-grav-selectize=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["fieldSelectize"] ?? null)), "html_attr");
        echo "\"
    ";
        // line 13
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    // line 16
    public function block_input_attributes($context, array $blocks = [])
    {
        // line 17
        echo "    type=\"text\"
    ";
        // line 18
        $this->displayParentBlock("input_attributes", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "forms/fields/selectize/selectize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 18,  81 => 17,  78 => 16,  72 => 13,  67 => 12,  64 => 11,  61 => 10,  58 => 9,  55 => 8,  52 => 7,  49 => 6,  46 => 5,  43 => 4,  40 => 3,  30 => 1,);
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

{% block global_attributes %}
    {% if field.selectize is defined %}
        {% set fieldSelectize = {create: field.selectize.create ?? true}|merge(field.selectize ?? {}) %}
        {% if field.merge_items %}
            {% set fieldSelectize = fieldSelectize|merge({'items':value}) %}
        {% endif %}
    {% else %}
        {% set fieldSelectize = {'create': true} %}
    {% endif %}
    data-grav-selectize=\"{{ fieldSelectize|json_encode()|e('html_attr') }}\"
    {{ parent() }}
{% endblock %}

{% block input_attributes %}
    type=\"text\"
    {{ parent() }}
{% endblock %}
", "forms/fields/selectize/selectize.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/selectize/selectize.html.twig");
    }
}
