<?php

class Criteria_model extends CORE_Model{

    protected  $table="criteria"; //table name
    protected  $pk_id="criteria_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function seed_criteria(){
        $sql="INSERT INTO `criteria` (`criteria_id`, `criteria`, `description`, `is_active`,`is_deleted`,criteria_type_id) VALUES
                                        (1,'Vote','This criteria automatically computes the percentage from the Voting system.',1,0,1)
                                         
                                          ON DUPLICATE KEY UPDATE

                                          criteria.criteria=VALUES(criteria.criteria),
                                          criteria.description=VALUES(criteria.description),
                                          criteria.is_active=1,
                                          criteria.is_deleted=0

            ";



        $this->db->query($sql);
    }


}

?>