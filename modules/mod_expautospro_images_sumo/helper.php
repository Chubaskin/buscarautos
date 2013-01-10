<?php/****************************************************************************************\ **   @name		EXP Autos  2.0                                                  ** **   @package          Joomla 1.6                                                      ** **   @author		EXP TEAM::Alexey Kurguz (Grusha)                                ** **   @copyright	Copyright (C) 2005 - 2011  EXP TEAM::Alexey Kurguz (Grusha)     ** **   @link             http://www.feellove.eu                                          ** **   @license		Commercial License                                              ** \****************************************************************************************///no direct accessdefined('_JEXEC') or die;require_once JPATH_ROOT . '/components/com_expautospro/helpers/expparams.php';class ModExpautosImagesSumo {        public static function expImages($params){                $user	= JFactory::getUser();                $groups	= implode(',', $user->getAuthorisedViewLevels());                $db = JFactory::getDbo();                $query = $db->getQuery(true);                $nullDate = $db->quote($db->getNullDate());                $expparams = ExpAutosProExpparams::getExpParams('config', 1);                $multi_models = $expparams->get('c_admanager_mdpage_multi',0);                $postexpcat     = JRequest::getInt('catid');                $postexpmake    = JRequest::getInt('makeid');                //$postexpmodel   = JRequest::getInt('modelid');                $postexpuser    = JRequest::getInt('userid');                $postexpid      = JRequest::getInt('id');                                if($multi_models){                    $postexpmodel = JRequest::getVar('modelid', array(), 'get', 'array');                    $postexpmodel = array_filter($postexpmodel, 'is_numeric');                    $postexpmodel =  implode(',', $postexpmodel);                }else{                    $postexpmodel = (int) JRequest::getInt('modelid', 0);                }                                $query_id_result = null;                if($postexpid && ($params->get('expsort1')==1 && !$postexpcat) || ($params->get('expsort1')==2 && !$postexpmake) || ($params->get('expsort1')==3 && !$postexpmodel) || ($params->get('expsort1')==4)){                    switch ($params->get('expsort1')) {                        case 1:                            $select_name = 'catid';                            break;                        case 2:                            $select_name = 'make';                            break;                        case 3:                            $select_name = 'model';                            break;                        case 4:                            $select_name = 'user';                            break;                    }                                        $query_id = $db->getQuery(true);                    $query_id->select($select_name);                    $query_id->from('#__expautos_admanager');                    $query_id->where('id = '.$postexpid);                    $db->setQuery((string) $query_id);                    $query_id_result = $db->loadResult();                }                $query->select('a.id AS adid, a.year AS year, a.creatdate AS creatdate');                $query->select('a.mileage AS mileage, a.specificmodel AS specificmodel');                $query->select('a.ftop AS ftop, a.fcommercial AS fcommercial');                $query->select('a.special AS special, a.expreserved AS expreserved');                $query->select('IF( a.bprice != "",a.bprice,a.price ) price, a.imgmain AS img_name');                $query->from('#__expautos_admanager as a');                $query->where('a.state=1');                                /* Categories */                /*                $query->select('c.id AS categid, c.name AS category_name');                $query->join('LEFT', '#__expautos_categories AS c ON c.id = a.catid');                 */                $query->select('c.title AS category_name, c.id AS categid');                $query->join('LEFT', '#__categories AS c ON c.id = a.catid');                //$query->where('c.state=1');                /* Makes */                $query->select('mk.id AS mkid, mk.name AS make_name');                $query->join('LEFT', '#__expautos_make AS mk ON mk.id = a.make');                //$query->where('mk.state=1');                /* Models */                $query->select('md.id AS mdid, md.name AS model_name');                $query->join('LEFT', '#__expautos_model AS md ON md.id = a.model');                /* Body Type */                $query->select('bt.name AS bodytype_name');                $query->join('LEFT', '#__expautos_bodytype AS bt ON bt.id = a.bodytype');                /* Drive */                $query->select('dr.name AS drive_name');                $query->join('LEFT', '#__expautos_drive AS dr ON dr.id = a.drive');                 /* Fuel */                $query->select('fl.name AS fuel_name, fl.code AS fuel_code');                $query->join('LEFT', '#__expautos_fuel AS fl ON fl.id = a.fuel');                /* Condition */                $query->select('cond.name AS cond_name');                $query->join('LEFT', '#__expautos_condition AS cond ON cond.id = a.condition');                                // Join over the images.                /* old version 3.5.1                $query->select('img.name AS img_name');                $query->join('LEFT', '#__expautos_images AS img ON a.id = img.catid AND img.ordering = 1');                 */                                /* EXP User */                $query->join('LEFT', '#__expautos_expuser AS expuser ON expuser.userid = a.user');                                /* Country */                if($params->get('countryby') == 1){                    if((int)$params->get('country'))                        $query->where('a.country = '.(int)$params->get('country'));                }elseif($params->get('countryby') == 2){                    if((int)$params->get('country'))                        $query->where('expuser.country = '.(int)$params->get('country'));                }                                /* Access */                $query->select('ag.title AS access_level');                $query->join('LEFT', '#__viewlevels AS ag ON ag.id = c.access');                $query->where('c.access IN ('.$groups.')');                if((int)$postexpid){                    $query->where('a.id != '.(int)$postexpid);                }                                                                if((int)$params->get('expcategor')){                        $expallcat = ExpAutosProExpparams::getExpCatChilds($params->get('expcategor'));                        $query->where('c.id IN ('.$expallcat.') ');                }                if((int)$params->get('expuser'))                    $query->where('expuser.userid = '.(int)$params->get('expuser'));                if((string)$params->get('expsort2'))                    $query->where('a. '.(string)$params->get('expsort2').' = 1');                if((int)$params->get('showsolid'))                    $query->where('a.solid = 0');                if((int)$params->get('showreserved'))                    $query->where('a.expreserved = 0');                if((int)$params->get('showonlyimg'))                    $query->where('a.imgmain>0');                if((int)$params->get('expsort1')){                    if($params->get('expsort1')==1){                        if($query_id_result){                            $query->where('a.catid = '.$query_id_result);                        }else{                            $query->where('a.catid = '.$postexpcat);                        }                    }elseif($params->get('expsort1')==2){                        if($query_id_result){                            $query->where('a.make = '.$query_id_result);                        }else{                            $query->where('a.make = '.$postexpmake);                        }                    }elseif($params->get('expsort1')==3){                        if($query_id_result){                            $query->where('a.model = '.$query_id_result);                        }elseif($postexpmodel){                            if($multi_models){                                $query->where('a.model IN ('.$postexpmodel.')');                            }else{                                $query->where('a.model = '.$postexpmodel);                            }                        }                    }elseif($params->get('expsort1')==4){                        $query->where('a.user = '.(int)$query_id_result);                    }                }                                if((string)$params->get('expgroup') == 'random'){                    $query->order('RAND() LIMIT 0,'.(int)$params->get('expcountimg'));                }else{                    $query->order('a.'.$params->get('expgroup').' '.$params->get('exporder').' LIMIT 0,'.(int)$params->get('expcountimg'));                }                                $db->setQuery((string) $query);                if (!$db->query()) {                    JError::raiseError(500, $db->getErrorMsg());                }                                $return = $db->loadObjectList();                                return $return;    }        public static function getItemid() {        $expitemid = ExpAutosProExpparams::getExpLinkItemid();        return $expitemid;    }}?>