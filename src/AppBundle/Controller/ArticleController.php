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
            
        }
        return $this->render('article/create.html.twig');
    }
}
