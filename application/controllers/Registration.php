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
        $this->load->model('register');
    }
	
	function index() 
    {
        $this->data['title'] = 'User Registration';
        $this->data['pagebody'] = 'register';
		
		//if currently in register view then hide the register link
		if($this->data['pagebody'] == 'register')
		{
			$this->data['register_visibility'] = 'none';
		}
		
		//set the visibility to none until something happens
		$this->data['username_visibility'] = 'none';
		$this->data['password_visibility'] = 'none';
		$this->data['reg_visibility'] = 'none';
		
		//call the checkuser method
		$this->checkuser();
		$this->render();
	}
	
	function checkuser()
	{
		
			//if player text field isnt empty then go on
			if (!empty($this->input->post('player')) && !empty($this->input->post('password')))
			{
				//use check_registration method, if player doesnt exist then create them
				if($this->register->check_registration($this->input->post('player')))
				{
					//send 'player' and 'password' data to database
					$this->register->register_user($this->input->post('player'), $this->input->post('password'));

					$this->data['reg_visibility'] = "true";
					//success msg here
					$this->data['register_success'] = 'Player successfully registered!';
				}
				else if ($this->register->check_registration($this->input->post('player')) == FALSE)
				{
					//if already exists then display message
					$this->data['username_visibility'] = 'true';
					//failure msg here
					$this->data['username_message'] = '*User already exists, please try again';
				}
			}
			else if (empty($this->input->post('player')))
			{
				$this->data['username_visibility'] = 'true';
				$this->data['username_message'] = '*This field must be filled in.';
			}
			else
			{
				$this->data['password_visibility'] = 'true';
				$this->data['password_message'] = '*This field must be filled in.';
			}
		
	}
}