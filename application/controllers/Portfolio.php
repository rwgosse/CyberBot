<?php

/**
 * Controller for portfolio page.
 * 
 * controllers/Portfolio.php
 *
 * ------------------------------------------------------------------------
 */
class Portfolio extends Application {

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
        $this->data['title'] = 'Player Portfolio';
        $this->data['pagebody'] = 'portfolio';
        
        //TODO: check player
        
        $this->player = 'Mickey';
        
        //fill Player dropdown
        $players = array();
        foreach ($this->players->all() as $record)
        {
            $record['selected'] = NULL;
            
            if($record['player'] === $this->player)
            {
                $record['selected'] = 'selected="selected"';
            }
            
            $players[] = (array) $record;
        }
        $this->data['players'] = $players;
        
        $this->create_holdings_pane();
        $this->create_activity_pane();
        
        $this->render();
    }

    function create_holdings_pane()
    {
        $data_pieces = $this->collections->get_pieces(array('player'=>'Mickey'));

        // fill holdings table
        $series = array();
        foreach ($data_pieces as $record)
        {
            $series[] = (array) $record;
        }
        $this->data['series'] = $series;
        
        // get number of peanuts
        
    }
    
    function create_activity_pane()
    {
        
    }
}

/* End of file Portfolio.php */
/* Location: application/controllers/Portfolio.php */
