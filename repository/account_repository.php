<?php

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
	
	protected function obtain_master_id($user_id){
	global $db;

		$sql = 'SELECT '.$this->master_column.' AS master_id
			FROM ' . $this->table . '
			WHERE '.$this->target_column.' = ' . $user_id;
		$result = $db->sql_query($sql);
		$user_data = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		if(empty($user_data['master_id'])) return $user_id;
		else return (int) $user_data['master_id'];
		return $user_data;
	}
	
	
	protected function obtain_master_linked_account($master_id)
	{
		global $db;

		$sql = 'SELECT '.$this->target_column.' AS user_id, '.$this->toShow_column.' AS username
			FROM ' . $this->table . '
			WHERE '.$this->master_column.' = ' . $user_id;
		$result = $db->sql_query($sql);
		$user_data = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		return $user_data;
		
		// To do : ajouter master et ajouter infos MP si ok.
	}
	
	public function obtain_linked_account($user_id){
	
		$master_id = $this->obtain_master_id($user_id);
		return obtain_master_linked_account($master_id)
	}
}
?>