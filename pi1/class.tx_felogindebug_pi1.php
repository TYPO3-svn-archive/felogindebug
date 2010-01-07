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

require_once(PATH_tslib . 'class.tslib_pibase.php');

/**
 * Plugin 'FE Login Debugger' for the "felogindebug" extension.
 *
 * @author	Oliver Klee <typo3-coding@oliverklee.de>
 *
 * @package	TYPO3
 * @subpackage	tx_felogindebug
 */
class tx_felogindebug_pi1 extends tslib_pibase {
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
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		$content='
			<strong>This is a few paragraphs:</strong><br />
			<p>This is line 1</p>
			<p>This is line 2</p>

			<h3>This is a form:</h3>
			<form action="'.$this->pi_getPageLink($GLOBALS['TSFE']->id).'" method="POST">
				<input type="text" name="'.$this->prefixId.'[input_field]" value="'.htmlspecialchars($this->piVars['input_field']).'">
				<input type="submit" name="'.$this->prefixId.'[submit_button]" value="'.htmlspecialchars($this->pi_getLL('submit_button_label')).'">
			</form>
			<br />
			<p>You can click here to '.$this->pi_linkToPage('get to this page again',$GLOBALS['TSFE']->id).'</p>
		';

		return $this->pi_wrapInBaseClass($content);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/felogindebug/pi1/class.tx_felogindebug_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/felogindebug/pi1/class.tx_felogindebug_pi1.php']);
}
?>