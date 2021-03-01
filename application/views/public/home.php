
    <!--=================================
 rev-slide -->
    <section class="rev-slider">
      <div id="rev_slider_271_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="webster-slider-5" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.6.3 auto mode -->
        <div id="rev_slider_271_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.3">
          <ul>
            <!-- SLIDE  -->
            <?php foreach ($slider as $single) { ?>
            
            <li data-index="rs-<?php echo $single['id'];?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="<?php echo uploads_path($single['thumbnail']); ?>" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
              <!-- MAIN IMAGE -->
              <img src="<?php echo uploads_path($single['thumbnail']); ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
              <!-- LAYERS -->
              <?php echo ($single['content']) ?>
              <?php echo ($single['content2']) ?>
              <?php echo ($single['button']) ?>
            </li>
          <?php } ?>
          </ul>
          <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
      </div>
    </section>
    <!--=================================
 banner -->
 
<!--=================================
owl carousel -->
 
 <section class="page-section-pt video-slider">
   <div class="container">
     <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="title mb-30">
            <h3 class="mb-20">Latest Videos<span class="pull-right my-text-color"><a href="<?php echo base_url('video'); ?>"><button class="home-btn home-btn-3 home-btn-3e home-icon-arrow-right">View All</button></a></span></h3>
          </div>
          <div class="owl-carousel" data-nav-dots="false" data-nav-arrow="true" data-items="4" data-sm-items="3" data-lg-items="4" data-md-items="4" data-xs-items="3" data-autoplay="false" data-loop="false">
            <?php foreach ($video as $single) { ?>
            
            <div class="item">
              <div class="blog-box blog-2 blog-border">          
                <div class="popup-video-image border-video popup-gallery">
                  <img class="img-fluid" src="<?php echo uploads_path($single['vthumbnail']); ?>" alt="">
                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=<?php echo $single['vurl'] ?>"> <i class="fa fa-play"></i> </a>
                </div> 
                <div class="blog-info" style="text-align: center;"><!-- 
                  <span class="tag"><a href="<?php base_url($single['pslug']); ?>"><?php echo ($single['ptitle'])?$single['ptitle']:'No Category' ?></a></span> -->
                  <h4> <a href="<?php echo $CI->_baseUrl,'video/',$single['vslug']; ?>"><?php echo $single['vtitle'] ?></a></h4>
                  <?php if(($single['vlastupdate']) == 0): ?>
                  <span><i><?php echo time_ago($single['vcreated']); ?></i></span> 
                  <?php else: ?>
                  <span><i>updated: <?php echo time_ago($single['vlastupdate']); ?></i></span> 

                  <?php endif; ?>       
                </div>           
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
     </div>
   </div>
 </section>
  
<!--=================================
owl carousel -->



 
<!--=================================
 special-feature --> 

<section class="position-relative page-section-pt"  style="padding-bottom: 60px;">
   <div class="container">
   <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h3>Courses<span class="pull-right my-text-color"><a href="<?php echo base_url('course'); ?>"><button class="home-btn home-btn-3 home-btn-3e home-icon-arrow-right">View All</button></a></span></h3>
        </div>
      </div>
    </div>
     <div class="row">
      <?php $count = 0; ?>
      <?php foreach ($course as $single) { ?>
        <?php $count++; ?>
        <div class="col-md-4 xs-mb-40" <?php echo ($count > 3)?'style="margin-top: 20px;"':''; ?>>
          <div class="feature-box h-100">
            <div class="feature-box-content">
            <h4><?php echo $single['title'] ?></h4>
            <p><?php echo mb_strimwidth($single['excerpt'], 0, 200, "..."); ?></p>
            </div>
            <a href="<?php echo $CI->_baseUrl.'course/'.$single['id'] ?>" class="read-more">Read more</a>
            <div class="feature-box-img" style="background-image: url('<?php echo uploads_path($single['thumbnail']); ?>');"></div>
            <span class="feature-border"></span>
          </div>
        </div>
      <?php } ?>
       </div>
   </div> 
</section>

<!--=================================
 special-feature --> 





    <!--=================================
 tab -->

    <section class="marketing-tab page-section-ptb   white-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="tab tab-vertical tab-border position-relative">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" id="who-are-tab" data-toggle="tab" href="#who-are" role="tab" aria-controls="who-are" aria-selected="true"> <i class="fa fa-home"></i> Academic</a>
                </li>
                <li class="nav-item"> <a class="nav-link" id="our-history-tab" data-toggle="tab" href="#our-history" role="tab" aria-controls="our-history" aria-selected="false"><i class="fa fa-check-square-o"></i> Events </a>
                </li>
                <li class="nav-item"> <a class="nav-link" id="our-asd-tab" data-toggle="tab" href="#our-asd" role="tab" aria-controls="our-history" aria-selected="false"><i class="fa fa-check-square-o"></i> Recent Events </a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="who-are" role="tabpanel" aria-labelledby="who-are-tab">
                  <div class="row">
                    <div class="col-lg-8 sm-mb-30 thumb-parent-cont" >
                      <div class="ps-collection">
                        <img class="img-fluid" src="<?=get_block('home-academic-image',true); ?>" style="height: 233px;width: auto;">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <h4 class="mb-20">Academic Courses </h4>
                      <ul class="list list-mark">
                        <?php foreach ($academic as $value) { 

                          echo '<li><a href="'.base_url('academic/'.$value['slug']).'" style="color:#333">'.$value['title'].'</a></li>';

                        } ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="our-history" role="tabpanel" aria-labelledby="our-history-tab">
                  <div class="row">
                    <div class="col-lg-8 sm-mb-30  thumb-parent-cont">
                      <div class="ps-collection">
                        <img class="img-fluid" src="<?=get_block('home-event-image',true); ?>" style="height: 233px;width: auto;">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <h4 class="mb-20">Events List</h4>
                      <ul class="list list-mark">
                        <?php foreach ($event as $value) { 

                          echo '<li><a href="'.base_url('event/'.$value['slug']).'" style="color:#333">'.$value['title'].'</a></li>';

                        } ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="our-asd" role="tabpanel" aria-labelledby="our-asd-tab">
                  <div class="row">
                    <div class="col-lg-8 sm-mb-30  thumb-parent-cont">
                      <div class="ps-collection">
                        <img class="img-fluid" src="<?=get_block('home-old-event-image',true); ?>" style="height: 233px;width: auto;">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <h4 class="mb-20">Events List</h4>
                      <ul class="list list-mark">
                        <?php foreach ($old_event as $value) { 

                          echo '<li><a href="'.base_url('event/'.$value['slug']).'" style="color:#333">'.$value['title'].'</a></li>';

                        } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




    <!--=================================
 tab -->



<!--=================================
Testimonial --> 




<!--=================================
 portfolio -->

<section class="portfolio-home gray-bg o-hidden">
 <div class="container-fluid p-0"> 
   <div class="row">
      <div class="col-lg-4">
        <div class="portfolio-title section-title">
            <h2>Welfare Projects</h2>
            <p class="mb-20">Work on the best projects for the best clients. Our clients are some of the most forward-looking companies in the world.</p>
            <span>Webster has powerful options & tools, unlimited designs, responsive framework and amazing support. We are dedicated to providing you with the best experience possible. Purchase webster to find out why the sky's the limit when using Webster.</span>
            <a class="button mt-30" href="<?php echo base_url('welfare') ?>"> See all projects </a>
          </div>
          <div>
        </div>
      </div>
      <div class="col-lg-8">
         <div class="isotope popup-gallery columns-3 no-padding">
          <?php foreach ($welfare as $single) { ?>
            <div class="grid-item">
              <div class="portfolio-item">
                <?php $var = explode(',', $single['thumbnail']) ?>
                 <img src="<?=uploads_path('/525x393//'.$var[0]) ?>" alt="">
                  <div class="portfolio-overlay">
                      <h4 class="text-white"> <a href="<?php echo base_url('welfare/'.$single['slug']) ?>"><?php echo $single['title'] ?></a> </h4>
                      <!-- <span class="text-white"> <a href="#"> Photography  </a>| <a href="#">Ecommerce </a> </span> -->
                 </div>
               </div>
            </div>
          <?php } ?>
         </div>
      </div>
   </div>
 </div>
</section>  
 
<!--=================================
 portfolio -->


<!--=================================
Testimonial  -->
<!-- style="background-image: url(<?=$this->_assetsPath ?>images/bg/08.jpg);" -->
<section class="page-section-ptb pos-r bg-overlay-black-70 parallax" data-jarallax='{"speed": 0.6}'>
  <div class="container">
      <div class="row">
       <div class="col-lg-12 col-md-12">
         <div class="section-title text-center">
            <h2 class="text-white title-effect">Latest News/Message From Azzuhaa</h2>
          </div>
       </div> 
   </div>
     <div class="row">
      <div class="col-lg-12 col-md-12">
      <div class="testimonial-center">
        <div class="owl-carousel bottom-nav" data-nav-arrow="true" data-items="1" data-lg-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
      <?php foreach ($news as $single) { ?>
        <div class="item">
          <div class="testimonial text-white clean">
            <div class="testimonial-avatar"> <img alt="" src="<?php echo uploads_path($single['thumbnail']); ?>"> </div>
            <div class="testimonial-info"><?php echo $single['excerpt'] ?></div>
            <!-- <div class="author-info"> <strong>15Twelve - <span>ThemeForest user</span></strong> </div> -->
          </div>
        </div>
      <?php } ?>
      </div>  
     </div>
    </div>
   </div>
  </div>
</section>       



       <!--=================================   
    contact -->   
     <section class="contact white-bg page-section-ptb">
           <div class="row justify-content-center text-center">   
             <div class="col-md-8">   
               <div class="section-title">   
                 <h6>Have Any Question?</h6>   
                 <h2>Contact Us</h2>   
                 <p class="mb-30 fs-13">It would be great to hear from you! If you got any questions, please do not hesitate to send us a message. We are looking forward to hearing from you! We will reply you <span class="tooltip-content-2" data-original-title="Mon-Fri 10am–7pm (GMT +1)" data-toggle="tooltip" data-placement="top"> soon!</span></p>     
               </div>   
             </div>   
           </div>   
       <div class="container">     
         <div class="row">     
           <div class="col-lg-12 text-center">      
           </div>     
          </div>     
       <div class="row">     
         <div class="col-sm-12">     
              <div id="formmessage">Success/Error Message Goes Here</div>     
                <form id="contactform" role="form" method="post" action="<?php echo base_url('home/contact_us_mail'); ?>">     
                 <div class="contact-form clearfix">     
                    <div class="section-field">     
                      <input id="name" type="text" placeholder="Name*" class="form-control"  name="name">     
                  </div>      
                    <div class="section-field">     
                      <input type="email" placeholder="Email*" class="form-control" name="email">     
                   </div>     
                     <div class="section-field">     
                       <input type="text" placeholder="Phone*" class="form-control" name="phone">     
                   </div>     
                      <div class="section-field textarea">     
                        <textarea class="form-control input-message" placeholder="Comment*" rows="7" name="message"></textarea>     
                      </div>     
                   <div class="g-recaptcha section-field clearfix" data-sitekey="[Add your site key]"></div>     
                    <div class="section-field submit-button">     
                     <input type="hidden" name="action" value="sendEmail"/>     
                    <button id="submit" name="submit" type="submit" value="Send" class="button"> Send your message </button>     
                    </div>     
                   </div>     
               </form>     
               <div id="ajaxloader" style="display:none"><img class="mx-auto mt-30 mb-30 d-block" src="<?php echo base_url('assets/') ?>/images/pre-loader/loader-02.svg" alt=""></div>      
           </div>     
       </div>     
       </div>     
     </section>     
          
     <!--=================================     
      contact-->     


