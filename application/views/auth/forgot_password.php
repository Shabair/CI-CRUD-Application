<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="HTML5 Template" />
  <meta name="description" content="Webster - Responsive Multi-purpose HTML5 Template" />
  <meta name="author" content="potenzaglobalsolutions.com" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Login | Azzuhaa</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url().'/assets/'; ?>images/favicon.ico" />
  <!-- font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
  <!-- Plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/'; ?>css/plugins-css.css" />
  <!-- Typography -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/'; ?>css/typography.css" />
  <!-- Shortcodes -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/'; ?>css/shortcodes/shortcodes.css" />
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/'; ?>css/style.css" />
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/'; ?>css/responsive.css" />
</head>

<body>
  <div class="wrapper">
    <!--=================================
 preloader -->
    <div id="pre-loader">
      <img src="<?php echo base_url().'/assets/'; ?>images/pre-loader/loader-01.svg" alt="">
    </div>
    <!--=================================
 preloader -->
    <!--=================================
 login-->
    <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background: url(<?php echo base_url().'/assets/'; ?>images/login/05.jpg);">
      <div class="container">
        <div class="row no-gutters justify-content-center">
          
          <div class="col-lg-4 col-md-6 white-bg">
            <?php echo form_open("auth/forgot_password");?>
            <div class="login-fancy pb-40 clearfix">
              <h3 class="mb-30">Forgot Password</h3>
              <p>Please enter your Email so we can send you an email to reset your password.</p>
              <div class="section-field mb-20">
                <label class="mb-10" for="name">Email*</label>
                <!-- <input id="name" class="web form-control" type="text" placeholder="User name" name="web"> -->
                <?php $identity['class'] = 'web form-control'; ?>
                <?php $identity['placeholder'] = 'Email'; ?>
                <?php echo form_input($identity);?>
              </div>
              <!-- <a href="#" class="button"> <span>Log in</span>
                <i class="fa fa-check"></i>
              </a> -->
              <?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class=button');?>
              
              <p class="mt-20 mb-0"><a href="<?php echo base_url('login'); ?>"> Login</a>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </section>
    <!--=================================
 login-->
  </div>
  <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a>
  </div>
  <!--=================================
 jquery -->
  <!-- jquery -->
  <script src="<?php echo base_url().'/assets/'; ?>js/jquery-3.3.1.min.js"></script>
  <!-- plugins-jquery -->
  <script src="<?php echo base_url().'/assets/'; ?>js/plugins-jquery.js"></script>
  <!-- plugin_path -->
  <script>
    var plugin_path = '<?php echo base_url().'/assets/'; ?>js/';
  </script>
  <!-- custom -->
  <script src="<?php echo base_url().'/assets/'; ?>js/custom.js"></script>
</body>

</html>
