<?php if($CI->ion_auth->logged_in()): ?>
  <?php include '_parts/title.php'; ?>

  <!--=================================
   Blog-->
  <section class="blog blog-single white-bg page-section-ptb">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <?php $CI->load->view($CI->_sidebar); ?>
        </div>
        <!-- ========================== -->
        <div class="col-lg-9">
          <div class="row mb-10">
            <div class="col-md-12">
              <audio controls style="width:100%;" controlsList="nodownload"> 
                <source src="<?php echo uploads_path($single['audio']); ?> " type="audio/mp3"> 
                <source src="<?php echo uploads_path($single['audio']); ?> " type="audio/ogg"> 
                <source src="<?php echo uploads_path($single['audio']); ?> " type="audio/mpeg"> 
              </audio>
            </div>
          </div>
          <!-- Content Starts From Here -->
          <?php echo ($content); ?>
          <!-- Content ENDs At Here -->
          <?php if(!empty($single['cat_id'])): ?>
            <div class="entry-share clearfix">
              <div class="tags">
                <h5>Category:</h5>
                <ul>
                  <li><a href="<?php echo base_url('archive/'.$single['cat_slug']) ?>"><?php echo $single['cat_title'] ?></a>
                  </li>
                </ul>
              </div>
            </div>
          <?php endif; ?>
            <div class="blog-entry mb-10">
              <div class="blog-detail">
                <?php share(); ?>
              </div>
            </div>
          <!-- ================================================ -->
          <?php //include '_parts/nextAndPrevious.php'; ?>
        </div>
        <!-- ================================================ -->
      </div>
    </div>
  </section>
  <!--=================================
   Blog-->
<?php else: ?>
  
  <style type="text/css"> 
    .error-block .error-text h2{ 
      font-size: 198px; 
    } 
  </style> 
 <section class="page-section-ptb"> 
  <div class="container"> 
             <div class="row justify-content-center"> 
                 <div class="col-lg-10 text-center"> 
                      <div class="error-block text-center clearfix"> 
                       <div class="error-text"> 
                         <h2>Required</h2> 
                       </div> 
                       <h1 class="theme-color mb-40">Login</h1> 
                       <p>This Page You Are Accessing Not visible For Visitors.</p> 
                    </div>    
                     <div class="error-info">
                      <?php $this->session->set_userdata('last_visied_page', uri_string()); ?>
                         <a class="button xs-mb-10" href="<?php echo base_url('login'); ?>">Login</a> 
                         <a class="button button-border black" href="<?php echo base_url(); ?>">back to home</a> 
                     </div> 
                 </div> 
             </div> 
         </div> 
 </section> 
 <?php endif; ?> 