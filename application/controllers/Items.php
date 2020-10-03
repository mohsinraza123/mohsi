<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
	function __construct()
	{
		parent :: __construct();
		if($this->session->userdata('UserID') == '' || $this->session->userdata('logged_in') != true){
		    redirect('Login', 'refresh');
		}
	}
	public function index()
	{
		$this->load->view('items');
	}
	public function addItems(){
	    $this->load->view('addItem');
	}
	public function saveItem(){
	    if(!empty($this->input->post('CasePrice'))) {
	        $CasePrice = $this->input->post('CasePrice');
	    } else {
	        $CasePrice = 0;
	    }
	    if(!empty($this->input->post('PcPrice'))){
	        $PcPrice = $this->input->post('PcPrice');
	    } else {
	        $PcPrice = 0;
	    }
	    if(!empty($this->input->post('CaseQty'))){
	        $CaseQty = $this->input->post('CaseQty');
	    } else {
	        $CaseQty = 0;
	    };
	    $CompanyID = $this->session->userdata('CompanyID');
	    $Name = $this->input->post('Name');
	    $ItemCode = $this->input->post('ItemCode');
	    $DepartmentID = $this->input->post('DepartmentID');
	    $BrandID = $this->input->post('BrandID');
	    $UPC = $this->input->post('UPC');
	    $UOM = $this->input->post('UOM');
	    if($this->input->post('OnHand') == 'on'){
	        $OnHand = 1;
	    }
	    else{
	        $OnHand = 0;
	    }

	    $this->load->library('upload');
        if(!empty($_FILES['PicturePath']['name'])){
            $PicturePath = $this->do_upload($_FILES["PicturePath"]);
        }
	    // echo $PicturePath;die;.
	   // var_dump($this->input->post());die;
        $date = date("yy-m-d")."T".date("h:i:s");
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/postItem",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "CompanyID=".$CompanyID."&Name=".$Name."&ItemCode=".$ItemCode."&UPC=".$UPC."&CaseQty=".$CaseQty."&CasePrice=".$CasePrice."&PcPrice=".$PcPrice."&OnHand=".$OnHand."&PicturePath=".$PicturePath."&UOM=".$UOM."&DepartmentID=".$DepartmentID."&BrandID=".$BrandID."&DateModified=".$date."&QBDateModified=".$date,
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
                                                Item is Successfully Added.
                                            </div>');
        redirect("Items", "refresh");
	}
	public function editItem($id){
		// echo $id;die;
		$data['id'] = $id;
		$this->load->view('editItem', $data);
	}
	public function updateItem($id){
		 if(!empty($this->input->post('CasePrice'))) {
	        $CasePrice = $this->input->post('CasePrice');
	    } else {
	        $CasePrice = 0;
	    }
	    if(!empty($this->input->post('PcPrice'))){
	        $PcPrice = $this->input->post('PcPrice');
	    } else {
	        $PcPrice = 0;
	    }
	    if(!empty($this->input->post('CaseQty'))){
	        $CaseQty = $this->input->post('CaseQty');
	    } else {
	        $CaseQty = 0;
	    };
	    $CompanyID = $this->session->userdata('CompanyID');
	    $Name = $this->input->post('Name');
	    $ItemCode = $this->input->post('ItemCode');
	    $DepartmentID = $this->input->post('DepartmentID');
	    $BrandID = $this->input->post('BrandID');
	    $UPC = $this->input->post('UPC');
	    $UOM = $this->input->post('UOM');
	    if($this->input->post('OnHand') == 'on'){
	        $OnHand = 1;
	    }
	    else{
	        $OnHand = 0;
	    }
	    if(!empty($_FILES['PicturePath']['name']))
        {
            $PicturePath = $this->do_upload($_FILES["PicturePath"]);
        }else{
            $PicturePath = $this->input->post('oldImage');
        }
	   // var_dump($this->input->post());die;
        $date = date("yy-m-d")."T".date("h:i:s");
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/editItem/".$id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "CompanyID=".$CompanyID."&ItemID=".$id."&Name=".$Name."&ItemCode=".$ItemCode."&UPC=".$UPC."&CaseQty=".$CaseQty."&CasePrice=".$CasePrice."&PcPrice=".$PcPrice."&OnHand=".$OnHand."&PicturePath=".$PicturePath."&UOM=".$UOM."&DepartmentID=".$DepartmentID."&BrandID=".$BrandID."&DateModified=".$date."&QBDateModified=".$date,
          CURLOPT_HTTPHEADER => array(
            "APIKey:".APIKey,
            "Content-Type: application/x-www-form-urlencoded"
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        // echo $response;die;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show alert-for-three-seconds" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                Item is Successfully Updated.
                                            </div>');
        redirect("Items", "refresh");
	}
	private function do_upload($p)
    {
        $type = explode('.', $p["name"]);
        $type = $type[count($type)-1];
        $url = uniqid(rand()).'.'.$type;
        if (in_array($type, array("png","jpg","jpeg","gif")))
            if(move_uploaded_file($p["tmp_name"], "uploads/".$url))
                return base_url()."uploads/".$url;
        return ""; 
    }
}
