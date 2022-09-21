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

/* forms/fields/tab/tab.html.twig */
class __TwigTemplate_c1a21bb1e1597135ef7a6631b4cf3eb72e3eae48fc69196c789b371438506850 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/tab/tab.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = [])
    {
        // line 4
        echo "  ";
        $this->loadTemplate("forms/fields/tab/tab.html.twig", "forms/fields/tab/tab.html.twig", 4, "726228683")->display(twig_array_merge($context, ["name" => $this->getAttribute(($context["field"] ?? null), "name", []), "fields" => $this->getAttribute(($context["field"] ?? null), "fields", [])]));
    }

    public function getTemplateName()
    {
        return "forms/fields/tab/tab.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  39 => 3,  29 => 1,);
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

{% block field %}
  {% embed 'forms/default/fields.html.twig' with {name: field.name, fields: field.fields} %}
    {% block outer_markup_field_open %}<div class=\"form-tab\">{% endblock %}
    {% block outer_markup_field_close %}</div>{% endblock %}
  {% endembed %}
{% endblock %}", "forms/fields/tab/tab.html.twig", "/var/www/html/user/plugins/form/templates/forms/fields/tab/tab.html.twig");
    }
}


/* forms/fields/tab/tab.html.twig */
class __TwigTemplate_c1a21bb1e1597135ef7a6631b4cf3eb72e3eae48fc69196c789b371438506850___726228683 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'outer_markup_field_open' => [$this, 'block_outer_markup_field_open'],
            'outer_markup_field_close' => [$this, 'block_outer_markup_field_close'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "forms/default/fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/default/fields.html.twig", "forms/fields/tab/tab.html.twig", 4);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_outer_markup_field_open($context, array $blocks = [])
    {
        echo "<div class=\"form-tab\">";
    }

    // line 6
    public function block_outer_markup_field_close($context, array $blocks = [])
    {
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "forms/fields/tab/tab.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 6,  108 => 5,  42 => 4,  39 => 3,  29 => 1,);
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

{% block field %}
  {% embed 'forms/default/fields.html.twig' with {name: field.name, fields: field.fields} %}
    {% block outer_markup_field_open %}<div class=\"form-tab\">{% endblock %}
    {% block outer_markup_field_close %}</div>{% endblock %}
  {% endembed %}
{% endblock %}", "forms/fields/tab/tab.html.twig", "/var/www/html/user/plugins/form/templates/forms/fields/tab/tab.html.twig");
    }
}
