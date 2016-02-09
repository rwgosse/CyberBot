<?php

/**
 * This is a model for players that grabs data from a MySQL database.
 *
 * @author Chris
 */
class Players extends CI_Model {


	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single player
	public function get($which)
	{
            // get data from the database
            $data = $this->db->get_where('players',array('player'=>$which));

            // return the first and hopefully only record
            return $data->result_array()[0];
	}

	// retrieve all of the players
	public function all()
	{
            // get data from the database
            $data = $this->db->get('players');
            
            return $data->result_array();
	}

	// retrieve the first player
	public function first()
	{
            // get data from the database
            $data = $this->db->get('players');
            
            return $data->result_array()[0];
	}

	// retrieve the last player
	public function last()
	{
            // get data from the database
            $data = $this->db->get('players');
            
            $index = count($data) - 1;
            return $data->result_array()[$index];
	}

}
