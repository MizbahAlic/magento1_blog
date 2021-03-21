<?php

class Mizbah_Blog_Model_Post extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('mizbah_blog/post');
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();
        $current_time = Mage::getSingleton('core/date')->gmtDate();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($current_time);
        }
        else{
            $this->setUpdatedAt($current_time);
        }
        return $this;
    }
}