<?php
namespace dakayl\accountlinker\controller;

use dakayl\accountlinker\repository\accountRepository;

class user
{
   /**
	* Account Repository
	* @var accountRepository
	*/
	protected $accountRepository;
	
   /**
	* Construct method
	*
	* @param accountRepository $accountRepository Account Repository
	*/
	public function __construct(accountRepository $accountRepository)
	{
		$this->accountRepository = $accountRepository;
	}
}
