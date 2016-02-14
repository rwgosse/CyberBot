<?php

/**
 * Our bot assembler.
 * 
 * controllers/Assembly.php
 *
 * ------------------------------------------------------------------------
 */
class Assembly extends Application {

    function __construct() 
    {
        parent::__construct();
        $this->load->model('collections');
        $this->load->model('players');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() 
    {
        $this->data['title'] = 'Bot Assembler';
        // this is the view we want shown
        $this->data['pagebody'] = 'assembly';
        
        // get list of players
        $players_records = $this->players->all();
        
        //get player from session if it doesn't exist, redirect to homepage
        if($this->session->userdata('username'))
        {
            $this->player = $this->session->userdata('username');
        } 
        else 
        {
            redirect('/homepage');
        }
        
        
        $this->candidate_pieces();
        $this->completed_bot();
        
        $this->render();
    }

    function candidate_pieces() 
    {
        //head dropdown
        $head_pieces = $this->collections->get_like($this->player, '0');
        
        $this->data['part0'] = NULL;
        
        $heads = array();
        
        foreach ($head_pieces as $head)
        {
           $head['selected'] = NULL;
           if($head['piece'] === $this->input->get('selecthead'))
            {
                $head['selected'] = 'selected="selected"';
                $this->data['part0'] = $head['piece'];
            }
            $heads[] = (array) $head;
        }
        
        $this->data['heads'] = $heads;
        
        //body dropdown
        $body_pieces = $this->collections->get_like($this->player, '1');
        
        $this->data['part1'] = NULL;
        
        $bodys = array();
        
        foreach ($body_pieces as $body)
        {
           $body['selected'] = NULL;
           if($body['piece'] == $this->input->get('selectbody'))
            {
                $head['selected'] = 'selected="selected"';
                $this->data['part1'] = $body['piece'];
            }
            
            $bodys[] = (array) $body;
        }
        
        $this->data['bodys'] = $bodys;
        
        //legs dropdown
        $leg_pieces = $this->collections->get_like($this->player, '2');
        
        $this->data['part2'] = NULL;
        
        $legs = array();
        
        foreach ($leg_pieces as $leg)
        {
           $leg['selected'] = NULL;
           if($leg['piece'] === $this->input->get('selectlegs'))
            {
                $leg['selected'] = 'selected="selected"';
                $this->data['part2'] = $leg['piece'];
            }
            $legs[] = (array) $leg;
        }
        
        $this->data['legs'] = $legs;
    }

    function completed_bot() {

        //Assembly page showing the fully built Bot
        //$this->input->
        
    }

}

/* End of file Assembly.php */
/* Location: application/controllers/Assembly.php */