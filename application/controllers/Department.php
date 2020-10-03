<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	function __construct()
	{
		parent :: __construct();
		if($this->session->userdata('UserID') == '' || $this->session->userdata('logged_in') != true){
		    redirect('Login', 'refresh');
		}
	}
	public function index()
	{
		$this->load->view('departments');
	}
	public function addDept()
	{
		$this->load->view('addDept');
	}
	public function saveDept(){
		// var_dump("<pre>", $this->input->post());die;
		$Department1 = $this->input->post('Department1');
		$CompanyID = $this->session->userdata('CompanyID');
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/addDepartment",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "Department1=".$Department1."&CompanyID=".$CompanyID,
		  CURLOPT_HTTPHEADER => array(
		    "APIKey:".APIKey,
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show alert-for-three-seconds" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                Department is Successfully Added.
                                            </div>');
		redirect("Department", "refresh");
	}
}
