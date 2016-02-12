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
            $this->load->model('transactions');
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
        $player_record = $this->players->get(array('player'=>$this->player));
        $this->data['peanuts'] = $player_record['peanuts'];
        
    }
    
    function create_activity_pane()
    {
        // get this player's purchases
        $purchase_records = $this->transactions->get_all(array('player'=>$this->player,'trans'=>'buy'));
        
        // turn purchase records into properly formatted array
        $purchases = array();
        foreach($purchase_records as $record)
        {
            $purchases[] = array('purchase_date'=>$record['datetime']);
        }
        $this->data['purchases'] = $purchases;
        
        // get this player's sales
        $sales_records = $this->transactions->get_all(array('player'=>$this->player,'trans'=>'sell'));
        
        // turn sale records into properly formatted array
        $sales = array();
        foreach($sales_records as $record)
        {
            $sales[] = array('sale_date'=>$record['datetime'],'sale_series'=>$record['series']);
        }
        $this->data['sales'] = $sales;
    }
}

/* End of file Portfolio.php */
/* Location: application/controllers/Portfolio.php */
