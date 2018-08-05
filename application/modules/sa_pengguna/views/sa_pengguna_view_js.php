<script type="text/javascript">

$(document).ready(function(){


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
  
   
     $("#btncari").click(function(){
        dt.column(1).search($("#username").val())
        dt.column(2).search($("#nama").val())
        dt.column(3).search($("#level").val())
         .draw();

         return false;
     });


     $('#btnreset').click(function(){
        $('#username').val('');
        $('#nama').val('');
        $('#level').val('');
        $('#jenis').val('simpan');
        $('#id').val('');

        $("#btncari").click();
        
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
                      $('#username').val('');
                      $('#nama').val('');
                      $('#level').val('');
                      $('#jenis').val('simpan');
                      $('#id').val('');
                      $('#p1').val('');
                      $('#p2').val('');
                      $('#btnsimpan').html('simpan');
                      
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
  

function edit(id){

      $.ajax({

            url : '<?php echo site_url("$this->controller/get_row") ?>',
            data : { id : id },
            type : 'post', 
            dataType : 'json',
            success : function(obj) {
              // console.log(obj.fakultas);
                $('#btnsimpan').html('update');
                $("#id").val(obj.id);
                $("#jenis").val('update');
                $("#username").val(obj.username);
                $("#nama").val(obj.nama);
                $("#level").val(obj.level);
                    }
                });

}

function hapus(id){

var params = {
                life: 5000,
                horizontalEdge: 'top',
                verticalEdge: 'right',
                heading: 'Succes'
            };

        swal({
                title: 'Anda Yakin?',
                text: "Data dihapus tidak dapat dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Saya yakin!',
                cancelButtonText: 'TIdaakk, Batalkan!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {

              $.ajax({
                    url : '<?php echo site_url("$this->controller/hapus") ?>',
                    type : 'post',
                    data : {id : id},
                    dataType : 'json',
                    success : function(obj) {
                      if(obj.error==false) {
                      
                        params.heading = 'Berhasil';
                        params.theme = 'lime';
                    
                        $.notific8(obj.message, params);
                      $('#data').DataTable().ajax.reload(); 
                    }else{
                      
                      }
                    }
                  })
                
            
       },function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal({
                            buttonsStyling: false,
                            confirmButtonClass: 'btn btn-danger',
                            title: 'Batal',
                            text: 'File anda aman :)',
                            type: 'error'
                        }
                    )
                }
            })

}
     




</script>