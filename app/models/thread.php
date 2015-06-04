<?php


class Thread extends AppModel                    
{

	 public static function get($id)            
   	{
        $db = DB::conn();
 
        $row = $db->row("SELECT * FROM thread WHERE id = ?", array($id));

        if(!$row) {
           throw new RecordNotFoundException("no record found");
        }

        return new self($row);    
     }

    public static function getAll()                
    {
        $threads = array();
                    
        $db = DB::conn();
 		$rows = $db->rows("SELECT * FROM thread");
        
        foreach ($rows as $row) {                    
           $threads[] = new Thread($row);
        }
                    
       return $threads;
    }                        
}
