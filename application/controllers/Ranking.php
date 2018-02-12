<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Tabulation_model',
            'Event_model',
            'Event_judge_model',
            'Event_criteria_model'
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

        $data['title'] = 'Print Ranking';
        $data['events'] = $this->Event_model->get_list();
        $this->load->view('ranking_view',$data);

    }


    function transaction($txn = null){
        switch ($txn){
            case 'ranking-list':
                $event_id = $this->input->get('event_id');
                $response['data'] = $this->Tabulation_model->get_contestant_scores($event_id);
                echo json_encode($response);
                break;
            case 'print-ranking':
                $event_id = $this->input->get('event_id');

                $data['criterias'] = $this->Event_criteria_model->get_criteria_list($event_id);
				$data['event'] = $this->Event_model->get_list($event_id);
                $data['candidates'] = $this->Tabulation_model->get_contestant_scores($event_id);
                $data['judge_scores'] = $this->Tabulation_model->get_per_judge_score($event_id);
                $data['judges'] = $this->Event_judge_model->get_list(
                    array(
                        'events_judge.event_id' => $event_id
                    ),
                    array(
                        'events_judge.*',
                        'CONCAT_WS(" ",ua.user_fname,ua.user_lname) as fullname'
                    ),
                    array(
                        array('user_accounts as ua','ua.user_id=events_judge.judge_id','inner')
                    )
                );
                $this->load->view('template/rpt_ranking',$data);
                break;
            case 'per-judge':
                $m_tabulation = $this->Tabulation_model;
                $event_id = $this->input->get('event_id');
                $contestant_di = $this->input->get('contestant_id');

                $data['scores'] = $m_tabulation->get_per_judge_score($event_id,$contestant_di);

                $this->load->view('template/per_charge_score',$data);
                break;

        }
    }






}
