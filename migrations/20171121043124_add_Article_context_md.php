<?php

use Phpmig\Migration\Migration;

class AddArticleContextMd extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $container = $this->getContainer();
        $container['db']->exec("ALTER TABLE `article` ADD `content_md` text not null COMMENT '内容' AFTER `content`;");
    }

    /**
     * Undo the migration
     */
    public function down()
    {

    }
}
