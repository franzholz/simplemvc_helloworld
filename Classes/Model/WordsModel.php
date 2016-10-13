<?php
namespace JambageCom\SimplemvcHelloworld\Model;

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
 * $Id: WordsModel.php 219 2013-10-30 10:05:10Z franzholz $
 *
 * Model for the table words
 *
 * @author Franz Holzinger <franz@ttproducts.de>
 */
class WordsModel extends \DmitryDulepov\Simplemvc\Model\AbstractModel {

	static protected $tableName = 'simplemvchelloworld_words';
	static protected $className = __CLASS__;


	/**
	 * Returns a link to this record. Default implementation returns empty link.
	 *
	 * @return string
	 */
	public function getLink ($tsName, $tsConf) {
		$result = '';
		if ($tsName || is_array($tsConf)) {
			$cObj = GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer');
			/** @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $cObj */
			$cObj->start($this->currentRow, static::$tableName);
			if ($tsName || is_array($tsConf)) {
				$result = $cObj->cObjGetSingle($tsName, $tsConf);
			}
		}
		return $result;
	}
}

?>