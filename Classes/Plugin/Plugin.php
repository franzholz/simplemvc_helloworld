<?php
namespace JambageCom\SimplemvcHelloworld\Plugin;

use DmitryDulepov\Simplemvc\Controller\AbstractController;

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

/**
 * $Id: Plugin.php 219 2013-10-30 10:05:10Z franzholz $
 *
 * Plugin handling
 *
 * @author Franz Holzinger <franz@ttproducts.de>
 */
class Plugin {

	/**
	 * Creates the instance of this class.
	 *
	 * @param \DmitryDulepov\Simplemvc\Controller\AbstractController $controller
	 */
	public function __construct (AbstractController $controller) {
		$this->controller = $controller;
	}

	/**
	 * Checks the display modes
	 *
	 * @return string
	 */
	public function getDisplayModes () {

		$result = array();

		$displayModes = $this->controller->getConfigurationValue('display_mode');
		if ($displayModes != '') {
			$result = explode(',', $displayModes);
		}

		return $result;
	}
}

?>