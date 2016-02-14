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
        
        //get player from session if it doesn't exist, redirect to homepage
        if($this->session->userdata('username'))
        {
            $this->player = $this->session->userdata('username');
        } 
        else 
        {
            redirect('/');
        }
        
        $this->candidate_pieces();
        $this->completed_bot();
        
        $this->render();
    }

    function candidate_pieces() 
    {
        //head dropdown
        $head_pieces = $this->collections->get_like($this->player, '0');
        
        //if player doesnt have pieces then show placeholder
        if ($head_pieces == NULL)
        {
            $this->data['part0'] = 'placeholder_head';
        }
        //if player has a pieces then show first in array
        else
        {
            $first_head = $this->collections->get_like_first($this->player, '0');
            $this->data['part0'] = $first_head['piece'];
        }
        
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
        
         if ($body_pieces == NULL)
        {
            $this->data['part1'] = 'placeholder_body';
        }
        else
        {
            $first_body = $this->collections->get_like_first($this->player, '1');
            $this->data['part1'] = $first_body['piece'];
        }
        
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
        
         if ($leg_pieces == NULL)
        {
            $this->data['part2'] = 'placeholder_body';
        }
        else
        {
            $first_legs = $this->collections->get_like_first($this->player, '2');
            $this->data['part2'] = $first_legs['piece'];
        }
        
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
        
        $this->data['leg'] = $legs;
    }

    function completed_bot() {

        //set the no_assemble place holder to blank
        $this->data['no_assemble'] = '';
        
        //get all the query strings
        $head = $this->input->get('selecthead');
        $body = $this->input->get('selectbody');
        $legs = $this->input->get('selectlegs');
        
        //if Assemble button is submitted  then display bot parts
        if ($this->input->get('btn_submit') === 'Assemble')
        {
            //if player doesnt have a bot part then display error message
            if($this->data['part0'] === 'placeholder_head' || $this->data['part1'] === 'placeholder_body' || $this->data['part2'] === 'placeholder_legs')
            {
                $this->data['no_assemble'] = 'Sorry you need more pieces, we cannot build your bot.';
            }
            else
            {
                $this->data['head'] = $head;
                $this->data['body'] = $body;
                $this->data['legs'] = $legs;
            }
        } 
    }

}

/* End of file Assembly.php */
/* Location: application/controllers/Assembly.php */