
<div class="row">
    <div class="col-lg-12">

<!--  -->

<!--  -->
        <section  class="panel" id="advanced_search">
            <div class="panel-body">
                <h4 class=""> <strong><?php echo ucwords($CI->_class) ?> List</strong>
                <a href="<?php echo base_url('admin/'.$CI->_class.'/add')?>" class="btn btn-primary fa fa-user-plus pull-right" > Add New <?php echo ucwords($CI->_class) ?></a></h4>
                <hr style="margin:5px0px;" />
                <form id="user_search">
                    <div class="col-md-12">
                        <label><?php echo ucwords($CI->_class) ?> State</label>
                        <hr style="margin:5px 0px;" />
                        <input checked="checked" onchange="user_filter(this)" name="user_search_type" id="active" value="active" type="radio"  /><label for="active">&nbsp;Active <?php echo ucwords($CI->_class) ?>&nbsp;&nbsp;&nbsp;</label>

                        <input onchange="user_filter(this)" name="user_search_type" id="deactive" value="deactive" type="radio"  /><label for="deactive">&nbsp;Deactive <?php echo ucwords($CI->_class) ?>&nbsp;&nbsp;&nbsp;</label>

                        <input onchange="user_filter(this)" name="user_search_type" id="published" value="published" type="radio"  /><label for="published">&nbsp;Published <?php echo ucwords($CI->_class) ?>&nbsp;&nbsp;&nbsp;</label>

                        <input onchange="user_filter(this)" name="user_search_type" id="non-published" value="non-published" type="radio"  /><label for="non-published">&nbsp;Non-Published <?php echo ucwords($CI->_class) ?>&nbsp;&nbsp;&nbsp;</label>

                        <input onchange="user_filter(this)" name="user_search_type" id="all" value="all" type="radio"  /><label for="all">&nbsp;ALL <?php echo ucwords($CI->_class) ?>&nbsp;&nbsp;&nbsp;</label>
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
                                <th><?php echo ucwords($CI->_class) ?> Title</th>
                                <th>Slug</th>
                                <th>Published</th>
                                <th>Last Updated</th>
                                <th width="10%">Thumbnail</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- $CI->_class end-->
<script src="<?php echo base_url(); ?>public/js/datatables.min.js"></script>
    <script type="text/javascript">
        function showDetails(DT_Id) {
            var deleted_id = DT_Id.getAttribute("data-deleted-id");
            var currentClass = DT_Id.getAttribute("data-class");
            deleted_id = "<?php echo base_url(); ?>"+"/admin/"+currentClass+"/active/"+deleted_id;
            document.getElementById("conform-deleted-id").setAttribute("href", deleted_id);
        }
        function permDelete(DT_Id) {
            var deleted_id = DT_Id.getAttribute("data-deleted-id");
            var currentClass = DT_Id.getAttribute("data-class");
            deleted_id = "<?php echo base_url(); ?>"+"/admin/"+currentClass+"/delete/"+deleted_id;
            document.getElementById("conform-deleted-id").setAttribute("href", deleted_id);
        }
    </script>

<script>

	var table =	$('.mv_datatable').DataTable({
		"processing": true,
		"serverSide": true,
		"fixedHeader": true,
		"ajax": "<?=base_url('admin/'.$CI->_class.'/datatable_json')?>",
        "bPaginate": true,
		"order": [[0,'desc']],
		"columnDefs": [
						{ "targets": 0, "name": "id", 'searchable':false, 'orderable':true},
                        { "targets": 1, "name": "title", 'searchable':true, 'orderable':true},
                        { "targets": 2, "name": "slug", 'searchable':true, 'orderable':true},
						{ "targets": 3, "name": "Published", 'searchable':false, 'orderable':true},
						{ "targets": 4, "name": "last_update", 'searchable':false, 'orderable':true},
						{ "targets": 5, "name": "created", 'searchable':false, 'orderable':true},
						{ "targets": 6, "name": "Actions", 'searchable':false, 'orderable':false}
					]
	});

function advance_filter()
{
	$.post('<?=base_url('company/search')?>',$('#company_search').serialize(),function(){
		table.ajax.reload( null, false );
	});
}

function user_filter(asthis)
{
    $.post('<?=base_url('admin/'.$CI->_class.'/search')?>',$('#user_search').serialize(),function(){
        table.ajax.reload( null, false );
    });
}

$(document).ready(function(){
    user_filter();
});


</script>



<!-- Delete mode -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deactivation Remark</h4>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-default btn-danger" id='conform-deleted-id' style="margin-right:5px;" href=""> <i class="fa fa-trash-o"></i> De-Activate</a>
            </div>
        </div>
      </div>
    </div>


<!-- Delete mode -->
