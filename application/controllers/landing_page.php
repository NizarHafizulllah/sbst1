<?php 
class landing_page extends CI_Controller {
	function __construct(){
		parent::__construct(); 
		$this->load->helper("tanggal");
	}


function index() {
	$hash = md5(microtime());
	$_SESSION['hash'] = $hash;
	$this->load->view("landing_page_view",array("hash"=>$hash));
}

 



}
?>