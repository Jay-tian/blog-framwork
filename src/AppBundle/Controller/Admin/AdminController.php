<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\BaseController;

class AdminController extends BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('login/index.html.twig');
    }
}
