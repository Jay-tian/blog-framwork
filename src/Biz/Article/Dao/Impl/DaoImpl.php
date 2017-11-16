<?php

namespace Biz\Article\Dao\Impl;

use Codeages\Biz\Framework\Dao\GeneralDaoInterface;

class ArticleDaoImpl extends \Codeages\Biz\Framework\Dao\GeneralDaoImpl
{
    protected $table = 'Article';

    public function declares()
    {
        return array(
            'serializes' => array(
            ),
            'orderbys' => array(
                'id'
            ),
            'timestamps' => array('createdTime', 'updatedTime'),
            'conditions' => array()
        );
    }
}

