<?php

/**
 * This is a model for collections that grabs data from a MySQL database.
 *
 * @author Chris
 */
class Collections extends CI_Model {


	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single collection item
	public function get($which)
	{
            // get data from the database
            $data = $this->db->get_where('collections',$which);

            // return the first and hopefully only record
            return $data->result_array()[0];
	}

	// retrieve all of the collection items
	public function all()
	{
            // get data from the database
            $data = $this->db->get('collections');
            
            return $data->result_array();
	}

	// retrieve the first collection item
	public function first()
	{
            // get data from the database
            $data = $this->db->get('collections')->result_array();
            
            return $data[0];
	}

	// retrieve the last collection item
	public function last()
	{
            // get data from the database
            $data = $this->db->get('collections')->result_array();
            
            $index = count($data) - 1;
            return $data[$index];
	}

}
