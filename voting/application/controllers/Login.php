<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');


        $this->load->model(array(
            'Voters_accounts_model',
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

        //WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)
        if($this->session->userdata('logged_in') == 1) {
            $this->load->view('dashboard_view',$data);

        } else {
            $this->load->view('login_view',$data);
        }
        //END WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)

    }




    function transaction($txn=null){

        switch($txn){

                //****************************************************************************
                case 'validate' :
                    $uname=$this->input->post('uname');
                    $pword=$this->input->post('pword'); 

                    $users=$this->Voters_accounts_model;
                    $result=$users->authenticate_user($uname,$pword);

                    if($result->num_rows()>0){//valid username and pword
                        //get active event
                        $m_events = $this->Event_model;
                        $events = $m_events->get_list(array(
                            'is_open' => 1
                        ));

                        //set session data here and response data
                        $this->session->set_userdata(
                            array(
                                'user_id'=>$result->row()->voter_id,
                                'user_fullname'=>$result->row()->user_fullname,
                                'user_email'=>'',
                                'active_event_id' => (count($events) == 0? 0: $events[0]->event_id)
                            )
                        );


                        $response['title']='Success';
                        $response['stat']='success';
                        $response['msg']='User successfully authenticated.';

                        echo json_encode($response);

                    }else{ //not valid

                        $response['title']='Cannot authenticate user!';
                        $response['stat']='error';
                        $response['msg']='Invalid username or password.';
                        
                        echo json_encode($response);

                    }

                    break;
                //****************************************************************************
                case 'logout' :
                   /* $m_users=$this->Users_model;
                    $m_users->is_online=0;
                    $m_users->modify($this->session->user_id);*/
                    
                    $this->end_session();
                //****************************************************************************
                break;

                default:


        }




    }




}
