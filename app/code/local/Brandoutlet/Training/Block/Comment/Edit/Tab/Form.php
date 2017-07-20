<?php
class Brandoutlet_Training_Block_Adminhtml_Comment_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
        protected function _prepareForm()
        {

                $form = new Varien_Data_Form();
                $this->setForm($form);
                $fieldset = $form->addFieldset("comment_form", array("legend"=>Mage::helper("brandoutlet_training")->__("Step information")));


                        $fieldset->addField("comment", "text", array(
                        "label" => Mage::helper("brandoutlet_training")->__("comment"),
                        "class" => "required-entry",
                        "required" => true,
                        "name" => "comment",
                        ));


                if (Mage::getSingleton("adminhtml/session")->getCommentData())
                {
                    $form->setValues(Mage::getSingleton("adminhtml/session")->getCommentData());
                    Mage::getSingleton("adminhtml/session")->setCommentData(null);
                }
                elseif(Mage::registry("comment_data")) {
                    $form->setValues(Mage::registry("comment_data")->getData());
                }
                return parent::_prepareForm();
        }
}
