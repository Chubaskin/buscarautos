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
JFormHelper::loadFieldClass('list');

class JFormFieldCategor extends JFormFieldList {

    /**
     * The form field type.
     *
     * @var		string
     * @since	1.6
     */
    protected $type = 'Categor';

    /**
     * Method to get the field options.
     *
     * @return	array	The field option objects.
     * @since	1.6
     */
    public function getOptions($data=0) {
        // Initialize variables.
        $options = array();

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        if ($data) {
            $databasename = (string) $data;
        } else {
            $databasename = (string) $this->element['database'];
        }
        $query->select('id As value, name As text');
        $query->from('#__expautos_' . $databasename . ' AS a');
        $query->where('a.state > 0');
        $query->order('a.ordering');

        // Get the options.
        $db->setQuery($query);

        $options = $db->loadObjectList();

        // Check for a database error.
        if ($db->getErrorNum()) {
            JError::raiseWarning(500, $db->getErrorMsg());
        }
        if (!$data) {
            if(!$this->element['noselect']){
            array_unshift($options, JHtml::_('select.option', '0', JText::_('JSELECT')));
            }
        }

        return $options;
    }

}
