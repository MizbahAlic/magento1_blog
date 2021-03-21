<?php

class Mizbah_Blog_PostController extends Mage_Core_Controller_Front_Action
{
    public function getBreadcrumb($data = null)
    {
        $breadcrumb = $this->getLayout()->getBlock('breadcrumbs');
        $breadcrumb->addCrumb(
            'home',
            array(
                'label' => Mage::helper('mizbah_blog')->__('Home'),
                'link' => Mage::getUrl(),
            )
        );
        if($data){
            $breadcrumb->addCrumb(
                'posts',
                array(
                    'label' => Mage::helper('mizbah_blog')->__('Blog'),
                    'link' => '/'.$data,
                )
            );
        }
        else{
            $breadcrumb->addCrumb(
                'posts',
                array(
                    'label' => Mage::helper('mizbah_blog')->__('Blog'),
                    'link' => '',
                )
            );
        }
    }
    public function getFrontName()
    {
        return Mage::getConfig()->getNode('default/mizbah_blog/post/front_name');
    }
    public function viewAction()
    {
        $data['id'] = $this->getRequest()->getParam('id');
        Mage::register('id', $data['id']);
        $this->loadLayout();
        $this->getBreadcrumb($this->getFrontName());
        $this->renderLayout();       
    }
}