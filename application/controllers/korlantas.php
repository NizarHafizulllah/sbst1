<?php
class korlantas extends korlantas_controller {

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
		$content = $this->load->view("korlantas/".$this->controller."_view",$data_array,true);

		$this->set_subtitle("Beranda");
		$this->set_title("SBST");
		$this->set_content($content);
		$this->render();
	}

}

?>