<?php

class Mizbah_Blog_Block_Adminhtml_Post extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        //All Posts Page
        $this->_blockGroup = 'mizbah_blog';
        $this->_controller = 'adminhtml_post';
        parent::__construct();
        
        $this->_headerText = Mage::helper('mizbah_blog')->__('Posts');
        $this->_updateButton('add', 'label', Mage::helper('mizbah_blog')->__('Add New Post'));

    }
}