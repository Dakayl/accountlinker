<?php
/**
 *
 * @package phpBB Extension - Account Linker
 * @author Dakayl
 * @copyright (c) 2015 Dakayl
 * @license GNU General Public License, version 3 (GPL-3.0)
 *
 */
/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
$lang = array_merge($lang, array(
	// ACP Module
	'ACP_ACCOUNT_LINKER '=> 'Link accounts',
	'ACCOUNT_LINKER'	=> 'Link accounts',
	'DIR_NOT_EXIST'		=> 'The language you have chosen %s does not have the files needed for the extension. Please translate them and upload to the %s directory of the extension to use the extension.',
	'ADD_USER_EXPLAIN'	=> 'Link  two user accounts.',
));
