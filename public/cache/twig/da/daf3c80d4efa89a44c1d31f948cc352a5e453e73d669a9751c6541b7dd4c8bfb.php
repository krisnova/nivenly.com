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

/* forms/fields/section/section.html.twig */
class __TwigTemplate_db311520f1376242e1e436e1b6267fc3709640f3ea4bc1a7f5212f64c6d804dd extends \Twig\Template
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
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/section/section.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = [])
    {
        // line 4
        if ((twig_test_empty($this->getAttribute(($context["field"] ?? null), "security", [])) || $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->arrayFilter($this->getAttribute(($context["field"] ?? null), "security", []))))) {
            // line 5
            echo "
    ";
            // line 6
            if (($this->getAttribute(($context["field"] ?? null), "title", []) || $this->getAttribute(($context["field"] ?? null), "underline", []))) {
                // line 7
                echo "    <h1 class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
                echo " ";
                (($this->getAttribute(($context["field"] ?? null), "underline", [])) ? (print (twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "underline", []), "html", null, true))) : (print ("no_underline")));
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "title", [])), "html", null, true);
                echo "</h1>
    ";
            }
            // line 9
            echo "
    ";
            // line 10
            if ($this->getAttribute(($context["field"] ?? null), "text", [])) {
                // line 11
                echo "    <p>";
                echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->markdownFunction($context, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "text", [])));
                echo "</p>
    ";
            }
            // line 13
            echo "
    ";
            // line 14
            $this->loadTemplate("forms/fields/section/section.html.twig", "forms/fields/section/section.html.twig", 14, "468984265")->display(twig_array_merge($context, ["name" => $this->getAttribute(($context["field"] ?? null), "name", []), "fields" => $this->getAttribute(($context["field"] ?? null), "fields", [])]));
            // line 22
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "forms/fields/section/section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 22,  73 => 14,  70 => 13,  64 => 11,  62 => 10,  59 => 9,  49 => 7,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  29 => 1,);
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
{% if field.security is empty or authorize(array(field.security)) %}

    {% if field.title or field.underline %}
    <h1 class=\"{{ field.classes }} {{ field.underline ?: 'no_underline' }}\">{{ field.title|t }}</h1>
    {% endif %}

    {% if field.text %}
    <p>{{ field.text|t|markdown|raw }}</p>
    {% endif %}

    {% embed 'forms/default/fields.html.twig' with {name: field.name, fields: field.fields} %}
        {% block outer_markup_field_open %}
            <div class=\"form-section {{ field.field_classes }} {{ field.outer_classes }}\">
        {% endblock %}
        {% block outer_markup_field_close %}
            </div>
        {% endblock %}
    {% endembed %}

{% endif %}
{% endblock %}
", "forms/fields/section/section.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/section/section.html.twig");
    }
}


/* forms/fields/section/section.html.twig */
class __TwigTemplate_db311520f1376242e1e436e1b6267fc3709640f3ea4bc1a7f5212f64c6d804dd___468984265 extends \Twig\Template
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
        // line 14
        return "forms/default/fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/default/fields.html.twig", "forms/fields/section/section.html.twig", 14);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_outer_markup_field_open($context, array $blocks = [])
    {
        // line 16
        echo "            <div class=\"form-section ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "field_classes", []), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "outer_classes", []), "html", null, true);
        echo "\">
        ";
    }

    // line 18
    public function block_outer_markup_field_close($context, array $blocks = [])
    {
        // line 19
        echo "            </div>
        ";
    }

    public function getTemplateName()
    {
        return "forms/fields/section/section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 19,  172 => 18,  163 => 16,  160 => 15,  150 => 14,  75 => 22,  73 => 14,  70 => 13,  64 => 11,  62 => 10,  59 => 9,  49 => 7,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  29 => 1,);
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
{% if field.security is empty or authorize(array(field.security)) %}

    {% if field.title or field.underline %}
    <h1 class=\"{{ field.classes }} {{ field.underline ?: 'no_underline' }}\">{{ field.title|t }}</h1>
    {% endif %}

    {% if field.text %}
    <p>{{ field.text|t|markdown|raw }}</p>
    {% endif %}

    {% embed 'forms/default/fields.html.twig' with {name: field.name, fields: field.fields} %}
        {% block outer_markup_field_open %}
            <div class=\"form-section {{ field.field_classes }} {{ field.outer_classes }}\">
        {% endblock %}
        {% block outer_markup_field_close %}
            </div>
        {% endblock %}
    {% endembed %}

{% endif %}
{% endblock %}
", "forms/fields/section/section.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/section/section.html.twig");
    }
}
