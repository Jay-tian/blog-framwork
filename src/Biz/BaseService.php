<?php

namespace Biz;

use Codeages\Biz\Framework\Service\Exception\ServiceException;

class BaseService extends \Codeages\Biz\Framework\Service\BaseService
{
    private $lock = null;

    protected function createDao($alias)
    {
        return $this->biz->dao($alias);
    }

    /**
     * @return CurrentUser
     */
    public function getCurrentUser()
    {
        return $this->biz['user'];
    }

    protected function createServiceException($message = '', $code = 0)
    {
        return new ServiceException($message, $code);
    }
}