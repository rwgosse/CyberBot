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
        
        $all = $this->Collections->get_all(array('player'=>'Donald'));
        foreach($all as $row)
        {
            echo implode(" ", $row);
            echo "<br>";
        }
        
        echo "<br>";
        echo implode(" ", $this->Collections->first());
        
        echo "<br>";
        echo implode(" ", $this->Collections->last());
        
        echo "<br><br>";
        echo implode(" ", $this->Collections->get(array('token'=>'1A2EE5')));
        echo "<br>";
        echo implode(" ", $this->Collections->get(array('piece'=>'11b-2')));
    }
    
}