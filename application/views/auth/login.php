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
          <!-- <div class="col-lg-4 col-md-6 login-fancy-bg bg-overlay-black-20" style="background: url(<?php echo base_url().'/assets/'; ?>images/login/03.jpg);">
            <div class="login-fancy pos-r">
              <h2 class="text-white mb-20">Hello world!</h2>
              <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
              <ul class="list-unstyled pos-bot pb-30">
                <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> 
                </li>
                <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a>
                </li>
              </ul>
            </div>
          </div> -->
          <div class="col-lg-4 col-md-6 white-bg">
            <?php echo form_open("auth/login");?>
            <div class="login-fancy pb-40 clearfix">
              <h3 class="mb-30">Login <span><a href="<?php echo base_url() ?>" class="pull-right">Home</a></span></h3>
              <div class="section-field mb-20">
                <label class="mb-10" for="name">User name*</label>
                <!-- <input id="name" class="web form-control" type="text" placeholder="User name" name="web"> -->
                <?php $identity['class'] = 'web form-control'; ?>
                <?php $identity['placeholder'] = 'User name'; ?>
                <?php echo form_input($identity);?>
              </div>
              <div class="section-field mb-20">
                <label class="mb-10" for="Password">Password*</label>
                <!-- <input id="Password" class="Password form-control" type="password" placeholder="Password" name="Password"> -->
                <?php $password['class'] = 'Password form-control'; ?>
                <?php $password['placeholder'] = 'Password'; ?>
                <?php echo form_input($password);?>
              </div>
              <div class="section-field">
                <div class="remember-checkbox mb-30">
                  <!-- <input type="checkbox" class="form-control" name="two" id="two" /> -->
                  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="form-control"');?>
                  <label for="remember">Remember me</label> <!-- <a href="forgot_password" class="float-right">Forgot Password?</a> -->
                </div>
              </div>
              <!-- <a href="#" class="button"> <span>Log in</span>
                <i class="fa fa-check"></i>
              </a> -->
              <?php echo form_submit('submit', lang('login_submit_btn'),'class=button');?>
              
              
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