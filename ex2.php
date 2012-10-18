<?php

/**
 * example 2
 * demonstrates multiple level dynamic blocks
 *
 * @package XTemplate_Examples
 * @author Barnabas Debreceni [cranx@users.sourceforge.net]
 * @copyright Barnabas Debreceni 2000-2001
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2002-2007
 * @see license.txt LGPL / BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex2.php $
 * @version $Id: ex2.php 16 2007-01-11 03:02:49Z cocomp $
 */

	include_once('./xtemplate.class.php');

	$xtpl = new XTemplate('ex2.xtpl');

	/**
	 * you can reference to array keys in the template file the following way:
	 * {DATA.ID} or {DATA.NAME}
	 * say we have an array from a mysql query with the following fields: ID, NAME, AGE
	 */
	$rows = array();

	// add some data
	$rows[1]=array('ID'=>'38',
					'NAME'=>'cocomp',
             		'AGE'=>'33'
             		);

	// add some data
	$rows[2]=array('ID'=>'27',
					'NAME'=>'linkhogthrob',
					'AGE'=>'34'
					);

	// add some data
	$rows[3]=array('ID'=>'56',
					'NAME'=>'pingu',
					'AGE'=>'23'
					);

	$rowsize = count($rows);

	for ($i = 1; $i <= $rowsize; $i++) {

		// assign array data
		$xtpl->assign('DATA', $rows[$i]);
		$xtpl->assign('ROW_NR', $i);

		// parse a row
		$xtpl->parse('main.table.row');

		// another way to do it would be:
		/*
		$xtpl->insert_loop('main.table.row', array('DATA'=>$rows[$i],
													'ROW_NR'=>$i
													));
		*/

	}

	// parse the table
	$xtpl->parse('main.table');

	$xtpl->parse('main');
	$xtpl->out('main');

?>