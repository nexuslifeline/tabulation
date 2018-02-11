<?php

class Criteria_type_model extends CORE_Model{

    protected  $table="criteria_types"; //table name
    protected  $pk_id="criteria_type_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_criteria_types(){
        $sql="INSERT INTO `criteria_types` (`criteria_type_id`, `criteria_type`, `description`) VALUES
                                          (1,'Voting','Pre-configure criteria for Voting System'),
                                          (2,'Pageant','Pre-configure criteria for Pageant System'),
                                          (3,'Others','Others')                                                 

                                          ON DUPLICATE KEY UPDATE

                                          criteria_types.criteria_type=VALUES(criteria_types.criteria_type),
                                          criteria_types.description=VALUES(criteria_types.description)

            ";
        $this->db->query($sql);
    }



}


?>