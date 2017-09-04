<?php

class Users_model extends CORE_Model{

    protected  $table="user_accounts"; //table name
    protected  $pk_id="user_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_default_user(){
        //return;
        $sql="INSERT IGNORE INTO user_accounts
                  (user_id,user_name,user_pword,user_lname,user_fname,user_mname,user_address,user_email,user_mobile,user_group_id)
              VALUES
                  (1,'admin',SHA1('admin'),'Diaz','Anna Karina','','Pampanga','annakarina@yahoo.com','0935-746-1234',1)
        ";
        $this->db->query($sql);

    }

    function authenticate_user($uname,$pword){
        $this->db->select('ua.user_id,ua.user_name,ua.user_group_id,ua.photo_path,ua.user_email,CONCAT_WS(" ",ua.user_fname,ua.user_mname,ua.user_lname) as user_fullname');
        $this->db->from('user_accounts as ua');
        $this->db->join('user_groups as ug', 'ua.user_group_id = ug.user_group_id','left');
        $this->db->where('ua.user_name', $uname);
        $this->db->where('ua.user_pword', sha1($pword));
        return $this->db->get();

    }




}




?>