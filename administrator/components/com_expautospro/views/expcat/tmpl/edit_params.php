<?php

/****************************************************************************************\
 **   @name		EXP Autos  2.0                                                  **
 **   @package          Joomla 1.6                                                      **
 **   @author		EXP TEAM::Alexey Kurguz (Grusha)                                **
 **   @copyright	Copyright (C) 2005 - 2011  EXP TEAM::Alexey Kurguz (Grusha)     **
 **   @link             http://www.feellove.eu                                          **
 **   @license		Commercial License                                              **
 \****************************************************************************************/

// No direct access.
defined('_JEXEC') or die;

$fieldSets = $this->form->getFieldsets('params');
foreach ($fieldSets as $name => $fieldSet) :
    echo JHtml::_('sliders.panel', JText::_($fieldSet->label), $name . '-params');
    if (isset($fieldSet->description) && trim($fieldSet->description)) :
        echo '<p class="tip">' . $this->escape(JText::_($fieldSet->description)) . '</p>';
    endif;
    ?>
    <fieldset class="panelform" >
        <ul class="adminformlist">
            <?php foreach ($this->form->getFieldset($name) as $field) : ?>
                <li><?php echo $field->label; ?>
                    <?php echo $field->input; ?></li>
            <?php endforeach; ?>
        </ul>
    </fieldset>
<?php endforeach; ?>
