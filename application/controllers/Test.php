<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Test extends application {
    
    function __construct()
	{
		parent::__construct();
	}
    
    
   function index()
{
$this->load->model('Players');
        $all = $this->Players->all();
        foreach($all as $row)
        {
            echo implode(" ", $row);
            echo "<br>";
        }
        
$player = array('player' => 'Mickey');
        
$stat = $this->Players->get($player);
$equity = $this->Players->get_equity($player);

    echo implode($stat);
    echo $equity;

}
 
}


