<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_collections extends CI_Controller {

    /* 
     * Test controller for testing models. Remove before issuing pull request.
     * IF THIS IS STILL IN THE CODE THEN REJECT THE PULL REQUEST
     */

    public function index()
    {
        $this->load->model('Collections');
        $all = $this->Collections->all();
        foreach($all as $row)
        {
            echo implode(" ", $row);
            echo "<br>";
        }
        
        echo "<br>";
        echo implode(" ", $this->Collections->first());
        
        echo "<br>";
        echo implode(" ", $this->Collections->last());
        
        echo "<br>";
        echo implode(" ", $this->Collections->get('1A2EE5'));
    }
    
}