<?php

namespace AppBundle\Controller\Register;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\BaseController;
use Codeages\Biz\Framework\Service\Exception\ServiceException;

class RegisterController extends BaseController
{
    public function RegisterAction(Request $request)
    {
        if('POST' === $request->getMethod()){
            try {
                $this->getUserService()->register($request->request->all());
            } catch (ServiceException $se) {
                $this->setFlashMessage('danger', $se->getMessage());
                return $this->redirect('register');
            }
        }

        return $this->render('login/index.html.twig', array(
            'type' => 'register'
        ));   
    }

    private function getUserService()
    {
        return $this->getBiz()->service('User:UserService');
    }
}
