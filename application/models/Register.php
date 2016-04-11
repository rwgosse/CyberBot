<?php

/**
 * This is a model for regitration 
 *
 * @author Dave
 */
class Register extends CI_Model {
	
		// Constructor
	public function __construct()
	{
		parent::__construct();
	}
	
	public function register_user($player, $pwhash)
	{
		$data=array(
		'player'=> $player,
		'peanuts'=> '200',
		'adminrole'=> FALSE,
		'pwhash'=> $pwhash
		);
		
		$this->db->insert('players', $data);
		
		// This inserts the newly registered user into the DB players table
	}
	
	public function password_hasher()
	{
		$hash=
	}
}