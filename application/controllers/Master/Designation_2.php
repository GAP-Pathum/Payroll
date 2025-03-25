<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Designation_2 extends CI_Controller {

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

    /*
     * Index page
     */

    public function index() {

        $data['title'] = "Designation | HRM System";
        $data['data_set'] = $this->Db_model->getData('Des_ID,Desig_Name,Desig_Order', 'tbl_designations');
        // die(var_dump($data['data_set']));
        $this->load->view('Master/Designation_2/index', $data);
    }

    public function create_designation() {
        $data = array(
            'Desig_Name' => $this->input->post('designation_name'),
            'Desig_Order' => $this->input->post('designation_order')
        );
        $this->Db_model->insertData('tbl_designations', $data);
        redirect(base_url() . "Master/Designation_2/index");
    }

    public function destroy_designation($id){
        $this->Db_model->delete_by_id($id, 'Des_ID', 'tbl_designations');
        // die(var_dump($Des_ID));
        redirect(base_url() . "Master/Designation_2/index");
    }

    public function get_designation($id){
        // die(var_dump($id));
        $data = $this->Db_model->get_by_id($id, 'Des_ID', 'tbl_designations');
        echo json_encode($data);
    }

    public function edit_designation($id){
        $data = array(
            'Desig_Name' => $this->input->post('designation_name'),
            'Desig_Order' => $this->input->post('designation_order')
        );
        $this->Db_model->updateData('tbl_designations', $data, 'Des_ID', $id);
        redirect(base_url() . "Master/Designation_2/index");
    }
}
