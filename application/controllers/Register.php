<?php

/**
 * Registration page for new users
 * 
 * controllers/Register.php
 *
 * ------------------------------------------------------------------------
 */

    function __construct() 
    {
        parent::__construct();
    }
    function index() 
    {
        $this->data['title'] = 'Registration';
        // this is the view we want shown
        $this->data['pagebody'] = 'register';
        
        $this->render();
    }

/* End of file Register.php */
/* Location: application/controllers/Register.php */