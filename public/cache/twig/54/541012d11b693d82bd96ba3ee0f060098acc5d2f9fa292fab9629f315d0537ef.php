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

/* partials/dashboard-statistics.html.twig */
class __TwigTemplate_c3a0c497176cb4770a175c660e12c32e6b6b2874b47d11a868650b67606399b6 extends \Twig\Template
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
        if ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.statistics", 1 => "admin.super"])) {
            // line 2
            echo "    <div id=\"popularity\" class=\"dashboard-item dashboard-right\" data-chart-name=\"popularity\" data-chart-type=\"bar\" data-chart-data=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["series" => [0 => $this->getAttribute($this->getAttribute(($context["popularity"] ?? null), "getDailyChartData", []), "data", [], "array")], "labels" => $this->getAttribute($this->getAttribute(($context["popularity"] ?? null), "getDailyChartData", []), "labels", [], "array")]), "html_attr");
            echo "\">
        <div class=\"primary-accent default-box-shadow\">
            <h1>";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.VIEWS_STATISTICS"), "html", null, true);
            echo "</h1>
            <div class=\"admin-statistics-chart\">
                <div class=\"ct-chart chart-loader\"><i class=\"fa fa-refresh fa-spin\"></i></div>
                <div class=\"flush-bottom button-bar stats-bar\">
                    <span class=\"stat\">
                        <b>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute(($context["popularity"] ?? null), "getDailyTotal", []), "html", null, true);
            echo "</b>
                        <i>";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.TODAY"), "html", null, true);
            echo "</i>
                    </span>
                    <span class=\"stat\">
                        <b>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute(($context["popularity"] ?? null), "getWeeklyTotal", []), "html", null, true);
            echo "</b>
                        <i>";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.WEEK"), "html", null, true);
            echo "</i>
                    </span>
                    <span class=\"stat\">
                        <b>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute(($context["popularity"] ?? null), "getMonthlyTotal", []), "html", null, true);
            echo "</b>
                        <i>";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.MONTH"), "html", null, true);
            echo "</i>
                    </span>
                </div>
            </div>
        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/dashboard-statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 18,  66 => 17,  60 => 14,  56 => 13,  50 => 10,  46 => 9,  38 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if authorize(['admin.statistics', 'admin.super']) %}
    <div id=\"popularity\" class=\"dashboard-item dashboard-right\" data-chart-name=\"popularity\" data-chart-type=\"bar\" data-chart-data=\"{{ {'series': [popularity.getDailyChartData['data']], 'labels': popularity.getDailyChartData['labels']}|json_encode|e('html_attr') }}\">
        <div class=\"primary-accent default-box-shadow\">
            <h1>{{ \"PLUGIN_ADMIN.VIEWS_STATISTICS\"|t }}</h1>
            <div class=\"admin-statistics-chart\">
                <div class=\"ct-chart chart-loader\"><i class=\"fa fa-refresh fa-spin\"></i></div>
                <div class=\"flush-bottom button-bar stats-bar\">
                    <span class=\"stat\">
                        <b>{{ popularity.getDailyTotal }}</b>
                        <i>{{ \"PLUGIN_ADMIN.TODAY\"|t }}</i>
                    </span>
                    <span class=\"stat\">
                        <b>{{ popularity.getWeeklyTotal }}</b>
                        <i>{{ \"PLUGIN_ADMIN.WEEK\"|t }}</i>
                    </span>
                    <span class=\"stat\">
                        <b>{{ popularity.getMonthlyTotal }}</b>
                        <i>{{ \"PLUGIN_ADMIN.MONTH\"|t }}</i>
                    </span>
                </div>
            </div>
        </div>
    </div>
{% endif %}
", "partials/dashboard-statistics.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/dashboard-statistics.html.twig");
    }
}
