<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events     extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Event_model',
            'Users_model',
            'Contestant_model',
            'Event_judge_model',
            'Event_contestant_model',
            'Event_criteria_model',
            'Criteria_type_model'
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
        $data['events'] = $this->Event_model->get_list('is_deleted=0');
        $data['types'] = $this->Criteria_type_model->get_list('is_deleted=0');
        $this->load->view('events_view',$data);

    }

    function transaction($txn=null){
        switch($txn){
            case 'reset-setup':
                $event_id = $this->input->post('event_id');
                $this->Event_judge_model->delete(array('event_id'=>$event_id));
                $this->Event_contestant_model->delete(array('event_id'=>$event_id));
                $this->Event_criteria_model->delete(array('event_id'=>$event_id));

                $response['title'] = "Success!";
                $response['stat'] = "success";
                $response['msg'] = "Event successfully configured!";
                echo json_encode($response);
                break;
            case 'list':
                $response['data'] = $this->response_rows('is_deleted=0');
                echo json_encode($response);
                break;

            case 'create':
                $m_events = $this->Event_model;

                $m_events->begin();

                //if there is already open event, newly created will be mark as inactive/not open
                $is_open = $m_events->get_list('is_deleted=0 AND is_open=1');
                if(count($is_open)>0){
                    $open_status = 0;
                }else{
                    //make sure to mark all records as inactive
                    $m_events->is_open = 0;
                    $m_events->is_locked = 1;
                    $m_events->modify('event_id>0');
                    $open_status = 1;
                }




                $m_events->event_name = $this->input->post('event_name',TRUE);
                $m_events->event_description = $this->input->post('event_description',TRUE);
                $m_events->site = $this->input->post('site',TRUE);
                $m_events->address = $this->input->post('address',TRUE);
                $m_events->contact_person = $this->input->post('contact_person',TRUE);
                $m_events->date_schedule = date('Y-m-d',strtotime($this->input->post('date_schedule',TRUE)));
                $m_events->remarks = $this->input->post('remarks',TRUE);
                $m_events->is_open = $open_status;
                $m_events->is_locked = 0;
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

            case 'add-criteria':
                $m_event_criteria = $this->Event_criteria_model;

                $event_id = $this->input->post('event-id');
                $criteria_id = $this->input->post('criteria-id');
                $percentage = $this->input->post('percentage');
                $rating = $this->input->post('rating');

                $m_event_criteria->begin();

                $m_event_criteria->delete(
                    array(
                        'event_id'=>$event_id,
                        'criteria_id'=>$criteria_id
                    )
                );

                //insert if status is 1 = YES
                if($this->input->post('status')==1){
                    $m_event_criteria->event_id = $event_id;
                    $m_event_criteria->criteria_id = $criteria_id;
                    $m_event_criteria->percentage = $percentage;
                    $m_event_criteria->max_score = $rating;
                    $m_event_criteria->save();
                }


                $m_event_criteria->commit();

                break;

            case 'add-candidate':
                $m_event_contestant = $this->Event_contestant_model;

                $event_id = $this->input->post('event-id');
                $contestant_id = $this->input->post('contestant-id');
                $contestant_no = $this->input->post('contestant-no');

                $m_event_contestant->begin();

                $m_event_contestant->delete(
                    array(
                        'event_id'=>$event_id,
                        'contestant_id'=>$contestant_id
                    )
                );

                //insert if status is 1 = YES
                if($this->input->post('status')==1){
                    $m_event_contestant->event_id = $event_id;
                    $m_event_contestant->contestant_no = $contestant_no;
                    $m_event_contestant->contestant_id = $contestant_id;
                    $m_event_contestant->save();
                }

                $m_event_contestant->commit();



                break;

            case 'add-judge':
                $m_event_judge = $this->Event_judge_model;

                $event_id = $this->input->post('event-id');
                $judge_id = $this->input->post('judge-id');

                $m_event_judge->begin();
                $m_event_judge->delete(
                    array(
                        'event_id'=>$event_id,
                        'judge_id'=>$judge_id
                    )
                );

                //insert if status is 1 = YES
                if($this->input->post('status')==1){
                    $m_event_judge->event_id = $event_id;
                    $m_event_judge->judge_id = $judge_id;
                    $m_event_judge->save();
                }
                    

                $m_event_judge->commit();

                break;

            case 'enlistment':
                $m_judges = $this->Event_judge_model;
                $m_contestants = $this->Event_contestant_model;
                $m_criteria = $this->Event_criteria_model;

                $event_id = $this->input->get('event-id');
                $type_id = $this->input->get('type_id');
                $info = $m_criteria->get_list(
                    array(
                        'event_id'=>$event_id
                    ),
                    array(
                        'SUM(percentage) as total_percentage'
                    )
                );

                $data['event_id'] = $event_id;
                $data['total_percentage'] =  (count($info)>0?$info[0]->total_percentage:0);
                $data['judges'] = $m_judges->get_judge_list($event_id);
                $data['contestants'] = $m_contestants->get_contestant_list($event_id);
                $data['criteria'] = $m_criteria->get_criteria_list($event_id,$type_id);

                $this->load->view('template/enlistment_view',$data);
                break;

            case 'activate-event':
                $event_id = $this->input->post('event-id');
                $m_events = $this->Event_model;

              /*  //check current status
                $is_open = $m_events->get_list(array(
                    'event_id'=>$event_id,
                    'is_open'=>1
                ));

                if(count($is_open) > 0){
                    $response['title']='Already Activated!';
                    $response['stat']='info';
                    $response['msg']='This event is already open and activated.';
                    echo json_encode($response);
                    return;
                }*/

                //check if already been locked
              /*  $is_locked = $m_events->get_list(array(
                    'event_id'=>$event_id,
                    'is_locked'=>1
                ));

                if(count($is_locked) > 0){
                    $response['title']='Already Locked!';
                    $response['stat']='error';
                    $response['msg']='This event is already been locked.';
                    echo json_encode($response);
                    return;
                }

                $m_events->is_locked = 1;
                $m_events->modify('event_id>0');*/

                /*$m_events->is_open = 0;
                $m_events->modify(
                    '`event_id`>0'
                );*/

                $m_events->set('is_open','NOT is_open');
                $m_events->is_locked = 0;
                $m_events->modify($event_id);

                $this->session->active_event_id = $event_id;

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Event status successfully updated.';
                echo json_encode($response);

                break;

            case 're-enlist':
                $m_events = $this->Event_model;

                $limit = $this->input->post('limit');
                $prev_event_id = $this->input->post('prev-event-id');
                $cur_event_id = $this->input->post('cur-event-id');

                $current_event = $m_events->get_list($cur_event_id);

                $m_events->re_enlist_candidates($prev_event_id,$cur_event_id,$limit);
                $response['title'] = "Success!";
                $response['stat'] = "success";
                $response['msg'] = "Entities/Candidates/Competitors successfully included to <br /><strong>".$current_event[0]->event_name."</strong>.";
                echo json_encode($response);

                break;
        }
    }


    function response_rows($params){
        $m_events = $this->Event_model;
        return  $m_events->get_list(
                $params,
                'events.*,DATE_FORMAT(events.date_schedule,"%m/%d/%Y")as date_schedule'
        );
    }







}
