<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');


        $this->load->model(array(
            'Event_model',
            'Contestant_model',
            'Tabulation_model',
            'Event_contestant_model',
            'Event_judge_model',
            'Event_criteria_model',
            'Tabulation_submitted_model',
            'Criteria_model',
            'Events_vote_model',
            'Event_accounts_model'
        ));

    }


    public function index()
    {
        $this->Event_model->delete('event_id>0');
        $this->Criteria_model->delete('criteria_id>0');
        $this->Contestant_model->delete('contestant_id>0');
        $this->Tabulation_model->delete('tabulation_id>0');
        $this->Event_contestant_model->delete('event_contestant_id>0');
        $this->Event_judge_model->delete('event_judge_id>0');
        $this->Event_criteria_model->delete('event_criteria_id>0');
        $this->Tabulation_submitted_model->delete('tabulation_submitted_id>0');
        $this->Events_vote_model->delete('event_vote_id>0');
        $this->Events_vote_model->delete('event_vote_id>0');
        $this->Event_accounts_model->delete('voter_id>0');

        echo "<h1>Transaction successfully deleted!</h1>";
    }



}
