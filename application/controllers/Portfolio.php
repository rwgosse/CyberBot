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

    function switchPortfolio() 
    {

            //Change to a different player's portfolio to view

    }

/* End of file Portfolio.php */
/* Location: application/controllers/Portfolio.php */
