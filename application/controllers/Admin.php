<?php

/**
 * Admin page, which will eventually have user management and stuff.
 * 
 * controllers/Admin.php
 *
 * ------------------------------------------------------------------------
 */
class Admin extends Application {

	function __construct()
	{
		parent::__construct();
                $this->load->model('gamestate');
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------
        
        
	function index()
	{
		$this->data['title'] = 'Administration';
		$this->data['pagebody'] = 'admin';	// this is the view we want shown
                //
                //calls the welcome_states function
                $this->welcome_states();
		//renders the page
		$this->render();
	}
        
        //get the state from the server and display
        private function welcome_states()
        {
            $this->gamestate->refresh();
            $this->data['round-number'] = $this->gamestate->get_round();
            $this->data['round-state'] = $this->gamestate->get_state();
            $this->data['round-countdown'] = $this->gamestate->get_countdown();
        }


		private function welcome_players()
	{
		//get all the players from our model
		$players = $this->players->all(); 

		
		$players_array = array ();
		foreach ($players as $player)
		{
			$player['equity'] = $this->players->equity($player['player']);
			$players_array[] = (array) $player;
		}
		$this->data['test'] = $players_array; 
	}

}

/* End of file Homepage.php */
/* Location: application/controllers/Homepage.php */