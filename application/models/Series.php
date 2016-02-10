<?php

/**
 * This is a model for robot series that grabs data from a MySQL database.
 *
 * @author Chris
 */
class Series extends CI_Model {


	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single series entry
	public function get($which)
	{
            // get data from the database
            $data = $this->db->get_where('series',$which);

            // return the first and hopefully only record
            return $data->result_array()[0];
	}

	// retrieve all of the series
	public function all()
	{
            // get data from the database
            $data = $this->db->get('series');
            
            return $data->result_array();
	}

	// retrieve the first series
	public function first()
	{
            // get data from the database
            $data = $this->db->get('series')->result_array();
            
            return $data[0];
	}

	// retrieve the last series
	public function last()
	{
            // get data from the database
            $data = $this->db->get('series')->result_array();
            
            $index = count($data) - 1;
            return $data[$index];
	}

}
