<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Franz Holzinger (franz@ttproducts.de)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('simplemvc_helloworld');
return array(
	// old
	'tx_simplemvchelloworld' => $extPath . 'tx_simplemvchelloworld.php',

	// Controllers
	'JambageCom\\SimplemvcHelloworld\\Controller\\FrontendController' => $extPath . 'Classes/Controller/FrontendController.php',

	// Views
	'JambageCom\\SimplemvcHelloworld\\View\\ListView' => $extPath . 'Classes/View/ListView.php',
	'JambageCom\\SimplemvcHelloworld\\View\\PluginView' => $extPath . 'Classes/View/PluginView.php',
	'JambageCom\\SimplemvcHelloworld\\View\\SetupView' => $extPath . 'Classes/View/SetupView.php',
	'JambageCom\\SimplemvcHelloworld\\View\\SingleView' => $extPath . 'Classes/View/SingleView.php',

	// Plugin
	'JambageCom\\SimplemvcHelloworld\\Plugin\\Plugin' => $extPath . 'Classes/Plugin/Plugin.php',
);


?>