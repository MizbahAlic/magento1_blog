<?php

class Mizbah_Blog_Block_View extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('mizbah_blog/view.phtml');
    }
    public function getCurrentPost()
    {
        $id = Mage::registry('id');
        return Mage::getModel('mizbah_blog/post')->load($id)->getData();
    }
    public function get404()
    {
        return Mage::app()->getFrontController()->getResponse()->setRedirect('no_route');
    }
}