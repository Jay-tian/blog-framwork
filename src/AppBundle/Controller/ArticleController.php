<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Codeages\Biz\Framework\Util\ArrayToolkit;

class ArticleController extends BaseController
{
    public function detailAction(Request $request, $id)
    {
        return $this->render('article/detail.html.twig');
    }

    public function createAction(Request $request)
    {
        if ('POST' === $request->getMethod()) {
            $user = $this->getUser();
            $fields = $request->request->all();
            $requireds = array(
                'id',
                'title',
                'content',
                'content_md',
            );

            if (!ArrayToolkit::requireds($fields, $requireds, true)) {
                return $this->createJsonResponse(array('error' => '缺少必要字段！'));
            }

            $fields = ArrayToolkit::parts($fields, $requireds);
            $fields['user_id'] = $user['id'];
            
            if (empty($fields['id'])) {
                unset($fields['id']);
                $article = $this->getArticleService()->createArticle($fields);
            } else {
                $article = $this->getArticleService()->updateArticle($fields['id'], $fields);
            }
            
            return $this->createJsonResponse($article);
        }
        return $this->render('article/create.html.twig');
    }

    protected function getArticleService()
    {
        return $this->getBiz()->service('Article:ArticleService');
    }
}
