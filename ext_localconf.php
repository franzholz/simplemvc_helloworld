<?php

if (!defined ('SIMPLEMVCHELLOWORLD_EXT')) {
	define('SIMPLEMVCHELLOWORLD_EXT', $_EXTKEY);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY);

// TODO: future versions:
// \DmitryDulepov\Simplemvc\Utility\SimplemvcUtility::registerControllerInExtLocalconfPhp($_EXTKEY, 'JambageCom\\SimplemvcHelloworld\\Controller\\FrontendController');

?>