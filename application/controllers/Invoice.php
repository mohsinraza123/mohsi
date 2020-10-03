<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	function __construct()
	{
		parent :: __construct();
		if($this->session->userdata('UserID') == '' || $this->session->userdata('logged_in') != true){
		    redirect('Login', 'refresh');
		}
	}
	public function index()
	{
		$this->load->view('generate-invoice');
	}
	public function addPayment(){
	    $this->load->view('add-payment');
	}
	public function saveTransaction(){
		$objectTransaction = $this->input->post('transaction');

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/trans/posttransaction?userID=".$objectTransaction['UserID'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "TransID=0&CompanyID=".$objectTransaction['CompanyID']."&TransNo=".$objectTransaction['TransNo']."&CustomerID=".$objectTransaction['CustomerID']."&TransDate=".$objectTransaction['TransDate']."&TransType=".$objectTransaction['TransType']."&Debit=".$objectTransaction['Debit']."&Credit=".$objectTransaction['Credit']."&RemainingCredit=".$objectTransaction['RemainingCredit']."&Discount=".$objectTransaction['Discount']."&Note=".$objectTransaction['Note']."&Status=".$objectTransaction['Status']."&TotalItems=".$objectTransaction['TotalItems']."&UserID=".$objectTransaction['UserID']."&DateModified=".$objectTransaction['DateModified']."&DiscountType=".$objectTransaction['DiscountType']."&SubTotal=".$objectTransaction['SubTotal'],
          CURLOPT_HTTPHEADER => array(
            "APIKey:".APIKey,
            "Content-Type: application/x-www-form-urlencoded"
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true);
        echo($response['TransID']);
	}

	public function saveTransEntry(){
		$entry = $this->input->post('TransEntry');
		$entry = http_build_query($entry);
		echo $entry;

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/transentries/posttransentry",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>$entry,
		  CURLOPT_HTTPHEADER => array(
		    "APIKey: ".APIKey,
		    "Content-Type: application/json"
		  ),
		));

		// echo $entry;
		// curl_close($curl);
		// echo $response;

		
		// $entry = http_build_query(json_decode($entry));
		// // var_dump($entry);
		// $curl = curl_init();
        
  //       curl_setopt_array($curl, array(
  //         CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/transentries/posttransentry",
  //         CURLOPT_RETURNTRANSFER => true,
  //         CURLOPT_ENCODING => "",
  //         CURLOPT_MAXREDIRS => 10,
  //         CURLOPT_TIMEOUT => 0,
  //         CURLOPT_FOLLOWLOCATION => true,
  //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //         CURLOPT_CUSTOMREQUEST => "POST",
  //         // CURLOPT_POSTFIELDS => "TransEntry=['ERF':'ANC']",
  //         // CURLOPT_POSTFIELDS => "TransEntry="."'".$entry."'",
  //         CURLOPT_POSTFIELDS => "TransEntry=".$entry,
  //         CURLOPT_HTTPHEADER => array(
  //           "APIKey:".APIKey,
  //           "Content-Type: application/json"
  //         ),
  //       ));
        
  //       $response = curl_exec($curl);
  //       curl_close($curl);
  //       var_dump($response);
        echo "Done";
	}
}
