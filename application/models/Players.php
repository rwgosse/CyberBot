<?php

/**
 * This is a model for players that grabs data from a MySQL database.
 *
 * @author Chris, Richard
 */
class Players extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single player
    public function get($which) {
        //$total = 0;
        // get data from the database
        $data = $this->db->get_where('players', $which)->result_array()[0];

        return $data;
    }

    // retrieve all matching players
    public function get_all($which) {
        // get data from the database
        $data = $this->db->get_where('players', $which);

        // return all records
        return $data->result_array();
    }

    // retrieve all of the players
    public function all() {
        // get data from the database
        $data = $this->db->get('players');

        return $data->result_array();
    }

    public function get_equity($which) {
        // calculate equity
        $total = 0;
        $collections_data = $this->db->get_where('collections', $which)->result_array();
        foreach ($collections_data as $row) {
            $piecetype = substr($row['piece'], 0, 2);
            $piece = $this->db->get_where('series', array('series' => $piecetype))->result_array()[0];
            $value = $piece['value'];
            $total = $total + $value;
        }
        return $total;
    }

//	// retrieve the first player
//	public function first()
//	{
//            // get data from the database
//            $data = $this->db->get('players')->result_array();
//            
//            return $data[0];
//	}
//
//	// retrieve the last player
//	public function last()
//	{
//            // get data from the database
//            $data = $this->db->get('players')->result_array();
//            
//            $index = count($data) - 1;
//            return $data[$index];
//	}
}
