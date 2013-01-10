<?php

/****************************************************************************************\
 **   @name		EXP Autos  2.0                                                  **
 **   @package          Joomla 1.6                                                      **
 **   @author		EXP TEAM::Alexey Kurguz (Grusha)                                **
 **   @copyright	Copyright (C) 2005 - 2011  EXP TEAM::Alexey Kurguz (Grusha)     **
 **   @link             http://www.feellove.eu                                          **
 **   @license		Commercial License                                              **
 \****************************************************************************************/


defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
require_once JPATH_SITE . '/components/com_expautospro/helpers/expparams.php';

class JFormFieldExpphoto extends JFormField {

    /**
     * The form field type.
     *
     * @var		string
     * @since	1.6
     */
    protected $type = 'Expphoto';

    /**
     * Method to get the field options.
     *
     * @return	array	The field option objects.
     * @since	1.6
     */
    public function getInput() {
        
        $table_id = (int)$this->form->getValue('id');
        $result = ExpAutosProExpparams::getExpParams('expuser', $table_id);
        $result = $result->get('expphoto');
        if ($result) {
            $logoimg = '<li><img src="' . ExpAutosProExpparams::ImgUrlPatchLogo() . $result . '" /></li>';
            $logoimg .= '<li>';
            $logoimg .='<input type="checkbox" name="delete_userphoto"/>';
            $logoimg .='<label id="jform_delete_photo-lbl" for="jform_delete_photo" title="">';
            $logoimg .= JText::_('COM_EXPAUTOSPRO_CP_EXPUSER_DEALERINFO_DELETEPHOTO_TEXT') ;
            $logoimg .='</label>';
            $logoimg .= "</li>";
            $logoimg .= "<input type='hidden' name='userphoto_name' value='".$result."' />";
        } else {
            $attr = $this->element['onchange'] ?  ' onclick="' . (string) $this->element['onchange'] . '"': '';
            $logoimg = '<li><input type="file" name="userphoto" value="" '.$attr.' /></li>';
        }
        return $logoimg;
    }

}