<div class="row">
    <div class="col-lg-12">
    
<!--  -->
      
<!--  -->        
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong>Users List</strong>
                <a href="<?php echo base_url('auth/create_user')?>" class="btn btn-primary fa fa-user-plus pull-right" > Add New User</a></h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-12">
                        <label>Users State</label>
                        <hr style="margin:5px 0px;" />
                        <input checked="checked" onchange="user_filter(this)" name="user_search_type" id="active" value="active" type="radio"  /><label for="active">&nbsp;Active Users&nbsp;&nbsp;&nbsp;</label>

                        <input onchange="user_filter(this)" name="user_search_type" id="deactive" value="deactive" type="radio"  /><label for="deactive">&nbsp;Deactive Users&nbsp;&nbsp;&nbsp;</label> 

                        <input onchange="user_filter(this)" name="user_search_type" id="all" value="all" type="radio"  /><label for="all">&nbsp;ALL Users&nbsp;&nbsp;&nbsp;</label>  
                    </div>
                </form>
            </div>
        </section>
        <section class="panel">
            <div class="panel-body">
                <div class="adv-table">
                    <table id="mv_datatable"  class="mv_datatable display table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone #</th>
                                <th>Email</th>
                                <th>Created On</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>


<script>

	var table =	$('.mv_datatable').DataTable({
		"processing": true,
		"serverSide": true,
		"fixedHeader": true,
		"ajax": "<?=base_url('auth/datatable_json')?>",
        "bPaginate": true,
		"order": [[0,'desc']],
		"columnDefs": [
						{ "targets": 0, "name": "id", 'searchable':false, 'orderable':true},
						{ "targets": 1, "name": "first_name", 'searchable':true, 'orderable':true},
						{ "targets": 2, "name": "last_name", 'searchable':true, 'orderable':true},
						{ "targets": 3, "name": "phone", 'searchable':true, 'orderable':true},
						{ "targets": 4, "name": "email", 'searchable':true, 'orderable':true},
						{ "targets": 4, "name": "created_on", 'searchable':false, 'orderable':true},
						{ "targets": 4, "name": "last_login", 'searchable':false, 'orderable':true},
						{ "targets": 5, "name": "Actions", 'searchable':false, 'orderable':false}
					]
	});

function user_filter(asthis)
{ 
    $.post('<?=base_url('auth/search')?>',$('#user_search').serialize(),function(){
        table.ajax.reload( null, false );
    });
}

$(document).ready(function(){
    user_filter();
});


</script>