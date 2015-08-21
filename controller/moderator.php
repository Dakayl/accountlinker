<?php
/**
 *
 * @package phpBB Extension - Account Linker
 * @author Dakayl (Nicolas Brouet), Drakkim (Michael Flenniken, Jr.)
 * @copyright (c) 2015 Dakayl, Drakkim
 * @license GNU General Public License, version 3 (GPL-3.0)
 *
 */
 namespace dakayl\accountlinker\controller;

use dakayl\accountlinker\repository\accountRepository;

class moderator
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
