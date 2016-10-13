<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE == "BE") {

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Resources/Private/', 'Hello World!');

	$listType = $_EXTKEY;
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$listType] = 'layout,select_key';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][$listType] = 'pi_flexform';
	t3lib_extMgm::addPiFlexFormValue($listType, 'FILE:EXT:' . $_EXTKEY . '/flexform_ds.xml');
	t3lib_extMgm::addPlugin(Array('LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:tt_content.list_type', $listType), 'list_type');
}

// TODO: future versions:
// \DmitryDulepov\Simplemvc\Utility\SimplemvcUtility::registerControllerInExtTablesPhp($_EXTKEY, 'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:tt_content.frontend_controller', 'JambageCom\\SimplemvcHelloworld\\Controller\\FrontendController');

?>