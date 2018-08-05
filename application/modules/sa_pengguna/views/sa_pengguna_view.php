<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>vendors/sweetalert2/css/sweetalert2.min.css"/>
<script type="text/javascript" src="<?php echo base_url('assets/dahsboard/'); ?>vendors/sweetalert2/js/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>vendors/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>vendors/datatables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>css/responsive.dataTables.css">
<link rel="shortcut icon" href="<?php echo base_url('assets/dahsboard') ?>/img/favicon.ico"/>
<link href="<?php echo base_url('assets/dahsboard') ?>/vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('assets/dahsboard/'); ?>vendors/notific/css/jquery.notific8.min.css" rel="stylesheet" type="text/css">
 <script src="<?php echo base_url('assets/dahsboard/'); ?>vendors/notific/js/jquery.notific8.min.js" type="text/javascript"></script>
    <style>
        @media(max-width: 1024px)
        {
            .radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
                margin-top: 0;
                margin-left: 8px;
            }
        }
    </style>

<script src="<?php echo base_url('assets/dahsboard') ?>/vendors/iCheck/js/icheck.js" type="text/javascript"></script>
<script src="<?php echo base_url("assets/dahsboard/") ?>/js/jquery.dataTables.min.js"></script> 
<!-- end of page level vendors -->
<script type="text/javascript">

	$(document).ready(function(){
			$(".content .row").find('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('[type="reset"]').on('click', function () {
        setTimeout(function () {
            $("input").iCheck("update");
        }, 10);
    });
	});
    
</script>


<div class="panel">
<div class="panel-heading">
	<h3 class="panel-title">
		<i class="ti-layout-cta-left"></i> 
		Form Pengguna
	</h3>
</div>
<div class="panel-body">
	<form id="form_simpan" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/simpan"); ?>" role="form">
		

			<div class="form-group">
		      <label class="col-sm-2 control-label">Username </label>
		      <div class="col-sm-10">
		      	<!-- <input type="hidden" name="id_pemesan" id="id_pemesan"> -->
		        <input type="text" name="username" id="username" class="form-control input-style" placeholder="Username" />
		      </div>
    		</div>
    		<div class="form-group">
		      <label class="col-sm-2 control-label">Password </label>
		      <div class="col-sm-10">
		        <input type="password" name="p1" id="p1" class="form-control input-style" placeholder="Password" />
		      </div>
    		</div>
        
        <div class="form-group">
          <label class="col-sm-2 control-label">Ulangi Password </label>
          <div class="col-sm-10">
            <input type="password" name="p2" id="p2" class="form-control input-style" placeholder="Ulangi Password" />
            <input type="hidden" name="jenis" id="jenis" value="simpan">
            <input type="hidden" name="id" id="id" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama </label>
          <div class="col-sm-10">
            <!-- <input type="hidden" name="id_pemesan" id="id_pemesan"> -->
            <input type="text" name="nama" id="nama" class="form-control input-style" placeholder="Nama" />
          </div>
        </div>
    		<div class="form-group">
		      <label class="col-sm-2 control-label">Level </label>
		      <div class="col-sm-10">
		        <?php echo form_dropdown("level",$arr_level,isset($level)?$level:"",'id="level" class="form-control input-style"'); ?>
		      </div>
    		</div>

    		<div class="form-group">
    		  <label class="col-sm-2 control-label">&nbsp;</label>
		      <div class="col-sm-10">
		      	<button class="btn btn-primary" id="btnsimpan">Simpan</button>
            <button class="btn btn-success" id="btncari">Filter</button>
            <button type="button" class="btn btn-danger" id="btnreset">Refresh</button>
		      </div>
    		</div>



</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
	<h3 class="panel-title">
		<i class="ti-layout-cta-left"></i> 
		Detail Pengguna
	</h3>
</div>
<div class="panel-body">
<table width="100%" border="0" id="data" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  > 
        <th>Username</th>
        <th>Nama</th>
        <th>Level</th>
        <th>#</th>
    </tr>
    </tr>
    </tr>
  
</thead>
</table>


</div>
</div>


<?php 
$this->load->view($this->controller."_view_js");
?>