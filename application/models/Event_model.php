<?php

class Event_model extends CORE_Model{
    protected  $table="events"; //table name
    protected  $pk_id="event_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function re_enlist_candidates($prev_event_id,$open_event_id,$limit){
        $limit = ($limit == 0 || $limit == null ?1:$limit);
        $sql="INSERT INTO events_contestant(event_id,contestant_id) 
              SELECT ".$open_event_id.",contestant_id
              FROM tabulation 
              GROUP BY event_id,contestant_id ORDER BY SUM(score) DESC LIMIT $limit";
        $this->db->query($sql);
    }



}
?>