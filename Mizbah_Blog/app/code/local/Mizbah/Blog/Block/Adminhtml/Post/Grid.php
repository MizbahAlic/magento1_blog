<?php

class Mizbah_Blog_Block_Adminhtml_Post_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
         
        $this->setDefaultSort('post_id');
        $this->setId('blog_post_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);

    }
    protected function _getCollectionClass()
    {
        return 'mizbah_blog/post_collection';
    }
     
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
     
    protected function _prepareColumns()
    {
        $this->addColumn('post_id',
            array(
                'header'=> $this->__('POST ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'post_id'
            )
        );   
        $this->addColumn(
            'title',
            array(
                'header'    => $this->__('TITLE'),
                'align'     => 'left',
                'index'     => 'title',
            )
        );   
        $this->addColumn(
            'description',
            array(
                'header'    => $this->__('DESCRIPTION'),
                'align'     => 'left',
                'index'     => 'description',
            )
        );   
        $this->addColumn(
            'author',
            array(
                'header'    => $this->__('AUTHOR'),
                'align'     => 'left',
                'index'     => 'author',
            )
        );   
        $this->addColumn(
            'created_at',
            array(
                'header' => Mage::helper('mizbah_blog')->__('Created at'),
                'index'  => 'created_at',
                'width'  => '120px',
                'type'   => 'datetime',
            )
        );
        $this->addColumn(
            'updated_at',
            array(
                'header'    => Mage::helper('mizbah_blog')->__('Updated at'),
                'index'     => 'updated_at',
                'width'     => '120px',
                'type'      => 'datetime',
            )
        );
        $this->addColumn(
            'action',
            array(
                'header'  =>  Mage::helper('mizbah_blog')->__('Action'),
                'width'   => '100',
                'type'    => 'action',
                'getter'  => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('mizbah_blog')->__('Edit'),
                        'url'     => array('base'=> '*/*/edit'),
                        'field'   => 'post_id'
                    ),
                    
                    // array(
                    //     'caption' => Mage::helper('mizbah_blog')->__('Delete'),
                    //     'url'     => array('base'=> '*/*/delete'),
                    //     'field'   => 'post_id'
                    // )
                ),
                'filter'    => false,
                'is_system' => true,
                'sortable'  => false,
            )
        );
        return parent::_prepareColumns();
    }    
}