<?php/* * **************************************************************************************\ * *   @name		EXP Autos  2.0                                                  ** * *   @package          Joomla 1.6                                                      ** * *   @author		EXP TEAM::Alexey Kurguz (Grusha)                                ** * *   @copyright	Copyright (C) 2005 - 2011  EXP TEAM::Alexey Kurguz (Grusha)     ** * *   @link             http://www.feellove.eu                                          ** * *   @license		Commercial License                                              **  \*************************************************************************************** *///no direct accessdefined('_JEXEC') or die;require_once JPATH_SITE . '/components/com_expautospro/helpers/route.php';require_once JPATH_SITE . '/components/com_expautospro/helpers/expparams.php';jimport('joomla.application.categories');class ModExpautosCategories {    public static function getList($params) {        $parent = $params->get('parent', 'root');        $count = $params->get('count', 0);        return ExpAutosProExpparams::getExpCat($parent,$count);    }    public static function getExpAllowcat() {        $expparams = ExpAutosProExpparams::getExpParams('config', 1);        return $expparams;    }    public static function getItemid() {        $expitemid = ExpAutosProExpparams::getExpLinkItemid();        return $expitemid;    }}?>