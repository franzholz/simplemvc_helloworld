<?php
namespace JambageCom\SimplemvcHelloworld\Controller;

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
 * $Id: FrontendController.php 219 2013-10-30 10:05:10Z franzholz $
 *
 * Controller for Front End plugins.
 *
 * @author Franz Holzinger <franz@ttproducts.de>
 */
class FrontendController extends \DmitryDulepov\Simplemvc\Controller\FrontendController {

	/**
	 * Prefix for URL parameters. If empty, implementation class will be
	 * substituted. This can be changed by the derieved class by defining
	 * the attribute with the same name and different value.
	 *
	 * @var string
	 */
	protected $parameterPrefix = 'hello_world';

	/**
	 * View class to use if the action does not return a string.
	 *
	 * @var string
	 */
	protected $viewClass = 'JambageCom\\SimplemvcHelloworld\\View\\PluginView';

	/**
	 * Extension key
	 *
	 * @var string
	 */
	public $extKey = SIMPLEMVCHELLOWORLD_EXT;

	/**
	 * Main dispatching function of the class
	 *
	 * @param string $unused Unused
	 * @param array $configuration Plugin configuration
	 * @return string
	 */
	public function main (
		/** @noinspection PhpUnusedParameterInspection */ $unused,
		array $configuration
	) {
		$content = parent::main($unused, $configuration);
		return $content;
	}

	public function display ($postfix = '') {
		$text = $this->getConfigurationValue('text', 'Hello world!');
		$view = $this->getView();
		$data = array('text' => $text . $postfix);
		$view->setData($data);
		$result = $view->render();
		return $result;
	}

	public function indexAction () {
		$result = $this->display();
		return $result;
	}

	public function testAction () {
		$result = $this->display(' Test!');
		return $result;
	}
}

class_alias('JambageCom\SimplemvcHelloworld\Controller\FrontendController', 'tx_simplemvchelloworld');

?>