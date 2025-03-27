<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Attendance_ATT_All extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!($this->session->userdata('login_user'))) {
            redirect(base_url() . "");
        }

        /*
         * Load Database model
         */
        $this->load->library("pdf_library");
        $this->load->model('Db_model', '', TRUE);
    }

    /*
     * Index page in Departmrnt
     */

    public function index() {

        $data['title'] = "Attendance In Out Report Summery | HRM System";
        $data['data_desig'] = $this->Db_model->getData('Des_ID,Desig_Name', 'tbl_designations');
        $this->load->view('Reports/Attendance/Report_Attendance_In_Out_All', $data);
    }

    /*
     * Insert Departmrnt
     */


    public function Attendance_Report_By_Cat() {


        $data['data_cmp'] = $this->Db_model->getData('Cmp_ID,Company_Name', 'tbl_companyprofile');

        $emp = $this->input->post("txt_emp");
        $emp_name = $this->input->post("txt_emp_name");
        $desig = $this->input->post("cmb_desig");
        $from_date = $this->input->post("txt_from_date");
        $to_date = $this->input->post("txt_to_date");


        $data['f_date'] = $from_date;
        $data['t_date'] = $to_date;


        // Filter Data by categories
        $filter = '';

        if (($this->input->post("txt_from_date")) && ($this->input->post("txt_to_date"))) {
            if ($filter == '') {
                $filter = " where  ir.FDate between '$from_date' and '$to_date'";
            } else {
                $filter .= " AND  ir.FDate between '$from_date' and '$to_date'";
            }
        }
        if (($this->input->post("txt_emp"))) {
            if ($filter == null) {
                $filter = " where ir.EmpNo =$emp";
            } else {
                $filter .= " AND ir.EmpNo =$emp";
            }
        }

        if (($this->input->post("txt_emp_name"))) {
            if ($filter == null) {
                $filter = " where Emp.Emp_Full_Name ='$emp_name'";
            } else {
                $filter .= " AND Emp.Emp_Full_Name ='$emp_name'";
            }
        }
        if (($this->input->post("cmb_desig"))) {
            if ($filter == null) {
                $filter = " where dsg.Des_ID  ='$desig'";
            } else {
                $filter .= " AND dsg.Des_ID  ='$desig'";
            }
        }


        $data['data_set'] = $this->Db_model->getfilteredData("SELECT 
                                                                    ir.EmpNo,
                                                                    Emp.Emp_Full_Name,
                                                                    ir.FDate,
                                                                    ir.FTime,
                                                                    ir.TDate,
                                                                    ir.TTime,
                                                                    ir.ShType,
                                                                    ir.ApprovedExH,
                                                                    br.B_Name,
                                                                    de.Dep_Name

                                                                FROM
                                                                    tbl_individual_roster ir
                                                                        INNER JOIN
                                                                    tbl_empmaster Emp ON Emp.EmpNo = ir.EmpNo
                                                                        LEFT JOIN
                                                                    tbl_designations dsg ON dsg.Des_ID = Emp.Des_ID
                                                                        LEFT JOIN
                                                                    tbl_branches br ON br.B_id = Emp.B_id
                                                                        LEFT JOIN
                                                                    tbl_departments de ON de.Dep_ID = Emp.Dep_ID

                                                                    
                                                                    {$filter} GROUP BY ir.FDate , Emp.EmpNo");

                                                                    

    //    var_dump($data);die;

        $this->load->view('Reports/Attendance/rpt_in_out_all_sprdsht', $data);
    }

    function get_auto_emp_name() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->Db_model->get_auto_emp_name($q);
        }
    }

    function get_auto_emp_no() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->Db_model->get_auto_emp_no($q);
        }
    }

}
