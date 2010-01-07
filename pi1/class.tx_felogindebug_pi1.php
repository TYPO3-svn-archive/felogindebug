<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Oliver Klee <typo3-coding@oliverklee.de>
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
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(t3lib_extMgm::extPath('oelib') . 'class.tx_oelib_Autoloader.php');

/**
 * Plugin 'FE Login Debugger' for the "felogindebug" extension.
 *
 * @author	Oliver Klee <typo3-coding@oliverklee.de>
 *
 * @package	TYPO3
 * @subpackage	tx_felogindebug
 */
class tx_felogindebug_pi1 extends tx_oelib_templatehelper {
	/**
	 * same as class name
	 *
	 * @var string
	 */
	public $prefixId  = 'tx_felogindebug_pi1';

	/**
	 * path to this script relative to the extension dir
	 *
	 * @var string
	 */
	public $scriptRelPath = 'pi1/class.tx_felogindebug_pi1.php';

	/**
	 * the extension key
	 *
	 * @var string
	 */
	public $extKey = 'felogindebug';

	/**
	 * makes sure that caching is not expected
	 *
	 * @var boolean
	 */
	public $pi_USER_INT_obj = true;

	/**
	 * Creates the plugin's HTML output.
	 *
	 * @return string the plugin's HTML output, will not be empty
	 */
	public function main() {
		$this->init(array());

		$result = '<p style="text-align: right; font-size: 9px;">' .
			'<a href="#" onclick="document.getElementById(\'tx_felogindebug_pi1-debugbox\').style.display=\'block\';return false;">' .
			$this->translate('label_clickHere') . '</a></p>' .
			'<div id="tx_felogindebug_pi1-debugbox" style="display: none; background: #ffc; padding: .8em;">' .
			'<p>' . $this->translate('label_debugInformation') . '</p>';

		$result .= '</div>';

		return $this->pi_wrapInBaseClass($result);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/felogindebug/pi1/class.tx_felogindebug_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/felogindebug/pi1/class.tx_felogindebug_pi1.php']);
}
?>