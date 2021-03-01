<?php include '_parts/title.php'; ?>
    <!--=================================
 single-portfolio-post-->
    <section class="single-portfolio-post white-bg page-section-ptb">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php $CI->load->view($CI->_sidebar); ?>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-lg-7">
                <div class="who-we-are-left port-singal">
                  <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                    <?php foreach (explode(',',$single['thumbnail']) as  $image) {
                    ?>
                    <div class="item">
                      <img src="<?php echo uploads_path($image) ?>" alt="">
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 port-information">
                <div class="port-title sm-mt-40">
                  <h3 class="mb-30"><?php echo $single['title']; ?></h3>
                </div>
                <div class="port-meta clearfix">
                  <ul class="list-unstyled">
                    <li><b>Date:</b><span><?php echo $single['start_date']; ?> </span>
                    </li>
                    <li><b>Location:</b><span><?php echo $single['location']; ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
              <!--=================================-->
              <div class="row">
                <div class="col-lg-12">
                  <div class="port-info mt-10 mb-30">
                    <?php echo $content; ?>
                  </div>
                </div>
              </div>
              <div class="blog-entry mb-10">
                <div class="blog-detail">
                  <?php share(); ?>
                </div>
              </div>
          </div>
        </div>
        <!--=================================-->
      </div>
    </section>
    <!--=================================
 single-portfolio-post-->