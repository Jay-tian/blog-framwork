<?php

namespace Biz\User\Dao\Impl;

use Codeages\Biz\Framework\Dao\GeneralDaoInterface;

class UserDaoImpl extends \Codeages\Biz\Framework\Dao\GeneralDaoImpl
{
    protected $table = 'user';

    public function getUserByUserName($username)
    {
        return $this->getByFields(array('username' => $username));
    }

    public function declares()
    {
        return array(
            'serializes' => array(
                'roles' => 'delimiter',
            ),
            'orderbys' => array(
                'id'
            ),
            'timestamps' => array('create_time', 'update_time'),
            'conditions' => array()
        );
    }
}

