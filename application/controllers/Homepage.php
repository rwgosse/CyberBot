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
		$this->load->model('collections');
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------
        
        
	function index()
	{
		$this->data['title'] = 'Homepage';
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		// build the list of authors, to pass on to our view

		//use the collections::all() method and put it into the allpieces variable
		$allpieces = $this->collections->distinct_all();
		$results = ''; 
		foreach ($allpieces as $row)
		{
			$results .= $this->parser->parse('_homepagecell', $row, true);
		}	
		$this->data['piecedisplay'] = $results; 
		//calls the welcome_players function
		$this->welcome_players();
		//renders the page
		$this->render();
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