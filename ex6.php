<?php

/**
 * example 6
 * demonstrates nullblocks
 *
 * @package XTemplate_Examples
 * @author Barnabas Debreceni [cranx@users.sourceforge.net]
 * @copyright Barnabas Debreceni 2000-2001
 * @author Jeremy Coates [cocomp@users.sourceforge.net]
 * @copyright Jeremy Coates 2002-2007
 * @see license.txt LGPL / BSD license
 * @link $HeadURL: https://xtpl.svn.sourceforge.net/svnroot/xtpl/trunk/ex6.php $
 * @version $Id: ex6.php 16 2007-01-11 03:02:49Z cocomp $
 */

	include_once('./xtemplate.class.php');

	$xtpl = new XTemplate('ex6.xtpl');

	$xtpl->assign('INTRO_TEXT', "what happens if we don't parse the subblocks?");
	$xtpl->parse('main.block');

	$xtpl->assign('INTRO_TEXT', 'what happens if we parse them? :)');
	$xtpl->parse('main.block.subblock1');
	$xtpl->parse('main.block.subblock2');
	$xtpl->parse('main.block');

	$xtpl->assign('INTRO_TEXT', 'ok.. set_null_block("block not parsed!") coming');
	$xtpl->set_null_block('block not parsed!');
	$xtpl->parse('main.block');

	$xtpl->assign('INTRO_TEXT', "ok.. custom nullblocks.. set_null_block('subblock1 not parsed!', 'main.block.subblock1')");
	$xtpl->set_null_block('block not parsed!');
	$xtpl->set_null_block('subblock1 not parsed!', 'main.block.subblock1');
	$xtpl->parse('main.block');

	$xtpl->parse('main');
	$xtpl->out('main');

?>