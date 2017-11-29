<?php

namespace Biz\Setting\Service;

interface SettingService
{
    public function getSetting($id, $lock = false);

    public function createSetting($fields);    

    public function updateSetting($id, $fields);

    public function findSettingByIds($ids);

    public function searchSettings($conditions, $orders, $start, $limit);

    public function countSetting($conditions);
}