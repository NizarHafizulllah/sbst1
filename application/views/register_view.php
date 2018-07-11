<!DOCTYPE html>
<html lang="en">

<!--================================================================================
    Item Name: Materialize - Material Design Admin Template
    Version: 3.0
    Author: GeeksLabs
    Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login Page | PMB UTS</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url('assets/demo') ?>/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/demo') ?>/images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo base_url('assets/demo') ?>/images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url('assets/demo') ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.7/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="<?php echo base_url('assets/demo') ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url('assets/demo') ?>/css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url('assets/demo') ?>/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url('assets/demo') ?>/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url('assets/demo') ?>/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url('assets/demo') ?>/js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
  <style type="text/css">
    .swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}
  </style>
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



 <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" id="formdaftar">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Pendaftaran</h4>
            <p class="center">Daftar Akun !</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="nisn" type="text" name="nisn">
            <label for="nisn" class="center-align">NISN</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="nama" type="text" name="nama">
            <label for="nama" class="center-align">Nama</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email" name="email">
            <label for="email" class="center-align">E-mail</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
            <input id="no_hp" type="text" name="no_hp" value="+62 ">
            <label for="no_hp" class="center-align">Telepon</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="p1" type="password" name="p1">
            <label for="password">Kata Sandi</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="p2" type="password" name="p2">
            <label for="password-again">Ulangi Kata Sandi</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="button" id="login" class="btn waves-effect waves-light col s12">Daftar</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Sudah Punya Akun? <a href="<?php echo site_url('login') ?>">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->

  <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.7/chartist.min.js"></script> 
  <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/custom-script.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/plugins/sweetalert/dist/sweetalert.min.js"></script> 

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url('assets/demo') ?>/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->


    <script>
    
$(document).ready(function(){


$("#login").click(function(){

   // alert('fuck');

    $.ajax({
        url : '<?php echo site_url("regis/daftar") ?>',
        data : $("#formdaftar").serialize(),
        type : 'post', 
        dataType : 'json',
        success : function(obj) {
            if(obj.error==false) {
                
                window.location=obj.url;
            }
            else {
                // alert(obj.message);
                 swal('Error', obj.message, 'error');
            }
        }

    });
    return false;

});

    

});
</script>

</body>

</html>