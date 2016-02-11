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
            $this->data['title'] = 'Portfolio';
            $this->data['pagebody'] = 'portfolio'; 
            $this->render();
	}

}

/* End of file Portfolio.php */
/* Location: application/controllers/Portfolio.php */