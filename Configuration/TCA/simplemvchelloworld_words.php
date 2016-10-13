<?php

// ******************************************************************
// table simplemvchelloworld_words
// $Id: simplemvchelloworld_words.php 219 2013-10-30 10:05:10Z franzholz $
//
// ******************************************************************

$result = array (
	'ctrl' => Array (
		'title' =>'LLL:EXT:' . SIMPLEMVCHELLOWORLD_EXT . '/locallang_db.xml:simplemvchelloworld_words',
		'label' => 'title',
		'default_sortby' => 'ORDER BY title',
		'tstamp' => 'tstamp',
		'prependAtCopy' => 'LLL:EXT:lang/locallang_general.php:LGL.prependAtCopy',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => Array (
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			'fe_group' => 'fe_group',
		),
		'mainpalette' => 1,
// 		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath(SIMPLEMVCHELLOWORLD_EXT) . 'Configuration/TCA/simplemvchelloworld_words.php',
		'iconfile' => t3lib_extMgm::extRelPath(SIMPLEMVCHELLOWORLD_EXT) . 'Resources/Private/Images/simplemvchelloworld_words.gif',
		'dividers2tabs' => '1',
		'searchFields' => 'title',
	),
	'interface' => array (
		'showRecordFieldList' => 'hidden,starttime,endtime,fe_group,title'
	),
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => array (
				'type' => 'check'
			)
		),
		'tstamp' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:' . SIMPLEMVCHELLOWORLD_EXT . '/locallang_db.xml:tstamp',
			'config' => array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'default' => '0'
			)
		),
		'crdate' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:' . SIMPLEMVCHELLOWORLD_EXT . '/locallang_db.xml:crdate',
			'config' => array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'default' => '0'
			)
		),
		'starttime' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
			'config' => array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'checkbox' => '0',
				'default' => '0'
			)
		),
		'endtime' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
			'config' => array (
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'date',
				'checkbox' => '0',
				'default' => '0',
				'range' => array (
					'upper' => mktime(0, 0, 0, 12, 31, 2300),
					'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))
				)
			)
		),
		'fe_group' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.fe_group',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
					array('LLL:EXT:lang/locallang_general.php:LGL.hide_at_login', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.any_login', -2),
					array('LLL:EXT:lang/locallang_general.php:LGL.usergroups', '--div--')
				),
				'foreign_table' => 'fe_groups'
			)
		),
		'title' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:' . SIMPLEMVCHELLOWORLD_EXT . '/locallang_db.xml:simplemvchelloworld_words.title',
			'config' => array (
				'type' => 'input',
				'size' => '40',
				'max' => '256'
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'title;;7;;3-3-3,hidden;;1,')
	),
	'palettes' => array (
		'1' => array('showitem' => 'starttime,endtime,fe_group'),
	)
);

return $result;
?>