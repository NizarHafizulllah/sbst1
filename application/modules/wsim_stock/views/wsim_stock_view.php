 <link href="<?php echo base_url('assets/dahsboard/'); ?>vendors/airdatepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
 <script src="<?php echo base_url('assets/dahsboard/'); ?>vendors/moment/js/moment.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/dahsboard/'); ?>vendors/airdatepicker/js/datepicker.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/dahsboard/'); ?>vendors/airdatepicker/js/datepicker.en.js" type="text/javascript"></script>
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
		Filter
	</h3>
</div>
<div class="panel-body">
	<form id="form_simpan" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/simpan"); ?>" role="form">
    		
    		<div class="form-group">
		      <label class="col-sm-2 control-label">Material </label>
		      <div class="col-sm-10">
		        <?php echo form_dropdown("material",$arr_jenis,isset($material)?$material:"",'id="material" class="form-control input-style"'); ?>
		      </div>
    		</div>
        



</form>
</div>
</div>



<div class="panel">
<div class="panel-heading">
	<h3 class="panel-title">
		<i class="ti-layout-cta-left"></i> 
		Detail Material
	</h3>
</div>
<div class="panel-body">
<table width="100%" border="0" id="data" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  > 
        <th>Tanggal</th>
        <th>Nama</th>
        <th>In</th>
        <th>Out</th>
        <th>Sisa</th>
        <th>Uraian</th>
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