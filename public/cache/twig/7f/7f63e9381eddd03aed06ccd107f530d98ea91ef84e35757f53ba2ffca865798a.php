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

/* forms/default/fields.html.twig */
class __TwigTemplate_741277358f2d508423de02e22a5f788c1c4f1604abaefb686ea8fe5c470412f6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'outer_markup_field_open' => [$this, 'block_outer_markup_field_open'],
            'inner_markup_field_open' => [$this, 'block_inner_markup_field_open'],
            'field' => [$this, 'block_field'],
            'inner_markup_field_close' => [$this, 'block_inner_markup_field_close'],
            'outer_markup_field_close' => [$this, 'block_outer_markup_field_close'],
            'empty_fields_markup' => [$this, 'block_empty_fields_markup'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["fields"] = $this->env->getExtension('Grav\Plugin\Form\TwigExtension')->prepareFormFields($context, ($context["fields"] ?? null), ($context["name"] ?? null));
        // line 2
        $context["originalValue"] = null;
        // line 3
        if (twig_length_filter($this->env, ($context["fields"] ?? null))) {
            // line 4
            echo "  ";
            $this->displayBlock('outer_markup_field_open', $context, $blocks);
            // line 5
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["field_name"] => $context["field"]) {
                // line 6
                echo "    ";
                $context["value"] = ((($context["form"] ?? null)) ? ($this->getAttribute(($context["form"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")) : ($this->getAttribute(($context["data"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")));
                // line 7
                echo "    ";
                $context["field_templates"] = $this->env->getExtension('Grav\Plugin\Form\TwigExtension')->includeFormField($this->getAttribute($context["field"], "type", []), ($context["field_layout"] ?? null), (($context["fallback_field"]) ?? ("text")));
                // line 8
                echo "    ";
                $this->displayBlock('inner_markup_field_open', $context, $blocks);
                // line 9
                echo "    ";
                $this->displayBlock('field', $context, $blocks);
                // line 12
                echo "    ";
                $this->displayBlock('inner_markup_field_close', $context, $blocks);
                // line 13
                echo "  ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "  ";
            $this->displayBlock('outer_markup_field_close', $context, $blocks);
        } else {
            // line 16
            echo "  ";
            $this->displayBlock('empty_fields_markup', $context, $blocks);
        }
    }

    // line 4
    public function block_outer_markup_field_open($context, array $blocks = [])
    {
    }

    // line 8
    public function block_inner_markup_field_open($context, array $blocks = [])
    {
    }

    // line 9
    public function block_field($context, array $blocks = [])
    {
        // line 10
        echo "        ";
        $this->loadTemplate(($context["field_templates"] ?? null), "forms/default/fields.html.twig", 10)->display($context);
        // line 11
        echo "    ";
    }

    // line 12
    public function block_inner_markup_field_close($context, array $blocks = [])
    {
    }

    // line 14
    public function block_outer_markup_field_close($context, array $blocks = [])
    {
    }

    // line 16
    public function block_empty_fields_markup($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "forms/default/fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 16,  127 => 14,  122 => 12,  118 => 11,  115 => 10,  112 => 9,  107 => 8,  102 => 4,  96 => 16,  92 => 14,  78 => 13,  75 => 12,  72 => 9,  69 => 8,  66 => 7,  63 => 6,  45 => 5,  42 => 4,  40 => 3,  38 => 2,  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set fields = prepare_form_fields(fields, name) %}
{% set originalValue = null %}
{% if fields|length %}
  {% block outer_markup_field_open %}{% endblock %}
  {% for field_name, field in fields %}
    {% set value = form ? form.value(field.name) : data.value(field.name) %}
    {% set field_templates = include_form_field(field.type, field_layout, fallback_field ?? 'text') %}
    {% block inner_markup_field_open %}{% endblock %}
    {% block field %}
        {% include field_templates %}
    {% endblock %}
    {% block inner_markup_field_close %}{% endblock %}
  {% endfor %}
  {% block outer_markup_field_close %}{% endblock %}
{% else %}
  {% block empty_fields_markup %}{% endblock %}
{% endif %}
", "forms/default/fields.html.twig", "/var/www/html/user/plugins/form/templates/forms/default/fields.html.twig");
    }
}
