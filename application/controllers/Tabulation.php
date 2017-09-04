<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabulation extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Contestant_model',
            'Event_criteria_model',
            'Event_model',
            'Tabulation_model',
            'Tabulation_submitted_model',
            'Events_vote_model',
            'Event_judge_model'
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

        $is_judge = $this->Event_judge_model->get_list(
            array(
                'judge_id' => $this->session->user_id
            )
        );

        $x = count($is_judge);
        $x = ($this->session->user_group_id==1?1:$x);

        $candidates = $this->Contestant_model->get_list(

                'ec.event_id ='.$active_event_id.' AND 1<='.$x
            ,
            array(
                'contestants.*',
                'IF((SELECT COUNT(x.contestant_id) FROM tabulation_submitted as x WHERE x.contestant_id=ec.contestant_id AND x.event_id=ec.event_id AND x.judge_id='.$this->session->user_id.')>0,1,0) as is_submitted'
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
            ),
            'c.criteria_id'
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
                $m_submitted = $this->Tabulation_submitted_model;

                $event_id = $this->input->post('event-id');
                $contestant_id = $this->input->post('contestant-id');
                $criteria_id = $this->input->post('criteria-id');
                $judge_id = $this->input->post('judge-id');
                $score = $this->input->post('score');
                $rate = $this->input->post('line_rate');

                $submitted = $m_submitted->get_list(array(
                    'event_id' => $event_id,
                    'contestant_id' => $contestant_id,
                    'judge_id' => $judge_id
                ));

                if(count($submitted)>0){
                    $response['title'] = "Cannot be Modified!";
                    $response['stat'] = "error";
                    $response['msg'] = "Sorry, this record is already been submitted and finalized.";
                    echo json_encode($response);
                    return;
                }




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
                $m_tabulation->criteria_rate = $rate;
                $m_tabulation->save();

                $m_tabulation->commit();

                break;

            case 'mark-submitted':
                $m_tabulation = $this->Tabulation_submitted_model;

                $contestant_id = $this->input->post('contestant_id');
                $judge_id = $this->input->post('judge_id');
                $event_id = $this->input->post('event_id');

                $m_tabulation->delete(array(
                    'contestant_id'=>$contestant_id,
                    'judge_id'=>$judge_id,
                    'event_id'=>$event_id
                ));

                $m_tabulation->contestant_id = $contestant_id;
                $m_tabulation->judge_id = $judge_id;
                $m_tabulation->event_id = $event_id;
                $m_tabulation->save();

                $m_event = $this->Event_model;
                $m_event->is_voting_closed = 1;
                $m_event->modify($event_id);

                $response['title'] = "Success!";
                $response['stat'] = "success";
                $response['msg'] = "Successfully submitted and finalized.";
                echo json_encode($response);

                break;

            case 'get-votes':
                $event_id = $this->input->get('event_id');
                $m_votes = $this->Events_vote_model;
                $votes = $m_votes->get_event_votes($event_id);
                echo json_encode($votes);
                break;

        }
    }







}
