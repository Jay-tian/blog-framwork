<?php

use Phpmig\Migration\Migration;

class AddArticleTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `article` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `title` varchar(255) NOT NULL COMMENT '标题',
            `category_id` int(11) NOT NULL default '0' COMMENT '分类',
            `status` varchar(64) NOT NULL default 'create' COMMENT '状态',
            `cover` varchar(1024) not null default '' COMMENT '封面',
            `user_id` int(11) not null COMMENT '用户',
            `like_num` int(11) not null default '0' COMMENT '被赞数',
            `hits` int(11) not null default 0 COMMENT '浏览量',
            `content` text not null COMMENT '内容',
            `recommend` int(11) not null default 0 COMMENT '是否推荐',
            `seq` int(11) not null default 0 COMMENT '推荐权重',
            `created_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer();
        $container['db']->exec($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

    }
}
