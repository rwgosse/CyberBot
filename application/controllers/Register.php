<?php

/**
 * Registration controller.
 * 
 * controllers/Registration.php
 *
 * ------------------------------------------------------------------------
 */
class Register extends Application {

    function __construct() 
    {
        parent::__construct();
        $this->load->model('collections');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() 
    {
        $this->data['title'] = 'User Registration';
        // this is the view we want shown
        $this->data['pagebody'] = 'register';
        
        $this->render();
    }
}