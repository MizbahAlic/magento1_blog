<?php
class Mizbah_Blog_Block_Adminhtml_Post_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {  
        parent::__construct();
     
        $this->setId('mizbah_blog_post_form');
        $this->setTitle($this->__('Mizbah Blog Information'));
    }  

    protected function _prepareForm()
    {  
        $model = Mage::registry('mizbah_blog');
     
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('post_id'))),
            'method'    => 'post'
        ));
        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Post Information'),
            'class'     => 'fieldset-wide',
        ));
     
        if ($model->getId()) {
            $fieldset->addField('post_id', 'hidden', array(
                'name' => 'id',
            ));
        }  
     
        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('mizbah_blog')->__('Title'),
            'title'     => Mage::helper('mizbah_blog')->__('Title'),
            'style'     => 'width: 100px; ',
            'required'  => true,
        ));
        $fieldset->addField('author', 'text', array(
                      'name'      => 'author',
                      'label'     => Mage::helper('mizbah_blog')->__('Author'),
                      'title'     => Mage::helper('mizbah_blog')->__('Author'),
                      'required'  => true,
        ));

        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config');
        $fieldset->addField('description', 'editor', array(
            'name'      => 'description',
            'label'     => Mage::helper('mizbah_blog')->__('Description'),
            'title'     => Mage::helper('mizbah_blog')->__('Description'),
            'style'     => 'font-size: 14px; ',
            'wysiwyg'   => true,
            'required'  => true,
            'config'    => $wysiwygConfig
        ));
        $fieldset->addField('short_description', 'editor', array(
            'name'      => 'short_description',
            'label'     => Mage::helper('mizbah_blog')->__('Short Description'),
            'title'     => Mage::helper('mizbah_blog')->__('Short Description'),
            'style'     => 'font-size: 11px; ',
            'required'  => false,
        ));
        
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
     
        return parent::_prepareForm();
    }  
    
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
        $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }
}