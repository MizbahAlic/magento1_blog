<?php

class Mizbah_Blog_Block_Post extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('mizbah_blog/posts.phtml');
    }
    public function getPosts()
    {
        $collections = Mage::getModel('mizbah_blog/post')->getCollection()->getData();
        return $collections;
    }
    public function getFrontName()
    {
        return Mage::getConfig()->getNode('default/mizbah_blog/post/front_name');
    }
}