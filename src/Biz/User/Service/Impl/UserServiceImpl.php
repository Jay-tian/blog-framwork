<?php

namespace Biz\User\Service\Impl;

use Biz\User\Service\UserService;
use Biz\BaseService;
use Codeages\Biz\Framework\Util\ArrayToolkit;

class UserServiceImpl extends BaseService implements UserService
{
    public function getUser($id, $lock = false)
    {
        $this->getUserDao()->get($id, array('lock'=>$lock));
    }

    public function register($user)
    {
        if (!ArrayToolkit::requireds($user, array('username', 'email', 'password', 'comfirmPassword'), true)) {
            throw $this->createServiceException('缺少必要参数');
        }

        $dbUser = $this->getUserByUserName($user['username']);
        if (!empty($dbUser)) {
             throw $this->createServiceException('该用户已经存在！');
        }
        if ($user['comfirmPassword'] !== $user['password']) {
            throw $this->createServiceException('密码不一致！');
        }
        $user = ArrayToolkit::parts($user, array('password','email','username'));
        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
        $this->getUserDao()->create($user);
    }

    public function getUserByUserName($username)
    {
        return $this->getUserDao()->getUserByUserName($username);
    }

    protected function getUserDao()
    {
          return $this->biz->dao('User:UserDao');
    }
}