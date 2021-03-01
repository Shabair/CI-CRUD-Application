
  <?php

    // load Pagination library
    $CI->load->library('pagination');
    // init params

    $limit_per_page = $CI->_limitPerPage;
    
    $start_index = ($CI->input->get('per_page')) ? $CI->input->get('per_page') : 0;
    $total_records = $eventCount;
    
    if ($total_records > 0) 
    {
          
      $currentTime = date('Y-m-d'); 
      $CI->db->select('*');  
      $CI->big_filter();
      $CI->db->where('active','1');  
      $CI->db->where('published','1'); 
      $CI->db->order_by('id','DESC');
      $CI->db->limit($limit_per_page, $start_index); 
      $events = $CI->db->get('old_event')->result_array();  

      {
        // die($CI->_uriTarget);
        $configPag['base_url'] = $CI->_uriTarget;
        $configPag['total_rows'] = $total_records;
        $configPag['per_page'] = $limit_per_page;
        // $configPag["uri_segment"] = 3;
        $configPag['page_query_string'] = TRUE;//example.com/index.php?c=test&m=page&per_page=20
        // custom paging configuration
        $configPag['num_links'] = 5;
         
        $configPag['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $configPag['full_tag_close'] = '</ul>';
         
         
        $configPag['next_link'] = '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>';
        $configPag['next_tag_open'] = '<li class="page-item">';
        $configPag['next_tag_close'] = '</li>';

        $configPag['prev_link'] = '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>';
        $configPag['prev_tag_open'] = '<li class="page-item">';
        $configPag['prev_tag_close'] = '</li>';

        $configPag['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $configPag['cur_tag_close'] = '</span></li>';
          

        $configPag['num_tag_open'] = '<li class="page-item">';
            $configPag['num_tag_close'] = '</li>';
            $configPag['attributes'] = array('class' => 'page-link');
            // $configPag['attributes']['rel'] = FALSE;
        $CI->pagination->initialize($configPag);
      }
         
    }

    /*pagination end*/ 
    
  ?>
    
    <!--=================================
 Blog-->
    <section class="blog white-bg page-section-ptb">
      <div class="container">

<!--  -->




     <!--  -->   
        <div class="row">
          <div class="col-lg-3">
            <?php $CI->load->view($CI->_sidebar); ?>
          </div>
          <!-- ========================== -->
          <div class="col-lg-9">
            <h3 class="page-heading-mb">All Previous Events</h3>
            <?php foreach ($events as $single) { ?>    
              <div class="row  page-section-pb">  
               <div class="col-lg-5"  style="background-color:#0066c1;padding: 20px;">   
                 <div class="clearfix">   
                     <h4 class="text-white"><?php echo $single['title'] ?></h4>   
                     <p class="mb-20 text-white"><?php echo limit_text($single['excerpt'],130); ?>   
                     </p>    
                  </div>  
                  <ul class="addresss-info list-unstyled">   
                    <li>
                          <i class="fa fa-calendar-o"></i>Duration: <?php echo getDateFromDB($single['start_date']) ?> </i> TO <?php echo getDateFromDB($single['end_date']) ?>
                        </li>
                        <li>
                            <i class="fa fa-clock-o"></i>Timing: <?php echo ($single['start_time']) ?> </i> TO <?php echo ($single['end_time']) ?>
                        </li>  
                  </ul>
                  <div class="entry-share clearfix">
                    <div class="entry-button"> <a class="button arrow text-white" href="<?php echo base_url('old_event/'.$single['slug']) ?>">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                  </div> 
               </div> 
               <div class="col-lg-7 thumb-parent-cont">   
                 <div class="entry-image clearfix">
                  <div class="ps-collection">
                    <img class="img-fluid" src="<?php echo base_url('uploads/'.$single['thumbnail']) ?>" style="height: 228.3px;width: auto;" alt="">
                  </div>
                 </div>   
               </div>    
              </div>
            <?php } ?>
            <!-- ================================================ -->
            <div class="entry-pagination text-center">
              <nav aria-label="Page navigation example">
            <?php echo $CI->pagination->create_links(); ?>
              </nav>
            </div>
            <!-- ================================================ -->
          </div>
        </div>
      </div>
    </section>
    <!--=================================
 Blog-->


