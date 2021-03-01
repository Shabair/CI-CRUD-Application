      <!--=================================   
    contact-->   
       <section class="page-section-ptb">   
           <div class="row justify-content-center"><!-- mt-30 -->   
             <div class="col-md-10">   
               <div class="section-title text-center">   
                  
               <h2>Location of Our Campuses</h2>   
                  
             </div>   
             </div>   
           </div>   
         <div class="container">   
           <div class="row"> 
             <div class="col-lg-8" style="padding: 0px">
               <div style="width: 100%; height: 300px;" id="g-map" class="g-map" data-type='black' lat="31.446629" long="74.278028"></div>   
             </div>    
             <div class="col-lg-4"  style="background-color:#0066c1;padding: 20px;">   
               <div class="clearfix">   
                   <h6 class="text-white">Second Campus</h6>   
                   <h4 class="text-white">PIA Housing Society Lahore</h4>   
                   <p class="mb-20 text-white">It would be great to hear from you! If you got any questions, please do not hesitate to send us a message. We are looking forward to hearing from you! We reply within <span class="tooltip-content-2" data-original-title="Mon-Fri 10am–7pm (GMT +1)" data-toggle="tooltip" data-placement="top"> 24 hours!</span>   
                   </p>   
                   <ul class="addresss-info list-unstyled">   
                     <li><i class="ti-map-alt"></i>    
                       <p>Address: House#322, E Block</p>   
                     </li>   
                     <li><i class="ti-mobile"></i>Phone: +(92) 335-4515109 </li>   
                     <li><i class="ti-email"></i>Email: info@azzuhaa.org</li>   
                   </ul>   
                 </div>   
             </div>   
           </div>   
           <div class="row mt-30">   
             <div class="col-lg-4"  style="background-color:#0066c1;padding: 20px;">   
               <div class="clearfix">   
                   <h6 class="text-white">First Campus</h6>   
                   <h4 class="text-white">Model Town Link Road Lahore</h4>   
                   <p class="mb-20 text-white">It would be great to hear from you! If you got any questions, please do not hesitate to send us a message. We are looking forward to hearing from you! We reply within <span class="tooltip-content-2" data-original-title="Mon-Fri 10am–7pm (GMT +1)" data-toggle="tooltip" data-placement="top"> 24 hours!</span>   
                   </p>   
                   <ul class="addresss-info list-unstyled">   
                     <li><i class="ti-map-alt"></i>    
                       <p>Address: House#21-B, Phase 3,GECHS</p>   
                     </li>   
                     <li><i class="ti-mobile"></i>Phone: +(92) 323-8875305</li>   
                     <li><i class="ti-email"></i>Email: info@azzuhaa.org</li>   
                   </ul>   
                </div>   
             </div> 
             <div class="col-lg-8" style="padding: 0px">   
               <div style="width: 100%; height: 300px;" id="map-02" class="map-02" data-type='green' lat="31.469077" long="74.3154193"></div>   
             </div>    
           </div>   
         </div>   
       </section>   
       <!--=================================   
    contact -->    
      
       <!--=================================   
    contact -->   
     <section class="contact white-bg page-section-ptb pdt-0">     
      
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


<script type="text/javascript">
  var googlemapkey = "<?php echo get_block('google-map-key',true); ?>";
</script>