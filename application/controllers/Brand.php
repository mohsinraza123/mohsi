<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {
	function __construct()
	{
		parent :: __construct();
		if($this->session->userdata('UserID') == '' || $this->session->userdata('logged_in') != true){
		    redirect('Login', 'refresh');
		}
	}
	public function index()
	{
		$this->load->view('brands');
	}
	public function addBrand()
	{
		$this->load->view('addBrand');
	}

	public function saveBrand(){
		// var_dump("<pre>", $this->input->post());die;
		$Brand = $this->input->post('Brand');
		$CompanyID = $this->session->userdata('CompanyID');
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/addBrand",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "Brand1=".$Brand."&CompanyID=".$CompanyID,
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
                                                Brand is Successfully Added.
                                            </div>');
		redirect("Brand", "refresh");
	}
}
