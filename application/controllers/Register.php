<?php

/**
 * Registration controller.
 * 
 * controllers/Registration.php
 *
 * ------------------------------------------------------------------------
 */
class Registration extends Application {

	    function __construct() 
    {
        parent::__construct();
        $this->load->model('Register');
    }
	
	    function index() 
    {
        $this->data['title'] = 'User Registration';
        $this->data['pagebody'] = 'register';
		
		$this->render();
		
	}
}