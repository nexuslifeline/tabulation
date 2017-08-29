<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contestants extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
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

        $data['title'] = 'Candidate | Registration';
        $this->load->view('contestant_view',$data);

    }

    function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data'] = $this->response_rows('is_deleted=0');
                echo json_encode($response);
                break;

            case 'create':
                $m_contestant = $this->Contestant_model;

                $m_contestant->begin();

                $m_contestant->entity_name = $this->input->post('entity_name',TRUE);
                $m_contestant->desc_1 = $this->input->post('desc_1',TRUE);
                $m_contestant->desc_2 = $this->input->post('desc_2',TRUE);
                $m_contestant->desc_3 = $this->input->post('desc_3',TRUE);
                $m_contestant->desc_4 = $this->input->post('desc_4',TRUE);
                //$m_contestant->gender = $this->input->post('gender',TRUE);
                $m_contestant->desc_5 = $this->input->post('desc_5',TRUE);
                $m_contestant->desc_6 = $this->input->post('desc_6',TRUE);
                $m_contestant->photo_path = $this->input->post('photo_path',TRUE);

                $m_contestant->created_by = $this->session->user_id;
                $m_contestant->set('date_created','NOW()');
                $m_contestant->save();

                $contestant_id = $m_contestant->last_insert_id();
                //update contestant code
                $m_contestant->entity_code = 'C'.date('Ymd').$contestant_id;
                $m_contestant->modify($contestant_id);

                $m_contestant->commit();

                if($m_contestant->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully registered!";
                    $response['row_added'] = $this->response_rows($contestant_id);
                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_contestant = $this->Contestant_model;
                $contestant_id = $this->input->post('contestant_id',TRUE);

                $m_contestant->begin();

                $m_contestant->entity_name = $this->input->post('entity_name',TRUE);
                $m_contestant->desc_1 = $this->input->post('desc_1',TRUE);
                $m_contestant->desc_2 = $this->input->post('desc_2',TRUE);
                $m_contestant->desc_3 = $this->input->post('desc_3',TRUE);
                $m_contestant->desc_4 = $this->input->post('desc_4',TRUE);
                //$m_contestant->gender = $this->input->post('gender',TRUE);
                $m_contestant->desc_5 = $this->input->post('desc_5',TRUE);
                $m_contestant->desc_6 = $this->input->post('desc_6',TRUE);
                $m_contestant->photo_path = $this->input->post('photo_path',TRUE);

                $m_contestant->modified_by = $this->session->user_id;
                $m_contestant->set('date_modified','NOW()');
                $m_contestant->modify($contestant_id);

                $m_contestant->commit();

                if($m_contestant->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully registered!";
                    $response['row_updated'] = $this->response_rows($contestant_id);
                    echo json_encode($response);
                }

                break;
            case 'delete':
                $m_contestant = $this->Contestant_model;
                $contestant_id = $this->input->post('contestant_id',TRUE);

                $m_contestant->begin();
                $m_contestant->is_deleted = 1;
                $m_contestant->deleted_by = $this->session->user_id;
                $m_contestant->set('date_deleted','NOW()');
                $m_contestant->modify($contestant_id);
                $m_contestant->commit();

                if($m_contestant->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully deleted!";
                    $response['row_updated'] = $m_contestant->get_list($contestant_id);
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
        }
    }



    function response_rows($filter){
        $m_contestant = $this->Contestant_model;
        return  $m_contestant->get_list($filter,
            'contestants.*');

    }










}
