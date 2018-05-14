<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');        
		$this->load->model('Member_model');
    }
    
    // --------------------------------------------------------------------

    /**
     * List all member in database
     */
	public function index()
	{
        //get data from Member_modal using getindex() methods
        $data = array(
            'userList' => $this->Member_model->getindex(), 
        );
        //load view
        $this->load->view('member/index', $data);
    }
    
    // --------------------------------------------------------------------

    /**
     * Create new member and save to database
     */
    public function create()
    {
        //use form_validation library
        //filter input for security purpose exp: xss and sql injection
        //warning user if field is empty 
        $this->form_validation->set_rules('member_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('member_gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('member_address', 'Address', 'trim|required');
       
       //if everyting is clear, start proccess input data
       if ($this->form_validation->run() == TRUE) {
            //all data store in array
            //input->post(); is similar to $GET
            $member_data = array(
                'name'      => $this->input->post('member_name') , 
                'gender'    => $this->input->post('member_gender'),
                'address'   => $this->input->post('member_address')
            );
            //save collected data in array into database using createMember() methods in Member_model
            //$create_user will return boolean TRUE or FALSE condition if data successfully save to database 
            $create_user = $this->Member_model->createMember($member_data);
            //check if data is save successfully in database
            if ($create_user == true) {
                //pop-up message success
                $this->session->set_flashdata('msg_noti', 'Success create user');
                redirect('member/create');
            } else {
                //pop-up message error
                $this->session->set_flashdata('msg_error', 'Error create user');
                redirect('member/create');
            }
            
       } else {
           //pop-up message if field is empty or contain invalid input.
            $this->session->set_flashdata('msg_error', validation_errors());
       }
       //load view
       $this->load->view('member/create');
       
    }
    
    // --------------------------------------------------------------------
    /**
     * Read member detail
     */
    public function read($member_id)
    {
        //get single data using member_id
        //using getMember() methods in Member_model to retrive data from database
        //$data return Array(); 
       $data = array(
           'userDetail' => $this->Member_model->getMember($member_id) , 
        );
        //load view
        $this->load->view('member/read', $data);
    }
    
    // --------------------------------------------------------------------
    /**
     * Update member detail
     */
    public function update($member_id)
    {
        //get data base on Member ID
        $data = array(
           'userDetail' => $this->Member_model->getMember($member_id), 
        );

        //before update new data need filter data first
        //filter input for security purpose exp: xss and sql injection
        //warning user if field is empty
        $this->form_validation->set_rules('member_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('member_gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('member_address', 'Address', 'trim|required');

        //if everiting is clear, start proccess input data
        if ($this->form_validation->run() == true) {
            //store date inside array 
            $new_data = array(
                'name'      => $this->input->post('member_name'),
                'gender'    => $this->input->post('member_gender'),
                'address'   => $this->input->post('member_address') 
            );
            //save collected data from $new_data array into database using updateMember() methods in Member_model
            //$create_user will return boolean TRUE or FALSE condition if data successfully save to database 
            $update_data = $this->Member_model->updateMember($new_data, $member_id);
             //check if data is save successfully in database
            if ($update_data == true) {
                //pop-up message success
                $this->session->set_flashdata('msg_noti', 'Success update Member');
                redirect('member/update/'. $member_id);
            } else {
                //pop-up message error
                $this->session->set_flashdata('msg_error', 'Error update Member');
                redirect('member/update/'. $member_id);
            }
        } else {
            //pop-up message validatin error
            $this->session->set_flashdata('msg_error', validation_errors());
        }
        //load view
        $this->load->view('member/update', $data);
    }
    
    // --------------------------------------------------------------------
    /**
     * Delete Member in database
     */
    public function delete($member_id = false)
    {
        //Make sure member_id is exist 
        if ($member_id != false) {
            //if member_id is exist then start delete member from database using deleteMember() methods in Member_model
            $delete_member = $this->Member_model->deleteMember($member_id);
            //Make sure Member is successfuly remove from database
            if ($delete_member == true) {
                //pop-up message success
                $this->session->set_flashdata('msg_noti', 'Success remove member');
                redirect('member/index');   
            }
        } else {
            //pop-up message error if member is not exsit.
            $this->session->set_flashdata('msg_error', 'Member not exist');
            redirect('member/index');
        }
        
    }

    // --------------------------------------------------------------------
}