<?php
class wsim_stock extends wilayah_controller {

	var $controller ;

	function __construct(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		// $this->load->helper("tanggal");
		$this->controller = get_class($this);
		$this->load->model($this->controller."_model","dm");
		

	}

	function index(){

		$data_array = array();
		$data_array['arr_jenis'] = $this->cm->arr_dropdown('sim_jenis', 'id', 'nama', 'nama');

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("SIM - Stock");
		$this->set_title("SBST");
		$this->set_content($content);
		$this->render();
	}



	


	 function get_data() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $material = $_REQUEST['columns'][1]['search']['value'];



      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                'material' => $material
                
                 
        );     

        // show_array($req_param);
           
        $row = $this->dm->data($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       // show_array($result);
       // exit;
        $arr_data = array();
        foreach($result as $row) : 
        // $daft_id = $row['daft_id'];
        $id = $row['id'];

        if ($row['jenis']=='keluar') {
            $uraian = $row['nama'].' ke '.$row['polres'];
        }else{
            $uraian = $row['uraian'];
        }

             
            $arr_data[] = array(
                flipdate($row['tanggal']),
                $row['nama'],
                $row['masuk'],
                $row['keluar'],
                $row['jumlah'],
                $uraian,
                
                     
                                );
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }

}

?>