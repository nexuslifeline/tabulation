<?php

class Event_model extends CORE_Model{
    protected  $table="events"; //table name
    protected  $pk_id="event_id"; //primary key id
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
}
?>