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

/* config.html.twig */
class __TwigTemplate_36e72df0b034447cc79790ee3f87f2aeb53cc985a08c74960e780bdab0166feb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'titlebar' => [$this, 'block_titlebar'],
            'content_top' => [$this, 'block_content_top'],
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
        $context["configurations"] = $this->getAttribute(($context["admin"] ?? null), "configurations", [0 => true], "method");
        // line 4
        $context["config_slug"] = $this->getAttribute(($context["admin"] ?? null), "route", []);
        // line 5
        if ( !($context["config_slug"] ?? null)) {
            // line 6
            $context["config_slug"] = twig_first($this->env, ($context["configurations"] ?? null));
            // line 7
            $this->getAttribute(($context["admin"] ?? null), "redirect", [0 => ("config/" . ($context["config_slug"] ?? null)), 1 => 302], "method");
        }
        // line 9
        $context["isInfo"] = (($context["config_slug"] ?? null) == "info");
        // line 11
        $context["tab_title_string"] = ("PLUGIN_ADMIN." . twig_upper_filter($this->env, ($context["config_slug"] ?? null)));
        // line 12
        $context["tab_title"] = ((((($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, ($context["tab_title_string"] ?? null)) == ($context["tab_title_string"] ?? null))) ? (twig_capitalize_string_filter($this->env, ($context["config_slug"] ?? null))) : ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, ($context["tab_title_string"] ?? null))))) ? (((($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, ($context["tab_title_string"] ?? null)) == ($context["tab_title_string"] ?? null))) ? (twig_capitalize_string_filter($this->env, ($context["config_slug"] ?? null))) : ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, ($context["tab_title_string"] ?? null))))) : ("Not Found"));
        // line 13
        $context["title"] = (($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CONFIGURATION") . ": ") . ($context["tab_title"] ?? null));
        // line 15
        if ((($context["config_slug"] ?? null) &&  !($context["isInfo"] ?? null))) {
            // line 16
            $context["data"] = $this->getAttribute(($context["admin"] ?? null), "data", [0 => ("config/" . ($context["config_slug"] ?? null))], "method");
        }
        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "config.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 19
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 20
        echo "    ";
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/codemirror/codemirror.css")], "method");
        // line 21
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 24
    public function block_javascripts($context, array $blocks = [])
    {
        // line 25
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 28
    public function block_titlebar($context, array $blocks = [])
    {
        // line 29
        echo "    <div class=\"button-bar\">
        <a class=\"button\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/"), "html", null, true);
        echo "\"><i class=\"fa fa-reply\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.BACK"), "html", null, true);
        echo "</a>
        ";
        // line 31
        if ($this->getAttribute($this->getAttribute(($context["data"] ?? null), "file", []), "filename", [])) {
            // line 32
            echo "        <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SAVE"), "html", null, true);
            echo "</button>
        ";
        }
        // line 34
        echo "    </div>
    <h1><i class=\"fa fa-fw fa-wrench\"></i> ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CONFIGURATION"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, ($context["tab_title"] ?? null), "html", null, true);
        echo "</h1>
";
    }

    // line 38
    public function block_content_top($context, array $blocks = [])
    {
        // line 39
        echo "    ";
        if (($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize("admin.super") && $this->getAttribute($this->getAttribute(($context["data"] ?? null), "file", []), "filename", []))) {
            // line 40
            echo "    <div class=\"alert notice\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.SAVE_LOCATION"), "html", null, true);
            echo ": <b>";
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute(($context["data"] ?? null), "file", []), "filename", []), [($context["base_path"] ?? null) => ""]), "html", null, true);
            echo "</b></div>
    ";
        }
        // line 42
        echo "
    <div class=\"form-tabs\">
        <div class=\"tabs-nav\">
            ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["configurations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["configuration"]) {
            // line 46
            echo "                <a ";
            if ((($context["config_slug"] ?? null) == $context["configuration"])) {
                echo "class=\"active\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/config/" . $context["configuration"])), "html", null, true);
            echo "\">
                    ";
            // line 47
            $context["configuration_string"] = ("PLUGIN_ADMIN." . twig_upper_filter($this->env, $context["configuration"]));
            // line 48
            echo "                    <span>";
            echo twig_escape_filter($this->env, ((($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, ($context["configuration_string"] ?? null)) == ($context["configuration_string"] ?? null))) ? (twig_capitalize_string_filter($this->env, $context["configuration"])) : ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, ($context["configuration_string"] ?? null)))), "html", null, true);
            echo "</span>
                </a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['configuration'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "        </div>
    </div>
";
    }

    // line 55
    public function block_content($context, array $blocks = [])
    {
        // line 56
        echo "    ";
        $context["accessChangelog"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super"]);
        // line 57
        echo "    ";
        if (twig_in_filter(($context["config_slug"] ?? null), ($context["configurations"] ?? null))) {
            // line 58
            echo "        ";
            if (($context["isInfo"] ?? null)) {
                // line 59
                echo "            <div id=\"phpinfo\">
                ";
                // line 60
                if (($context["accessChangelog"] ?? null)) {
                    // line 61
                    echo "                <div style=\"margin-left:1.5rem\">
                    <a class=\"button button-big\" href=\"#\" style=\"text-align: center;\" data-remodal-target=\"changelog\" data-remodal-changelog=\"";
                    // line 62
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/changelog/type:plugins/slug:" . $this->getAttribute(($context["plugin"] ?? null), "slug", []))), "html", null, true);
                    echo "\"><i class=\"fa fa-binoculars\"></i> View Grav Changelog</a>
                </div>
                ";
                }
                // line 65
                echo "                ";
                echo $this->getAttribute(($context["admin"] ?? null), "phpinfo", []);
                echo "
            </div>
        ";
            } else {
                // line 68
                echo "            <div class=\"config-wrapper-";
                echo twig_escape_filter($this->env, ($context["config_slug"] ?? null), "html", null, true);
                echo "\">
            ";
                // line 69
                $this->loadTemplate("partials/blueprints.html.twig", "config.html.twig", 69)->display(twig_array_merge($context, ["blueprints" => $this->getAttribute(($context["data"] ?? null), "blueprints", []), "data" => ($context["data"] ?? null)]));
                // line 70
                echo "            </div>
        ";
            }
            // line 72
            echo "        ";
            $this->loadTemplate("partials/modal-changes-detected.html.twig", "config.html.twig", 72)->display($context);
            // line 73
            echo "        ";
            if (($context["accessChangelog"] ?? null)) {
                // line 74
                echo "        ";
                $this->loadTemplate("partials/modal-changelog.html.twig", "config.html.twig", 74)->display($context);
                // line 75
                echo "        ";
            }
            // line 76
            echo "    ";
        } else {
            // line 77
            echo "        ";
            $this->getAttribute(($context["page"] ?? null), "modifyHeader", [0 => "http_response_code", 1 => 404], "method");
            // line 78
            echo "        <div class=\"config-wrapper\">
            <h2>Not found</h2>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "config.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 78,  231 => 77,  228 => 76,  225 => 75,  222 => 74,  219 => 73,  216 => 72,  212 => 70,  210 => 69,  205 => 68,  198 => 65,  192 => 62,  189 => 61,  187 => 60,  184 => 59,  181 => 58,  178 => 57,  175 => 56,  172 => 55,  166 => 51,  156 => 48,  154 => 47,  145 => 46,  141 => 45,  136 => 42,  128 => 40,  125 => 39,  122 => 38,  114 => 35,  111 => 34,  105 => 32,  103 => 31,  97 => 30,  94 => 29,  91 => 28,  84 => 25,  81 => 24,  74 => 21,  71 => 20,  68 => 19,  63 => 1,  60 => 16,  58 => 15,  56 => 13,  54 => 12,  52 => 11,  50 => 9,  47 => 7,  45 => 6,  43 => 5,  41 => 4,  39 => 3,  33 => 1,);
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

{% set configurations = admin.configurations(true) %}
{% set config_slug = admin.route %}
{% if not config_slug %}
    {% set config_slug = configurations|first %}
    {% do admin.redirect('config/' ~ config_slug, 302) %}
{% endif %}
{% set isInfo = (config_slug == 'info') %}

{% set tab_title_string = \"PLUGIN_ADMIN.\" ~ config_slug|upper %}
{% set tab_title = (tab_title_string|t == tab_title_string ? config_slug|capitalize : tab_title_string|t)  ?: 'Not Found' %}
{% set title = \"PLUGIN_ADMIN.CONFIGURATION\"|t ~ \": \" ~ tab_title %}

{% if config_slug and not isInfo %}
    {% set data = admin.data('config/' ~ config_slug) %}
{% endif %}

{% block stylesheets %}
    {% do assets.addCss(theme_url ~ '/css/codemirror/codemirror.css') %}
    {{ parent() }}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
{% endblock %}

{% block titlebar %}
    <div class=\"button-bar\">
        <a class=\"button\" href=\"{{ admin_route('/') }}\"><i class=\"fa fa-reply\"></i> {{ \"PLUGIN_ADMIN.BACK\"|t }}</a>
        {% if data.file.filename %}
        <button class=\"button\" type=\"submit\" name=\"task\" value=\"save\" form=\"blueprints\"><i class=\"fa fa-check\"></i> {{ \"PLUGIN_ADMIN.SAVE\"|t }}</button>
        {% endif %}
    </div>
    <h1><i class=\"fa fa-fw fa-wrench\"></i> {{ \"PLUGIN_ADMIN.CONFIGURATION\"|t }} - {{ tab_title }}</h1>
{% endblock %}

{% block content_top %}
    {% if authorize('admin.super') and data.file.filename %}
    <div class=\"alert notice\">{{ \"PLUGIN_ADMIN.SAVE_LOCATION\"|t }}: <b>{{ data.file.filename|replace({(base_path):''}) }}</b></div>
    {% endif %}

    <div class=\"form-tabs\">
        <div class=\"tabs-nav\">
            {% for configuration in configurations %}
                <a {% if config_slug == configuration %}class=\"active\"{% endif %} href=\"{{ admin_route('/config/' ~ configuration) }}\">
                    {% set configuration_string = \"PLUGIN_ADMIN.\" ~ configuration|upper %}
                    <span>{{ (configuration_string|t == configuration_string ? configuration|capitalize : configuration_string|t) }}</span>
                </a>
            {% endfor %}
        </div>
    </div>
{% endblock %}

{% block content %}
    {% set accessChangelog = authorize(['admin.maintenance', 'admin.super']) %}
    {% if config_slug in configurations %}
        {% if isInfo %}
            <div id=\"phpinfo\">
                {% if accessChangelog %}
                <div style=\"margin-left:1.5rem\">
                    <a class=\"button button-big\" href=\"#\" style=\"text-align: center;\" data-remodal-target=\"changelog\" data-remodal-changelog=\"{{ admin_route('/changelog/type:plugins/slug:' ~ plugin.slug) }}\"><i class=\"fa fa-binoculars\"></i> View Grav Changelog</a>
                </div>
                {% endif %}
                {{ admin.phpinfo|raw }}
            </div>
        {% else %}
            <div class=\"config-wrapper-{{ config_slug }}\">
            {% include 'partials/blueprints.html.twig' with { blueprints: data.blueprints, data: data } %}
            </div>
        {% endif %}
        {% include 'partials/modal-changes-detected.html.twig' %}
        {% if accessChangelog %}
        {% include 'partials/modal-changelog.html.twig' %}
        {% endif %}
    {% else %}
        {% do page.modifyHeader('http_response_code', 404) %}
        <div class=\"config-wrapper\">
            <h2>Not found</h2>
        </div>
    {% endif %}
{% endblock %}
", "config.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/config.html.twig");
    }
}
