<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');


        $this->load->model(array(
            'Users_model',
            'User_groups_model',
            'User_group_right_model',
            'Criteria_model',
            'Rights_link_model',
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


        //seed default data needed by the app
        $this->seed_data();

        //WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)
        if($this->session->userdata('logged_in') == 1) {
            $this->load->view('dashboard_view',$data);

        } else {
            $this->load->view('login_view',$data);
        }
        //END WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)

    }

    function seed_data(){
        $m_users = $this->load->Users_model;
        $m_users->create_default_user();

        $m_group = $this->User_groups_model;
        $m_group->create_default_user_group();

        $m_criteria = $this->Criteria_model;
        $m_criteria->seed_criteria();

        $m_rights = $this->Rights_link_model;
        $m_rights->create_default_link_list();
    }




    function transaction($txn=null){

        switch($txn){

                //****************************************************************************
                case 'validate' :
                    $uname=$this->input->post('uname');
                    $pword=$this->input->post('pword'); 

                    $users=$this->Users_model;
                    $result=$users->authenticate_user($uname,$pword);

                    if($result->num_rows()>0){//valid username and pword
                        $m_rights=$this->User_group_right_model;
                        $rights=$m_rights->get_list(
                            array(
                                'user_group_rights.user_group_id'=>$result->row()->user_group_id
                            ),
                            'user_group_rights.link_code'
                        );

                        $user_rights=array();
                        $parent_links=array();
                        foreach($rights as $right){
                            $main=explode('-',$right->link_code);
                            $user_rights[]=$right->link_code;
                            $parent_links[]=$main[0];
                        }

                        //get active event
                        $m_events = $this->Event_model;
                        $events = $m_events->get_list(array(
                            'is_open' => 1
                        ));




                        //set session data here and response data
                        $this->session->set_userdata(
                            array(
                                'user_id'=>$result->row()->user_id,
                                'user_group_id'=>$result->row()->user_group_id,
                                'user_fullname'=>$result->row()->user_fullname,
                                'user_email'=>$result->row()->user_email,
                                'user_photo'=>$result->row()->photo_path,
                                'user_rights'=>$user_rights,
                                'parent_rights'=>$parent_links,
                                'logged_in'=>1,
                                'active_event_id' => $events[0]->event_id
                            )
                        );

                        $m_users=$this->Users_model;
                        $m_users->is_online=1;
                        $m_users->modify($result->row()->user_id);

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
                    $m_users=$this->Users_model;
                    $m_users->is_online=0;
                    $m_users->modify($this->session->user_id);
                    
                    $this->end_session();
                //****************************************************************************
                break;

                default:


        }




    }




}
