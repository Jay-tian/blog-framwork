<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends BaseController
{
    public function detailAction(Request $request, $id)
    {
        return $this->render('article/detail.html.twig');
    }

    public function createAction(Request $request)
    {
        if ('POST' === $request->getMethod()) {
            $fields = $request->request->all();
            var_dump($request->query->all());
            $article = $this->getArticleService()->createArticle($fields);

            $this->createJsonResponse($article);
        }
        return $this->render('article/create.html.twig');
    }
    
    protected function getArticleService()
    {
        return $this->getBiz()->service('Article:ArticleService');
    }
}
