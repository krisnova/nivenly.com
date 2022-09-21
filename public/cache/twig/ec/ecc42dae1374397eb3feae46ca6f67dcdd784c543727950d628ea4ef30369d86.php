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

/* partials/modal-update-packages.html.twig */
class __TwigTemplate_74f66275b45831837e030041707fc3c8e50d5f04080eb83db2f9861b778a8a6a extends \Twig\Template
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
        echo "<div class=\"remodal\"
     data-packages-modal
     data-remodal-id=\"update-packages\"
     data-remodal-options=\"hashTracking: false\">
    <form>
        <div class=\"add-package-installing\">
            <h1>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.UPDATING"), "html", null, true);
        echo "</h1>

            <div class=\"loading\">
                <p>
                    ";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.LOADING"), "html", null, true);
        echo "
                    <span class=\"fa fa-spin fa-spinner\"></span>
                </p>
            </div>

            <div class=\"install-dependencies-package-container hidden\">
                <p><strong>";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.DEPENDENCIES_NOT_MET_MESSAGE"), "html", null, true);
        echo "</strong></p>

                <div class=\"type-install hidden\">
                    <p>";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.PACKAGES_NOT_INSTALLED"), "html", null, true);
        echo ":</p>
                    <ul></ul>
                </div>
                <div class=\"type-update hidden\">
                    <p>";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.PACKAGES_NEED_UPDATE"), "html", null, true);
        echo ":</p>
                    <ul></ul>
                </div>
                <div class=\"type-ignore hidden\">
                    <p>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.PACKAGES_SUGGESTED_UPDATE"), "html", null, true);
        echo ":</p>
                    <ul></ul>
                </div>

                <div class=\"button-bar\">
                    <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CANCEL"), "html", null, true);
        echo "</button>
                    <a data-";
        // line 34
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "-action=\"install-dependencies-and-package\" class=\"button\"><i class=\"fa fa-fw fa-check\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CONTINUE"), "html", null, true);
        echo "</a>
                </div>
            </div>

            <div class=\"install-package-container hidden\">
                <p>
                    ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.READY_TO_UPDATE_PACKAGES"), "html", null, true);
        echo "
                </p>

                <ul class=\"packages-names-list\"></ul>

                <div class=\"button-bar\">
                    <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CANCEL"), "html", null, true);
        echo "</button>
                    <a data-";
        // line 47
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "-action=\"install-package\" class=\"button\"><i class=\"fa fa-fw fa-check\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CONTINUE"), "html", null, true);
        echo "</a>
                </div>
            </div>

            <div class=\"install-package-error hidden\">
                <p>
                    ";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.ERROR_UPDATING_PACKAGES"), "html", null, true);
        echo "
                </p>

                <ul class=\"packages-names-list\"></ul>

                <div class=\"button-bar\">
                    <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CLOSE"), "html", null, true);
        echo "</button>
                </div>
            </div>

            <div class=\"installing-dependencies hidden\">
                <p>
                    ";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.INSTALLING_DEPENDENCIES"), "html", null, true);
        echo "
                    <span class=\"fa fa-spin fa-spinner\"></span>
                </p>
            </div>

            <div class=\"installing-package hidden\">
                <p>
                    ";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.UPDATING_PACKAGES"), "html", null, true);
        echo "
                    <span class=\"fa fa-spin fa-spinner\"></span>
                </p>

                <ul class=\"packages-names-list\"></ul>
            </div>

            <div class=\"installation-complete hidden\">
                <p>
                    ";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.PACKAGES_SUCCESSFULLY_UPDATED"), "html", null, true);
        echo "
                </p>

                <ul class=\"packages-names-list\"></ul>
            </div>
        </div>

    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "partials/modal-update-packages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 81,  149 => 72,  139 => 65,  130 => 59,  121 => 53,  110 => 47,  106 => 46,  97 => 40,  86 => 34,  82 => 33,  74 => 28,  67 => 24,  60 => 20,  54 => 17,  45 => 11,  38 => 7,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"remodal\"
     data-packages-modal
     data-remodal-id=\"update-packages\"
     data-remodal-options=\"hashTracking: false\">
    <form>
        <div class=\"add-package-installing\">
            <h1>{{ \"PLUGIN_ADMIN.UPDATING\"|t }}</h1>

            <div class=\"loading\">
                <p>
                    {{ \"PLUGIN_ADMIN.LOADING\"|t }}
                    <span class=\"fa fa-spin fa-spinner\"></span>
                </p>
            </div>

            <div class=\"install-dependencies-package-container hidden\">
                <p><strong>{{ \"PLUGIN_ADMIN.DEPENDENCIES_NOT_MET_MESSAGE\"|t }}</strong></p>

                <div class=\"type-install hidden\">
                    <p>{{ \"PLUGIN_ADMIN.PACKAGES_NOT_INSTALLED\"|t }}:</p>
                    <ul></ul>
                </div>
                <div class=\"type-update hidden\">
                    <p>{{ \"PLUGIN_ADMIN.PACKAGES_NEED_UPDATE\"|t }}:</p>
                    <ul></ul>
                </div>
                <div class=\"type-ignore hidden\">
                    <p>{{ \"PLUGIN_ADMIN.PACKAGES_SUGGESTED_UPDATE\"|t }}:</p>
                    <ul></ul>
                </div>

                <div class=\"button-bar\">
                    <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|t }}</button>
                    <a data-{{ type }}-action=\"install-dependencies-and-package\" class=\"button\"><i class=\"fa fa-fw fa-check\"></i> {{ \"PLUGIN_ADMIN.CONTINUE\"|t }}</a>
                </div>
            </div>

            <div class=\"install-package-container hidden\">
                <p>
                    {{ \"PLUGIN_ADMIN.READY_TO_UPDATE_PACKAGES\"|t }}
                </p>

                <ul class=\"packages-names-list\"></ul>

                <div class=\"button-bar\">
                    <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|t }}</button>
                    <a data-{{ type }}-action=\"install-package\" class=\"button\"><i class=\"fa fa-fw fa-check\"></i> {{ \"PLUGIN_ADMIN.CONTINUE\"|t }}</a>
                </div>
            </div>

            <div class=\"install-package-error hidden\">
                <p>
                    {{ \"PLUGIN_ADMIN.ERROR_UPDATING_PACKAGES\"|t }}
                </p>

                <ul class=\"packages-names-list\"></ul>

                <div class=\"button-bar\">
                    <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CLOSE\"|t }}</button>
                </div>
            </div>

            <div class=\"installing-dependencies hidden\">
                <p>
                    {{ \"PLUGIN_ADMIN.INSTALLING_DEPENDENCIES\"|t }}
                    <span class=\"fa fa-spin fa-spinner\"></span>
                </p>
            </div>

            <div class=\"installing-package hidden\">
                <p>
                    {{ \"PLUGIN_ADMIN.UPDATING_PACKAGES\"|t }}
                    <span class=\"fa fa-spin fa-spinner\"></span>
                </p>

                <ul class=\"packages-names-list\"></ul>
            </div>

            <div class=\"installation-complete hidden\">
                <p>
                    {{ \"PLUGIN_ADMIN.PACKAGES_SUCCESSFULLY_UPDATED\"|t }}
                </p>

                <ul class=\"packages-names-list\"></ul>
            </div>
        </div>

    </form>
</div>
", "partials/modal-update-packages.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/modal-update-packages.html.twig");
    }
}
