<!-- block start-->
<style type="text/css">

.fa-close{
    color: #FF0000;
    font-size: 13px;

}

</style>
<link href="<?php echo base_url('assets/js/summernote-master/dist') ?>/summernote.css" rel="stylesheet">
<script src='<?php echo base_url('assets/js/summernote-master/dist') ?>/summernote.min.js'></script>
<!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet"> -->
  <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> -->
<!-- <script src='<?php echo base_url('assets/js/tinymce/') ?>/jquery.tinymce.min.js'></script>
<script src='<?php echo base_url('assets/js/tinymce/') ?>/tinymce.min.js'></script>
<script type="text/javascript">
    
  tinymce.init({
    selector: '#content'
  });
  </script> -->

<?php 
    if(isset($item_detail['id'])){
        $id=$item_detail['id'];
        set_data($item_detail);
    }else{
        $id='';
    } 

?>

<style>
	.fileupload{
		display:none;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			<?php if($id == ''){?>
				<h4 class="head3" style="display:inline-block">Add New Block</h4>
			<?php } else {?>
				<h4 class="head3" style="display:inline-block">Update Block</h4>
			<?php }?>
			
				<a href="<?php echo site_url('admin/block') ?>" class="btn btn-primary pull-right">View Blocks List</a>
			</header>
			<div class="panel-body">
				<div class="alert alert-success" id="success" style="display:none;"></div>
				<div class=" form">
                	<form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/block/'.((!empty($id))?'edit':'add').'/'.$id); ?>">
                        <input type="hidden" name="action_token" value="<?php echo $action_token; ?>">
                        <header class="panel-heading tab-bg-dark-navy-blue " <?php echo  (get_data('deactive') == 1)?"style='background:#ED5252;'":'';?> >
                        	<ul class="nav nav-tabs" style="height: 42px">

                        	</ul>
                        </header>
                        <div class="panel-body">
                        	<style>
								.tab-pane {
									min-height:400px;
								}
                            </style>
                        	<div class="tab-content">
                                <div id="general" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="title" class="control-label">Block Title</label>
                                                <input class="form-control" id="title" name="title"  type="text" required value="<?php echo get_data('title');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Block Name</label>
                                                <input class="form-control" id="name" name="name"  type="text" required value="<?php echo get_data('name');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="content" class="control-label">Content #</label>
                                                        <?php editor(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="excerpt" class="control-label">Excerpt</label>
                                                <textarea class="form-control" id="excerpt" name="excerpt" type="text" rows="8"><?php echo get_data('excerpt',true);  ?></textarea>
                                            </div>
                                        </div>
                                	</div>
                                </div>
                        	</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                
                                 <?php if($id == ''){
                                     echo '<button type="submit" name="submit" value="add"  class="btn btn-primary" > Save</button>'; 			  
                                  }else{
                                        echo '<button type="submit" name="update" value="update"  class="btn btn-primary" > Update</button>';
                                    }
                                  ?>
                            </div>
                        </div>  
                    </form>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- block end--> 



<script type="text/javascript">
    function urlFriendlyFunc($str){
        $str = $str.replace(/(^\s*)|(\s*$)/gi,"");
        $str = $str.replace(/[ ]{2,}/gi," ");
        $str = $str.replace(/\n /,"\n");
        $str = $str.replace(/[^a-zA-Z0-9-_]/g, '-');
        return $str;
    }
    $(document).ready(function(){
        $(document).on('input','#title',function(e){
            var $val = $(this).val();
            // $val = $val.replace(/\s+/g,'');
            $val = urlFriendlyFunc($val);
            // $('#name').val(encodeURIComponent($val));
            $('#name').val($val.toLowerCase());
        });
    });
</script>