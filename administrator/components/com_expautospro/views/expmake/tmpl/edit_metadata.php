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

$fieldSets = $this->form->getFieldsets('metadata');
foreach ($fieldSets as $name => $fieldSet) :
	echo JHtml::_('sliders.panel',JText::_($fieldSet->label), $name.'-options');
	if (isset($fieldSet->description) && trim($fieldSet->description)) :
		echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
	endif;
	?>
	<fieldset class="panelform">
		<ul class="adminformlist">
			<?php if ($name == 'expmetadata'):?>
				<li><?php echo $this->form->getLabel('metadesc'); ?>
				<?php echo $this->form->getInput('metadesc'); ?></li>

				<li><?php echo $this->form->getLabel('metakey'); ?>
				<?php echo $this->form->getInput('metakey'); ?></li>

				<li><?php echo $this->form->getLabel('xreference'); ?>
				<?php echo $this->form->getInput('xreference'); ?></li>
			<?php endif; ?>
			<?php foreach ($this->form->getFieldset($name) as $field) : ?>
				<li><?php echo $field->label; ?>
				<?php echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
<?php endforeach; ?>