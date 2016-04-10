<?php

/**
 * This is a model that represents the agent and its current status
 *
 * Usage: 
 * 
 * @author Chris
 */
class Agent extends CI_Model
{
    
    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
    }
    
    // what should an agent know?
    //an agent can be registered
    //an agent has a token
    //we can ask if the agent is registered
    
    //this function attempts to register the agent with the server
    public function register()
    {
        //check if we are already registered
        
        //check the server status to see if we can register and exit if we can't
        
        //if we can register, register!
        
        //return status (good or bad)
    }
    
    //this function checks if the agent is registered and can be used internall or exeternally
    public function is_registered()
    {
        //check if we are already registered
        //compare round number of the most recent round in db to the server round number
        //unfortunately we can't ask the server if we are registered so we must make an educated guess with our own data
        //this is problematic because registering is not entirely 
        
    }
    
    //get the current token
    public function get_token()
    {
        //grab the latest token from the DB
    }
    


}
