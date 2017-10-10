<?php

namespace AppBundle\Controller\Register;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\BaseController;

class RegisterController extends BaseController
{
    public function RegisterAction(Request $request)
    {
        $user = array(
            'username' => 'asd',
            'email' => '806338233@qq.com',
            'password' => '123'
        );

        $this->getUserService()->register($user);
    }

    private function getUserService()
    {
        return $this->getBiz()->service('User:UserService');
    }
}
