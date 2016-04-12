<?php

/**
 * This is a model that represents the purchase of cards
 *
 * 
 * @author Richard
 */
class Purchase extends CI_Model
{
    
    // Constructor
    public function __construct()
    {
        parent::__construct();
        
    }
    
    //todo
    //    <certificate>
    //        <token>102d6</token>
    //        <piece>11b-1</piece>
    //        <broker>A04</broker>
    //        <player>Richard</player>
    //        <datetime>1460484083</datetime>
    //    </certificate>
    function purchase($team, $token, $player) 
    {
        $response = $this->curl->simple_post('http://botcards.jlparry.com/buy', array('team'=>$team,'token'=>$token,'player'=>$player));
        echo $response;
        $xml = simplexml_load_string($response);
        //echo $xml;
        
        foreach ($xml->certificate as $certificate)
        {
            $timestamp = date(DATE_ATOM, (int)$certificate->datetime);
            
            
            $data = array(
            'token' => (string)$certificate->token,
            'piece' => (string)$certificate->piece,
            'broker' => (string)$certificate->broker,
            'player' => (string)$certificate->player,
            'datetime' => $timestamp
             );
            $this->db->insert('collections', $data);// insert into database
            
            
        }
       
        
        
        
        
    }
    
}
