<?php

/* 
 * Buy controller
 * controllers/Buy.php
 * May move this to the homepage or portfolio controller
 * 
 * 
 */

class Buy extends Application {
    
    function __construct() 
    {
        parent::__construct();
        $this->load->model('purchase');
        $this->load->model('agent');
        $this->load->model('gamestate');
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
          
            
            
            //TODO: 
            $team = "A04"; // team name
            //$token = $this->agent->get_token(); // token, team must have been registered
            $token = '420b6631881d8de28f1bc51e287c8c91'; // force enter token for debug porpoises
            //$player = 'Richard';
            $player =  $this->session->userdata('username'); // current playername stored in session data
           // echo $player;
            $success = $this->purchase->purchase($team,$token,$player); 
            if ($success)
            {
                echo 'Cards successfully purchased.';
            }
            else 
            {
                echo 'Failed to purchase cards';
            }
            
            
            
        }
    
    
    
}

