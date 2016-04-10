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
        $this->load->model('gamestate');
        $this->load->model('rounds');
        $this->load->library('curl');
    }
    
    // what should an agent know?
    //an agent can be registered
    //an agent has a token
    //we can ask if the agent is registered
    
    //this function attempts to register the agent with the server
    //true: registered
    //false: not registered
    //should implement more robust error handling later
    public function register($team, $name, $password)
    {
        //check if we are already registered
        if($this->is_registered())
        {
            return TRUE;
        }
        
        //check the server status to see if we can register and exit if we can't
        $this->gamestate->refresh();
        $code = $this->gamestate->get_code();
        $round = $this->gamestate->get_round();
        if(!($code === 2 || $code === 3))
        {
            return FALSE; //disable this check if the server is broken
        }
        
        //if we can register, register!
        $string = $this->curl->simple_post('http://botcards.jlparry.com/register', array('team'=>$team,'name'=>$name,'password'=>$password));
        //echo $string;
        $xml = simplexml_load_string($string);
        
        //if the xml response is not called 'agent', something went wrong
        if(!$xml->getName() === "agent")
        {
            return FALSE;
        }
        
        $token = (string)$xml->token;
        
        //add the round number and key to the database
        $this->rounds->add($round, $token);
        
        //if we got this far, it worked!
        return TRUE;
    }
    
    //this function checks if the agent is registered and can be used internall or exeternally
    public function is_registered()
    {
        //check if we are already registered
        //compare round number of the most recent round in db to the server round number
        //unfortunately we can't ask the server if we are registered so we must make an educated guess with our own data
        //this is problematic because registering is not entirely
        
        $this->gamestate->refresh();
        $round_num = $this->gamestate->get_round();
        return !(is_null($this->rounds->get($round_num)));
        
    }
    
    //get the current token
    public function get_token()
    {
        //grab the latest token from the DB
        return $this->rounds->get($this->gamestate->get_round())['token'];
    }
    


}
