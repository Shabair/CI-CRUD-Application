
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
        <!-- Content Starts From Here -->
            <div class="blog-entry mb-10 clearfix">
              <div class="entry-image clearfix">
                <img class="img-fluid" src="<?php echo uploads_path($single['thumbnail']); ?>" alt="">
              </div>
              <div class="blog-detail">
                <div class="entry-meta mb-10">
                  <ul>
                    <li><i class="fa fa-calendar-o"></i>Duration: <?php echo getDateFromDB($single['start_date']) ?> </i> TO <?php echo getDateFromDB($single['end_date']) ?>
                    </li>
                    <li>
                      <i class="fa fa-clock-o"></i>Timing: <?php echo ($single['start_time']) ?> </i> TO <?php echo ($single['end_time']) ?>
                    </li>
                  </ul>
                </div>
                <div class="entry-content">
                  <?php echo ($content); ?>
                </div>
                <!-- gallery -->
                <?php if($single['gallery']): ?>
                 <div class="row mt-60">
                    <div class="col-lg-12 col-md-12">
                      <h4 class="mb-30">Gallery</h4>
                      <div class="isotope columns-4 popup-gallery">
                        <?php $gallery_imgs = explode(',',$single['gallery']); ?>
                        <?php foreach ($gallery_imgs as $gallery_img) { ?>
                          <div class="grid-item">
                              <div class="portfolio-item">
                               <img src="<?php echo get_thumbnail($gallery_img,'400','300'); ?>" alt="">
                                <a class="popup portfolio-img" href="<?php echo uploads_path($gallery_img); ?>"><i class="fa fa-arrows-alt"></i></a>
                              </div>
                           </div>
                        <?php } ?>
                      </div>
                    </div>
                 </div>
               <?php endif; ?>
                <!-- gallery -->
              </div>
              <?php share(); ?>
            </div>
        <!-- Content ENDs At Here -->

        <!-- ================================================ -->
        <div class="port-navigation clearfix">
          <?php if($referItems['previousItem']): ?>
          <div class="port-navigation-left float-left">
            <div class="tooltip-content-3" data-original-title="<?php echo $referItems['previousItem']['title'] ?>" data-toggle="tooltip" data-placement="right">
              <a href="<?php echo base_url($referItems['targetUrl'].'/'.$referItems['previousItem']['slug']); ?>">
                <div class="port-photo float-left">
                  <img src="<?php echo base_url('uploads/'.$referItems['previousItem']['thumbnail']); ?>" alt="">
                </div>
                <div class="port-arrow"> <i class="fa fa-angle-left"></i>
                </div>
              </a>
            </div>
          </div>
        <?php endif; ?>
        <?php if($referItems['nextItem']): ?>
          <div class="port-navigation-right float-right">
            <div class="tooltip-content-3" data-original-title="<?php echo $referItems['nextItem']['title'] ?>" data-toggle="tooltip" data-placement="left">
              <a href="<?php echo base_url($referItems['targetUrl'].'/'.$referItems['nextItem']['slug']); ?>">
                <div class="port-arrow float-left"> <i class="fa fa-angle-right"></i>
                </div>
                <div class="port-photo">
                  <img src="<?php echo base_url('uploads/'.$referItems['nextItem']['thumbnail']); ?>" alt="">
                </div>
              </a>
            </div>
          </div>
        <?php endif; ?>
        </div>
        <!-- ================================================ -->

        <!-- ================================================ -->
        <br/>

      </div>
      <!-- ================================================ -->
    </div>
  </div>
</section>
<!--=================================
 Blog-->