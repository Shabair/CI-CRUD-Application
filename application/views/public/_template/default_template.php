
  <div class="wrapper">
    <!--=================================
 preloader -->
    <div id="pre-loader">
      <img src="<?=$this->_assetsPath ?>images/pre-loader/loader-20.gif" alt="">
    </div>
    <!--=================================
 preloader -->
    <!--=================================
 header -->
    <header id="header" class="header light logo-center">

    <?php if($CI->ion_auth->logged_in()): ?>
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 xs-mb-10">
              <div class="topbar-call text-center text-md-left">
                <ul>
                  <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-user-circle theme-color"></i><?php echo $CI->get_user_name(); ?></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="topbar-call text-center text-md-right">
                <ul><!-- 
                  <li><a href="<?php echo base_url('auth/edit_user/'.$CI->get_user_id()) ?>"><i class="fa fa-drivers-license"></i> Profile</a></li> -->
                  <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </div>
            </div>
           </div>
        </div>
      </div>
    <?php endif; ?>
      <!--=================================
        mega menu -->
      <div class="menu">
        <!-- menu start -->
        <nav id="menu" class="mega-menu">
          <!-- menu list items container -->
          <section class="menu-list-items">
            <div class="top-menu-my container-fluid">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <!-- menu logo -->
                  <ul class="menu-logo">
                    <li>
                      <a href="index-01.html">
                        <img id="logo_img" src="<?=$this->_assetsPath ?>images/site-logo.jpeg" alt="logo">
                      </a>
                    </li>
                    <li>
                      <a href="index-01.html">
                        <img id="logo_img" src="<?=$this->_assetsPath ?>images/bismillah.png" alt="logo">
                      </a>
                    </li>
                    <li>
                      <a href="index-01.html">
                        <img id="logo_img" src="<?=$this->_assetsPath ?>images/alhudalogo[2].png" alt="logo">
                      </a>
                    </li>
                  </ul>
                  <!-- menu links -->
                  <div class="menu-bar">
                    <ul class="menu-links">
                      <li id="home"><a href="<?php echo base_url() ?>">Home </a></li>
                      <li id="about-us"><a href="<?php echo base_url('about-us') ?>">About Us </a></li>
                      <li id="up-comming"><a href="javascript:void(0)"> Up Comming <i class="fa fa-angle-down fa-indicator"></i></a>
                        <!-- drop down multilevel  -->
                        <ul class="drop-down-multilevel">
                          <li><a href="<?php echo base_url('lecture') ?>">Lectures<span class="badge badge-primary"><?php echo sprintf("%02d", $lectureCount).'+'; ?></span> </a></li>
                          <!-- <li><a href="pre-loader.html">WorkShop<span class="badge badge-primary">20+</span> </a></li> -->
                          <li><a href="<?php echo base_url('course') ?>">Courses<span class="badge badge-primary"><?php echo sprintf("%02d", $courseCount).'+'; ?></span> </a></li>
                          <li><a href="<?php echo base_url('event') ?>">Events<span class="badge badge-primary"><?php echo sprintf("%02d", $eventCount).'+'; ?></span> </a></li>
                          <li><a href="<?php echo base_url('old_event') ?>">Old Events<span class="badge badge-primary"><?php echo sprintf("%02d", $old_eventCount).'+'; ?></span> </a></li>
                          <!-- <li><a href="pre-loader.html">Series<span class="badge badge-primary">20+</span> </a></li> -->
                        </ul>
                      </li>
                      
                      <li id="audio"><a href="<?php echo base_url('audio'); ?>">Audios</a></li>
                      
                      <li id="video"><a href="<?php echo base_url('video'); ?>">Videos</a></li>
                      <li id="welfare"><a href="<?php echo base_url('welfare'); ?>">Welfare</a></li>
                      <li id="academic"><a href="<?php echo base_url('academic'); ?>">Academic</a></li>
                      <li id="admission"><a href="<?php echo base_url('admission'); ?>">Admission</a></li>
                      <li id="contact-us"><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                     <!--  <?php if(!$CI->ion_auth->logged_in()){ ?>
                        <li id="login"><a href="<?php echo base_url('login') ?>">login</a></li>
                      <?php }?> -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </nav>
        <!-- menu end -->
      </div>

    <form action="<?php echo $CI->_uriTarget ?>" method="GET" id="big_form">
    <?php if($big_search = $CI->input->get('big_search')): ?>
      <input type="hidden" name="big_search" id="big_search" value="<?php echo $big_search ?>">
    <?php endif; ?>
    <?php if($big_playlist = $CI->input->get('big_playlist')): ?>
      <input type="hidden" name="big_playlist" id="big_playlist" value="<?php echo $big_playlist ?>">
    <?php endif; ?>
    </form>
    </header>

    <?php if(isset($breadcrumb)){ ?>

    <!--=================================
    page-title-->

    <section class="page-title bg-overlay-black-60 parallax" style="border-bottom: 2px solid #0066c1;">
      <div class="stylist">
        <div class="container">
          <div class="row" style="text-align: center;"> 
            <div class="col-lg-12" style=""> 
              <div class="page-title-name">
                  <!-- <span onclick="goBack()" style="display: inline-block;float: left;margin-top: 38px;"><a href="javascript:void(0)"><i class="fa fa-angle-left"></i> Go Back</a></span> -->
                  <h1 style="display: inline-block;"><?php echo $page['title'] ?></h1>
              </div>
            </div>
           </div>
        </div>
      </div>
    </section>

    <!--=================================
page-title -->
    <?php } ?>
    <!--=================================
 header -->

<?php $CI->load->view($view); ?>



 
    <!--=================================
 footer -->
<footer id="footer-fixed" class="footer black-bg">
 <div class="page-section-pt" style="padding-top: 30px;">
 <div class="container">
  <div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 sm-mb-30">
      <?php echo get_block('footer-short-info'); ?>
  </div>
      <div class="col-lg-2 col-md-6 col-sm-6 sm-mb-30">
      <?php echo get_block('footer-navigation-links'); ?>
        
    </div>
    <div class="col-lg-2 col-md-6 col-sm-6 xs-mb-30">
      <?php echo get_block('footer-useful-links'); ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <?php echo get_block('footer-contact-us'); ?>
    
    </div>
   </div>
     <div class="footer-widget mt-20">
    <div class="row">
      <div class="col-md-12 text-center">
        <?php echo get_block('footer-copyright'); ?>
      </div>
     </div>    
    </div>
   </div>
  </div>
</footer>
    <!--=================================
 footer -->
  </div>
  <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a>
  </div>