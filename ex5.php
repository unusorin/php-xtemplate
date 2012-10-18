<?php

/**
 * example 5
 * demonstrates nullstrings
 *
 * @package XTemplate_Examples
 * @author Barnabas Debreceni [cranx@users.sourceforge.net]
 * @copyright Barnabas Debreceni 2000-2001
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2002-2007
 * @see license.txt LGPL / BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex5.php $
 * @version $Id: ex5.php 16 2007-01-11 03:02:49Z cocomp $
 */

	include_once('./xtemplate.class.php');

	$xtpl = new XTemplate('ex5.xtpl');

	$xtpl->assign('INTRO_TEXT', "by default, if some variables weren't assigned a value, they simply disappear from the parsed html:");
	$xtpl->parse('main.form');

	$xtpl->assign('INTRO_TEXT', "ok, now let's assign a nullstring:");
	$xtpl->set_null_string('value not specified!');
	$xtpl->parse('main.form');

	$xtpl->assign('INTRO_TEXT', 'custom nullstring for a specific variable and default nullstring mixed:');
	$xtpl->set_null_string('no value..');
	$xtpl->set_null_string('no email specified!', 'EMAIL');
	$xtpl->parse('main.form');

	$xtpl->assign('INTRO_TEXT', 'custom nullstring for every variable:) .. you should get it by now. :P');
	$xtpl->set_null_string('no email specified', 'EMAIL');
	$xtpl->set_null_string('no name specified', 'FULLNAME');
	$xtpl->set_null_string('no income?', 'INCOME');
	$xtpl->parse('main.form');

	$xtpl->parse('main');
	$xtpl->out('main');

?>