<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
       $this->validate_session();
        $this->load->model(array(
            'Users_model',
            'Contestant_model',
            'Events_vote_model',
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

        $active_event_id  = $this->session->active_event_id;
        $candidates = $this->Contestant_model->get_list(
            array(
                'ec.event_id' => $active_event_id
            ),
            array(
                'contestants.*',
                'ec.contestant_no',
                'IF((SELECT COUNT(x.contestant_id) FROM tabulation_submitted as x WHERE x.contestant_id=ec.contestant_id AND x.event_id=ec.event_id)>0,1,0) as is_submitted'
            ),
            array(
                array('events_contestant as ec','ec.contestant_id=contestants.contestant_id','inner')
            ),
            'ec.contestant_no'
        );

        $disabled = $this->Events_vote_model->get_list(array(
            'event_id' => $active_event_id,
            'voter_id' => $this->session->user_id
        ));

        //check if voting is already closed
        $is_closed = $this->Event_model->get_list(array(
            'event_id' => $active_event_id,
            'is_voting_closed' => 1
        ));


        $events = $this->Event_model->get_list($active_event_id);

        $data['candidates'] = $candidates;
        $data['active_event_id'] = $active_event_id;
        $data['is_voting_closed'] = (count($is_closed)>0);
        $data['disabled'] = (count($disabled)>0) || (count($is_closed)>0);
        $data['event_description'] = $events[0]->event_name;
        $data['voted_contestant'] = (count($disabled)>0?$disabled[0]->contestant_id:0);

        $this->load->view('dashboard_view',$data);
    }





}
