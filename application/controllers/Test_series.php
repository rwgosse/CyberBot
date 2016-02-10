<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_series extends CI_Controller {

    /* 
     * Test controller for testing models. Remove before issuing pull request.
     * IF THIS IS STILL IN THE CODE THEN REJECT THE PULL REQUEST
     */

    public function index()
    {
        $this->load->model('Series');
        $all = $this->Series->all();
        foreach($all as $row)
        {
            echo implode(" ", $row);
            echo "<br>";
        }
        
        echo "<br>";
        echo implode(" ", $this->Series->first());
        
        echo "<br>";
        echo implode(" ", $this->Series->last());
        
        echo "<br><br>";
        echo implode(" ", $this->Series->get(array('series'=>'13')));
        echo "<br>";
        echo implode(" ", $this->Series->get(array('value'=>'20')));
    }
    
}