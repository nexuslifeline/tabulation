<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabulation extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Contestant_model',
            'Event_criteria_model',
            'Tabulation_model'
        ));

    }


    public function index()
    {
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
        $data['_footer']=$this->load->view('template/elements/page_footer','',TRUE);

        $active_event_id  = $this->session->active_event_id;

        $candidates = $this->Contestant_model->get_list(
            array(
                'ec.event_id' => $active_event_id
            ),
            array(
                'CONCAT_WS(" ",contestants.fname,contestants.lname)as candidate_name',
                'contestants.nationality',
                'contestants.contact',
                'contestants.address',
                'contestants.photo_path',
                'contestants.contestant_id'
            ),
            array(
                array('events_contestant as ec','ec.contestant_id=contestants.contestant_id','inner')
            )
        );


        $criteria = $this->Event_criteria_model->get_list(
            array(
                'events_criteria.event_id'=>$active_event_id
            ),
            array(
                'events_criteria.*',
                'c.*'
            ),
            array(
                array('criteria as c','c.criteria_id=events_criteria.criteria_id','left')
            )
        );

        $judge_id = $this->session->user_id;
        $m_contestant_scores = $this->Tabulation_model;
        $contestant_scores = $m_contestant_scores->get_list(array(
            'judge_id' => $judge_id,
            'event_id' => $active_event_id
        ));

        $data['criterias'] = $criteria;
        $data['active_event_id'] = $active_event_id;
        $data['candidates'] = $candidates;
        $data['contestant_scores'] = $contestant_scores;

        $data['title'] = 'Tabulation | System';
        $this->load->view('tabulation_view',$data);

    }


    function transaction($txn = null){
        switch($txn){
            case 'create':
                $m_tabulation = $this->Tabulation_model;

                $event_id = $this->input->post('event-id');
                $contestant_id = $this->input->post('contestant-id');
                $criteria_id = $this->input->post('criteria-id');
                $judge_id = $this->input->post('judge-id');
                $score = $this->input->post('score');

                $m_tabulation->begin();

                $m_tabulation->delete(array(
                    'event_id' => $event_id,
                    'criteria_id' => $criteria_id,
                    'judge_id' => $judge_id,
                    'contestant_id' => $contestant_id
                ));

                $m_tabulation->event_id = $event_id;
                $m_tabulation->criteria_id = $criteria_id;
                $m_tabulation->judge_id = $judge_id;
                $m_tabulation->score = $score;
                $m_tabulation->contestant_id = $contestant_id;
                $m_tabulation->save();

                $m_tabulation->commit();

                break;
        }
    }







}
