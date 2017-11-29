<?php

namespace Biz\Setting\Service\Impl;

use Biz\BaseService;
use Biz\Setting\Service\SettingService;
use Codeages\Biz\Framework\Util\ArrayToolkit;

class SettingServiceImpl extends BaseService implements SettingService
{
    public function getSetting($id, $lock = false)
    {
        return $this->getSettingDao()->get($id, array('lock'=>$lock));
    }

    public function createSetting($fields)
    {
        return $this->getSettingDao()->create($fields);
    }

    public function updateSetting($id, $fields)
    {
         return $this->getSettingDao()->update($id, $fields);
    }

    public function findSettingByIds($ids)
    {
         return $this->getSettingDao()->findByIds($id, $fields);
    }

    public function searchSettings($conditions, $orders, $start, $limit)
    {
        return $this->getSettingDao()->search($conditions, $orders, $start, $limit);
    }

    public function countSetting($conditions)
    {
         return $this->getSettingDao()->count($conditions);
    }

    protected function getSettingDao()
    {
        return $this->biz->dao('Setting:SettingDao');
    }
}