<?php
class wilayah_controller extends CI_Controller {

var $pilihan; 
	function __construct() {

		parent::__construct();  

		 $userdata = $_SESSION['userdata'];
 
		 if( $userdata['login_wilayah'] == false  ) {
		 	redirect("login");

		 }

		

		// exit;
	}

	function set_content($str) {
		$this->content['content'] = $str;
	}
	
	function set_title($str) {
		$this->content['title'] = $str;
	}
	
	function set_subtitle($str) {
		$this->content['subtitle'] = $str;
	}
	
	function render(){
		$arr = array();		 
		$this->load->view("wilayah/wilayah_template",$this->content );
		
	}

  


}

?>
