<?php

/**
 * This is a model that represents the current game state
 *
 * @author Chris
 */
class Gamestate extends CI_Model {

    protected $status; //0 = status unknown, 1 = status known
    protected $code; //status code from server
    protected $round; //round number from server
    protected $countdown; //time left in current round (from server)
    
    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // call this function to refresh the game state (get from server)
    public function refresh()
    {
        //TODO retrieve and parse XML
    }
    
    //accessor for status good/known variable
    public function get_status()
    {
        //do not refresh; we want to know if LAST update was good or not!
        
        return $this->status;
    }
    
    //accessor for state code (code)
    public function get_code()
    {
        //always refresh status!
        $this->refresh();
        
        return $this->code;
    }
    
    //accessor for state name (state)
    public function get_state()
    {
        //always refresh status!
        $this->refresh();
        
        //TODO: translate with enums or something
    }
    
    //accessor for round number
    public function get_round()
    {
        //always refresh status!
        $this->refresh();
        
        return $this->round;
    }
    
    //accessor for time left (countdown)
    public function get_countdown()
    {
        //always refresh status!
        $this->refresh();
        
        return $this->countdown;
    }

}
