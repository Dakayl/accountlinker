<?php
/**
 *
 * @package phpBB Extension - Account Linker
 * @author Dakayl
 * @copyright (c) 2015 Dakayl
 * @license GNU General Public License, version 3 (GPL-3.0)
 *
 */
 
namespace dakayl\accountlinker\repository;
class accountRepository {

	protected $table;
	protected $master_column;
	protected $target_column;
	protected $toShow_column;
	
	/**
	 * Constructor
	 * Creates a new \dakayl\accountlinker\repository\accountRepository
	 *
	 * @param string $table base table for searchs
	 * @param string $master_column Column to identify master in linked account
	 * @param string $target_column Column of the id of the master
     * @param string $toShow_column Column of the text of the account

	 */
	public function __construct($table, $master_column, $target_column, $toShow_column)
	{
		$this->table = $table;
		$this->master_column = $master_column;
		$this->target_column = $target_column;
		$this->toShow_column = $toShow_column;		
	}
	
	protected function obtain_master_id($user_id = false)
	{
		global $db;
		if(empty($user_id)) return false;

		$sql = 'SELECT '.$this->master_column.' AS master_id
			FROM ' . $this->table . '
			WHERE '.$this->target_column.' = ' . $user_id.' LIMIT 1;';
		$result = $db->sql_query($sql);
		$user_data = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		if(empty($user_data['master_id'])) return $user_id;
		else return (int) $user_data['master_id'];
		return $user_data;
	}
	
	
	protected function obtain_master_linked_account($master_id = false)
	{
		// To do : ajouter infos MP.
		global $db;
		if(empty($master_id)) return false;
		$sql = 'SELECT '.$this->target_column.' AS user_id, '.$this->toShow_column.' AS username
			FROM ' . $this->table . '
			WHERE '.$this->master_column.' = ' . $master_id. ' OR 
			'.$this->target_column.' = ' . $master_id.';';
		$result = $db->sql_query($sql);
		
		$accounts = array();
		while(($row = $db->sql_fetchrow($result)))
		{
			$accounts[$row['user_id'] ] = array();
			$accounts[$row['user_id'] ]['username'] = $row['username'];
		}
		$db->sql_freeresult($result);
		return $accounts;
		
	}
	
	public function obtain_linked_account($user_id = false){
		if(empty($user_id)) return false;
		$master_id = $this->obtain_master_id($user_id);
		return obtain_master_linked_account($master_id)
	}
	
	protected function link_accounts($master_id, $target_id = false)
	{
		global $db;
		if(empty($master_id)) return false;
		if(empty($target_id)) return false;
		$sql = 'UPDATE '. USERS_TABLE 
		.' SET master_id = '. $master_id 
		.' WHERE user_id = '. $target_id.' LIMIT 1;';
		// Need to check for errors....
		return $db->sql_query($sql);
	}
	
	protected function unlink_account($target_id = false)
	{
		global $db;
		if(empty($target_id)) return false;
		$sql = 'UPDATE '. USERS_TABLE 
		.' SET master_id = 0
		WHERE user_id = '. $target_id.' LIMIT 1;';
		// Need to check for errors....
		$result = $db->sql_query($sql);
		return $db->sql_query($sql);
	}
}
?>
