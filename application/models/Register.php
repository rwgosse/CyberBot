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
		$this->load->helper(array('form', 'url'));
	}
	
	public function check_registration($player)
	{
		// get data from the database to see if player already exists
		$data = $this->db->get_where('players', array('player' => $player))->result_array();
		
		if(empty($data))
		{
        return TRUE;
		}
	}
	
	public function register_user($player, $password)
	{
		$file_name = $this->upload->data('file_name');

		
		$data=array(
		'player'=> $player,
		'peanuts'=> '200',
		'adminrole'=> FALSE,
		'pwhash'=> $this->password_hasher($password), //this is temporary, we need to push the user's pw into the password_hasher() function after that's done
		'imgpath'=> '/data/uploads/'.$file_name
		);
		
		$this->db->insert('players', $data);
		
		// This inserts the newly registered user into the DB players table
	}
	
	public function password_hasher($password)
	{
		//using password_hash to encrpt the password
		$hash = password_hash ( $password , PASSWORD_DEFAULT);
		
		return $hash;
	}
	
//The below section has been moved to the Registration controller because codeigniter user guide demos it
	
//	public function do_upload()
//	{
//		
//			$config['upload_path'] = './data/uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg|';
//			$config['overwrite'] = TRUE;
//			$config['max_size'] = '2048000'; // Can be set to particular file size , here it is 2 MB(2048 Kb)
//			$config['max_height'] = '768';
//			$config['max_width'] = '1024';
//		
//		
//		$this->load->library('upload', $config);
//		
//		if(!$this->upload->do_upload())
//		{
//		$error = array('error' => $this->upload->display_errors());
//		}
//		else
//		{
//		$data = array('upload_data' => $this->upload->data());
//		}
//	}
	
}