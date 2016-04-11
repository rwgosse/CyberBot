<?php

/**
 * This is a model for collections that grabs data from a MySQL database.
 *
 * @author Chris
 */
class Collections extends CI_Model {


	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single collection item
	public function get($which)
	{
            // get data from the server
            $data = $this->get_collections_where($which);

            // return the first and hopefully only record
            return $data->result_array()[0];
	}
        
        // retrieve all matching collection items
        public function get_all($which)
        {
            // get data from the server
            $data = $this->get_collections_where($which);
            
            // return all records
            return $data->result_array();
        }
        
        // retrieve selected columns matching player name in collection items
        public function get_like($which, $like)
        {
            // get data from the database
            //$this->db->select('piece');
            //$this->db->where('player',$which);
            //$this->db->like('piece', $like, 'before');
            
            //$data =  $this->db->get('collections');
            
            $data = $this->get_pieces_like($which,$like);
            
            // return all records
            return $data;//->result_array();
        }
        
        // retrieve the first in selected column matching player name in collection items
        public function get_like_first($which, $like)
        {
            // get data from the database
            //$this->db->select('piece');
            //$this->db->where('player',$which);
            //$this->db->like('piece', $like, 'before');
            
            //$data =  $this->db->get('collections')->result_array();
            
            $data = $this->get_pieces_like($which,$like);
            
            // return all records
            return $data[0];
        }
        
        // retrieve a structured array of pieces and their quantity
        public function get_pieces($which)
        {
            // get data from the server
            $data = $this->get_collections_where($which);
            
            // we need to get an array of the form position:[piece:quantity]
            $pieces = array
            (
                '0'=>array('11'=>0,'13'=>0,'26'=>0,'piece'=>'Heads'),
                '1'=>array('11'=>0,'13'=>0,'26'=>0,'piece'=>'Bodies'),
                '2'=>array('11'=>0,'13'=>0,'26'=>0,'piece'=>'Legs')
            );
            
            // iterate through all data and count each piece type
            foreach($data as $record)
            {
                $position = substr($record['piece'],-1);
                $series = substr($record['piece'],0,2);
                
                //increment the correct piece
                $pieces[$position][$series] += 1;
            }
            
            return $pieces;
            
        }

	// retrieve all of the collection items
	public function all()
	{
            // get data from the server
            $data = $this->get_collections_where(NULL);
            
            return $data;
	}

	// retrieve the first collection item
	public function first()
	{
            //$this->db->select('piece');
            // get data from the server
            $data = $this->get_collections_where(NULL);
            
            return $data[0];
	}

	// retrieve the last collection item
	public function last()
	{
            // get data from the server
            $data = $this->get_collections_where(NULL);
            
            $index = count($data) - 1;
            return $data[$index];
	}
        
        public function all_name()
        {
            return $this->get_players();
        }
        
	
	public function distinct_all()
	{
            // get data from the database
            return $this->get_pieces_distinct();
	}
        
        // this function implements db get where almost perfectly
        private function get_collections_where($which)
        {
            //open remote URL
            $file_handle = fopen("http://botcards.jlparry.com/data/certificates", "r");
        
            $collections = array();

            //get the first line and toss it because it's labels
            fgetcsv($file_handle, 1024);
            
            //go through all remaining rows and fill an array with them
            while (!feof($file_handle))
            {
                
                $line = fgetcsv($file_handle, 1024);
                
                //fix for empty lines creating blank array entries
                if(empty($line))
                {
                    continue;
                }
                
                $collection = array('token'=>$line[0],'piece'=>$line[1],'broker'=>$line[2],'player'=>$line[3],'datetime'=>$line[4]);
                
                //check conditions if $which is not empty
                if(!empty($which))
                {
                    $valid = TRUE;
                    
                    //get all array keys
                    $keys = array_keys($which);
                    
                    //for each array key, check if the values match
                    foreach($keys as $key)
                    {
                        //if it doesn't match, disqualify it
                        if(!($which[$key] === $collection[$key]))
                        {
                            $valid = FALSE;
                        }
                    }
                    
                    //if it's still valid, put the row in
                    if($valid)
                    {
                        $collections[] = $collection;
                    }
                }
                //if not, just put it in
                else
                {
                   
                    $collections[] = $collection;
                }
            }

            //close the handle and return the results
            fclose($file_handle);
            return $collections;
        }
        
        //get pieces where piece like "%arg" and player == $arg
        private function get_pieces_like($player,$piece)
        {
            //open remote URL
            $file_handle = fopen("http://botcards.jlparry.com/data/certificates", "r");
        
            $collections = array();

            //get the first line and toss it because it's labels
            fgetcsv($file_handle, 1024);
            
            //go through all remaining rows and fill an array with them
            while (!feof($file_handle))
            {
                
                $line = fgetcsv($file_handle, 1024);
                
                //fix for empty lines creating blank array entries
                if(empty($line))
                {
                    continue;
                }
                
                $collection = array('token'=>$line[0],'piece'=>$line[1],'broker'=>$line[2],'player'=>$line[3],'datetime'=>$line[4]);
                
                //check the player condition
                if($collection['player'] === $player)
                {
                    //check the piece condition
                    if(substr($collection['piece'],-1) === $piece)
                    {
                        $collections[] = array('piece'=>$collection['piece']);
                    }
                }
                
            }

            //close the handle and return the results
            fclose($file_handle);
            return $collections;
        }
        
        //get a list of pieces (like a select distinct)
        private function get_pieces_distinct()
        {
            //open remote URL
            $file_handle = fopen("http://botcards.jlparry.com/data/certificates", "r");
        
            $collections = array();

            //get the first line and toss it because it's labels
            fgetcsv($file_handle, 1024);
            
            //go through all remaining rows and fill an array with them
            while (!feof($file_handle))
            {
                
                $line = fgetcsv($file_handle, 1024);
                
                //fix for empty lines creating blank array entries
                if(empty($line))
                {
                    continue;
                }
                               
                $collection = array('token'=>$line[0],'piece'=>$line[1],'broker'=>$line[2],'player'=>$line[3],'datetime'=>$line[4]);
                
                $exists = FALSE;
                
                //check if the piece is already in the collection
                foreach($collections as $existing)
                {
                    if($existing['piece'] === $collection['piece'])
                    {
                        //if it exists, set exists to true
                        $exists = TRUE;
                    }
                }
                
                //does it already exist? if not, add it!
                if(!$exists)
                {
                    $collections[] = array('piece'=>$collection['piece']);                
                }
                
            }

            //close the handle and return the results
            fclose($file_handle);
            return $collections;
        }
        
        //get all player names
        private function get_players()
        {
            //open remote URL
            $file_handle = fopen("http://botcards.jlparry.com/data/certificates", "r");
        
            $collections = array();

            //get the first line and toss it because it's labels
            fgetcsv($file_handle, 1024);
            
            //go through all remaining rows and fill an array with them
            while (!feof($file_handle))
            {
                
                $line = fgetcsv($file_handle, 1024);
                
                //fix for empty lines creating blank array entries
                if(empty($line))
                {
                    continue;
                }
                
                //$collection = array('token'=>$line[0],'piece'=>$line[1],'broker'=>$line[2],'player'=>$line[3],'datetime'=>$line[4]);
                
                //we only want the player name!
                $collections[] = array('player'=>$line[3]);

            }

            //close the handle and return the results
            fclose($file_handle);
            return $collections;             
        }

	
}
