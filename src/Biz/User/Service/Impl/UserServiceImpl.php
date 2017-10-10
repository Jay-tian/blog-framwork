<?php

namespace Biz\User\Service\Impl;

use Biz\User\Service\UserService;

class UserServiceImpl extends \Codeages\Biz\Framework\Service\BaseService implements UserService
{
    public function getUser($id, $lock = false)
    {
        $this->getUserDao()->get($id, $lock = false);
    }

    public function register($user)
    {
         $this->getUserDao()->create($user);
    }

    protected function getUserDao()
    {
          return $this->biz->dao('User:UserDao');
    }
}