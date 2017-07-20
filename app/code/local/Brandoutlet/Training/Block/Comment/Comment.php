<?php

class Brandoutlet_Training_Block_Adminhtml_Comment extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'brandoutlet_training';
        $this->_controller = 'adminhtml_comment';
        $this->_headerText = Mage::helper('brandoutlet_training')->__('Comment');

        parent::__construct();
    }
}
