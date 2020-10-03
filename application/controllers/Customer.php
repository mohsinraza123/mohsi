<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct()
	{
		parent :: __construct();
		if($this->session->userdata('UserID') == '' || $this->session->userdata('logged_in') != true){
		    redirect('Login', 'refresh');
		}
	}
	public function index()
	{
		$this->load->view('customers');
	}
	public function addCustomer()
	{
		$this->load->view('addCustomer');
	}

	public function saveCustomer(){
		// var_dump("<pre>", $this->input->post());die;
		$CompanyID = $this->session->userdata('CompanyID');
		$Name = $this->input->post('Name');
		$Email = $this->input->post('Email');
		$Phone = $this->input->post('Phone');
		$BillingContact = $this->input->post('BillingContact');
		$Address = $this->input->post('Address');
		$City = $this->input->post('City');
		$State = $this->input->post('State');
		$Zip = $this->input->post('Zip');
		$BillingAddress = $this->input->post('BillingAddress');
		$BillingCity = $this->input->post('BillingCity');
		$BillingState = $this->input->post('BillingState');
		$BillingZip = $this->input->post('BillingZip');
		$Balance = 0;
		$date = date("yy-m-d")."T".date("h:i:s");

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/customers/postcustomer",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "CompanyID=".$CompanyID."&Name=".$Name."&Email=".$Email."&Phone=".$Phone."&BillingContact=".$BillingContact."&Address=".$Address."&City=".$City."&State=".$State."&Zip=".$Zip."&BillingAddress=".$BillingAddress."&BillingCity=".$BillingCity."&BillingState=".$BillingState."&BillingZip=".$BillingZip."&Balance=".$Balance."&DateModified=".$date."&QBDateModified=".$date,
		  CURLOPT_HTTPHEADER => array(
		    "APIKey:".APIKey,
		    "Content-Type: application/x-www-form-urlencoded"
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		// echo $response;
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show alert-for-three-seconds" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                Customer is Successfully Added.
                                            </div>');
		redirect("Customer", "refresh");
	}
	public function detail($id){
		$data['id'] = $id;
		$this->load->view('customer-detail', $data);
	}
	public function editCustomer($id){
		$data['id'] = $id;
		$this->load->view('edit-customer', $data);
	}
	public function updateCustomer($id){
		$CompanyID = $this->session->userdata('CompanyID');
		$Name = $this->input->post('Name');
		$Email = $this->input->post('Email');
		$Phone = $this->input->post('Phone');
		$BillingContact = $this->input->post('BillingContact');
		$Address = $this->input->post('Address');
		$City = $this->input->post('City');
		$State = $this->input->post('State');
		$Zip = $this->input->post('Zip');
		$BillingAddress = $this->input->post('BillingAddress');
		$BillingCity = $this->input->post('BillingCity');
		$BillingState = $this->input->post('BillingState');
		$BillingZip = $this->input->post('BillingZip');
		$Balance = $this->input->post('Balance');
		$date = date("yy-m-d")."T".date("h:i:s");

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/customers/editcustomer/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "CompanyID=".$CompanyID."&Name=".$Name."&Email=".$Email."&Phone=".$Phone."&BillingContact=".$BillingContact."&Address=".$Address."&City=".$City."&State=".$State."&Zip=".$Zip."&BillingAddress=".$BillingAddress."&BillingCity=".$BillingCity."&BillingState=".$BillingState."&BillingZip=".$BillingZip."&CustomerID=".$id."&Balance=".$Balance."&DateModified=".$date."&QBDateModified=".$date,
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
                                                Customer is Successfully Updated.
                                            </div>');
		// echo $response;
		redirect("Customer", "refresh");
	}
}
