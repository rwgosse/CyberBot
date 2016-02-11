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
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->load->model('Players');
        
        $this->data['title'] = 'Player Portfolio';
        $this->data['pagebody'] = 'portfolio';
        
        //TODO: check player
        
        $this->player = 'Mickey';
        
        //TODO: fill Player dropdown
        $players = array();
        foreach ($this->Players->all() as $record)
        {
            $players[] = (array) $record;
        }
        $this->data['players'] = $players;
        
        $this->create_holdings_pane();
        $this->create_activity_pane();
        
        $this->render();
    }

    function create_holdings_pane()
    {
        
    }
    
    function create_activity_pane()
    {
        
    }
}

/* End of file Portfolio.php */
/* Location: application/controllers/Portfolio.php */
