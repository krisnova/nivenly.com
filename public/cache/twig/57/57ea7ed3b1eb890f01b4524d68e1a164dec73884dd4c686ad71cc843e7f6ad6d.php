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

/* themes.html.twig */
class __TwigTemplate_f37ee151761eb11f54eb1db8c2ca9817d6a227c56125348a7ac5013103654415 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'titlebar' => [$this, 'block_titlebar'],
            'messages' => [$this, 'block_messages'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        if ($this->getAttribute(($context["admin"] ?? null), "route", [])) {
            // line 4
            $context["installing"] = (is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $this->getAttribute(($context["admin"] ?? null), "route", [])) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "install") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)));
            // line 6
            if (($context["installing"] ?? null)) {
                // line 7
                $context["title"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.THEMES");
            } else {
                // line 9
                $context["installed"] = true;
                // line 12
                $context["package"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "themes", [0 => true], "method"), $this->getAttribute(($context["admin"] ?? null), "route", []), [], "array");
                // line 13
                if ( !($context["package"] ?? null)) {
                    // line 14
                    $context["package"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "themes", [0 => false], "method"), $this->getAttribute(($context["admin"] ?? null), "route", []), [], "array");
                    // line 15
                    $context["installed"] = false;
                }
                // line 18
                $context["theme"] = $this->getAttribute(($context["package"] ?? null), "toArray", [], "method");
                // line 19
                $context["state"] = ((($this->getAttribute(($context["config"] ?? null), "get", [0 => "system.pages.theme"], "method") == $this->getAttribute(($context["theme"] ?? null), "slug", []))) ? ("active") : ("inactive"));
                // line 21
                $context["title"] = (($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.THEME") . ": ") . $this->getAttribute(($context["theme"] ?? null), "name", []));
            }
        } else {
            // line 24
            $context["title"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.THEMES");
        }
        // line 27
        if (($this->getAttribute(($context["admin"] ?? null), "route", []) || ($context["installing"] ?? null))) {
        }
        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "themes.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 29
        echo "        ";
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/codemirror/codemirror.css")], "method");
        // line 30
        echo "        ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
    }

    // line 33
    public function block_javascripts($context, array $blocks = [])
    {
        // line 34
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
    }

    // line 38
    public function block_titlebar($context, array $blocks = [])
    {
        // line 39
        echo "    ";
        if (( !$this->getAttribute(($context["admin"] ?? null), "route", []) || ($context["installing"] ?? null))) {
            // line 40
            echo "        <div class=\"button-bar\">
        ";
            // line 41
            if (($context["installing"] ?? null)) {
                // line 42
                echo "            <a class=\"button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/themes"), "html", null, true);
                echo "\"><i class=\"fa fa-reply\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.BACK"), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 44
                echo "            <a class=\"button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/"), "html", null, true);
                echo "\"><i class=\"fa fa-reply\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.BACK"), "html", null, true);
                echo "</a>
            <a class=\"button\" href=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/themes/install"), "html", null, true);
                echo "\"><i class=\"fa fa-plus\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.ADD"), "html", null, true);
                echo "</a>
            ";
                // line 46
                if ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super"])) {
                    // line 47
                    echo "                <button data-gpm-checkupdates=\"\" class=\"button\"><i class=\"fa fa-refresh\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CHECK_FOR_UPDATES"), "html", null, true);
                    echo "</button>
            ";
                }
                // line 49
                echo "        ";
            }
            // line 50
            echo "        </div>
        <h1><i class=\"fa fa-fw fa-tint\"></i> ";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.THEMES"), "html", null, true);
            echo "</h1>
    ";
        } else {
            // line 53
            echo "        ";
            if (($context["installed"] ?? null)) {
                // line 54
                echo "        <div class=\"button-bar\">
            <a class=\"button\" href=\"";
                // line 55
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/themes"), "html", null, true);
                echo "\"><i class=\"fa fa-arrow-left\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.BACK_TO_THEMES"), "html", null, true);
                echo "</a>
            ";
                // line 56
                if ((($context["state"] ?? null) == "active")) {
                    // line 57
                    echo "            <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SAVE"), "html", null, true);
                    echo "</button>
            ";
                }
                // line 59
                echo "        </div>
        ";
            } else {
                // line 61
                echo "        <div class=\"button-bar\">
            <a class=\"button\" href=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/themes/install"), "html", null, true);
                echo "\"><i class=\"fa fa-arrow-left\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.BACK_TO_THEMES"), "html", null, true);
                echo "</a>
        </div>
        ";
            }
            // line 65
            echo "        <h1><i class=\"fa fa-fw fa-tint\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.THEME"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "name", []), "html", null, true);
            echo "</h1>
    ";
        }
    }

    // line 69
    public function block_messages($context, array $blocks = [])
    {
        // line 70
        echo "    ";
        $this->displayParentBlock("messages", $context, $blocks);
        echo "
    ";
        // line 71
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "notifications", []), "themes", [])) {
            // line 72
            echo "        <div class=\"themes-notifications-container hidden\"></div>
    ";
        }
    }

    // line 76
    public function block_content($context, array $blocks = [])
    {
        // line 77
        echo "    <div class=\"gpm gpm-themes\">
        ";
        // line 78
        if (( !$this->getAttribute(($context["admin"] ?? null), "route", []) || ($context["installing"] ?? null))) {
            // line 79
            echo "            ";
            $this->loadTemplate("partials/themes-list.html.twig", "themes.html.twig", 79)->display($context);
            // line 80
            echo "        ";
        } else {
            // line 81
            echo "            ";
            if ((null === ($context["theme"] ?? null))) {
                // line 82
                echo "                ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->redirectFunc((($context["base_url_relative"] ?? null) . "/404")), "html", null, true);
                echo "
            ";
            }
            // line 84
            echo "            ";
            $this->loadTemplate("partials/themes-details.html.twig", "themes.html.twig", 84)->display($context);
            // line 85
            echo "        ";
        }
        // line 86
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "themes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 86,  239 => 85,  236 => 84,  230 => 82,  227 => 81,  224 => 80,  221 => 79,  219 => 78,  216 => 77,  213 => 76,  207 => 72,  205 => 71,  200 => 70,  197 => 69,  187 => 65,  179 => 62,  176 => 61,  172 => 59,  166 => 57,  164 => 56,  158 => 55,  155 => 54,  152 => 53,  147 => 51,  144 => 50,  141 => 49,  135 => 47,  133 => 46,  127 => 45,  120 => 44,  112 => 42,  110 => 41,  107 => 40,  104 => 39,  101 => 38,  94 => 34,  91 => 33,  84 => 30,  81 => 29,  78 => 28,  73 => 1,  70 => 27,  67 => 24,  63 => 21,  61 => 19,  59 => 18,  56 => 15,  54 => 14,  52 => 13,  50 => 12,  48 => 9,  45 => 7,  43 => 6,  41 => 4,  39 => 3,  33 => 1,);
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

{% if admin.route %}
    {% set installing = admin.route starts with 'install' %}

    {% if installing %}
        {% set title = \"PLUGIN_ADMIN.THEMES\"|t %}
    {% else %}
        {% set installed = true %}

        {# Try installed packages first, then remote #}
        {% set package = admin.themes(true)[admin.route] %}
        {% if (not package) %}
            {% set package = admin.themes(false)[admin.route] %}
            {% set installed = false %}
        {% endif %}

        {% set theme = package.toArray() %}
        {% set state = config.get('system.pages.theme') == theme.slug ? 'active' : 'inactive' %}

        {% set title = \"PLUGIN_ADMIN.THEME\"|t ~ \": \" ~ theme.name %}
    {% endif %}
{% else %}
    {% set title = \"PLUGIN_ADMIN.THEMES\"|t %}
{% endif %}

{% if admin.route or installing %}
    {% block stylesheets %}
        {% do assets.addCss(theme_url~'/css/codemirror/codemirror.css') %}
        {{ parent() }}
    {% endblock %}

    {% block javascripts %}
        {{ parent() }}
    {% endblock %}
{% endif %}

{% block titlebar %}
    {% if not admin.route or installing %}
        <div class=\"button-bar\">
        {% if (installing) %}
            <a class=\"button\" href=\"{{ admin_route('/themes') }}\"><i class=\"fa fa-reply\"></i> {{ \"PLUGIN_ADMIN.BACK\"|t }}</a>
        {% else %}
            <a class=\"button\" href=\"{{ admin_route('/') }}\"><i class=\"fa fa-reply\"></i> {{ \"PLUGIN_ADMIN.BACK\"|t }}</a>
            <a class=\"button\" href=\"{{ admin_route('/themes/install') }}\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.ADD\"|t }}</a>
            {% if authorize(['admin.maintenance', 'admin.super']) %}
                <button data-gpm-checkupdates=\"\" class=\"button\"><i class=\"fa fa-refresh\"></i> {{ \"PLUGIN_ADMIN.CHECK_FOR_UPDATES\"|t }}</button>
            {% endif %}
        {% endif %}
        </div>
        <h1><i class=\"fa fa-fw fa-tint\"></i> {{ \"PLUGIN_ADMIN.THEMES\"|t }}</h1>
    {% else %}
        {% if (installed) %}
        <div class=\"button-bar\">
            <a class=\"button\" href=\"{{ admin_route('/themes') }}\"><i class=\"fa fa-arrow-left\"></i> {{ \"PLUGIN_ADMIN.BACK_TO_THEMES\"|t }}</a>
            {% if state == 'active' %}
            <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> {{ \"PLUGIN_ADMIN.SAVE\"|t }}</button>
            {% endif %}
        </div>
        {% else %}
        <div class=\"button-bar\">
            <a class=\"button\" href=\"{{ admin_route('/themes/install') }}\"><i class=\"fa fa-arrow-left\"></i> {{ \"PLUGIN_ADMIN.BACK_TO_THEMES\"|t }}</a>
        </div>
        {% endif %}
        <h1><i class=\"fa fa-fw fa-tint\"></i> {{ \"PLUGIN_ADMIN.THEME\"|t }}: {{ theme.name }}</h1>
    {% endif %}
{% endblock %}

{% block messages %}
    {{ parent() }}
    {% if config.plugins.admin.notifications.themes %}
        <div class=\"themes-notifications-container hidden\"></div>
    {% endif %}
{% endblock %}

{% block content %}
    <div class=\"gpm gpm-themes\">
        {% if not admin.route or installing %}
            {%  include 'partials/themes-list.html.twig' %}
        {% else %}
            {% if theme is null %}
                {{redirect_me(base_url_relative ~ '/404')}}
            {% endif %}
            {% include 'partials/themes-details.html.twig' %}
        {% endif %}
    </div>
{% endblock %}
", "themes.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/themes.html.twig");
    }
}
