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
       //is the game status open?
        $this->gamestate->refresh();
        $code = $this->gamestate->get_code(); // 3 represents open
        
        if ($code == 3) // &&  $this->agent->is_registered() )
        {
            //echo $team . $token . $player;
            if(!empty($team) && !empty($token) && !empty($player)) //verify parameters
            {
                $response = $this->curl->simple_post('http://botcards.jlparry.com/buy', array('team'=>$team,'token'=>$token,'player'=>$player));
                //echo $response;
                $xml = simplexml_load_string($response);
                //echo $xml;

                foreach ($xml->certificate as $certificate)
                {
                    $timestamp = date(DATE_ATOM, (int)$certificate->datetime); //convert unix time to mysql compatable
                    $data = array(
                    'token' => (string)$certificate->token,
                    'piece' => (string)$certificate->piece,
                    'broker' => (string)$certificate->broker,
                    'player' => (string)$certificate->player,
                    'datetime' => $timestamp
                     );
                    $this->db->insert('collections', $data);// insert into database
                    echo 'inserted:' . (string)$certificate->piece . '</br>' ;


                }
            }
            else 
            {
                 //team, token or player variable null or empty
                 echo 'team, token or player not set!';
            }
        }
        else 
        {
           
            //game not open
            echo 'status code: ' . $this->gamestate->get_code() . '</br>';
//           if ($this->agent->is_registered())
//            {
//                echo 'Registered: true';
//            }
//            else 
//                {
//                    echo 'Registered: false';
//                }
            
            
        }
        
        
        
    }
    
}
