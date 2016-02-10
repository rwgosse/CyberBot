<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_players extends CI_Controller {

    /* 
     * Test controller for testing models. Remove before issuing pull request.
     * IF THIS IS STILL IN THE CODE THEN REJECT THE PULL REQUEST
     */

    public function index()
    {
        $this->load->model('Players');
        $all = $this->Players->all();
        foreach($all as $row)
        {
            echo implode(" ", $row);
            echo "<br>";
        }
        
        echo "<br>";
        echo implode(" ", $this->Players->first());
        
        echo "<br>";
        echo implode(" ", $this->Players->last());
        
        echo "<br><br>";
        echo implode(" ", $this->Players->get(array('player'=>'George')));
        echo "<br>";
        echo implode(" ", $this->Players->get(array('peanuts'=>'200')));
    }
    
}