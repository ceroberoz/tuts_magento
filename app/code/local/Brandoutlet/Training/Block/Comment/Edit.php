<?php

class Brandoutlet_Training_Block_Adminhtml_Comment_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
        public function __construct()
        {

                parent::__construct();
                $this->_objectId = "id";
                $this->_blockGroup = "brandoutlet_training";
                $this->_controller = "adminhtml_comment";
                $this->_updateButton("save", "label", Mage::helper("brandoutlet_training")->__("Save Comment"));
                $this->_updateButton("delete", "label", Mage::helper("brandoutlet_training")->__("Delete comment"));

                $this->_formScripts[] = "
                            function saveAndContinueEdit(){
                                editForm.submit($('edit_form').action+'back/edit/');
                            }
                        ";
        }

        public function getHeaderText()
        {
                if( Mage::registry("comment_data") && Mage::registry("comment_data")->getId() ){

                    return Mage::helper("brandoutlet_training")->__("Edit Comment with id %s", $this->htmlEscape(Mage::registry("comment_data")->getId()));

                }
                else{

                     return Mage::helper("brandoutlet_training")->__("Add Comment");

                }
        }
}
