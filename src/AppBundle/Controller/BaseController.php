<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller
{
    protected function getUser()
    {
        $biz = $this->getBiz();

        return $biz['user'];
    }

    protected function errorPage($message, $status)
    {
        //todo 未定义的错误编码时，提示
        return $this->render("error/error-".$status.".html.twig", array(
            'message' => $message
        ));
    }

    protected function setFlashMessage($level, $message)
    {
        $this->get('session')->getFlashBag()->add($level, $message);
    }

    protected function createJsonResponse($data = null, $status = 200, $headers = array())
    {
        return new JsonResponse($data, $status, $headers);
    }

    protected function getBiz()
    {
        return $this->get('biz');
    }
}

