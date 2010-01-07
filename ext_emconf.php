<?php

########################################################################
# Extension Manager/Repository config file for ext "felogindebug".
#
# Auto generated 07-01-2010 15:41
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'FE Login Debugger',
	'description' => 'Displays debugging information for tracking down FE user login issues.',
	'category' => 'plugin',
	'author' => 'Oliver Klee',
	'author_email' => 'typo3-coding@oliverklee.de',
	'shy' => '',
	'dependencies' => 'oelib',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author_company' => 'oliverklee.de',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.2.0-0.0.0',
			'oelib' => '0.6-0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:7:{s:9:"ChangeLog";s:4:"34ad";s:12:"ext_icon.gif";s:4:"1bdc";s:17:"ext_localconf.php";s:4:"5321";s:14:"ext_tables.php";s:4:"e6c8";s:16:"locallang_db.xml";s:4:"0878";s:33:"pi1/class.tx_felogindebug_pi1.php";s:4:"e2ff";s:17:"pi1/locallang.xml";s:4:"f4d9";}',
	'suggests' => array(
	),
);

?>