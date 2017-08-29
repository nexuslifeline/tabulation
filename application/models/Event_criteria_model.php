<?php

class Event_criteria_model extends CORE_Model{
    protected  $table="events_criteria"; //table name
    protected  $pk_id="event_criteria_id"; //primary key id

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_criteria_list($event_id){
        $sql = "SELECT
                    c.criteria_id,c.criteria,c.description,IFNULL(ec.percentage,0) as percentage,
                    IF(ISNULL(ec.event_id),0,1) as status,ec.max_score

                    FROM criteria as c
                    LEFT JOIN

                    (
                    SELECT
                    ec.criteria_id,ec.event_id,ec.percentage,ec.max_score
                    FROM events_criteria as ec
                    WHERE ec.event_id=$event_id
                    )as ec ON ec.criteria_id=c.criteria_id


                    WHERE c.is_active=1 AND c.is_deleted=0 ORDER BY c.criteria";

        return $this->db->query($sql)->result();

    }


}
?>