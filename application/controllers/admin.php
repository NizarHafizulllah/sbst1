<?php
class admin extends admin_controller {

	var $controller ;

	function __construct(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		// $this->load->helper("tanggal");
		// $this->load->model("ad_pembalap_model","dm");
		$this->controller = get_class($this);

	}

	function index(){

		$data_array = array();	 
		$content = $this->load->view("admin/".$this->controller."_view",$data_array,true);

		$this->set_subtitle("Beranda");
		$this->set_title("PMB | UTS");
		$this->set_content($content);
		$this->render();
	}

}

?>