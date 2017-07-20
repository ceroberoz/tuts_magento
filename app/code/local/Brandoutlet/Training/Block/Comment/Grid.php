<?php

class Brandoutlet_Training_Block_Adminhtml_Comment_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('brandoutlet_training_grid');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('brandoutlet_training/comment')->getCollection();

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('brandoutlet_training');

        $this->addColumn('comment_id', array(
            'header' => $helper->__('comment id'),
            'index'  => 'comment_id'
        ));

        $this->addColumn('comment', array(
            'header' => $helper->__('comment'),
            'index'  => 'comment'
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
           return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
