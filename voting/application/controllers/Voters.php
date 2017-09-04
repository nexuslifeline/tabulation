<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voters extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model(array(
            'Voters_accounts_model',
            'Events_vote_model',
            'Event_model'
        ));

    }


    public function index()
    {


    }


    function transaction($txn = null){
        switch ($txn){
            case 'register':
                $m_votes = $this->Voters_accounts_model;

                $uname_exists = $m_votes->get_list(array(
                    'voter_username' => $this->input->post('voter_username'),
                    'is_verified' => 1
                ));

                if( count($uname_exists)>0 ){
                    $response['title'] = "Already Exist!";
                    $response['stat'] = "error";
                    $response['msg'] = "Sorry, username already exist!";
                    echo json_encode($response);
                    return;
                }

                $m_votes->voter_fname = $this->input->post('voter_fname');
                $m_votes->voter_lname = $this->input->post('voter_lname');
                $m_votes->voter_mname = $this->input->post('voter_mname');
                $m_votes->voter_username = $this->input->post('voter_username');
                $m_votes->voter_pword = SHA1($this->input->post('voter_pword'));
                $m_votes->voter_mobile = $this->input->post('voter_mobile');
                $m_votes->save();

                $voter_id = $m_votes->last_insert_id();
                $m_votes->verification_code = '1418';
                $m_votes->modify($voter_id);

                $response['title'] = "Success!";
                $response['voter_id'] = $voter_id;
                $response['stat'] = "info";
                $response['msg'] = "Success! One more steps to go, please enter the verification code sent to your mobile.";
                echo json_encode($response);

                break;
            case 'verify':
                $m_votes = $this->Voters_accounts_model;

                $voter_id = $this->input->post('voter_id');
                $code = $this->input->post('verification_code');

                $exists = $m_votes->get_list(array(
                    'voter_id' => $voter_id,
                    'verification_code' => $code
                ));

                if( count($exists)>0 ){
                    $m_votes->is_verified = 1;
                    $m_votes->modify($voter_id);

                    $response['title'] = "Verified!";
                    $response['stat'] = "success";
                    $response['msg'] = "Your account has been successfully verified.";
                }else{
                    $response['title'] = "Invalid!";
                    $response['stat'] = "error";
                    $response['msg'] = "Sorry, you entered invalid code!";
                }

                echo json_encode($response);

                break;
            case 'vote':
                $m_event_vote = $this->Events_vote_model;
                $voter_id = $this->input->post('voter_id');
                $contestant_id = $this->input->post('contestant_id');
                $event_id = $this->input->post('event_id');

                //check if the voting still open
                $m_event = $this->Event_model;
                $event_open = $m_event->get_list(array(
                    'event_id' => $event_id,
                    'is_voting_closed' => 1
                ));

                if(count($event_open) > 0 ){
                    $response['title'] = "Warning!";
                    $response['stat'] = "warning";
                    $response['is_voting_closed'] = "1";
                    $response['msg'] = "Sorry, voting is already closed!";
                    echo json_encode($response);
                    return;
                }


                $m_event_vote->voter_id = $voter_id;
                $m_event_vote->contestant_id = $contestant_id;
                $m_event_vote->event_id = $event_id;
                $m_event_vote->save();

                $response['title'] = "Success!";
                $response['stat'] = "success";
                $response['msg'] = "Thank you for voting, your vote is successfully recorded!";
                echo json_encode($response);


                break;
        }
    }






}
