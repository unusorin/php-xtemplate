<?php

/**
 * example 1
 * demonstrates basic template functions
 * -simple replaces ( {VARIABLE1}, and {DATA.ID} {DATA.NAME} {DATA.AGE} )
 * -dynamic blocks
 *
 * @package XTemplate_Examples
 * @author Barnabas Debreceni [cranx@users.sourceforge.net]
 * @copyright Barnabas Debreceni 2000-2001
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2002-2007
 * @see license.txt LGPL / BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex1.php $
 * @version $Id: ex1.php 16 2007-01-11 03:02:49Z cocomp $
 */

	include_once('./xtemplate.class.php');

	$xtpl = new XTemplate('ex1.xtpl');

	// simple replace
	$xtpl->assign('VARIABLE', 'TEST');

	// parse block1
	$xtpl->parse('main.block1');

	// uncomment line below to parse block2
	//$xtpl->parse('main.block2');

	/**
	 * you can reference to array keys in the template file the following way:
	 * {DATA.ID} or {DATA.NAME}
	 * say we have an array from a mysql query with the following fields: ID, NAME, AGE
	 */
	$row = array('ID'=>'38',
				'NAME'=>'cocomp',
             	'AGE'=>'33'
             );

	$xtpl->assign('DATA',$row);

	// parse block3
	$xtpl->parse('main.block3');

	$xtpl->parse('main');
	$xtpl->out('main');

?>