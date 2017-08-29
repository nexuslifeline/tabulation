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
        $sql = "SET @rank:=0;";
        $this->db->query($sql);

        $sql= "SELECT l.*,@rank:=@rank+1 as rank
            FROM
            (SELECT m.*,c.entity_name,FORMAT(AVG(m.total_score),2) as avg_score
            FROM
            (SELECT t.event_id,t.judge_id,t.contestant_id,SUM(criteria_rate) as total_score,
            (SELECT x.contestant_no FROM events_contestant as x WHERE x.event_id=t.event_id AND x.contestant_id=t.contestant_id)as contestant_no
            FROM `tabulation` as t WHERE t.event_id = $event_id
            GROUP BY t.`contestant_id`,t.judge_id)as m
            LEFT JOIN contestants as c ON c.contestant_id=m.contestant_id
            GROUP BY m.`contestant_id`,m.judge_id) as l ORDER BY l.avg_score DESC";
        return $this->db->query($sql)->result();
    }


    function get_per_judge_score($event_id,$contestant_id){
        $sql = "SELECT t.event_id,t.judge_id,u.user_fname,
            SUM(t.`criteria_rate`)as criteria_rate  
            FROM tabulation as t
            LEFT JOIN `user_accounts` as u ON u.user_id=t.judge_id
            WHERE t.event_id=$event_id 
            AND t.contestant_id=$contestant_id
            GROUP By t.contestant_id,t.judge_id";
        return $this->db->query($sql)->result();
    }


}


?>