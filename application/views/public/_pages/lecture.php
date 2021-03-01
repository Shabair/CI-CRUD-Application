
  <?php

    // load Pagination library
    $CI->load->library('pagination');
    // init params

    $limit_per_page = $CI->_limitPerPage;
    
    $start_index = ($CI->input->get('per_page')) ? $CI->input->get('per_page') : 0;
    $total_records = $lectureCount;
    
    if ($total_records > 0) 
    {
          
      $CI->db->select('*');  
      $CI->big_filter();
      $CI->db->where('active','1');  
      $CI->db->where('published','1'); 
      $CI->db->order_by('id','DESC');
      $CI->db->limit($limit_per_page, $start_index); 
      $lectures = $CI->db->get('lecture')->result_array();  

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


    // $currentTime = date('Y-m-d');  
    // $CI->db->select('*');  
    // $CI->db->where('end_date >=' , $currentTime);
    // if($search){
    //   $CI->db->like('title',$search);
    // } 
    // $CI->db->where('active','1');  
    // $CI->db->where('published','1');  
    // $lectures = $CI->db->get('lecture')->result_array();  
    
  ?>
    
    <!--=================================
 Blog-->
    <section class="blog blog-grid-2-sidebar white-bg page-section-ptb">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php $CI->load->view($CI->_sidebar); ?>
          </div>
          <!-- ========================== -->
          <div class="col-lg-9">
              <h3 class="page-heading-mb">All Lectures</h3>
            <div class="row">
            <?php if(!empty($lectures)): ?>
              <?php foreach ($lectures as $single) { ?> 
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="blog-entry mb-30">
                  <div class="entry-image clearfix">
                    <a href="<?php echo base_url('lecture/'.$single['slug']) ?>">
                      <div class="ps-collection">
                        <img class="img-fluid" src="<?php echo base_url('uploads/'.$single['thumbnail']) ?>" alt="">
                      </div>
                    </a>
                  </div>
                  <div class="blog-detail">
                    <div class="entry-title mb-10"> <a href="<?php echo base_url('lecture/'.$single['slug']) ?>"><?php echo $single['title'] ?></a>
                    </div>
                    <div class="entry-content">
                      <p><?php echo excerpt($single['excerpt']) ?></p>
                    </div>
                    <div class="entry-share clearfix">
                      <div class="entry-button"> <a class="button arrow" href="<?php echo base_url('lecture/'.$single['slug']) ?>">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            <?php else: ?>
            <h1 style="width: 100%;text-align: center;">Not Data</h1>
          <?php endif; ?>
            </div>
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