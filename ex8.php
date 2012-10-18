<?php

/**
 * example 8
 * demonstrates how to do good table rows and columns :)
 *
 * @package XTemplate_Examples
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2007
 * @see license.txt BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex8.php $
 * @version $Id: ex8.php 21 2007-05-29 18:01:15Z cocomp $
 */

require_once('xtemplate.class.php');
$xtpl = new XTemplate('ex8.xtpl');

// Config
$num_columns	= 5;

// This could be from e.g. num_rows from a database result set
$max_items		= 26;
// End Config

$i				= 0;

// Build the main table
while ($i < $max_items) {

	$i ++;

	// Assign the content
	$xtpl->assign('stuff', array('item' => $i));

	// Parse the cell
	$xtpl->parse('main.table.row.cell');

	// Use modulus of row length to decide if we wrap to next row
	if (($i % $num_columns) == 0) {
		$xtpl->parse('main.table.row');
	}

}

// Deal with the last table row
$remainder = $i % $num_columns;

if (($remainder) != 0) {

	// Wipe the last value (using &nbsp; for illustration only)
	$xtpl->assign('stuff', array('item' => '&nbsp;'));

	// Add blank cells as needed to keep the table complete
	for ($j = $remainder; $j < $num_columns; $j ++) {
		$xtpl->parse('main.table.row.cell');
	}

	$xtpl->parse('main.table.row');
}

// Output
$xtpl->parse('main.table');
$xtpl->parse('main');
$xtpl->out('main');

?>