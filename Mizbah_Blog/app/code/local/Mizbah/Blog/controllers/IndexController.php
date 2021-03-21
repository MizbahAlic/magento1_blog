<?php

class Mizbah_Blog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function getBreadcrumb()
    {
        $breadcrumb = $this->getLayout()->getBlock('breadcrumbs');
        $breadcrumb->addCrumb(
            'home',
            array(
                'label' => Mage::helper('mizbah_blog')->__('Home'),
                'link' => Mage::getUrl(),
            )
        );
        $breadcrumb->addCrumb(
            'posts',
            array(
                'label' => Mage::helper('mizbah_blog')->__('Blog'),
                'link' => '',
            )
        );
    }
    public function indexAction()
    {
        $this->loadLayout();
        $this->getBreadcrumb();
        $this->renderLayout();
    }
}
