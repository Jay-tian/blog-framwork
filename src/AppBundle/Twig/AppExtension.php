<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    protected $scripts = array();

    protected $csses = array();

    public function __construct()
    {
        $this->scripts = array();
        $this->csses = array();
    }


    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('script', array($this, 'script')),
            new \Twig_SimpleFunction('css', array($this, 'css')),
        );
    }

    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$'.$price;

        return $price;
    }

    public function script($paths = null)
    {
        if (empty($paths)) {
            return $this->scripts;
        }

        if (!is_array($paths)) {
            $paths = array($paths);
        }

        foreach ($paths as $path) {
            $this->scripts[] = $path;
        }
    }

    public function css($paths = null)
    {
        if (empty($paths)) {
            return $this->csses;
        }

        if (!is_array($paths)) {
            $paths = array($paths);
        }

        foreach ($paths as $path) {
            $this->csses[] = $path;
        }
    }
}