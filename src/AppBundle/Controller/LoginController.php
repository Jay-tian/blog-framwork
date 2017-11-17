<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\BaseController;

class LoginController extends BaseController
{
    public function indexAction(Request $request)
    {
        $this->getUserService()->getUser(1);

        return $this->render('login/index.html.twig');
    }

    private function getUserService()
    {
        return $this->getBiz()->service('User:UserService');
    }
}
