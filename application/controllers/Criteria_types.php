<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria_types extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
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

        $data['title'] = 'Type of Criteria';
        $this->load->view('criteria_type_view',$data);

    }

    function transaction($txn=null){
        switch($txn){
            case 'list':
                $response['data'] = $this->response_rows('is_deleted=0');
                echo json_encode($response);
                break;

            case 'create':
                $m_criteria = $this->Criteria_type_model;

                $m_criteria->begin();
                $m_criteria->criteria_type = $this->input->post('criteria_type',TRUE);
                $m_criteria->description = $this->input->post('description',TRUE);
                $m_criteria->save();

                $criteria_type_id = $m_criteria->last_insert_id();

                $m_criteria->commit();

                if($m_criteria->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Criteria successfully created!";
                    $response['row_added'] = $this->response_rows($criteria_type_id);
                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_criteria = $this->Criteria_type_model;
                $criteria_type_id = $this->input->post('criteria_type_id',TRUE);

                $m_criteria->begin();

                $m_criteria->criteria_type = $this->input->post('criteria_type',TRUE);
                $m_criteria->description = $this->input->post('description',TRUE);
                $m_criteria->modify($criteria_type_id);

                $m_criteria->commit();

                if($m_criteria->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Criteria successfully updated!";
                    $response['row_updated'] = $this->response_rows($criteria_type_id);
                    echo json_encode($response);
                }

                break;
            case 'delete':
                $m_criteria = $this->Criteria_type_model;
                $criteria_type_id = $this->input->post('criteria_type_id',TRUE);

                $m_criteria->begin();
                $m_criteria->is_deleted = 1;
                $m_criteria->modify($criteria_type_id);
                $m_criteria->commit();

                if($m_criteria->status()==TRUE){
                    $response['title'] = "Success!";
                    $response['stat'] = "success";
                    $response['msg'] = "Criteria successfully deleted!";
                    $response['row_updated'] = $m_criteria->get_list($criteria_type_id);
                    echo json_encode($response);
                }

                break;


        }
    }


    function response_rows($filter){
        $m_criteria = $this->Criteria_type_model;
        return  $m_criteria->get_list($filter);
    }







}
