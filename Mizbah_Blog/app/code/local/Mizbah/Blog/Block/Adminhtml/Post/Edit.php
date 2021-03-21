<?php

class Mizbah_Blog_Block_Adminhtml_Post_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {  
        $this->_objectId = 'post_id';
        $this->_blockGroup = 'mizbah_blog';
        $this->_controller = 'adminhtml_post';
        parent::__construct();
        $this->_updateButton('save', 'label', $this->__('Save This Post'));
        $this->_updateButton('delete', 'label', Mage::helper('mizbah_blog')->__('Delete This Post'));
    }  
    public function getHeaderText()
    {  
        if (Mage::registry('mizbah_blog')->getId()) {
            return $this->__('Edit Post');
        }  
        else {
            return $this->__('New Post');
        }  
    }                   
}