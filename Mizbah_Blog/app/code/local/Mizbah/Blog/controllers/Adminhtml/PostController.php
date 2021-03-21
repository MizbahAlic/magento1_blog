<?php

class Mizbah_Blog_Adminhtml_PostController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
	{
		return Mage::getSingleton('admin/session')->isAllowed('blog/post');
	}

    public function indexAction()
    {
        $this->_title($this->__('Custom Blog'))
             ->_title($this->__('All Posts'));
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {  
        $id  = $this->getRequest()->getParam('post_id');
        $model = Mage::getModel('mizbah_blog/post');
     
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This post no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }  
        }  
     
        $this->_title($model->getId() ? $model->getName() : $this->__('New Post'));
     
        $data = Mage::getSingleton('adminhtml/session')->getPostData(true);
        if (!empty($data)) {
            $model->setData($data);
        }  
     
        Mage::register('mizbah_blog', $model);
     
        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit') : $this->__('New'), $id ? $this->__('Edit') : $this->__('New'))
            ->_addContent($this->getLayout()->createBlock('mizbah_blog/adminhtml_post_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    public function saveAction()
    {
        if($data = $this->getRequest()->getPost()){
            $model = Mage::getModel('mizbah_blog/post');
            try {
                $id = $this->getRequest()->getParam('id');
                $model->setData($data);
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                if($id){ 
                    $model->setId($id); 
                }
                $model->save();
                if(!$model->getId()){
                    Mage::throwException('Error saving record');
                }
                Mage::getSingleton('adminhtml/session')->addSuccess('Record was successfully saved.');
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/');
            }
        }
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('post_id')) {
            $post = Mage::getModel('mizbah_blog/post')->load($id);
            try {
                $post->delete();
                $this->_getSession()->addSuccess(
                    Mage::helper('mizbah_blog')->__('The posts has been deleted.')
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }
    
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('mizbah_blog/mizbah_blog_post')
            ->_title($this->__('Add New Post'))
            ->_addBreadcrumb($this->__('Blog'), $this->__('Mizbah'));
        return $this;
    }
}