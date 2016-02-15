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
            $data = $this->db->get_where('players',$which)->result_array();

            // return null if there are no matches
            if(empty($data))
                return NULL;
            
            // return the first and hopefully only record
            return $data[0];
	}
        
        // retrieves the equity of a player
        public function equity($player)
        {
            // get data from the database
            $data = $this->db->get_where('collections',array('player'=>$player))->result_array();
            
            // each row is a piece, so count the rows
            $count = count($data);
            
            // each piece is worth 1 peanut, so just return the count
            return $count;
        }
        
        // retrieve all matching players
        public function get_all($which)
        {
            // get data from the database
            $data = $this->db->get_where('players',$which);
            
            // return all records
            return $data->result_array();
        }

	// retrieve all of the players
	public function all()
	{
            // get data from the database
            $data = $this->db->get('players');
            
            return $data->result_array();
	}

}
