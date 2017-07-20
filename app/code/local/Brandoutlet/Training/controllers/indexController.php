<?php

class Brandoutlet_Training_IndexController extends Mage_Core_Controller_Front_Action
{
  public function indexAction()
  {
    // echo "meong";

    // day 3
    $this->loadLayout();
    $block = $this->getLayout()->createBlock(
      'training_test/commentblock', //type block
      'commentblock', // name block
        array(
          'template' => 'page/html/custom.phtml'
        );
      )

    $this->getLayout()->getBlock('content')->append($block);
    $this->renderLayout();
  }

  public function blockAction()
    {
      $this->loadLayout();

      $block = $this->getLayout()->createBlock(
        'brandoutlet_training/comment', // type
        'custom.block', // name block
        array('template' => 'brandoutlet/training/comment.phtml')
      );

      $this->getLayout()->getBlock('content')->append($block); // setup block di block content
      $this->renderLayout(); // render layout yang sudah di buat diatas
    }
}

?>
