<?php

use Phpmig\Migration\Migration;

class AddSettingTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `setting` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `name` varchar(255) not null unique comment '名称',
            `value` varchar(2048) not null comment '内容',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            PRIMARY KEY (`id`),
            INDEX(name)
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
