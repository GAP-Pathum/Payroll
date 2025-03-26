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

    // public function get_designation($id){
    //     $id = $this->input->post('id');
    //     $data = $this->Db_model->get_by_id($id, 'Des_ID', 'tbl_designations');
    //     echo json_encode($data);
    // }

    public function update_designation() {
        $ID = $this->input->post("Des_ID", TRUE);
        $D_Name = $this->input->post("Desig_Name", TRUE);
        $D_Order = $this->input->post("Desig_Order", TRUE);

        // echo $ID;
        // echo $D_Name;
        // echo $D_Order;

        $data = array("Desig_Name" => $D_Name, 'Desig_Order' => $D_Order);
        $whereArr = array("Des_ID" => $ID);
        $result = $this->Db_model->updateData("tbl_designations", $data, $whereArr);
        redirect(base_url() . "Master/Designation_2/index");
    }

    public function get_designation() {
        $json_data = file_get_contents('php://input'); 
        $data = json_decode($json_data, true);
        $id = $data['idData'];
        // echo $id;
        // $id = $this->input->post('id');
        // die(var_dump($id));
        $whereArray = array('Des_ID' => $id);
        $this->Db_model->setWhere($whereArray);
        $dataObject = $this->Db_model->getData('Des_ID,Desig_Name,Desig_Order', 'tbl_designations');
        $array = (array) $dataObject;
        echo json_encode($array);
    }

    public function destroy_designation($id){
        $this->Db_model->delete_by_id($id, 'Des_ID', 'tbl_designations');
        // die(var_dump($Des_ID));
        redirect(base_url() . "Master/Designation_2/index");
    }

}
