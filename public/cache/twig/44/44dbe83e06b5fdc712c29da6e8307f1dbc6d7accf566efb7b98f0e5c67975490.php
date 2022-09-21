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

/* partials/register.html.twig */
class __TwigTemplate_35a93dc45f79459c7199b91b95c0612a6bd311182f8784e1ae01a74484645011 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'instructions' => [$this, 'block_instructions'],
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
        $this->parent = $this->loadTemplate("partials/base.html.twig", "partials/register.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        // line 6
        echo "<body id=\"admin-login-wrapper\">
    <section id=\"admin-login\" class=\"default-glow-shadow ";
        // line 7
        echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 8
        $this->loadTemplate("partials/login-logo.html.twig", "partials/register.html.twig", 8)->display($context);
        // line 9
        echo "
        ";
        // line 10
        $this->loadTemplate("partials/messages.html.twig", "partials/register.html.twig", 10)->display($context);
        // line 11
        echo "
        ";
        // line 12
        $this->displayBlock('instructions', $context, $blocks);
        // line 13
        echo "
        <form method=\"post\" action=\"\">
            <div class=\"padding\">
                ";
        // line 16
        $this->displayBlock('form', $context, $blocks);
        // line 17
        echo "                ";
        $this->loadTemplate("forms/fields/formname/formname.html.twig", "partials/register.html.twig", 17)->display($context);
        // line 18
        echo "                ";
        $this->loadTemplate("forms/fields/uniqueid/uniqueid.html.twig", "partials/register.html.twig", 18)->display($context);
        // line 19
        echo "                ";
        echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->nonceFieldFunc(((($this->getAttribute(($context["form"] ?? null), "getNonceAction", [], "method", true, true) &&  !(null === $this->getAttribute(($context["form"] ?? null), "getNonceAction", [], "method")))) ? ($this->getAttribute(($context["form"] ?? null), "getNonceAction", [], "method")) : ("form")), ((($this->getAttribute(($context["form"] ?? null), "getNonceName", [], "method", true, true) &&  !(null === $this->getAttribute(($context["form"] ?? null), "getNonceName", [], "method")))) ? ($this->getAttribute(($context["form"] ?? null), "getNonceName", [], "method")) : ("form-nonce")));
        echo "
            </div>
        </form>
    </section>
</body>
";
    }

    // line 12
    public function block_instructions($context, array $blocks = [])
    {
    }

    // line 16
    public function block_form($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "partials/register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 16,  92 => 12,  81 => 19,  78 => 18,  75 => 17,  73 => 16,  68 => 13,  66 => 12,  63 => 11,  61 => 10,  58 => 9,  56 => 8,  52 => 7,  49 => 6,  46 => 5,  41 => 1,  39 => 3,  37 => 2,  31 => 1,);
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

{% block body %}
<body id=\"admin-login-wrapper\">
    <section id=\"admin-login\" class=\"default-glow-shadow {{ classes }}\">
        {% include 'partials/login-logo.html.twig' %}

        {% include 'partials/messages.html.twig' %}

        {% block instructions %}{% endblock %}

        <form method=\"post\" action=\"\">
            <div class=\"padding\">
                {% block form %}{% endblock %}
                {% include \"forms/fields/formname/formname.html.twig\" %}
                {% include 'forms/fields/uniqueid/uniqueid.html.twig' %}
                {{ nonce_field(form.getNonceAction() ?? 'form', form.getNonceName() ?? 'form-nonce')|raw }}
            </div>
        </form>
    </section>
</body>
{% endblock %}
", "partials/register.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/register.html.twig");
    }
}
