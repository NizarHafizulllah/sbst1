<?php
class coremodel extends CI_Model {
        function __construct() {
                parent::__construct();
        }
  

  function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
          $this->db->order_by($vORDERBY);
          $res  = $this->db->get($vTable);

          $ret = array('' => '- Pilih Satu -');
          foreach($res->result_array() as $row) : 
                  $ret[$row[$vINDEX]] = $row[$vVALUE];
          endforeach;

          return $ret;

  }


    function arr_dropdown2($vTable, $vINDEX, $vVALUE, $vORDERBY,$nf, $f){
          $this->db->order_by($vORDERBY);
          $this->db->where($nf, $f);
          $res  = $this->db->get($vTable);
          $ret = array('' => '- Pilih Satu -');
          foreach($res->result_array() as $row) : 
                  $ret[$row[$vINDEX]] = $row[$vVALUE];
          endforeach;

          return $ret;

  }

         




function add_arr_head($arr,$index,$str) {
  $res[$index] = $str;
  foreach($arr as $x => $y) : 
  $res[$x] = $y;
  endforeach;
  return $res;
}

}
?>
