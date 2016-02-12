<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * MY_Controller conventions:
 *  Menubar
 *  Render content
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
            parent::__construct();

            // load parser library
            $this->load->library('parser');

            // create data and error arrays
            $this->data = array();
            $this->data['title'] = 'CyberBot Web App';	// our default title
            $this->errors = array();
            //$this->data['page_title'] = 'CyberBot';   // our default page

            // handle login/logout
            $this->handle_login();
 
	}

	/**
	 * Render this page
	 */
	function render()
	{
            // create menu bar by calling function, then parse the page body
            $this->create_menubar();
            $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

            // finally, build the browser page!
            $this->data['data'] = $this->data;
            $this->parser->parse('_template', $this->data);
	}
        
        /**
	 * Handle login/logout functionality
	 */
        function handle_login()
        {
            // display no message if there's nothing to say
            $this->data['login_message'] = NULL;
            
            // get the login and action from get/post
            $username = $this->input->get_post('username');
            $action = $this->input->get_post('action');
            
            // a bit of validation: check both username and action submitted
            if($this->session->userdata('username') && $action === 'logout')
            {
                // if someone is logged in and action is logout, remove login session data
                $this->session->unset_userdata('username');
                $this->data['login_message'] = 'Logged out successfully!';
                
            }
            else if(!empty($username) && $action === 'login')
            {
                // if username is not empty, and action is login, check against users
                
                $this->load->model('players');            
                if($username === $this->players->get(array('player'=>$username))['player'])
                {
                    // if user exists, log in by adding session data
                    $this->session->set_userdata(array('username'=>$username));
                    $this->data['login_message'] = '';
                }
                else
                {
                    // if user does not exist, display a message
                    $this->data['login_message'] = 'Invalid username!';
                }
            }           
            
        }
        
        /**
	 * Create the menu bar, including the login box
	 */
        function create_menubar()
        {
            // get the menu bar data from config
            $this->data['menudata'] = $this->config->item('menu_choices')['menudata'];
            
            // check if someone is logged in
            if($this->session->userdata('username'))
            {
                // if so, display logout button
                $this->data['login_text'] = $this->session->userdata('username');
                $this->data['login_submit_text'] = 'Logout';
                $this->data['login_visibility'] = 'none';
                $this->data['login_action'] = 'logout';
            }
            else
            {
                // if not, display the login box
                $this->data['login_text'] = '';
                $this->data['login_submit_text'] = 'Login';
                $this->data['login_visibility'] = 'initial';
                $this->data['login_action'] = 'login';
            }
            
            // parse the menu bar
            $this->data['menubar'] = $this->parser->parse('_menubar', $this->data, true); //$this->config->item('menu_choices')
            
        }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */