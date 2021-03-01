                  
         <!--=================================                 
                  Register-->               
               <section class="white-bg page-section-ptb o-hidden" style="padding-top: 20px;">               
                 <div class="container">  
                 <?php if($CI->session->flashdata('message')): ?>             
                   <div class="row">               
                     <div class="col-lg-12 col-md-12">               
                       <div class="section-title text-center"> 
                        <section class="mb-80">
                          <div class="container">
                            <div class="row">
                             <div class="col-lg-12 col-md-12">
                              <div class="action-box theme-bg">
                                <div class="text-center">
                                 <h3>Succcessfully Registered!<br />
                                                You Will be Contacted by them as soon as possible.   </h3>
                                 </div>
                            </div>
                            </div>
                          </div>
                          </div>
                        </section>
                       </div>               
                     </div>               
                   </div>
                   <?php endif; ?>              
                   <div class="row">               
                     <div class="col-lg-12 col-md-12">               
                       <div class="section-title text-center"> 
                         <h2>Affiliated with Wifaq-ul-Mdaris</h2>                
                       </div>               
                     </div>               
                   </div>               
                   <div class="row justify-content-center">               
                     <div class="col-lg-8 col-md-10">               
                       <form id="register-form" class="register-form" action="" method="post">          
                       <?php if(!empty($courseId)){          
                        echo '<input type="hidden" value="'.$courseId.'" name="courseId">';          
                       } ?>          
                       <?php if(!empty($courseType)){          
                        echo '<input type="hidden" value="'.$courseType.'" name="courseType">';          
                       } ?>              
                         <div class="row">               
                           <div class="section-field col-md-6">               
                             <label for="first_name">Your Name* <?php echo field_error('first_name'); ?></label>               
                             <div class="field-widget">   
                                <?php  $first_name['class'] = 'form-control';?>          
                                <?php  $first_name['name'] = 'first_name';?>          
                                <?php  $first_name['id'] = 'first_name';?>          
                                <?php  $first_name['data-validation'] = 'custom';?>          
                                <?php  $first_name['data-validation-regexp'] = '^[a-zA-Z\s]{3,20}$';?>          
                                <?php  //$first_name['placeholder'] = 'Your Name';?>
                                <?php  $first_name['value'] = set_value('first_name');?>          
                                <?php echo form_input($first_name);?>          
                             </div> 
                           </div>               
                           <div class="section-field col-md-6">               
                             <label for="guardian_name">Father/Husband’s Name* <?php echo field_error('guardian_name'); ?></label>               
                             <div class="field-widget">               
                                <?php  $guardian_name['class'] = 'form-control';?>          
                                <?php  $guardian_name['name'] = 'guardian_name';?>          
                                <?php  $guardian_name['id'] = 'guardian_name';?>          
                                <?php  $guardian_name['data-validation'] = 'custom';?>          
                                <?php  $guardian_name['data-validation-length'] = 'min3';?>          
                                <?php  $guardian_name['data-validation-regexp'] = '^[a-zA-Z\s]{3,20}$';?> 

                                <?php  $guardian_name['value'] = set_value('guardian_name');?>          
                                <?php echo form_input($guardian_name);?>               
                             </div>               
                           </div>               
                         </div>            
                         <div class="row">             
                           <div class="section-field col-md-6">               
                             <label>Mobile phone * <?php echo field_error('phone'); ?></label>               
                             <div class="field-widget">               
                                  <?php  $phone['class'] = 'phone form-control';?>          
                                  <?php  $phone['name'] = 'phone';?>          
                                  <?php  $phone['id'] = 'phone';?>          
                                <?php  $phone['value'] = set_value('phone');?>        
                                  <?php echo form_input($phone);?>           
                             </div>               
                           </div>               
                           <div class="section-field col-md-6">               
                             <label for="dob">Date Of Birth* <?php echo field_error('dob'); ?></label>               
                             <div class="field-widget">               
                                <?php  $dob['class'] = 'form-control default-date-picker';?>          
                                <?php  $dob['name'] = 'dob';?>          
                                <?php  $dob['id'] = 'dob';?>          
                                <?php  $dob['value'] = set_value('dob');?>         
                                <?php  $dob['data-date-end-date'] = '0d';?>         
                                <?php echo form_input($dob);?>          
                             </div>               
                           </div>               
                         </div>               
                         <div class="section-field">               
                           <label for="address">Address * <?php echo field_error('address'); ?></label>               
                           <div class="field-widget">               
                                <?php  $address['class'] = 'form-control';?>          
                                <?php  $address['name'] = 'address';?>          
                                <?php  $address['id'] = 'address';?>          
                                <?php  $address['type'] = 'text';?>          
                                <?php  $address['data-validation'] = 'length alphanumeric';?>
                                <?php  $address['data-validation-allowing'] = '-_ ';?>
                                <?php  $address['data-validation-length'] = '3-150';?>  
                                <?php  $address['value'] = set_value('address');?>        
                                <?php echo form_input($address);?>                
                           </div>               
                         </div>               
                         <div class="section-field">               
                           <label for="campus">Preferred Campus * <?php echo field_error('campus'); ?></label>               
                           <div class="field-widget">               
                                <select name="campus" class="form-control" style="height: 47px;" id="campus">
                                  <option value="" >Select Campus</option>
                                  <option value="pia_cam" <?php echo (set_value('campus') == 'pia_cam')?'selected':''; ?>>PIA Main Campus</option>
                                  <option value="mt_cam" <?php echo (set_value('campus') == 'mt_cam')?'selected':''; ?>>Model Town Campus</option>
                                </select>               
                           </div>               
                         </div>              
                         <div class="row">          
                           <div class="section-field col-md-6">               
                             <label for="pre_education">Qualifiation * <?php echo field_error('pre_education'); ?></label>               
                             <div class="field-widget">               
                                  <?php  $pre_education['class'] = 'form-control';?>          
                                  <?php  $pre_education['name'] = 'pre_education';?>          
                                  <?php  $pre_education['id'] = 'pre_education';?>          
                                  <?php  $pre_education['type'] = 'text';?>          
                                <?php  $pre_education['value'] = set_value('pre_education');?>         
                                  <?php echo form_input($pre_education);?>                
                             </div>               
                           </div>          
                           <div class="section-field col-md-6">               
                             <label for="pre_edu_from">Institute Name* <?php echo field_error('pre_edu_from'); ?></label>               
                             <div class="field-widget">               
                                  <?php  $pre_edu_from['class'] = 'form-control';?>          
                                  <?php  $pre_edu_from['name'] = 'pre_edu_from';?>          
                                  <?php  $pre_edu_from['id'] = 'pre_edu_from';?>          
                                  <?php  $pre_edu_from['type'] = 'text';?>          
                                <?php  $pre_edu_from['value'] = set_value('pre_edu_from');?>         
                                  <?php echo form_input($pre_edu_from);?>                
                             </div>               
                           </div>          
                         </div>          
                         <div class="row">          
                           <div class="section-field col-md-12">               
                             <label for="nic">ID card No (self/parent/guardian) <?php echo field_error('nic'); ?></label>               
                             <div class="field-widget">               
                                  <?php  $nic['class'] = 'form-control';?>          
                                  <?php  $nic['name'] = 'nic';?>          
                                  <?php  $nic['id'] = 'nic';?>          
                                  <?php  $nic['type'] = 'text';?>          
                                <?php  $nic['value'] = set_value('nic');?>          
                                  <?php echo form_input($nic);?>                
                             </div>               
                           </div>          
                         </div>            
                         <div class="row">          
                           <div class="section-field col-md-6">               
                             <label for="email">Email * <?php echo field_error('email'); ?></label>               
                             <div class="field-widget">               
                                  <?php  $userEmail['class'] = 'form-control';?>          
                                  <?php  $userEmail['name'] = 'email';?>          
                                  <?php  $userEmail['id'] = 'email';?>          
                                  <?php  $userEmail['type'] = 'email';?>    
                                <?php  $userEmail['data-validation'] = 'email';?>          
                                <?php  $userEmail['data-validation-length'] = '3-10';?>       
                                <?php  $userEmail['value'] = set_value('email');?>       
                                  <?php echo form_input($userEmail);?>                
                             </div>               
                           </div>            
                         </div>            
                         <div class="row" style="padding-top: 20px;">          
                           <div class="section-field col-md-6">   
                              <?php echo field_error('g-recaptcha-response'); ?>            
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