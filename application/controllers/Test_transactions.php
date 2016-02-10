<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_transactions extends CI_Controller {

    /* 
     * Test controller for testing transactions. Remove before issuing pull request.
     * IF THIS IS STILL IN THE CODE THEN REJECT THE PULL REQUEST
     */

    public function index()
    {
        $this->load->model('Transactions');
        $all = $this->Transactions->all();
        foreach($all as $row)
        {
            echo implode(" ", $row);
            echo "<br>";
        }
        
        echo "<br>";
        echo implode(" ", $this->Transactions->first());
        
        echo "<br>";
        echo implode(" ", $this->Transactions->last());
        
        echo "<br><br>";
        echo implode(" ", $this->Transactions->get(array('transaction_id'=>'5')));
        echo "<br>";
        echo implode(" ", $this->Transactions->get(array('player'=>'Henry','series'=>'22','trans'=>'sell')));
    }
    
}