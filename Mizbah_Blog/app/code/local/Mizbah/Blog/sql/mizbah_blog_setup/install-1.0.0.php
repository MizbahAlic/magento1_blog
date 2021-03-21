<?php
 
$installer = $this;
 
$installer->startSetup();
 
$table = $installer->getConnection()
    ->newTable($installer->getTable('mizbah_blog/post'))
    ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Post Id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Title')
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Description')
    ->addColumn('short_description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Short Description')
    ->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Author')
    ->addColumn(
            'updated_at',
            Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            null,
            array(),
            'Category Modification Time'
        )
    ->addColumn(
            'created_at',
            Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            null,
            array(),
            'Category Creation Time'
        );
$installer->getConnection()->createTable($table);
  
$installer->endSetup();