<?php include '_parts/title.php'; ?>

<!--=================================
 Blog-->
<section class="blog blog-single white-bg page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <?php include 'sidebar.php'; ?>
      </div>
      <!-- ========================== -->
      <div class="col-lg-9">
        
        <!-- Content Starts From Here -->
        <?php echo ($content); ?>
        <!-- Content ENDs At Here -->
        <?php if(!empty($single['cat_id'])): ?>
          <div class="entry-share clearfix">
            <div class="tags">
              <h5>Category:</h5>
              <ul>
                <li><a href="<?php echo base_url('archive/'.$single['cat_slug']) ?>"><?php echo $single['cat_title'] ?></a>
                </li>
              </ul>
            </div>
          </div>
        <?php endif; ?>
        <!-- ================================================ -->
        <?php include '_parts/nextAndPrevious.php'; ?>
      </div>
      <!-- ================================================ -->
    </div>
  </div>
</section>
<!--=================================
 Blog-->