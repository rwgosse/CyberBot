<?php

/**
 * Our homepage. Show a panel with overall game status and displays bot pieces 
 * player is aware of. Then another panel displays all other player's, their
 * equity, and cash, as well as the ability to view each player's portfolio.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Homepage extends Application {

	function __construct()
	{
		parent::__construct();
		$this->load->model('players');
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------
        
        
	function index()
	{
		$this->data['title'] = 'Homepage';
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		// build the list of authors, to pass on to our view

		$this->welcome_players();
		$this->render();
	}


        private function welcome_players()
        {
			//get all the players from our model
			$players = $this->players->all(); 
			
			
			$players_array = array ();
			foreach ($players as $player)
			{
				$players_array[] = (array) $player;
			}
			$this->data['test'] = $players_array; 
        }
        
        function goToPortfolio() 
	{
		
                //Homepage panel that displays other players and when clicked, will go to their portfolio
            
	}
        
}

/* End of file Homepage.php */
/* Location: application/controllers/Homepage.php */