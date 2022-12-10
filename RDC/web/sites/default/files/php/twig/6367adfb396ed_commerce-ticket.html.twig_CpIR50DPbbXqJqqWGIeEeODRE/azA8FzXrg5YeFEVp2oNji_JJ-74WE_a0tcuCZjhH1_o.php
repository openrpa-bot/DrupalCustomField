<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/commerce_ticketing/templates/commerce-ticket.html.twig */
class __TwigTemplate_7d5d80a4832740774203a4eda04fd29c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "
";
        // line 16
        $context["agbText"] = "This ticket is non-refundable and only valid for the service listed. The ticket will be checked electronically to allow one-time admission.";
        // line 17
        echo "

";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("commerce_ticketing_pdf/ticket"), "html", null, true);
        echo "

<div class=\"ticket__wrapper\">
  <table class=\"ticket__table\" cellpadding=\"0\" cellspacing=\"0\">

    <tr>
      <td colspan=\"5\" style=\"height: 22px;\">&nbsp;</td>
    </tr>

    <tr>
      <td class=\"ticket__table__space\">&nbsp;</td>
      <td colspan=\"3\" class=\"ticket__table__center\">
        <div class=\"ticket__overline--large\">";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "site_name", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
        echo "</div>
        <div class=\"ticket__title--large\">";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = ($context["elements"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#commerce_ticket"] ?? null) : null), "getOrderItem", [], "any", false, false, true, 32), "getPurchasedEntity", [], "any", false, false, true, 32), "getProduct", [], "any", false, false, true, 32), "label", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
        echo "</div>
      </td>
      <td class=\"ticket__table__end\">&nbsp;</td>
    </tr>

    <tr>
      <td colspan=\"5\" style=\"height:39.8px;\" >&nbsp;</td>
    </tr>

    <tr>
      <td colspan=\"2\" class=\"ticket__table__first\">&nbsp;</td>
      <td class=\"ticket__table__second\"><div class=\"ticket__overline--medium\">";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Date of visit"));
        echo "</div><div class=\"ticket__title--medium\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = ($context["elements"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#commerce_ticket"] ?? null) : null), "getOrderItem", [], "any", false, false, true, 43), "field_visit_date", [], "any", false, false, true, 43), "date", [], "any", false, false, true, 43), 43, $this->source), "d.m.Y"), "html", null, true);
        echo "</div></td>
      <td colspan=\"2\" class=\"ticket__table__third\"><div class=\"ticket__overline--medium\">";
        // line 44
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Price category"));
        echo "</div><div class=\"ticket__title--medium\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_2 = ($context["elements"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#commerce_ticket"] ?? null) : null), "field_attribute_ref", [], "any", false, false, true, 44), "entity", [], "any", false, false, true, 44), "label", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
        echo "</div></td>
    </tr>

    <tr>
      <td colspan=\"5\" style=\"height:12px;\" >&nbsp;</td>
    </tr>

    <tr>
      <td colspan=\"2\" class=\"ticket__table__first\">&nbsp;</td>
      <td class=\"ticket__table__second\"><div class=\"ticket__overline--small\">";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Date of purchase"));
        echo "</div><div class=\"ticket__title--small\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_3 = ($context["elements"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["#commerce_ticket"] ?? null) : null), "getOrder", [], "any", false, false, true, 53), "created", [], "any", false, false, true, 53), "value", [], "any", false, false, true, 53), 53, $this->source), "d.m.Y"), "html", null, true);
        echo "</div></td>
      <td class=\"ticket__table__third\" ><div class=\"ticket__overline--small\">";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order number"));
        echo "</div><div class=\"ticket__title--small\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_4 = ($context["elements"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["#commerce_ticket"] ?? null) : null), "getOrder", [], "any", false, false, true, 54), "getOrderNumber", [], "method", false, false, true, 54), 54, $this->source), "html", null, true);
        echo "</div></td>
      <td class=\"ticket__table__third\" ><div class=\"ticket__overline--small\">";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Ticket number"));
        echo "</div><div class=\"ticket__title--small\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_compile_5 = ($context["elements"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["#commerce_ticket"] ?? null) : null), "getTicketNumber", [], "method", false, false, true, 55), 55, $this->source), "html", null, true);
        echo "</div></td>
    </tr>

    <tr>
      <td colspan=\"5\" style=\"height:11.5px;\" >&nbsp;</td>
    </tr>

    <tr>
      <td colspan=\"2\"></td>
      <td colspan=\"2\"><span class=\"ticket__overline--small-disclaier\">";
        // line 64
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Disclaimer"));
        echo ":</span><div class=\"ticket__text--small\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(($context["agbText"] ?? null), 64, $this->source)));
        echo "</div></td>
      <td class=\"ticket__table__end\">&nbsp;</td>
    </tr>

    <tr>
      <td colspan=\"2\" class=\"ticket__table__first\">
        <table class=\"ticket__table\">
          <tr>
            <td class=\"ticket__id-table__space\"></td>
            <td style=\"height: 10px;\"></td>
          </tr>
          <tr>
            <td class=\"ticket__id-table__space\"></td>
            <td><div class=\"ticket__id\">";
        // line 77
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "ticket_uuid_short", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
        echo "</div></td>
          </tr>
        </table>
      </td>
      <td colspan=\"3\"></td>
    </tr>

    <tr>
      <td colspan=\"5\" style=\"height:0px\" ></td>
    </tr>
  </table>

</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/commerce_ticketing/templates/commerce-ticket.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 77,  127 => 64,  113 => 55,  107 => 54,  101 => 53,  87 => 44,  81 => 43,  67 => 32,  63 => 31,  48 => 19,  44 => 17,  42 => 16,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/commerce_ticketing/templates/commerce-ticket.html.twig", "C:\\xampp\\htdocs\\RDC\\web\\modules\\contrib\\commerce_ticketing\\templates\\commerce-ticket.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16);
        static $filters = array("escape" => 19, "t" => 43, "date" => 43);
        static $functions = array("attach_library" => 19);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape', 't', 'date'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
