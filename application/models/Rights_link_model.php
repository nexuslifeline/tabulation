<?php

class Rights_link_model extends CORE_Model{

    protected  $table="rights_links"; //table name
    protected  $pk_id="link_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function create_default_link_list(){
        $sql="INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES
                                          (1,'1','1-1','Register Candidate'),
                                          (2,'1','1-2','Tabulation System'),
                                          (6,'2','2-1','Manage User Account'),
                                          (7,'2','2-2','Manage User Group'),
                                          (8,'2','2-3','Manage Events'),
                                          (9,'2','2-4','Setup Criteria'),
                                          (10,'3','3-1','Print Ranking')

                                          ON DUPLICATE KEY UPDATE

                                          rights_links.parent_code=VALUES(rights_links.parent_code),
                                          rights_links.link_code=VALUES(rights_links.link_code),
                                          rights_links.link_name=VALUES(rights_links.link_name)

            ";



        $this->db->query($sql);
    }



}




?>