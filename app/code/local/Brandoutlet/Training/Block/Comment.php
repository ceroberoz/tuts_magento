<?php

class Brandoulet_Training_Block_Comment extends Mage_Core_Block_Template
{
  public function getComment($comment_id)
    {
        $model = Mage::getModel('brandoutlet_training/comment');
        $comment = $model->load($comment_id);
        return $comment->getData();
    }
}

 ?>
