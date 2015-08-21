<?php
/**
 *
 * @package phpBB Extension - Account Linker
 * @author Dakayl
 * @copyright (c) 2015 Dakayl
 * @license GNU General Public License, version 3 (GPL-3.0)
 *
 */
namespace dakayl\accountlinker\migrations\v100;
class install_v100 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['accountlinker_version']) && version_compare($this->config['accountlinker_version'], '1.0.0', '>=');
	}
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}
	public function update_data()
	{
		return array(
			array('config.add', array('accountlinker_version', '1.0.0')),
			array('module.add', array(
				'acp',
				'ACP_CAT_USERS',
				array(
					'module_basename'	=> '\dakayl\accountlinker\acp\accountlinker_module',
					'auth'				=> 'ext_dakayl/accountlinker && acl_a_user',
					'modes'				=> array('main'),
				),
			)),
		);
	}
	public function revert_data()
	{
		return array(
			array('config.remove', array('accountlinker_version')),
			array('module.remove', array(
				'acp',
				'ACP_CAT_USERS',
				array(
					'module_basename'	=> '\dakayl\accountlinker\acp\adduser_module',
				),
			)),
		);
	}
}
