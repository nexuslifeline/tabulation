<?php

class Events_vote_model extends CORE_Model{
    protected  $table="events_vote"; //table name
    protected  $pk_id="event_vote_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


   function get_event_votes( $event_id ){
        $sql="SELECT n.event_id,n.contestant_vote,n.contestant_id,m.total_voters,(contestant_vote/total_voters*100)as rating
            FROM 
            (SELECT COUNT(ev.contestant_id) as contestant_vote,ev.contestant_id,
            ev.event_id 
            FROM `events_vote` as ev
            WHERE ev.event_id=$event_id
            GROUP BY ev.contestant_id,ev.event_id) as n
            
            LEFT JOIN
            
            (
            SELECT 
            COUNT(ev.contestant_id) as total_voters,
            $event_id as  event_id 
            FROM `events_vote` as ev
            WHERE ev.`event_id`=$event_id
            )as m ON n.event_id=m.event_id";

        return $this->db->query($sql)->result();
   }


}
?>