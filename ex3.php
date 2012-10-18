<?php

/**
 * example 3
 * autoreset
 *
 * @package XTemplate_Examples
 * @author Barnabas Debreceni [cranx@users.sourceforge.net]
 * @copyright Barnabas Debreceni 2000-2001
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2002-2007
 * @see license.txt LGPL / BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex3.php $
 * @version $Id: ex3.php 16 2007-01-11 03:02:49Z cocomp $
 */

	include_once('./xtemplate.class.php');

	$xtpl = new XTemplate('ex3.xtpl');

	// this is the code from example 2:

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

	for ($i=1; $i<=$rowsize; $i++) {

		// assign array data
		$xtpl->assign('DATA', $rows[$i]);
		$xtpl->assign('ROW_NR', $i);

		// parse a row
		$xtpl->parse('main.table.row');
	}

	// parse the table (Table 1)
	$xtpl->parse('main.table');

	/**
	 * now, if you wanted to parse the table once again with the old rows,
	 * and put one more $xtpl->parse('main.table') line, it wouldn't do it
	 * becuase the sub-blocks were resetted (normal operation)
	 * to parse the same block two or more times without having the sub-blocks resetted,
	 * you should use clear_autoreset();
	 * to switch back call set_autoreset();
	 */

	$xtpl->clear_autoreset();

	for ($i = 1; $i <= $rowsize; $i++) {

		// assign array data
		$xtpl->assign('DATA', $rows[$i]);
		$xtpl->assign('ROW_NR', $i);

		// parse a row
		$xtpl->parse('main.table.row');
	}

	// parse the table (Table 2)
	$xtpl->parse('main.table');

	// Turn the autoreset back on - the sub-block will be reset after the next table parse
	$xtpl->set_autoreset();

	// parse it one more time.. the rows are still there from the last parse of table (2)
	// the set_autoreset on the previous line means the rows are cleared during this parse (sub-block reset) (Table 3)
	$xtpl->parse('main.table');

	// re-parse the table block (Table 4)
	$xtpl->parse('main.table');

	$xtpl->parse('main');
	$xtpl->out('main');

?>