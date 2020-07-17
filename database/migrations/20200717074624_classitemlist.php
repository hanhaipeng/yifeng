<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Classitemlist extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table  =  $this->table('classitemlist',array('engine'=>'MyISAM'));
        $table->addColumn('classId', 'integer',array('limit'  =>  10,'default'=>0,'comment'=>'对应classlist表的id'))
            ->addColumn('name', 'string',array('limit'  =>  15,'default'=>'','comment'=>'配置名称'))
            ->addColumn('value', 'decimal',array('precision'=>10,'scale'=>4,'default'=>0,'comment'=>'价格'))
            ->addColumn('sort', 'integer',array('limit'  =>  10,'default'=>100,'comment'=>'排序'))
            ->addColumn('formtype', 'integer',array('limit'  =>  1,'default'=>1,'comment'=>'表单类型：1单行文本框，2多行 '))
            ->addIndex(array('name'), array('unique'  =>  true))
            ->create();
    }
}
