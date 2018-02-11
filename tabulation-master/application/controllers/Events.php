<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events     extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Event_model',
            'Users_model',
            'Contestant_model'
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

        $data['title'] = 'Events | Registration';
        $this->load->view('events_view',$data);

    }

    function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data'] = $this->response_rows('is_deleted=0');
                echo json_encode($response);
                break;

            case 'create':
                $m_events = $this->Event_model;

                $m_events->begin();

                $m_events->event_name = $this->input->post('event_name',TRUE);
                $m_events->event_description = $this->input->post('event_description',TRUE);
                $m_events->site = $this->input->post('site',TRUE);
                $m_events->address = $this->input->post('address',TRUE);
                $m_events->contact_person = $this->input->post('contact_person',TRUE);
                $m_events->date_schedule = date('Y-m-d',strtotime($this->input->post('date_schedule',TRUE)));
                $m_events->remarks = $this->input->post('remarks',TRUE);

                $m_events->created_by = $this->session->user_id;
                $m_events->set('date_created','NOW()');
                $m_events->save();

                $event_id = $m_events->last_insert_id();

                $m_events->commit();

                if($m_events->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully registered!";
                    $response['row_added'] = $this->response_rows($event_id);
                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_events = $this->Event_model;
                $event_id = $this->input->post('event_id',TRUE);

                $m_events->begin();

                $m_events->event_name = $this->input->post('event_name',TRUE);
                $m_events->event_description = $this->input->post('event_description',TRUE);
                $m_events->site = $this->input->post('site',TRUE);
                $m_events->address = $this->input->post('address',TRUE);
                $m_events->contact_person = $this->input->post('contact_person',TRUE);
                $m_events->date_schedule = date('Y-m-d',strtotime($this->input->post('date_schedule',TRUE)));
                $m_events->remarks = $this->input->post('remarks',TRUE);

                $m_events->modified_by = $this->session->user_id;
                $m_events->set('date_modified','NOW()');
                $m_events->modify($event_id);

                $m_events->commit();

                if($m_events->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully updated!";
                    $response['row_updated'] = $this->response_rows($event_id);
                    echo json_encode($response);
                }

                break;
            case 'delete':
                $m_events = $this->Event_model;
                $event_id = $this->input->post('event_id',TRUE);

                $m_events->begin();
                $m_events->is_deleted = 1;
                $m_events->deleted_by = $this->session->user_id;
                $m_events->set('date_deleted','NOW()');
                $m_events->modify($event_id);
                $m_events->commit();

                if($m_events->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully deleted!";
                    $response['row_updated'] = $m_events->get_list($event_id);
                    echo json_encode($response);
                }

                break;

            //****************************************************************************************************************
            case 'upload': //upload customer image
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/img/contestants/';

                if(!file_exists('assets/img')){
                    mkdir('assets/img');
                }

                if(!file_exists('assets/img/contestants')){
                    mkdir('assets/img/contestants');
                }



                foreach($_FILES as $file) {

                    $server_file_name=uniqid('');
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_path=$directory.$server_file_name.'.'.$extension;
                    //$orig_file_name=$file['name'];

                    if(!in_array(strtolower($extension), $allowed)){
                        $response['title']='Invalid!';
                        $response['stat']='error';
                        $response['msg']='Image is invalid. Please select a valid photo!';
                        die(json_encode($response));
                    }

                    if(move_uploaded_file($file['tmp_name'],$file_path)){
                        $response['path']=$file_path;
                        echo json_encode($response);
                    }

                }


                break;

            case 'enlistment':
                $m_users = $this->Users_model;
                $m_contestants = $this->Contestant_model;

                $data['judges'] = $m_users->get_list('is_deleted=0 AND is_active=1 AND user_group_id=2','user_accounts.*,CONCAT_WS(" ",user_accounts.user_fname,user_accounts.user_lname)as fullname');
                $data['contestants'] = $m_contestants->get_list('is_active=1 AND is_deleted=0','contestants.*,CONCAT_WS(" ",contestants.fname,contestants.mname,contestants.lname) as fullname');

                $this->load->view('template/enlistment_view',$data);
                break;
        }
    }


    function response_rows(){
        $m_events = $this->Event_model;
        return  $m_events->get_list('is_deleted=0','events.*,DATE_FORMAT(events.date_schedule,"%m/%d/%Y")as date_schedule');
    }







}
