<?php
$cur_tab = $this->uri->segment(1)==''?'dashboard':$this->uri->segment(1);
$CI = &get_instance();
?>



<div id="sidebar"  class="nav-collapse ">
<!-- sidebar menu start-->
	<ul class="sidebar-menu" id="nav-accordion">


		<?php if($CI->ion_auth->is_admin()): ?>
		<li id="dashboard">
			<span><a href="<?php echo site_url('admin/dashboard'); ?>" ><span><i class="fa fa-dashboard"></i>Home</span></a></span>
		</li>
		<?php endif; ?>

		<?php if($CI->ion_auth->is_admin()): ?>
		<li id="academic">
			<span><a href="<?php echo site_url('admin/academic/'); ?>" ><span><i class="fa fa-file"></i>Academic</span></a></span>
		</li>
		<li id="record">
			<span><a href="<?php echo site_url('admin/record/'); ?>" ><span><i class="fa fa-file"></i>Record</span></a></span>
		</li>
		<?php else: ?>
		<?php endif; ?>
       <!--  <li id="drug_test" class="sub-menu">
			<a href="javascript:;" >
                <i class="fa fa-medkit"></i>
                <span>Drug Test</span>
			</a>
			<ul class="sub">
				<li>
					<a href="<?php echo site_url('drug'); ?>" ><span>Random</span></a>
				</li>
                <li>
					<a href="<?php echo site_url('sap'); ?>" ><span>SAP</span></a>
				</li>
                <li>
					<a href="<?php echo site_url('rtd'); ?>" ><span>Return To Duty</span></a>
				</li>
                <li>
					<a href="<?php echo site_url('fut'); ?>" ><span>Follow Up Testing</span></a>
				</li>
			</ul>
		</li> -->
	</ul>
	<!-- sidebar menu end-->
</div>
<script>
$('li#<?=$cur_tab?> a').addClass('active');
</script>
