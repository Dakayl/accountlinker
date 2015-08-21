<?php
/**
 *
 * @package phpBB Extension - Account Linker
 * @author Dakayl (Nicolas Brouet), Drakkim (Michael Flenniken, Jr.)
 * @copyright (c) 2015 Dakayl, Drakkim
 * @license GNU General Public License, version 3 (GPL-3.0)
 *
 */
namespace dakayl\accountlinker\acp;
class accountlinker_module
{
	/** @var string */
	public $u_action;
	public function main($id, $mode)
	{
		global $config, $db, $request, $template, $user, $phpbb_root_path, $phpEx, $phpbb_container, $phpbb_admin_path;
		$this->config = $config;
		$this->db = $db;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $phpEx;
		$this->log = $phpbb_container->get('log');
		$this->phpbb_admin_path = $phpbb_admin_path;
		$admin_activate = ($this->request->variable('activate', 0)) ? (($this->config['require_activation'] == USER_ACTIVATION_ADMIN) ? true : false) : false;
		$group_default = $this->request->variable('group_default', 0);
		$group_selected = $this->request->variable('group', 0);
		$this->page_title = $user->lang['ACP_ACCOUNT_LINKER'];
		$this->tpl_name = 'acp_accountlinker';
		//include files we need to add a user
		if (!function_exists('user_add'))
		{
			include($this->phpbb_root_path . 'includes/functions_user.' . $this->php_ext);
		}
		// include lang files we need
		$user->add_lang(array('posting', 'ucp', 'acp/users', 'acp/groups'));
		//set empty error strings
		$error = $cp_data = $cp_error = array();
		// Load a template from adm/style for our ACP page
		$this->tpl_name = 'acp_accountlinker';
		// Define the name of the form for use as a form key
		add_form_key('acp_accountlinker');

		// build an array of all lang directories for the extension and check to make sure we have the lang available that is being chosen
		$dir_array = $this->dir_to_array($this->phpbb_root_path .'ext/dakayl/acp_accountlinker/language');
		if (!in_array($data['lang'], $dir_array))
		{
			trigger_error(sprintf($this->user->lang['DIR_NOT_EXIST'], $data['lang'], $data['lang']), E_USER_WARNING);
		}
}
