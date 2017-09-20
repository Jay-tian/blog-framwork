<?php
namespace AppBundle\Twig;

class HtmlExtension extends \Twig_Extension
{
    protected $scripts = array();

    protected $csses = array();

    public function __construct()
    {
        $this->scripts = new \SplPriorityQueue();
        $this->csses = new \SplPriorityQueue();
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('script', array($this, 'script')),
            new \Twig_SimpleFunction('css', array($this, 'css')),
        );
    }

    public function script($paths = null, $priority = 0)
    {
        if (empty($paths)) {
            return $this->scripts;
        }

        if (!is_array($paths)) {
            $paths = array($paths);
        }

        foreach ($paths as $path) {
            $this->scripts->insert($path, $priority);
        }
    }

    public function css($paths = null, $priority = 0)
    {
        if (empty($paths)) {
            return $this->csses;
        }

        if (!is_array($paths)) {
            $paths = array($paths);
        }

        foreach ($paths as $path) {
            $this->csses->insert($path, $priority);
        }
    }
}