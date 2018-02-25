<?php

class Voter_account_model extends CORE_Model{

    protected  $table="voters_accounts"; //table name
    protected  $pk_id="voter_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


}


?>