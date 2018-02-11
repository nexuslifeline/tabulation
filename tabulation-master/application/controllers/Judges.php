<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judges extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Judge_model'
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

        $data['title'] = 'Judge | Registration';
        $this->load->view('judge_view',$data);

    }

    function transaction($txn=null){
        switch($txn){
            case 'list':
                $m_judges = $this->Judge_model;

                $response['data'] = $m_judges->get_list('is_deleted=0');
                echo json_encode($response);
                break;

            case 'create':
                $m_judges = $this->Judge_model;

                $m_judges->begin();

                $m_judges->judge_lname = $this->input->post('judge_lname',TRUE);
                $m_judges->judge_fname = $this->input->post('judge_fname',TRUE);
                $m_judges->judge_mname = $this->input->post('judge_mname',TRUE);
                $m_judges->judge_address = $this->input->post('judge_address',TRUE);
                $m_judges->judge_contact = $this->input->post('judge_contact',TRUE);
                $m_judges->judge_email = $this->input->post('judge_email',TRUE);

                $m_judges->created_by = $this->session->user_id;
                $m_judges->set('date_created','NOW()');
                $m_judges->save();

                $contestant_id = $m_judges->last_insert_id();
                //update contestant code
                $m_judges->contestant_code = 'C'.date('Ymd').$contestant_id;
                $m_judges->modify($contestant_id);

                $m_judges->commit();

                if($m_judges->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully registered!";
                    $response['row_added'] = $m_judges->get_list($contestant_id);
                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_judges = $this->Judge_model;
                $contestant_id = $this->input->post('contestant_id',TRUE);

                $m_judges->begin();

                $m_judges->judge_lname = $this->input->post('judge_lname',TRUE);
                $m_judges->judge_fname = $this->input->post('judge_fname',TRUE);
                $m_judges->judge_mname = $this->input->post('judge_mname',TRUE);
                $m_judges->judge_address = $this->input->post('judge_address',TRUE);
                $m_judges->judge_contact = $this->input->post('judge_contact',TRUE);
                $m_judges->judge_email = $this->input->post('judge_email',TRUE);

                $m_judges->modified_by = $this->session->user_id;
                $m_judges->set('date_modified','NOW()');
                $m_judges->modify($contestant_id);

                $m_judges->commit();

                if($m_judges->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully registered!";
                    $response['row_updated'] = $m_judges->get_list($contestant_id);
                    echo json_encode($response);
                }

                break;
            case 'delete':
                $m_judges = $this->Judge_model;
                $contestant_id = $this->input->post('contestant_id',TRUE);

                $m_judges->begin();
                $m_judges->is_deleted = 1;
                $m_judges->deleted_by = $this->session->user_id;
                $m_judges->set('date_deleted','NOW()');
                $m_judges->modify($contestant_id);
                $m_judges->commit();

                if($m_judges->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Contestant successfully deleted!";
                    $response['row_updated'] = $m_judges->get_list($contestant_id);
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










}
