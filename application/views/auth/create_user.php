<!-- page start-->
<style type="text/css">

.fa-close{
    color: #FF0000;
    font-size: 13px;

}

</style>

<script src='<?php echo base_url('assets/js/tinymce/') ?>/jquery.tinymce.min.js'></script>
<script src='<?php echo base_url('assets/js/tinymce/') ?>/tinymce.min.js'></script>
<script type="text/javascript">
    
  tinymce.init({
    selector: '#content'
  });
  </script>
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
        <h4 class="head3" style="display:inline-block">Add New User</h4>
      <?php } else {?>
        <h4 class="head3" style="display:inline-block">Update User</h4>
      <?php }?>
      
      </header>
      <div class="panel-body">
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class=" form">
<?php echo form_open("auth/create_user",'class="cmxform tasi-form"');?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php  $first_name['class'] = 'form-control';?>
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php  $last_name['class'] = 'form-control';?>
            <?php echo form_input($last_name);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          $identity['class'] = 'form-control';
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php  $email['class'] = 'form-control';?>
            <?php  $email['type'] = 'email';?>
            <?php echo form_input($email);?>
      </p>

      <p>
            <input type="hidden" name="is_enrollment" value="no">
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php  $phone['class'] = 'form-control';?>
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php  $password['class'] = 'form-control';?>
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php  $password_confirm['class'] = 'form-control';?>
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-success pull-right"');?></p>

<?php echo form_close();?>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- page end--> 