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
 * $Id: ListView.php 219 2013-10-30 10:05:10Z franzholz $
 *
 * Single View for Front End plugins.
 *
 * @author Franz Holzinger <franz@ttproducts.de>
 */
class ListView extends \DmitryDulepov\Simplemvc\View\AbstractView {
	static $splitText = 'X-X';
	private $parameterPrefix = 'hello_world'; // TODO: use AbstractController

	/**
	 * Renders the content of the view.
	 *
	 * @return string
	 */
	public function render () {

		$result = '';
		$subPartMarker = 'LIST_VIEW';
		$framework = array();
		$modelClass = 'JambageCom\\SimplemvcHelloworld\\Model\\WordsModel';
		$tableModel = GeneralUtility::makeInstance($modelClass);

		$controller = $this->getController();
		$cObj = $controller->cObj;
		$templateFile = $controller->getConfigurationValue('templateFile');
		$templateCode = $cObj->fileResource($templateFile);
		$framework['list'] = $cObj->getSubpart($templateCode, '###' . $subPartMarker . '###');
		$subPartMarker = 'RECORD_LOOP';
		$framework['loop'] = $cObj->getSubpart($framework['list'], '###' . $subPartMarker . '###');
		$subPartMarker = 'SINGLE_VIEW';
		$framework['single'] = $cObj->getSubpart($framework['loop'], '###' . $subPartMarker . '###');

		if ($framework['single'] != '') {

			$linkTS = 'listView.LINK';
			$tsName = $controller->getConfigurationValue($linkTS);
			$tsConf = $controller->getConfigurationValue($linkTS . '.');
			$tsConf['value'] = static::$splitText;
			$parameter = $tsConf['typolink.']['parameter'];
			$modelArray = $tableModel->getAll();
			$outArray = array();
			$outArray['single'] = '';

			foreach ($modelArray as $model) {

				$row = $model->getCurrentRawData();

				$markerArray = array();
				$subpartArray = array();
				$wrappedSubpartArray = array();
				$markerArray['###TITLE###'] = $row['title'];

				$pid = $controller->getConfigurationValue('PIDsingle');
				$parameter = str_replace('###PID###', $pid, $parameter);
				$tsConf['typolink.']['parameter'] = $parameter;
				$additionalParams = $tsConf['typolink.']['additionalParams'];
				$tsConf['typolink.']['additionalParams'] = '&' . $this->parameterPrefix . '[single]=' . $row['uid'] . $additionalParams;

				$link = $model->getLink($tsName, $tsConf);
				$tsConf['typolink.']['additionalParams'] = $additionalParams;
				$linkArray = explode(static::$splitText, $link);
				$wrappedSubpartArray['###LINK###'] = $linkArray;

				$out = $cObj->substituteMarkerArrayCached(
					$framework['single'],
					$markerArray,
					$subpartArray,
					$wrappedSubpartArray
				);
				$outArray['single'] .= $out;
			}

			$subpartArray = array();
			if (count($modelArray)) {
				$subpartArray['###SINGLE_VIEW###'] = $outArray['single'];
			} else {
				$subpartArray['###SINGLE_VIEW###'] = '';
			}

			$out = $cObj->substituteMarkerArrayCached(
					$framework['loop'],
					$markerArray,
					$subpartArray
				);
			$outArray['loop'] = $out;

			$markerArray = array();
			$subpartArray = array();
			$subpartArray['###RECORD_LOOP###'] = $outArray['loop'];

			$out =
				$cObj->substituteMarkerArrayCached(
					$framework['list'],
					$markerArray,
					$subpartArray
				);

			$result = $out;
		}

		return $result;
	}
}

?>