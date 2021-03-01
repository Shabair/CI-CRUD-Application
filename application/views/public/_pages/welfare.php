
  <?php

    // load Pagination library
    $CI->load->library('pagination');
    // init params

    $limit_per_page = $CI->_limitPerPage;
    
    $start_index = ($CI->input->get('per_page')) ? $CI->input->get('per_page') : 0;
    $total_records = $welfareCount;
    
    if ($total_records > 0) 
    {
          
      $CI->db->select('*');  
      $CI->big_filter();
      $CI->db->where('active','1');  
      $CI->db->where('published','1'); 
      $CI->db->order_by('id','DESC');
      $CI->db->limit($limit_per_page, $start_index); 
      $welfare = $CI->db->get('welfare')->result_array();  

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
    
  ?>



<style type="text/css">
  .bottom-center-dots .owl-dots {
    bottom: 9px !important;
    position: absolute;
}
</style>      
<section class="blog blog-grid-2-sidebar white-bg page-section-ptb">
    <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php $CI->load->view($CI->_sidebar); ?>
          </div>
          <div class="col-lg-9">
              <h3 class="page-heading-mb">All Welfare Projects</h3>
            <div class="row">
            <?php if(!empty($welfare)): ?>
                <?php foreach ($welfare as $single) { ?>  
                    <div class="col-lg-6 col-md-6 col-sm-6  pb-30">
                      <div class="blog-box blog-2 blog-border">
                        <div class="entry-image clearfix">
                          <div class="owl-carousel bottom-center-dots" data-nav-dots="ture" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                            <?php $allThumbnails = explode(',', $single['thumbnail']) ?>
                            <?php foreach($allThumbnails as $thumbnail): ?>
                              <div class="item">
                                <a href="<?php echo base_url('welfare/'.$single['slug']) ?>">
                                  <div class="ps-collection">
                                    <img class="img-fluid" src="<?php echo base_url('uploads/'.$thumbnail) ?>" alt="">
                                  </div>
                                </a>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                        <div class="blog-info">
                          <h4 class="text-back"><a href="<?php echo base_url('welfare/'.$single['slug']) ?>"><?php echo $single['title'] ?></a></h4>
                          <p><?php echo excerpt($single['excerpt']) ?></p>
                          <div class="entry-button"> <a class="button arrow" href="<?php echo base_url('welfare/'.$single['slug']) ?>">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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