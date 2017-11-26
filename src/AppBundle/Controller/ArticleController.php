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
        $user = $this->getUser();
        if ('POST' === $request->getMethod()) {
            $fields = $request->request->all();
            $requireds = array(
                'title',
                'content-html-code',
                'content_md',
            );
            if (!ArrayToolkit::requireds($fields, $requireds, true)) {
                return $this->createJsonResponse(array('error' => '缺少必要字段！'));
            }
            $fields = $this->filter($fields);

            if (empty($fields['id'])) {
                $article = $this->getArticleService()->createArticle($fields);
            } else {
                $article = $this->getArticleService()->updateArticle($fields['id'], $fields);
            }
            
            return $this->createJsonResponse($article);
        }
        return $this->render('article/create.html.twig');
    }

    private function filter($fields) 
    {
        $user = $this->getUser();
        $fields['content'] = $fields['content-html-code'];
        $fields['user_id'] = $user['id'];
        if (empty($fields['id'])) {
            unset($fields['id']);
        }
        return $fields = ArrayToolkit::parts($fields, array(
            'title',
            'content',
            'content_md',
            'id',
            'user_id',
        ));
    }

    protected function getArticleService()
    {
        return $this->getBiz()->service('Article:ArticleService');
    }
}
