<?php

/**
 * example 7
 * demonstrates file includes
 *
 * @package XTemplate_Examples
 * @author Barnabas Debreceni [cranx@users.sourceforge.net]
 * @copyright Barnabas Debreceni 2000-2001
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2002-2007
 * @see license.txt LGPL / BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex7.php $
 * @version $Id: ex7.php 16 2007-01-11 03:02:49Z cocomp $
 */

	include_once('./xtemplate.class.php');

	$xtpl = new XTemplate('ex7.xtpl');

	$xtpl->assign('FILENAME', 'ex7-inc.xtpl');

	// Language is set to English
	$xtpl->assign_file('LANGUAGE', 'ex7-inc-eng.xtpl');

	// Uncomment the line below to set language to German
	//$xtpl->assign_file('LANGUAGE', 'ex7-inc-de.xtpl');

	$xtpl->rparse('main.inc');

	$xtpl->parse('main');
	$xtpl->out('main');

?>