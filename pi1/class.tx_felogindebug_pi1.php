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
			'<p>' . $this->translate('label_debugInformation') . '</p>' .
			'<table summary=""><tbody>' .
			$this->createRow('Timestamp', date('Y-m-d H:i:s', mktime())) .
			$this->createRow('User Agent', $_SERVER['HTTP_USER_AGENT']) .
			$this->createRow('Remote IP', $_SERVER['REMOTE_ADDR']) .
			$this->createRow('Request URI', $_SERVER['REQUEST_URI']) .
			$this->createRow('$TSFE->id', $GLOBALS['TSFE']->id) .
			$this->createRow('$TSFE->loginUser', $GLOBALS['TSFE']->loginUser) .
			$this->createRow('$TSFE->gr_list', $GLOBALS['TSFE']->gr_list) .
			$this->createRow(
				'$TSFE->fe_user->forceSetCookie',
				intval($GLOBALS['TSFE']->fe_user->forceSetCookie)
			) .
			$this->createRow(
				'$TSFE->fe_user->dontSetCookie',
				intval($GLOBALS['TSFE']->fe_user->dontSetCookie)
			) .
			$this->createRow('Cookie[PHPSESSID]', $_COOKIE['PHPSESSID']) .
			$this->createRow('Cookie[fe_typo_user]', $_COOKIE['fe_typo_user']);

		$isLoggedIn = tx_oelib_FrontEndLoginManager::getInstance()->isLoggedIn();
		$result .= $this->createRow(
			'tx_oelib_FrontEndLoginManager::isLoggedIn()',
			intval($isLoggedIn)
		);

		if ($isLoggedIn) {
			$result .= $this->createRow(
				'FE User UID',
				tx_oelib_FrontEndLoginManager::getLoggedInUser()->getUid()
			);
			if (is_array($GLOBALS['TSFE']->fe_user->uc)) {
				$result .= $this->createRow(
					'$TSFE->fe_user->uc',
					count($GLOBALS['TSFE']->fe_user->uc) . ' entries'
				);
				foreach ($GLOBALS['TSFE']->fe_user->uc as $key => $value) {
					$result .= $this->createRow(
						'...->uc[' . $key . ']', $value
					);
				}
			} else {
				$result .= $this->createRow(
					'$TSFE->fe_user->uc',
					'(not set)'
				);
			}
		}

		$result .= $this->createRow(
			'$TSFE->fe_user->sesData',
			count($GLOBALS['TSFE']->fe_user->sesData) . ' entries'
		);
		foreach ($GLOBALS['TSFE']->fe_user->sesData as $key => $value) {
			$result .= $this->createRow(
				'...->sesData[' . $key . ']', $value
			);
		}

		$result .= '</tbody></table></div>';

		return $this->pi_wrapInBaseClass($result);
	}

	/**
	 * Creates a list row for the debug data.
	 *
	 * @param string $label the label for the row
	 * @param string $data the data for the row
	 *
	 * @return the HTML row with the label and data htmlspecialchared
	 */
	protected function createRow($label, $data) {
		return '<tr><th style="text-align: left;">' . htmlspecialchars($label) . '</th><td>' .
			htmlspecialchars($data) . '</td></tr>';
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/felogindebug/pi1/class.tx_felogindebug_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/felogindebug/pi1/class.tx_felogindebug_pi1.php']);
}
?>