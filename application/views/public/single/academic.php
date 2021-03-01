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
        
          <!-- ========================== -->
          
        <div class="blog-entry mb-10">
          <div class="entry-image clearfix"><!-- img size is 870*400 -->
            <img class="img-fluid" src="<?php echo uploads_path($single['thumbnail']) ?>" alt="">
          </div>
          <div class="blog-detail">
            <div class="entry-meta mb-10">
              <ul>
                <li> <i class="fa fa-user-o"></i>Taught By: <?php echo $single['taught_by'] ?> 
                </li>
                <li><i class="fa fa-clock-o"></i>Duration: <?php echo $single['duration'] ?>
                </li>
                <li><i class="fa fa-calendar-o"></i>Start Date: <?php echo $single['start_date'] ?>
                </li>
              </ul>
            </div>
            <div class="entry-content">
              <!-- Content Starts From Here -->
                <div class="row mt-30">
                  <div class="col-lg-12 col-md-12">
                    <div class="tab round nav-center">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active show" id="home-07-tab" data-toggle="tab" href="#home-07" role="tab" aria-controls="home-07" aria-selected="true"> <i class="fa fa-file-text"></i> Description</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" id="profile-07-tab" data-toggle="tab" href="#profile-07" role="tab" aria-controls="profile-07" aria-selected="false"><i class="fa fa fa-calendar-check-o"></i> Schedule </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" id="portfolio-07-tab" data-toggle="tab" href="#portfolio-07" role="tab" aria-controls="portfolio-07" aria-selected="false"><i class="fa  fa-clipboard"></i> Material </a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home-07" role="tabpanel" aria-labelledby="home-07-tab">
                          <?php echo ($content); ?>
                        </div>
                        <div class="tab-pane fade" id="profile-07" role="tabpanel" aria-labelledby="profile-07-tab">
                          <?php echo ($single['schedule']); ?>
                        </div>
                        <div class="tab-pane fade" id="portfolio-07" role="tabpanel" aria-labelledby="portfolio-07-tab">
                          <?php echo ($single['material']); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- Content ENDs At Here -->
            </div>
            <?php share(); ?>
          </div>
        </div>
          <!-- ================================================ -->
        
        <!-- ================================================ -->
        <?php //include '_parts/nextAndPrevious.php'; ?>
      </div>
      <!-- ================================================ -->
    </div>
  </div>
</section>
<!--=================================
 Blog-->