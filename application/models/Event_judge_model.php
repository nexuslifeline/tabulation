<?php

class Event_judge_model extends CORE_Model{
    protected  $table="events_judge"; //table name
    protected  $pk_id="event_judge_id"; //primary key id
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_judge_list($event_id){
        $sql = "SELECT
                ua.user_id,ua.user_group_id,ua.user_email,ua.user_address,ua.user_mobile,
                CONCAT_WS(' ',ua.user_fname,ua.user_lname)as fullname,
                IF(ISNULL(ej.event_id),0,1) as status FROM user_accounts as `ua`

                LEFT JOIN

                (
                  SELECT ej.judge_id,ej.event_id FROM events_judge as `ej`
                  WHERE ej.event_id=$event_id
                ) as ej ON ej.judge_id=ua.user_id

                WHERE ua.user_group_id=2 AND ua.is_active=1 AND ua.is_deleted=0 
                AND ua.user_id NOT IN(
                    SELECT x.judge_id FROM events_judge as x INNER JOIN events as z ON z.event_id = x.event_id
                    WHERE z.is_open = 1 AND NOT x.event_id = $event_id
                )
                ORDER BY ua.user_fname,ua.user_lname";

        return $this->db->query($sql)->result();

    }


}
?>