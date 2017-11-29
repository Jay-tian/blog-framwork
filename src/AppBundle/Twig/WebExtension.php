<?php
namespace AppBundle\Twig;

class WebExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('filter_html', array($this, 'filterHtml')),
            new \Twig_SimpleFilter('substr', array($this, 'substr')),
        );
    }

    public function filterHtml($value)
    {
        return strip_tags($value);
    }

    public function substr($value, $length)
    {
        return mb_substr($value, 0, $length) . '...';
    }  
}