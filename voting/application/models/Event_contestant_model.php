<?php

class Event_contestant_model extends CORE_Model{
    protected  $table="events_contestant"; //table name
    protected  $pk_id="event_contestant_id"; //primary key id

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_contestant_list($event_id){
        $sql = "SELECT
                c.*,ec.contestant_no,
                IF(ISNULL(ec.event_id),0,1)as status

                FROM contestants as c
                LEFT JOIN
                (
                  SELECT
                  ec.event_id,ec.contestant_id,ec.contestant_no
                  FROM `events_contestant` as `ec`
                  WHERE ec.event_id=$event_id
                )as ec ON ec.contestant_id=c.contestant_id


                WHERE c.is_active=1 AND c.is_deleted=0 ORDER BY c.entity_name";

        return $this->db->query($sql)->result();
    }
}
?>