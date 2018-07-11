<script type="text/javascript">

$(document).ready(function(){

  $('.tanggal').datepicker();
var params = {
                life: 5000,
                horizontalEdge: 'top',
                verticalEdge: 'right',
                heading: 'Succes'
            };

   var dt = $("#data").DataTable(
      {
        // "order": [[ 0, "desc" ]],
        // "iDisplayLength": 50,
        "columnDefs": [ { "targets": 0, "orderable": false } ],
        "processing": true,
            "serverSide": true,
            "ajax": '<?php echo site_url("$this->controller/get_data") ?>'
      });

     
     $("#data_filter").css("display","none");  
  
   
     $("#btn_submit").click(function(){
        // alert('hello');
        

        dt.column(1).search($("#nama").val())
         .draw();

         return false;
     });


    $('#btnsimpan').click(function(){
       $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_simpan').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                    params.heading = 'Berhasil';
                    params.theme = 'lime';
                    
                        $.notific8(obj.message, params);
                      $('#tanggal').val('');
                      $('#material').val('');
                      $('#kode').val('');
                      $('#keluar').val('');
                      $('#uraian').val('');
                      $('#data').DataTable().ajax.reload();  
                      
            }
            else {
                 params.heading = 'Gagal';
                    params.theme = 'ruby';
                    
                        $.notific8(obj.message, params);
            }
        }
    });

    return false;
    });



});
  




     




</script>