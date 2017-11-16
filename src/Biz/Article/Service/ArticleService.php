<?php

namespace Biz\Article\Service;

interface ArticleService
{
    public function getArticle($id, $lock = false);

    public function updateArticle($id, $fields);

    public function findArticleByIds($ids);

    public function searchArticles($conditions, $orders, $start, $limit);

    public function countArticle($conditions);
}