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
        
        //Gets the first head piece for the current player
        $head_part = $this->collections->get_like_first('Donald', '0');
        $cell0 = $this->parser->parse('_cell', (array) $head_part, true);
        $this->data['part0'] = $cell0;
        
        //Gets the first body piece for the current player
        $body_part = $this->collections->get_like_first('Donald', '1');
        $cell1 = $this->parser->parse('_cell', (array) $body_part, true);
        $this->data['part1'] = $cell1;
        
        //Gets the first legs piece for the current player
        $legs_part = $this->collections->get_like_first('Donald', '2');
        $cell2 = $this->parser->parse('_cell', (array) $legs_part, true);
        $this->data['part2'] = $cell2;
        
        $this->candidate_pieces();
        $this->completed_bot();
        
        $this->render();
    }

    function candidate_pieces() 
    {
        //head dropdown
        $head_pieces = $this->collections->get_like('Donald', '0');
        $heads = array();
        
        foreach ($head_pieces as $head)
        {
           $head['selected'] = NULL;
           if($head['piece'] === $this->collections)
            {
                $head['selected'] = 'selected="selected"';
            }
            $heads[] = (array) $head;
        }
        
        $this->data['heads'] = $heads;
        
        //body dropdown
        $body_pieces = $this->collections->get_like('Donald', '1');
        $bodys = array();
        
        foreach ($body_pieces as $body)
        {
           $body['selected'] = NULL;
           if($body['piece'] === $this->collections)
            {
                $head['selected'] = 'selected="selected"';
            }
            $bodys[] = (array) $body;
        }
        
        $this->data['bodys'] = $bodys;
        
        //legs dropdown
        $leg_pieces = $this->collections->get_like('Donald', '2');
        $legs = array();
        
        foreach ($leg_pieces as $leg)
        {
           $leg['selected'] = NULL;
           if($leg['piece'] === $this->collections)
            {
                $leg['selected'] = 'selected="selected"';
            }
            $legs[] = (array) $leg;
        }
        
        $this->data['legs'] = $legs;
    }

    function completed_bot() {

        //Assembly page showing the fully built Bot
        
    }

}

/* End of file Assembly.php */
/* Location: application/controllers/Assembly.php */