 
<style type="text/css">
  .audio-download{
        float: right;
    font-size: 22px;
  }
  .all_audios .item{
    margin-bottom: 45px;
  }
</style>
<?php if($CI->ion_auth->logged_in()): ?>   
  <?php 


    // load Pagination library
    $CI->load->library('pagination');
    // init params
    $limit_per_page = $CI->_limitPerPage;

    $start_index = ($CI->input->get('per_page')) ? $CI->input->get('per_page') : 0;

  ?>
      <?php  

        $sql = "SELECT p.`id` id,p.`slug`  slug,p.`title` title,p.`content` content FROM `category`  as `p` WHERE p.`active` = '1' AND p.`category` = 'audio'  ORDER BY p.`id` DESC ";//limit 8   
      
        $categories = $CI->db->query($sql)->result_array(); 

        $selectedPlaylist = $CI->input->get('playlist');

        $selectedPlaylistId = getIdFromSlug('category',$selectedPlaylist);
        
      for($i = 0;$i<2;$i++):

        $this->db->select('audio.*');
        $this->db->from('audio');

        if($selectedPlaylist){
          $this->db->join('category', 'category.id = audio.category'); 
          $this->db->where('audio.category',$selectedPlaylistId);
        }

        $CI->big_filter();

        $CI->db->where('audio.active','1');    
        $CI->db->where('audio.published','1');
        if($i){
          $CI->db->order_by('audio.id','DESC');
          $CI->db->limit($limit_per_page, $start_index);
          $audios = $this->db->get()->result_array();
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
    <div class="section-title text-center"  style="margin-bottom: 30px;">
      <p>Please click on the drop down menu to see the list of our complete video collection. You can view the video by clicking on its image or title .</p>
    </div>
    <!--=================================
    blog -->
    <section class="blog blog-grid-2-sidebar white-bg  all_audios">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php $CI->load->view($CI->_sidebar); ?>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-lg-12 col-md-12" style="margin-bottom:20px;"> 
                <select class="selectpicker" data-style="btn-primary" data-width="100%" id="playlist"><!-- data-live-search="true" -->
                  <option value="recent">Recent</option>
                  <?php foreach ($categories as  $single): ?>
                  <option value="<?php echo $single['slug'] ?>" data-subtext="<?php echo $single['content'] ?>" <?php echo ($selectedPlaylist == $single['slug'])?'selected':''; ?>><?php echo $single['title'] ?></option>
                   <?php endforeach ?> 
                </select>    
              </div>
                <?php if(count($audios)): ?>
                  <?php foreach ($audios as  $data): ?> 
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="blog-entry mb-50">
                        <div class="item">
                          <div class="product">
                            <div class="product-image">
                              <audio controls style="width:100%;" controlsList="nodownload"> 
                                <source src="<?php echo uploads_path($data['audio']); ?> " type="audio/mp3"> 
                                <source src="<?php echo uploads_path($data['audio']); ?> " type="audio/ogg"> 
                                <source src="<?php echo uploads_path($data['audio']); ?> " type="audio/mpeg"> 
                              </audio> 
                            </div> 
                            <div class="product-des"> 
                              <div class="product-title"> <a href="<?php echo base_url('audio/'.$data['slug']); ?>"><?php echo $data['title'] ?></a> <a href="<?php echo uploads_path($data['audio']); ?> " download><i class="fa fa-download audio-download"></i></a>
                              </div> 
                    
                    
                              <?php if(($data['last_update']) == 0): ?> 
                                <span><i><?php echo time_ago($data['created']); ?></i></span>  
                              <?php else: ?> 
                                <span><i>updated: <?php echo time_ago($data['last_update']); ?></i></span>  
                              <?php endif; ?> 
                    
                    
                            </div> 
                          </div> 
                        </div>
                      </div>
                    </div> 
                  <?php endforeach ?> 
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
        location.href = base_url+"audio";
      }else{
        location.href = base_url+"audio?playlist="+id;

      }
    });
  });

</script>





 <?php else: ?> 
  <style type="text/css"> 
    .error-block .error-text h2{ 
      font-size: 198px; 
    } 
  </style> 
 <section class="page-section-ptb"> 
  <div class="container"> 
             <div class="row justify-content-center"> 
                 <div class="col-lg-10 text-center"> 
                      <div class="error-block text-center clearfix"> 
                       <div class="error-text"> 
                         <h2>Required</h2> 
                       </div> 
                       <h1 class="theme-color mb-40">Login</h1> 
                       <p>This Page You Are Accessing Not visible For Visitors.</p> 
                    </div>    
                     <div class="error-info">
                      <?php $this->session->set_userdata('last_visied_page', uri_string()); ?>
                         <a class="button xs-mb-10" href="<?php echo base_url('login'); ?>">Login</a> 
                         <a class="button button-border black" href="<?php echo base_url(); ?>">back to home</a> 
                     </div> 
                 </div> 
             </div> 
         </div> 
 </section> 
 <?php endif; ?> 












