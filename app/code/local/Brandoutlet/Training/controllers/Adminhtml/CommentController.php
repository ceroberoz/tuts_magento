<?php

class Brandoutlet_Training_Adminhtml_CommentController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Brandoutlet'))->_title($this->__('Comments'));
        $this->loadLayout();
        $this->_setActiveMenu('brandoutlet_training/comment');
        $this->_addContent($this->getLayout()->createBlock('brandoutlet_training/adminhtml_comment'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('brandoutlet_training/adminhtml_comment_grid')->toHtml()
        );
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("brandoutlet_training/comment")->load($id);
        if ($model->getId()) {
            Mage::register("comment_data", $model);
            $this->loadLayout();
            $this->_setActiveMenu("brandoutlet_training/comment");
            $this->_addContent($this->getLayout()->createBlock("brandoutlet_training/adminhtml_comment_edit"))->_addLeft($this->getLayout()->createBlock("brandoutlet_training/adminhtml_comment_edit_tabs"));
            $this->renderLayout();
        }
        else {
            Mage::getSingleton("adminhtml/session")->addError(Mage::helper("brandoutlet_training")->__("Item does not exist."));
            $this->_redirect("*/*/");
        }
    }

    public function newAction()
    {

        $id   = $this->getRequest()->getParam("id");
        $model  = Mage::getModel("brandoutlet_training/comment")->load($id);

        $data = Mage::getSingleton("adminhtml/session")->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register("comment_data", $model);

        $this->loadLayout();
        $this->_setActiveMenu("brandoutlet_training/comment");

        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

        $this->_addContent($this->getLayout()->createBlock("brandoutlet_training/adminhtml_comment_edit"))->_addLeft($this->getLayout()->createBlock("brandoutlet_training/adminhtml_comment_edit_tabs"));

        $this->renderLayout();

    }

    public function deleteAction()
    {
      $post_data=$this->getRequest()->getPost();


          if ($post_data) {

              try {
                  $model = Mage::getModel("brandoutlet_training/comment")
                  ->addData($post_data)
                  ->setId($this->getRequest()->getParam("id"))
                  ->delete();

                  Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("comment was successfully deleted"));
                  Mage::getSingleton("adminhtml/session")->setCommentData(false);

                  if ($this->getRequest()->getParam("back")) {
                      $this->_redirect("*/*/edit", array("id" => $model->getId()));
                      return;
                  }
                  $this->_redirect("*/*/");
                  return;
              }
              catch (Exception $e) {
                  Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                  $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
              return;
              }

          }
          $this->_redirect("*/*/");
    }

    public function saveAction()
    {

        $post_data=$this->getRequest()->getPost();


            if ($post_data) {

                try {
                    $model = Mage::getModel("brandoutlet_training/comment")
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->save();

                    Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("comment was successfully saved"));
                    Mage::getSingleton("adminhtml/session")->setCommentData(false);

                    if ($this->getRequest()->getParam("back")) {
                        $this->_redirect("*/*/edit", array("id" => $model->getId()));
                        return;
                    }
                    $this->_redirect("*/*/");
                    return;
                }
                catch (Exception $e) {
                    Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                    $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
                }

            }
            $this->_redirect("*/*/");
    }
}
