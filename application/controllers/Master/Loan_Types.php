<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_Types extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!($this->session->userdata('login_user'))) {
            redirect(base_url() . "");
        }
        /*
         * Load Database model
         */
        $this->load->model('Db_model', '', TRUE);
    }

    public function index() {

        $this->load->helper('url');
        $data['title'] = "Loan Types | HRM SYSTEM";
        $data['data_set'] = $this->Db_model->getData('Loan_ID,loan_name', 'tbl_loan_types');
        $this->load->view('Master/Loan_Types/index', $data);
    }
    
    
    /*
     * Insert Data
     */

    public function insert_data() {

        
        $Active=$this->input->post('chk_active');
        if($Active==null){
            $Active=0;
            
        }
        
        $data = array(
            'loan_name' => $this->input->post('txt_loan_type'),
            'IsActive' => $Active
            
                
        );

        $result = $this->Db_model->insertData("tbl_loan_types", $data);


       $this->session->set_flashdata('success_message', 'New Loan Types has been added successfully');

        
        redirect(base_url() . 'Master/Loan_Types/');
    }

}
