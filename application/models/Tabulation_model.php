<?php

class Tabulation_model extends CORE_Model{

    protected  $table="tabulation"; //table name
    protected  $pk_id="tabulation_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_contestant_scores($event_id){

    }


}


?>