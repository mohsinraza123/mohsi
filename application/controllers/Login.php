<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent ::__construct();
	}
	public function index()
	{
		if($this->session->userdata('UserID') == '' || $this->session->userdata('logged_in') != true){
			$this->load->view('login');
		}
		else{
			redirect('Welcome', 'refresh');
		}
	}
	public function verifyLogin(){
		$username = $this->input->post('username');
		$username = str_replace(" ","%20",$username);;
		$password = $this->input->post('password');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/login?username=".$username."&password=".$password,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "APIKey:".APIKey
		  ),
		));

		$response = curl_exec($curl);
		$response = json_decode($response, true);
		curl_close($curl);

		if($response != null){
			// var_dump($response); die;
			// echo $response["user"]["UserID"];die;
			$user = array(
                   'UserID'  => $response["user"]["UserID"],
                   'UserName'     => $response["user"]["UserName"],
                   'CompanyID'     => $response["user"]["CompanyID"],
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($user);
			redirect("Welcome", "refresh");
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>Oh snap!</strong> Incorrect Username OR Password.
                                            </div>');
			redirect('Login', 'refresh');
		}

	}
	function logoutUser()
	{
		$this->session->unset_userdata('UserID');
		$this->session->unset_userdata('UserName');
		$this->session->unset_userdata('CompanyID');
		$this->session->unset_userdata('logged_in');
		redirect('Login', 'refresh');
	}
}
