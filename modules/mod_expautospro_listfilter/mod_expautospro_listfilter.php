<?php/****************************************************************************************\ **   @name		EXP Autos  2.0                                                  ** **   @package          Joomla 1.6                                                      ** **   @author		EXP TEAM::Alexey Kurguz (Grusha)                                ** **   @copyright	Copyright (C) 2005 - 2011  EXP TEAM::Alexey Kurguz (Grusha)     ** **   @link             http://www.feellove.eu                                          ** **   @license		Commercial License                                              ** \****************************************************************************************///no direct accessdefined('_JEXEC') or die;require_once dirname(__FILE__).'/helper.php';$module_id = $module->id;$expsearch          = ModExpautosListFilter::explistfilter();$moduleclass_sfx    = htmlspecialchars($params->get('moduleclass_sfx'));$category           = ModExpautosListFilter::getCategory($module_id,$params);$make               = ModExpautosListFilter::getMake($module_id,$params);$model              = ModExpautosListFilter::getModel($module_id,$params);$condition          = ModExpautosListFilter::getCondition($module_id,$params);$bodytype           = ModExpautosListFilter::getBodytype($module_id,$params);$extrafield1        = ModExpautosListFilter::getExtrafield1($module_id,$params);$extrafield2        = ModExpautosListFilter::getExtrafield2($module_id);$extrafield3        = ModExpautosListFilter::getExtrafield3($module_id);$yearfrom           = ModExpautosListFilter::getYearFrom($module_id);$yearto             = ModExpautosListFilter::getYearTo($module_id);$fuel               = ModExpautosListFilter::getFuel($module_id);$drive              = ModExpautosListFilter::getDrive($module_id);$trans              = ModExpautosListFilter::getTrans($module_id);$country            = ModExpautosListFilter::getCountry($module_id,$params);$expstate           = ModExpautosListFilter::getExpState($module_id,$params);$city               = ModExpautosListFilter::getCity($module_id);$expuser            = ModExpautosListFilter::getDealer($module_id);$ageof              = ModExpautosListFilter::getAgeof($module_id);$sortby             = ModExpautosListFilter::expsortBy($module_id);$itemid             = ModExpautosListFilter::getItemid($module_id);$color              = ModExpautosListFilter::getColor($module_id);require(JModuleHelper::getLayoutPath('mod_expautospro_listfilter', $params->get('layout', 'default')));?>