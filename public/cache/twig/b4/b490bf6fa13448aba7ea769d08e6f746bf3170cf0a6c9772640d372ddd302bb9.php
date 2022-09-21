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

/* partials/login.html.twig */
class __TwigTemplate_5a8ebf164ccf2b23f07d20ac92f3f5df49d71d90fa36c2fb956630220c9dd05a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'messages' => [$this, 'block_messages'],
            'body' => [$this, 'block_body'],
            'instructions' => [$this, 'block_instructions'],
            'integration' => [$this, 'block_integration'],
            'form' => [$this, 'block_form'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["scope"] = $this->getAttribute(($context["form"] ?? null), "scope", []);
        // line 3
        $context["field_layout"] = "admin";
        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "partials/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_messages($context, array $blocks = [])
    {
    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        // line 8
        echo "<body id=\"admin-login-wrapper\">
    <section id=\"admin-login\" class=\"login-box-shadow ";
        // line 9
        echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
        echo "\">

        ";
        // line 11
        $this->loadTemplate("partials/login-logo.html.twig", "partials/login.html.twig", 11)->display($context);
        // line 12
        echo "
        ";
        // line 13
        $this->loadTemplate("partials/messages.html.twig", "partials/login.html.twig", 13)->display($context);
        // line 14
        echo "
        ";
        // line 15
        $this->displayBlock('instructions', $context, $blocks);
        // line 16
        echo "
        ";
        // line 17
        $this->displayBlock('integration', $context, $blocks);
        // line 18
        echo "
        <form method=\"post\" action=\"\">
            <div class=\"padding\">
                ";
        // line 21
        $this->displayBlock('form', $context, $blocks);
        // line 22
        echo "                ";
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->nonceFieldFunc($this->getAttribute(($context["form"] ?? null), "getNonceAction", [], "method"), $this->getAttribute(($context["form"] ?? null), "getNonceName", [], "method"));
        echo "
            </div>
        </form>

        <script>
            \$(document).ready( function() {
                \$('#messages').delay(5000).animate({ height: 'toggle', opacity: 'toggle' }, 'slow');
            });
        </script>
    </section>
</body>
";
    }

    // line 15
    public function block_instructions($context, array $blocks = [])
    {
    }

    // line 17
    public function block_integration($context, array $blocks = [])
    {
    }

    // line 21
    public function block_form($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "partials/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 21,  110 => 17,  105 => 15,  88 => 22,  86 => 21,  81 => 18,  79 => 17,  76 => 16,  74 => 15,  71 => 14,  69 => 13,  66 => 12,  64 => 11,  59 => 9,  56 => 8,  53 => 7,  48 => 5,  43 => 1,  41 => 3,  39 => 2,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'partials/base.html.twig' %}
{% set scope = form.scope %}
{% set field_layout = 'admin' %}

{% block messages %}{% endblock %}

{% block body %}
<body id=\"admin-login-wrapper\">
    <section id=\"admin-login\" class=\"login-box-shadow {{ classes }}\">

        {% include 'partials/login-logo.html.twig' %}

        {% include 'partials/messages.html.twig' %}

        {% block instructions %}{% endblock %}

        {% block integration %}{% endblock %}

        <form method=\"post\" action=\"\">
            <div class=\"padding\">
                {% block form %}{% endblock %}
                {{ nonce_field(form.getNonceAction(), form.getNonceName())|raw }}
            </div>
        </form>

        <script>
            \$(document).ready( function() {
                \$('#messages').delay(5000).animate({ height: 'toggle', opacity: 'toggle' }, 'slow');
            });
        </script>
    </section>
</body>
{% endblock %}
", "partials/login.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/login.html.twig");
    }
}
