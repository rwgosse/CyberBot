<?php

/* 
 * Buy controller
 * controllers/Buy.php
 * 
 * 
 * 
 */

class Buy extends Application {
    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('purchase');
        $this->load->model('agent');
    }
    
    
        function index()
        {
            
           $this->buy_card(); 
            
        }

        private function buy_card()
        {  
        
            //team: your team code 'A04'
            // token: your agent authentication token
            // player: the name of your player
            
            
            
            //team: your team identifier
            //player: your player's name
            //an array of cards:
            //card: stock code
            //certificate: unique certificate number  
          
            
            //TODO: 
            $team = "A04"; // team name
            //$token = '420b6631881d8de28f1bc51e287c8c9';
            $token = $this->agent->get_token(); // token, team must have been registered
            //$player = 'Richard';
            $player =  $this->session->userdata('username'); // current playername stored in session data
           // echo $player;
            $success = $this->purchase->purchase($team,$token,$player); 
            
            if($success)
            {
                echo 'inserted';
                
                
            }
            
            
            
        }
    
    
    
}

