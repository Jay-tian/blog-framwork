<?php

use Phpmig\Migration\Migration;

class AddArticleViewLog extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `article_view_log` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `ip` varchar(255) not null unique comment '名称',
            `fingerprint` varchar(2048) not null comment '浏览器指纹',
            `user_id` int(11) NOT NULL COMMENT '用户Id',
            `article_id` int(11) NOT NULL COMMENT '资讯Id',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            UNIQUE KEY index_user_article (article_id, user_id),
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer();
        $container['db']->exec($sql);  

        //登录用户 ：user_id ,article_id
        //有的话，article_id，Ip, user_id =0 不大于十个记录，添加
    }

    /**
     * Undo the migration
     */
    public function down()
    {

    }
}
