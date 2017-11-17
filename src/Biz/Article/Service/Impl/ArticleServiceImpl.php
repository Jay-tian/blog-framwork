<?php

namespace Biz\Article\Service\Impl;

use Biz\BaseService;
use Biz\Article\Service\ArticleService;
use Codeages\Biz\Framework\Util\ArrayToolkit;

class ArticleServiceImpl extends BaseService implements ArticleService
{
    public function getArticle($id, $lock = false)
    {
        return $this->getArticleDao()->get($id, array('lock'=>$lock));
    }

    public function createArticle($fields)
    {
        return $this->getArticleDao()->create($fields);
    }

    public function updateArticle($id, $fields)
    {
         return $this->getArticleDao()->update($id, $fields);
    }

    public function findArticleByIds($ids)
    {
         return $this->getArticleDao()->findByIds($id, $fields);
    }

    public function searchArticles($conditions, $orders, $start, $limit)
    {
        return $this->getArticleDao()->search($conditions, $orders, $start, $limit);
    }

    public function countArticle($conditions)
    {
         return $this->getArticleDao()->count($conditions);
    }

    protected function getArticleDao()
    {
        return $this->biz->dao('Article:ArticleDao');
    }
}