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

/* partials/themes-list.html.twig */
class __TwigTemplate_de23da80ac704488e399f2f0994795a3074a57095b7d0949b7e7b33e08ed6437 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["gumroad_loaded"] = false;
        // line 2
        echo "<div class=\"grav-update themes\"></div>
";
        // line 3
        if (($context["installing"] ?? null)) {
            // line 4
            echo "    ";
            $this->loadTemplate("partials/release-toggle.html.twig", "partials/themes-list.html.twig", 4)->display($context);
        }
        // line 6
        $this->loadTemplate("partials/list-sort.html.twig", "partials/themes-list.html.twig", 6)->display(twig_array_merge($context, ["list_view" => "themes"]));
        // line 7
        echo "<h1>
    ";
        // line 8
        echo twig_escape_filter($this->env, ((($context["installing"] ?? null)) ? ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.AVAILABLE_THEMES")) : ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.INSTALLED_THEMES"))), "html", null, true);
        echo "
</h1>
<form>
    <div class=\"gpm-search\">
        <input type=\"text\" placeholder=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.RESOURCE_FILTER"), "html", null, true);
        echo "\" data-gpm-filter>
    </div>
</form>

<div class=\"themes card-row grid fixed-blocks pure-g\">
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->ksortFilter($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "themes", [0 =>  !($context["installing"] ?? null)], "method"), "toArray", [])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["slug"] => $context["theme"]) {
            // line 18
            echo "        ";
            $context["state"] = "inactive";
            // line 19
            echo "        ";
            if (($context["installing"] ?? null)) {
                $context["state"] = "installing";
            }
            // line 20
            echo "        ";
            if (($this->getAttribute(($context["config"] ?? null), "get", [0 => "system.pages.theme"], "method") == $context["slug"])) {
                $context["state"] = "active";
            }
            // line 21
            echo "        ";
            $context["isTestingRelease"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "isTestingRelease", [0 => $context["slug"]], "method");
            // line 22
            echo "        ";
            $context["isPremium"] = $this->getAttribute(($context["admin"] ?? null), "isPremiumProduct", [0 => $context["theme"]], "method");
            // line 23
            echo "        ";
            $context["releaseDate"] = (($this->getAttribute($context["theme"], "date", [])) ? ($this->getAttribute($context["theme"], "date", [])) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "findPackage", [0 => $context["slug"], 1 => true], "method"), "date", [])));
            // line 24
            echo "
        <div class=\"theme card-item pure-u-1-3 ";
            // line 25
            echo twig_escape_filter($this->env, ($context["state"] ?? null), "html", null, true);
            echo "-theme\" data-gpm-theme=\"";
            echo twig_escape_filter($this->env, twig_urlencode_filter($context["slug"]), "html", null, true);
            echo "\" data-gpm-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", []), "html", null, true);
            echo "\" data-gpm-release-date=\"";
            echo twig_escape_filter($this->env, ($context["releaseDate"] ?? null), "html", null, true);
            echo "\" data-gpm-author=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "author", []), "name", []), "html", null, true);
            echo "\" data-gpm-official=\"";
            echo (($this->getAttribute(($context["admin"] ?? null), "isTeamGrav", [0 => $context["theme"]], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-updatable=\"";
            echo (($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "isUpdatable", [0 => $context["slug"]], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-enabled=\"";
            echo (($this->getAttribute(($context["data"] ?? null), "get", [0 => "enabled"], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-testing=\"";
            echo ((($context["isTestingRelease"] ?? null)) ? ("1") : ("2"));
            echo "\" data-gpm-premium=\"";
            echo ((($context["isPremium"] ?? null)) ? ("1") : ("2"));
            echo "\">
            <div class=\"gpm-name\">
                <i class=\"fa fa-fw fa-";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "icon", []), "html", null, true);
            echo "\"></i>
                <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/themes/" . twig_urlencode_filter($context["slug"]))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", []), "html", null, true);
            echo "</a>
                ";
            // line 29
            if ($this->getAttribute(($context["admin"] ?? null), "isTeamGrav", [0 => $context["theme"]], "method")) {
                // line 30
                echo "                    <small><span class=\"info-reverse\"><i class=\"fa fa-check-circle\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.GRAV_OFFICIAL_THEME"), "html", null, true);
                echo "\"></i></span></small>
                ";
            }
            // line 32
            echo "                ";
            if (($context["isPremium"] ?? null)) {
                // line 33
                echo "                    ";
                if ( !($context["gumroad_loaded"] ?? null)) {
                    // line 34
                    echo "                        ";
                    $context["gumroad_loaded"] = true;
                    // line 35
                    echo "                        <script src=\"//gumroad.com/js/gumroad.js\"></script>
                    ";
                }
                // line 37
                echo "                    <small><span class=\"badge warning premium\"><i class=\"fa fa-star-o\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.PREMIUM_PRODUCT"), "html", null, true);
                echo "</span></small>
                ";
            }
            // line 39
            echo "                ";
            if ($this->getAttribute($context["theme"], "symlink", [])) {
                // line 40
                echo "                    <span class=\"hint--bottom\"  data-hint=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.THEME_SYMBOLICALLY_LINKED"), "html", null, true);
                echo "\">
                    <i class=\"fa fa-fw fa-link\"></i>
                </span>
                ";
            }
            // line 44
            echo "                <span class=\"gpm-version\">v";
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "version", []), "html", null, true);
            echo "</span>
                ";
            // line 45
            if (($context["isTestingRelease"] ?? null)) {
                echo "<span class=\"gpm-testing\">test release</span>";
            }
            // line 46
            echo "            </div>
            <div class=\"gpm-screenshot\">
                ";
            // line 48
            $context["thumb"] = ((($context["installing"] ?? null)) ? (("//getgrav.org/images/" . $this->getAttribute($context["theme"], "screenshot", []))) : ($this->getAttribute($context["theme"], "thumbnail", [])));
            // line 49
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/themes/" . twig_urlencode_filter($context["slug"]))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, ($context["thumb"] ?? null), "html", null, true);
            echo "\" /></a>
            </div>
            ";
            // line 51
            if ((($context["state"] ?? null) == "installing")) {
                // line 52
                echo "                <div class=\"gpm-actions\">
                    ";
                // line 53
                if (($this->getAttribute($context["theme"], "premium", []) &&  !$this->getAttribute(($context["admin"] ?? null), "license", [0 => $this->getAttribute($context["theme"], "slug", [])], "method"))) {
                    // line 54
                    echo "                        ";
                    if ( !($context["gumroad_loaded"] ?? null)) {
                        // line 55
                        echo "                            ";
                        $context["gumroad_loaded"] = true;
                        // line 56
                        echo "                            <script src=\"//gumroad.com/js/gumroad.js\"></script>
                        ";
                    }
                    // line 58
                    echo "                        <a class=\"gumroad-button button\" href=\"https://gum.co/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "premium", []), "permalink", []), "html", null, true);
                    echo "\" target=\"_blank\" data-gumroad-single-product=\"true\"><i class=\"fa fa-shopping-cart\"></i> ";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["theme"], "premium", [], "any", false, true), "button", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["theme"], "premium", [], "any", false, true), "button", []), "Purchase")) : ("Purchase")), "html", null, true);
                    echo "</a>
                    ";
                } else {
                    // line 60
                    echo "                        <a class=\"button\" href=\"#\" data-remodal-target=\"add-package\" data-packages-slugs=\"";
                    echo twig_escape_filter($this->env, $context["slug"], "html", null, true);
                    echo "\" data-theme-action=\"start-package-installation\"><i class=\"fa fa-plus\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.INSTALL"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 62
                echo "
                </div>
            ";
            } elseif ((            // line 64
($context["state"] ?? null) == "active")) {
                // line 65
                echo "                <div class=\"gpm-actions\">
                    <i class=\"fa fa-star\"></i> ";
                // line 66
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.ACTIVE_THEME"), "html", null, true);
                echo "
                </div>
            ";
            } else {
                // line 69
                echo "                <a data-remodal-target=\"theme-switch-warn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((((($context["base_url_relative"] ?? null) . "/themes/") . $context["slug"]) . "/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . "activate"), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
                echo "\" class=\"gpm-actions\">
                  <i class=\"fa fa-power-off\" aria-hidden=\"true\"></i> ";
                // line 70
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.ACTIVATE"), "html", null, true);
                echo "
                </a>
            ";
            }
            // line 73
            echo "        </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 75
            echo "        <tr><td>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.OFFLINE_WARNING"), "html", null, true);
            echo "</td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['slug'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "</div>

";
        // line 79
        $this->loadTemplate("partials/modal-switch-theme.html.twig", "partials/themes-list.html.twig", 79)->display($context);
        // line 80
        $this->loadTemplate("partials/modal-add-package.html.twig", "partials/themes-list.html.twig", 80)->display(twig_array_merge($context, ["type" => "theme"]));
        // line 81
        $this->loadTemplate("partials/modal-update-packages.html.twig", "partials/themes-list.html.twig", 81)->display(twig_array_merge($context, ["type" => "theme"]));
    }

    public function getTemplateName()
    {
        return "partials/themes-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 81,  265 => 80,  263 => 79,  259 => 77,  250 => 75,  244 => 73,  238 => 70,  233 => 69,  227 => 66,  224 => 65,  222 => 64,  218 => 62,  210 => 60,  202 => 58,  198 => 56,  195 => 55,  192 => 54,  190 => 53,  187 => 52,  185 => 51,  177 => 49,  175 => 48,  171 => 46,  167 => 45,  162 => 44,  154 => 40,  151 => 39,  145 => 37,  141 => 35,  138 => 34,  135 => 33,  132 => 32,  126 => 30,  124 => 29,  118 => 28,  114 => 27,  91 => 25,  88 => 24,  85 => 23,  82 => 22,  79 => 21,  74 => 20,  69 => 19,  66 => 18,  61 => 17,  53 => 12,  46 => 8,  43 => 7,  41 => 6,  37 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set gumroad_loaded = false %}
<div class=\"grav-update themes\"></div>
{% if installing %}
    {% include 'partials/release-toggle.html.twig' %}
{% endif %}
{% include 'partials/list-sort.html.twig' with { list_view: 'themes' } %}
<h1>
    {{ installing ? \"PLUGIN_ADMIN.AVAILABLE_THEMES\"|t : \"PLUGIN_ADMIN.INSTALLED_THEMES\"|t }}
</h1>
<form>
    <div class=\"gpm-search\">
        <input type=\"text\" placeholder=\"{{ \"PLUGIN_ADMIN.RESOURCE_FILTER\"|t }}\" data-gpm-filter>
    </div>
</form>

<div class=\"themes card-row grid fixed-blocks pure-g\">
    {% for slug, theme in admin.themes(not installing).toArray|ksort %}
        {% set state = 'inactive' %}
        {% if (installing) %}{% set state = 'installing' %}{% endif %}
        {% if (config.get('system.pages.theme') == slug) %}{% set state = 'active' %}{% endif %}
        {% set isTestingRelease = admin.gpm.isTestingRelease(slug) %}
        {% set isPremium = admin.isPremiumProduct(theme) %}
        {% set releaseDate = theme.date ?: admin.gpm.findPackage(slug, true).date %}

        <div class=\"theme card-item pure-u-1-3 {{ state }}-theme\" data-gpm-theme=\"{{ slug|url_encode }}\" data-gpm-name=\"{{ theme.name }}\" data-gpm-release-date=\"{{ releaseDate }}\" data-gpm-author=\"{{ theme.author.name }}\" data-gpm-official=\"{{ admin.isTeamGrav(theme) ? '1' : '2' }}\" data-gpm-updatable=\"{{ admin.gpm.isUpdatable(slug) ? '1' : '2' }}\" data-gpm-enabled=\"{{ data.get('enabled') ? '1' : '2' }}\" data-gpm-testing=\"{{ isTestingRelease ? '1' : '2' }}\" data-gpm-premium=\"{{ isPremium ? '1' : '2' }}\">
            <div class=\"gpm-name\">
                <i class=\"fa fa-fw fa-{{ theme.icon }}\"></i>
                <a href=\"{{ admin_route('/themes/' ~ slug|url_encode) }}\">{{ theme.name }}</a>
                {% if admin.isTeamGrav(theme) %}
                    <small><span class=\"info-reverse\"><i class=\"fa fa-check-circle\" title=\"{{ \"PLUGIN_ADMIN.GRAV_OFFICIAL_THEME\"|t }}\"></i></span></small>
                {% endif %}
                {% if isPremium %}
                    {% if not gumroad_loaded %}
                        {% set gumroad_loaded = true %}
                        <script src=\"//gumroad.com/js/gumroad.js\"></script>
                    {% endif %}
                    <small><span class=\"badge warning premium\"><i class=\"fa fa-star-o\"></i> {{ \"PLUGIN_ADMIN.PREMIUM_PRODUCT\"|t }}</span></small>
                {% endif %}
                {% if theme.symlink %}
                    <span class=\"hint--bottom\"  data-hint=\"{{ \"PLUGIN_ADMIN.THEME_SYMBOLICALLY_LINKED\"|t }}\">
                    <i class=\"fa fa-fw fa-link\"></i>
                </span>
                {% endif %}
                <span class=\"gpm-version\">v{{ theme.version }}</span>
                {% if isTestingRelease %}<span class=\"gpm-testing\">test release</span>{% endif %}
            </div>
            <div class=\"gpm-screenshot\">
                {% set thumb = installing ? '//getgrav.org/images/' ~ theme.screenshot : theme.thumbnail %}
                <a href=\"{{ admin_route('/themes/' ~ slug|url_encode) }}\"><img src=\"{{ thumb }}\" /></a>
            </div>
            {% if (state == 'installing') %}
                <div class=\"gpm-actions\">
                    {% if (theme.premium and not admin.license(theme.slug)) %}
                        {% if not gumroad_loaded %}
                            {% set gumroad_loaded = true %}
                            <script src=\"//gumroad.com/js/gumroad.js\"></script>
                        {% endif %}
                        <a class=\"gumroad-button button\" href=\"https://gum.co/{{ theme.premium.permalink }}\" target=\"_blank\" data-gumroad-single-product=\"true\"><i class=\"fa fa-shopping-cart\"></i> {{ theme.premium.button|default('Purchase') }}</a>
                    {% else %}
                        <a class=\"button\" href=\"#\" data-remodal-target=\"add-package\" data-packages-slugs=\"{{ slug }}\" data-theme-action=\"start-package-installation\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.INSTALL\"|t }}</a>
                    {% endif %}

                </div>
            {% elseif state == 'active' %}
                <div class=\"gpm-actions\">
                    <i class=\"fa fa-star\"></i> {{ \"PLUGIN_ADMIN.ACTIVE_THEME\"|t }}
                </div>
            {% else %}
                <a data-remodal-target=\"theme-switch-warn\" href=\"{{ uri.addNonce(base_url_relative ~ '/themes/' ~ slug ~ '/task' ~ config.system.param_sep ~ 'activate', 'admin-form', 'admin-nonce') }}\" class=\"gpm-actions\">
                  <i class=\"fa fa-power-off\" aria-hidden=\"true\"></i> {{ \"PLUGIN_ADMIN.ACTIVATE\"|t }}
                </a>
            {% endif %}
        </div>
    {% else %}
        <tr><td>{{ \"PLUGIN_ADMIN.OFFLINE_WARNING\"|t }}</td></tr>
    {% endfor %}
</div>

{% include 'partials/modal-switch-theme.html.twig' %}
{% include 'partials/modal-add-package.html.twig' with { type: 'theme' } %}
{% include 'partials/modal-update-packages.html.twig' with { type: 'theme' } %}
", "partials/themes-list.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/themes-list.html.twig");
    }
}
