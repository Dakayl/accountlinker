<?php
/**
 *
 * @package phpBB Extension - Account Linker
 * @author Dakayl
 * @copyright (c) 2015 Dakayl
 * @license GNU General Public License, version 3 (GPL-3.0)
 *
 */
namespace dakayl\accountlinker\acp;
/**
* @package module_install
*/
class accountlinker_info
{
	function module()
	{
		return array(
			'filename'	=> 'dakayl\accountlinker\acp\accountlinker_module',
			'title'		=> 'ACCOUNT_LINKER',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'main'	=> array('title' => 'ACP_ACCOUNT_LINKER', 'auth'	=> 'ext_dakayl\accountlinker && acl_a_user', 'cat'	=> array('ACP_CAT_USERS')),
			),
		);
	}
	function install()
	{
	}
	function uninstall()
	{
	}
}
