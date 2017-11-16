<?php

namespace Biz\Article\Service\Impl;

use Biz\BaseService;
use Biz\Article\Service\ArticleService;
use Codeages\Biz\Framework\Util\ArrayToolkit;

class ArticleServiceImpl extends BaseService implements ArticleService
{
    public function getArticle($id, $lock = false)
    {
        $this->getArticleDao()->get($id, array('lock'=>$lock));
    }

    protected function getArticleDao()
    {
        return $this->biz->dao('Article:ArticleDao');
    }
}