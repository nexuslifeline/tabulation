<?php

class Voters_accounts_model extends CORE_Model{

    protected  $table="voters_accounts"; //table name
    protected  $pk_id="voter_id"; //primary key id

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function authenticate_user($uname,$pword){
        $this->db->select('ua.voter_id,ua.voter_username,CONCAT_WS(" ",ua.voter_fname,ua.voter_mname,ua.voter_lname) as user_fullname');
        $this->db->from('voters_accounts as ua');
        $this->db->where('ua.voter_username', $uname);
        $this->db->where('ua.voter_pword', sha1($pword));
        $this->db->where('ua.is_verified', 1 );
        return $this->db->get();

    }



}

?>