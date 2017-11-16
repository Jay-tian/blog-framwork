<?php

namespace Biz\Article\Service;

interface ArticleService
{
    public function getArticle($id, $lock = false);

    public function updateArticle($id, $fields);
}