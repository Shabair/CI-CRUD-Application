<!-- page start-->

<style type="text/css">
    #form_maker_section {
        line-height: 60px;
    }
    #form_maker_button{
        text-align: center;
        vertical-align: middle;
        background-color: #a2a2a2;
        font-size: 30px;
        cursor: pointer;
    }

    .delete_form_maker_field{
        line-height: 321%;
        font-size: 23px;
    }
    .delete_form_maker_field > .fa.fa-times{
        vertical-align: middle;
        color: #de5252;
        cursor: pointer;
    }
</style>

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
                <h4 class="head3" style="display:inline-block">Add New <?php echo ucwords($CI->_class) ?></h4>
            <?php } else {?>
                <h4 class="head3" style="display:inline-block">Update <?php echo ucwords($CI->_class) ?></h4>
            <?php }?>

                <a href="<?php echo site_url('admin/'.$CI->_class) ?>" class="btn btn-primary pull-right">View <?php echo ucwords($CI->_class) ?>s List</a>
            </header>
            <div class="panel-body">
                <div class="alert alert-success" id="success" style="display:none;"></div>
                <div class=" form">
                    <form class="cmxform tasi-form" id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/'.$CI->_class.'/'.((!empty($id))?'edit':'add').'/'.$id); ?>">
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
                                                <label for="title" class="control-label"><?php echo ucwords($CI->_class) ?> Title</label>
                                                <input class="form-control" id="title" name="title"  type="text" required value="<?php echo get_data('title');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="slug" class="control-label"><?php echo ucwords($CI->_class) ?> Slug</label>
                                                <input class="form-control" id="slug" name="slug"  type="text" required value="<?php echo get_data('slug');  ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="content" class="control-label">Content #</label>
                                                    <?php editor('content',"../../filemanager/dialog.php?type=1&field_id=content&relative_url=1&fldr="); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="excerpt" class="control-label">Excerpt</label>
                                                <textarea class="form-control" id="excerpt" name="excerpt" type="text" rows="5" ><?php echo get_data('excerpt');  ?></textarea>
                                            </div>
                                        </div>

                                        <section class="light_section">
                                            <div class="col-lg-12">
                                                <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true" style="background-color: #585353;">
                                                    <div class="panel panel-default" style="margin-bottom: 5px;background-color: #585353;">
                                                        <div class="panel-heading" role="tab" id="headingOne" data-collapse="asd" style="padding: 0 15px;background-color: #585353;">
                                                            <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#seo-panel" aria-expanded="true" aria-controls="collapse">

                                                      <h4 style="color: #ffffff;">SEO
                                                      <div class="pull-right ">
                                                        <i class="glyphicon glyphicon-plus sign_of_expand" ></i>
                                                      </div>
                                                      </h4>
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="seo-panel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="background-color: #fff;">
                                                            <div class="panel-body">

                                                                <div class="col-md-12">
                                                                    <div class="form-group ">
                                                                        <label for="seo_keywords" class="control-label">SEO Keywords</label>
                                                                        <input class="form-control" id="seo_keywords" name="seo_keywords"  type="text" value="<?php echo get_data('seo_keywords');  ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group ">
                                                                        <label for="seo_description" class="control-label">SEO Description</label>
                                                                        <textarea class="form-control" id="seo_description" name="seo_description" type="text" rows="5" ><?php echo get_data('seo_description');  ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label for="published" class="control-label">Publish</label>
                                                <select class="form-control input-sm m-bot15" id="published" name="published">
                                                    <option value="1" <?php if(get_data('published',true) == '1')echo 'selected'?>>Yes</option>
                                                    <option value="0" <?php if(get_data('published',true)== '0')echo 'selected'?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for="thumbnail-select" class="control-label">Thumbnail <?php echo thmb_size_lbl(); ?></label>
                                                    <?php $thumbnail_url = get_data('thumbnail')?:'assets/images/local_user.png' ?>
                                                    <div class="thumbnail-div">
                                                        <a href="<?php echo base_url() ?>/filemanager/dialog.php?type=1&field_id=thumbnail&relative_url=1&callback=thumbnail_callback" class="btn iframe-btn" id="thumbnail-select">
                                                            <img class="img-thumbnail" alt="Thumbnail" id="thumbnail-view" src="<?php echo uploads_path($thumbnail_url); ?>">
                                                        </a>
                                                    </div>
                                                <a href="<?php echo base_url() ?>/filemanager/dialog.php?type=1&field_id=thumbnail&relative_url=1&callback=thumbnail_callback" class="btn iframe-btn" type="button" style="background: #7087a3;color: #fff;width: 100%;">Select Thumbnail</a>
                                                <input type="hidden" name="thumbnail" id="thumbnail" value="<?php echo get_data('thumbnail'); ?>">
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
<!-- page end-->


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
            // $('#slug').val(encodeURIComponent($val));
            $('#slug').val($val.toLowerCase());
        });
    });
</script>


<script type="text/javascript">


$(function () {

     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#thumbnail-view').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#thumbnail").change(function(){
        readURL(this);
    });
});

</script>

<script type="text/javascript">

    function thumbnail_callback(field_id){
        var url=jQuery('#'+field_id).val();
        name = url.replace(/\.[^/.]+$/, "");
        $('#thumbnail').attr('value', url);
        url = "<?php echo uploads_path() ?>"+"/"+url;
        $('#thumbnail-view').attr('src', url);
    }
</script>
