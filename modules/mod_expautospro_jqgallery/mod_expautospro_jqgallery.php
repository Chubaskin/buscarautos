<?php/****************************************************************************************\ **   @name		EXP Autos  2.0                                                  ** **   @package          Joomla 1.6                                                      ** **   @author		EXP TEAM::Alexey Kurguz (Grusha)                                ** **   @copyright	Copyright (C) 2005 - 2011  EXP TEAM::Alexey Kurguz (Grusha)     ** **   @link             http://www.feellove.eu                                          ** **   @license		Commercial License                                              ** \****************************************************************************************///no direct accessdefined('_JEXEC') or die;require_once dirname(__FILE__).'/helper.php';$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));$expimages = ModExpautosjQgallery::expImages($params);$itemid    = ModExpautosjQgallery::getItemid(isset($module_id));if(!empty($expimages))require(JModuleHelper::getLayoutPath('mod_expautospro_jqgallery', $params->get('layout', 'default')));?>