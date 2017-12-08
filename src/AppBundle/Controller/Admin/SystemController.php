<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\BaseController;

class SystemController extends BaseController
{
    public function initAction(Request $request)
    {
        $this->getSettingService()->init();
    }

        protected function getSettingService()
    {
        return $this->getBiz()->service('Setting:SettingService');
    }
}
