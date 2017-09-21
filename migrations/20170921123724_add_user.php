<?php

use Phpmig\Migration\Migration;

class AddUser extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
           CREATE TABLE IF NOT EXISTS `user` (
              `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
              `email` varchar(128) NOT NULL COMMENT '用户邮箱',
              `mobile` varchar(32) NOT NULL DEFAULT  '' COMMENT '手机',
              `password` varchar(64) NOT NULL COMMENT '用户密码',
              `nickname` varchar(64) NOT NULL COMMENT '用户名',
              `avatar` varchar(1024) NOT NULL DEFAULT '' COMMENT '头像',
              `locked` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否被禁止',
              `lockDeadline` int(10) not null default '0' COMMENT '帐号锁定期限', 
              `loginTime` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
              `loginIp` varchar(64) NOT NULL DEFAULT '' COMMENT '最后登录IP',
              `createdIp` varchar(64) NOT NULL DEFAULT '' COMMENT '注册IP',
              `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
              `updatedTime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后更新时间',
              `gender` TINYINT UNSIGNED NOT NULL DEFAULT '2' COMMENT '性别 0女性，1男性，2未知',
              PRIMARY KEY (`id`),
              UNIQUE KEY `email` (`email`),
              UNIQUE KEY `nickname` (`nickname`),
              KEY `updatedTime` (`updatedTime`)
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
