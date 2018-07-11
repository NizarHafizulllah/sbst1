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
  <title>Login Page | Materialize - Material Design Admin Template</title>

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
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Register</h4>
            <p class="center">Join to our community now !</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-again" type="password">
            <label for="password-again">Password again</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <a href="index.html" class="btn waves-effect waves-light col s12">Daftar Sekarang</a>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="page-login.html">Login</a></p>
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
        url : '<?php echo site_url("login/ceklogin") ?>',
        data : $("#formlogin").serialize(),
        type : 'post', 
        dataType : 'json',
        success : function(obj) {
            if(obj.error==false) {
                
                window.location=obj.url;
            }
            else {
                // alert(obj.message);
                 swal('Login Gagal', obj.message, 'error');
            }
        }

    });
    return false;

});

    

});
</script>

</body>

</html>