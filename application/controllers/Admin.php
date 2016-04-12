<?php

/**
 * Admin page, which will eventually have user management and stuff.
 * 
 * controllers/Admin.php
 *
 * ------------------------------------------------------------------------
 */
class Admin extends Application {

	function __construct()
	{
		parent::__construct();
                $this->load->model('gamestate');
                $this->load->model('rounds');
				$this->load->model('players');
                $this->load->model('agent');
                $this->load->helper('url');
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------
        
        
	function index()
	{
            $this->data['title'] = 'Administration';
			
			if ($this->players->check_admin($this->session->userdata['username']) == 1)
				{
				$this->data['admin_visibility'] = 'true';
				$this->data['pagebody'] = 'admin';	// this is the view we want shown
				}
            else {
				//redirect back to the admin page            
            redirect('/', 'refresh');
			}
            $this->data['message'] = ''; //by default, message is an empty string
            
            //call the display_register function
            $this->display_register();
            
            //calls the welcome_states function
            $this->welcome_states();

            //display stored tokens from previous rounds
            $this->admin_rounds();
            
            //renders the page
            $this->render();
	}
        
        function register()
        {
            $this->data['title'] = 'Administration';
            $this->data['pagebody'] = 'admin_register';	// this is the view we want shown

            //renders the page
            $this->render();
            
            //call the register_agent function to actually register the agent
            $this->register_agent();
            
            //redirect back to the admin page            
            redirect('admin', 'refresh');
        }
        
        //check if we're registered and display a nice message if we are or aren't
        private function display_register()
        {  
            $this->data['register-status'] = $this->agent->is_registered() ? 'Registered' : 'Not registered';
        }
        
        //TODO: register the agent
        private function register_agent()
        {  
            
            //TODO: get this from input boxes
            $team = "A04"; //$this->input->post('team');
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            
            $success = $this->agent->register($team,$name,$password);
            
            if($success)
            {
                $this->data['message'] = 'REGISTERED!';
            }
        }
        
        //get the state from the server and display
        private function welcome_states()
        {
            $this->gamestate->refresh();
            $this->data['round-number'] = $this->gamestate->get_round();
            $this->data['round-state'] = $this->gamestate->get_state();
            $this->data['round-countdown'] = $this->gamestate->get_countdown();
        }
        
        //get the list of previous rounds from the database and display
        private function admin_rounds()
        {
            $this->data['rounds'] = $this->rounds->all();
        }

}

/* End of file Homepage.php */
/* Location: application/controllers/Homepage.php */