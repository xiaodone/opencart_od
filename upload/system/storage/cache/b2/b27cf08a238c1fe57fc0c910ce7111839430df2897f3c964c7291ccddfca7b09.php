<?php

/* default/template/common/search.twig */
class __TwigTemplate_f4124edccb5f94a6abae175053bb06f29231fe6e7f3dc2a8574b5ba8315bfd93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"search\" class=\"input-group\">
  <input type=\"text\" name=\"search\" value=\"";
        // line 2
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "\" class=\"form-control input-lg\" />
  <span class=\"input-group-btn\">
    <button type=\"button\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-search\"></i></button>
  </span>
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/common/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
/* <div id="search" class="input-group">*/
/*   <input type="text" name="search" value="{{ search }}" placeholder="{{ text_search }}" class="form-control input-lg" />*/
/*   <span class="input-group-btn">*/
/*     <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>*/
/*   </span>*/
/* </div>*/