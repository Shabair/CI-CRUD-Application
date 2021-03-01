                  
         <!--=================================                 
                  Register-->

               <section class="white-bg page-section-ptb o-hidden">               
                 <div class="container">               
                   <div class="row">               
                     <div class="col-lg-12 col-md-12">               
                       <div class="section-title text-center">               
                        <img src="<?php echo base_url('uploads/admission_logo.jpg') ?>">
                         <h6 class="">Don't have an Account? Register Now.</h6>                
                         <h2 class="title-effect">Request For An Accounasxasxt</h2>                
                       </div>               
                     </div>               
                   </div>               
                   <div class="row justify-content-center">               
                     <div class="col-lg-8 col-md-10">               
                       <form id="register-form" class="register-form" action="auth/request_user" method="post">          
                       <?php if(!empty($courseId)){          
                        echo '<input type="hidden" value="'.$courseId.'" name="courseId">';          
                       } ?>          
                       <?php if(!empty($courseType)){          
                        echo '<input type="hidden" value="'.$courseType.'" name="courseType">';          
                       } ?>              
                         <div class="row">               
                           <div class="section-field col-md-6">               
                             <label for="first_name">Your Name*</label>               
                             <div class="field-widget">               
                                <?php  $first_name['class'] = 'form-control';?>          
                                <?php  $first_name['name'] = 'first_name';?>          
                                <?php  $first_name['id'] = 'first_name';?>          
                                <?php  $first_name['placeholder'] = 'Your Name';?>          
                                <?php echo form_input($first_name);?>          
                             </div>               
                           </div>               
                           <div class="section-field col-md-6">               
                             <label for="guardian_name">Father/Husband’s Name*</label>               
                             <div class="field-widget">               
                                <?php  $guardian_name['class'] = 'form-control';?>          
                                <?php  $guardian_name['name'] = 'guardian_name';?>          
                                <?php  $guardian_name['id'] = 'guardian_name';?>          
                                <?php  $guardian_name['placeholder'] = 'Father/Husband’s Name';?>          
                                <?php echo form_input($guardian_name);?>               
                             </div>               
                           </div>               
                         </div>            
                         <div class="row">               
                           <div class="section-field col-md-6">               
                             <label for="dob">Date Of Birth*</label>               
                             <div class="field-widget">               
                                <?php  $dob['class'] = 'form-control default-date-picker';?>          
                                <?php  $dob['name'] = 'dob';?>          
                                <?php  $dob['id'] = 'dob';?>          
                                <?php  $dob['placeholder'] = 'Date of Birth';?>          
                                <?php echo form_input($dob);?>          
                             </div>               
                           </div>               
                           <div class="section-field col-md-6">               
                             <label for="reference">Father/Husband’s Name*</label>               
                             <div class="field-widget">               
                                <?php  $reference['class'] = 'form-control';?>          
                                <?php  $reference['name'] = 'reference';?>          
                                <?php  $reference['id'] = 'reference';?>          
                                <?php  $reference['placeholder'] = 'Reference';?>          
                                <?php echo form_input($reference);?>               
                             </div>               
                           </div>               
                         </div>               
                         <div class="section-field">               
                           <label for="address">Address *</label>               
                           <div class="field-widget">               
                                <?php  $address['class'] = 'form-control';?>          
                                <?php  $address['name'] = 'address';?>          
                                <?php  $address['id'] = 'address';?>          
                                <?php  $address['type'] = 'text';?>          
                                <?php  $address['placeholder'] = 'Address';?>          
                                <?php echo form_input($address);?>                
                           </div>               
                         </div>              
                         <div class="row">          
                           <div class="section-field col-md-6">               
                             <label for="pre_education">Previous Education *</label>               
                             <div class="field-widget">               
                                  <?php  $pre_education['class'] = 'form-control';?>          
                                  <?php  $pre_education['name'] = 'pre_education';?>          
                                  <?php  $pre_education['id'] = 'pre_education';?>          
                                  <?php  $pre_education['type'] = 'text';?>          
                                  <?php  $pre_education['placeholder'] = 'Previous Education';?>          
                                  <?php echo form_input($pre_education);?>                
                             </div>               
                           </div>          
                           <div class="section-field col-md-6">               
                             <label for="pre_edu_from">From *</label>               
                             <div class="field-widget">               
                                  <?php  $pre_edu_from['class'] = 'form-control';?>          
                                  <?php  $pre_edu_from['name'] = 'pre_edu_from';?>          
                                  <?php  $pre_edu_from['id'] = 'pre_edu_from';?>          
                                  <?php  $pre_edu_from['type'] = 'text';?>          
                                  <?php  $pre_edu_from['placeholder'] = 'From';?>          
                                  <?php echo form_input($pre_edu_from);?>                
                             </div>               
                           </div>          
                         </div>          
                         <div class="row">          
                           <div class="section-field col-md-12">               
                             <label for="nic">ID card No (self/parent/gradient)</label>               
                             <div class="field-widget">               
                                  <?php  $nic['class'] = 'form-control';?>          
                                  <?php  $nic['name'] = 'nic';?>          
                                  <?php  $nic['id'] = 'nic';?>          
                                  <?php  $nic['type'] = 'text';?>          
                                  <?php  $nic['placeholder'] = 'ID card No (self/parent/gradient)';?>          
                                  <?php echo form_input($nic);?>                
                             </div>               
                           </div>          
                         </div>            
                         <div class="row">          
                           <div class="section-field col-md-6">               
                             <label for="email">Email *</label>               
                             <div class="field-widget">               
                                  <?php  $userEmail['class'] = 'form-control';?>          
                                  <?php  $userEmail['name'] = 'email';?>          
                                  <?php  $userEmail['id'] = 'email';?>          
                                  <?php  $userEmail['type'] = 'email';?>          
                                  <?php  $userEmail['placeholder'] = 'Enter your email';?>          
                                  <?php echo form_input($userEmail);?>                
                             </div>               
                           </div>               
                           <div class="section-field col-md-6">               
                             <label>Mobile phone *</label>               
                             <div class="field-widget">               
                                  <?php  $phone['class'] = 'phone form-control';?>          
                                  <?php  $phone['name'] = 'phone';?>          
                                  <?php  $phone['id'] = 'phone';?>          
                                  <?php  $phone['placeholder'] = 'Enter your mobile no';?>          
                                  <?php echo form_input($phone);?>           
                             </div>               
                           </div>          
                         </div>            
                         <div class="row">          
                           <div class="section-field col-md-6">               
                              <div
                                class="g-recaptcha"
                                data-sitekey="6LfISGwUAAAAADJRhxc1s_y87bAvghHIyA7VmUdw"
                                data-callback="YourOnSubmitFn">
                                  Submit
                              </div>              
                           </div>         
                         </div>          
                         <button type="submit" class="button mt-20" name="submit">Send Request <i class='fa fa-check'></i></button>           
                     </form>               
                   </div>               
                 </div>               
               </section>               
               <!--=================================                 
                  Register-->         
                          
                          
