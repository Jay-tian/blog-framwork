<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    public function indexAction(Request $request)
    {
        $articles = $this->getArticleService()->searchArticles(array(), array(), 0, \PHP_INT_MAX);
        return $this->render('default/index.html.twig',
            array(
                'articles' => $articles,
            )    
        );
    }

    public function demoAction(Request $request)
    {
        return $this->render('default/demo.html.twig');
    }

    protected function getArticleService()
    {
        return $this->getBiz()->service('Article:ArticleService');
    }
}
