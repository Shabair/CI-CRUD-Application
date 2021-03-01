  <?php 


    // load Pagination library
    $CI->load->library('pagination');
    // init params
    $limit_per_page = $CI->_limitPerPage;

    $start_index = ($CI->input->get('per_page')) ? $CI->input->get('per_page') : 0;

  ?>  
      
  <?php 

    $sql = "SELECT p.`id` id,p.`slug`  slug,p.`title` title,p.`content` content FROM `category`  as `p` WHERE p.`active` = '1' AND p.`category` = 'video'  ORDER BY p.`id` DESC ";//limit 8   
    
    $categories = $CI->db->query($sql)->result_array();

    $selectedPlaylist = $CI->input->get('playlist');   
    
    $selectedPlaylistId = getIdFromSlug('category',$selectedPlaylist);

    for($i = 0;$i<2;$i++):

      $this->db->select('video.*');
      $this->db->from('video');

      if($selectedPlaylist){
        $this->db->join('category', 'category.id = video.category'); 
        $this->db->where('video.category',$selectedPlaylistId);
      }

      $CI->big_filter();

      $CI->db->where('video.active','1');    
      $CI->db->where('video.published','1');
      if($i){
        $CI->db->order_by('video.id','DESC');
        $CI->db->limit($limit_per_page, $start_index);
        $videos = $this->db->get()->result_array();
      }else{
        $total_records =  $this->db->count_all_results();
      }
    endfor;
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
      ?>

<section class="page-section-pt">   
  <div class="container"> 
    <div class="section-title text-center" style="margin-bottom: 30px;">
      <p>Please click on the drop down menu to see the list of our complete video collection. You can view the video by clicking on its image or title .</p>
    </div>

     <!--=================================
     blog -->
    <section class="blog blog-grid-2-sidebar white-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php $CI->load->view($CI->_sidebar); ?>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-lg-12 col-md-12" style="margin-bottom:20px;"> 
                
                <select class="selectpicker" data-width="100%" id="playlist" data-style="btn-primary" ><!-- data-live-search="true" -->
                  <option value="recent">Recent</option>
                  <?php foreach ($categories as  $single): ?>
                  <option value="<?php echo $single['slug'] ?>" data-subtext="<?php echo $single['content'] ?>" <?php echo ($selectedPlaylist == $single['slug'])?'selected':''; ?>><?php echo $single['title'] ?></option>
                   <?php endforeach ?> 
                </select>
              </div>
              <?php if(count($videos)): ?>
              <?php foreach($videos as $video): ?>
                <div class="col-md-6 pb-30">
                   <div class="blog-box blog-2 blog-border">
                      <div class="popup-video-image border-video popup-gallery">
                        <img class="img-fluid" src="<?php echo $CI->_baseUrl.'uploads/'.$video['thumbnail']; ?>" alt="">
                          <a class="popup-youtube" href="https://www.youtube.com/watch?v=<?php echo $video['url']; ?>"> <i class="fa fa-play"></i> </a>
                      </div> 
                      <div class="blog-info">
                        <h4> <a href="<?php echo $CI->_baseUrl.'video/'.$video['slug']; ?>"><?php echo $video['title']; ?></a></h4>  
                        <p><?php echo excerpt($video['excerpt']); ?></p>  
                        <a class="button arrow" href="<?php echo $CI->_baseUrl.'video/'.$video['slug']; ?>">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>        
                      </div>           
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
              <div class="col-md-12" style="text-align: center;">
                <h1 class="fw-7 mb-30">Empty playlist</h1>
              </div>
            <?php endif; ?>
            </div>

            <!-- ================================================ -->
            <div class="entry-pagination text-center" style="margin-top: 25px;">
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
    blog -->      
  </div>   
</section>




<script type="text/javascript">
  $(document).ready(function(){

    $("#playlist").on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
      var id = $(this).val();
      if(id == 'recent'){
        location.href = base_url+"video";
      }else{
        location.href = base_url+"video?playlist="+id;

      }
    });
  });

</script>
