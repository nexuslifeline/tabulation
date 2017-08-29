<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Tabulation_model',
            'Event_model'
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
                $data['candidates'] = $this->Tabulation_model->get_contestant_scores($event_id);
                $this->load->view('template/rpt_ranking');
                break;
            case 'per-judge':
                $m_tabulation = $this->Tabulation_model;
                $event_id = 9;
                $contestant_di = 6;

                $data['scores'] = $m_tabulation->get_per_judge_score($event_id,$contestant_di);
                $this->load->view('template/per_charge_score',$data);
                break;

        }
    }






}
