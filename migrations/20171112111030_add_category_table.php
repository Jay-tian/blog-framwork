<?php

use Phpmig\Migration\Migration;

class AddCategoryTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `category` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `parent_Id` int(11) NOT NULL COMMENT '父Id',
            `name` varchar(255) not null comment '名称',
            `code` varchar(255) not null comment '编码，便于查询所有子分类',
            `recommend` int(11) not null default 0 COMMENT '是否推荐',
            `seq` int(11) not null default 0 COMMENT '推荐权重',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
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
