<?php

namespace Biz\Setting\Dao;

use Codeages\Biz\Framework\Dao\GeneralDaoInterface;

interface SettingDao extends GeneralDaoInterface
{
    public function findByIds($ids);
}
