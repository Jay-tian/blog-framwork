<?php

namespace Biz\User\Service;

interface UserService
{
    public function getUser($id, $lock = false);
}