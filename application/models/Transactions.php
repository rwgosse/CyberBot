<?php

/**
 * This is a model for transactions that grabs data from a MySQL database.
 *
 * @author Chris
 */
class Transactions extends CI_Model {


	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single transaction
	public function get($which)
	{
            // get data from the database
            $data = $this->db->get_where('transactions',$which);

            // return the first and hopefully only record
            return $data->result_array()[0];
	}

	// retrieve all of the transactions
	public function all()
	{
            // get data from the database
            $data = $this->db->get('transactions');
            
            return $data->result_array();
	}

	// retrieve the first transaction
	public function first()
	{
            // get data from the database
            $data = $this->db->get('transactions')->result_array();
            
            return $data[0];
	}

	// retrieve the last transaction
	public function last()
	{
            // get data from the database
            $data = $this->db->get('transactions')->result_array();
            
            $index = count($data) - 1;
            return $data[$index];
	}

}
