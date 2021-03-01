<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h4 class="head3" style="display:inline-block">Update User</h4>
      
      </header>
      <div class="panel-body">
        <div class="alert alert-success" id="success" style="display:none;"></div>
        <div class=" form">
<?php echo form_open(uri_string(),'class="cmxform tasi-form"');?>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php  $first_name['class'] = 'form-control';?>
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php  $last_name['class'] = 'form-control';?>
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php  $phone['class'] = 'form-control';?>
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php  $password['class'] = 'form-control';?>
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php  $password_confirm['class'] = 'form-control';?>
            <?php echo form_input($password_confirm);?>
      </p>

  <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'),'class="btn btn-success pull-right"');?></p>

<?php echo form_close();?>

        </div>
      </div>
    </section>
  </div>
</div>
<!-- page end--> 