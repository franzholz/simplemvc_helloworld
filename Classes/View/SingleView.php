<?php
namespace JambageCom\SimplemvcHelloworld\View;

use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * $Id: SingleView.php 219 2013-10-30 10:05:10Z franzholz $
 *
 * Single View for Front End plugins.
 *
 * @author Franz Holzinger <franz@ttproducts.de>
 */
class SingleView extends \DmitryDulepov\Simplemvc\View\AbstractView {

	/**
	 * Renders the content of the view.
	 *
	 * @return string
	 */
	public function render () {

		$result = 'No item found.';
		$framework = array();
		$modelClass = 'JambageCom\\SimplemvcHelloworld\\Model\\WordsModel';
		$tableModel = GeneralUtility::makeInstance($modelClass);

		$markerArray = array();
		$subpartArray = array();
		$wrappedSubpartArray = array();
		$subPartMarker = 'SINGLE_VIEW';

		$controller = $this->getController();
		$cObj = $controller->cObj;
		$templateFile = $controller->getConfigurationValue('templateFile');
		$templateCode = $cObj->fileResource($templateFile);
		$framework['single'] = $cObj->getSubpart($templateCode, '###' . $subPartMarker . '###');

		$id = $controller->getQueryParameter('single');

		if ($id) {
			$model = $tableModel->getById($id);
			if (is_object($model)) {
				$row = $model->getCurrentRawData();
				$markerArray['###TITLE###'] = $row['title'];

				$result =
					$cObj->substituteMarkerArrayCached(
						$framework['single'],
						$markerArray,
						$subpartArray,
						$wrappedSubpartArray
					);
			} else {
				$result = 'No item with "uid=' . $id . '" found.';
			}
		}

		return $result;
	}
}

?>