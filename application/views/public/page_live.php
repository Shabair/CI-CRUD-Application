<form enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/pages/'.((!empty($page['id']))?'live_update':'live_update').'/'.$page['id']); ?>">
    <input type="hidden" name="id" value="<?php echo $page['id'] ?>">
    <textarea   id="content" name="content">
    	<?php echo ($page['content']); ?>
    </textarea>
    <!-- Content Starts From Here -->
    <input type="submit" name="submit">
</form>
    
    <!-- Content ENDs At Here -->



<script type="text/javascript">
    

jquery321(function () {

    //BEGIN SUMMERNOTE EDITOR
    function aciveSummernote(){
       jquery321('#content').summernote({
            height: 900,
            
            // focus: true,
            placeholder: 'Post Content',
            tabsize: 2,
            disableResizeEditor: true,
            airMode: true,
            popover: {
                air: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ]
            },
            callbacks: {
                onEnter: function (e) {
                    e.preventDefault();
                },
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText.replace(/\n/g, ''));
                }
            }
        }); 
    }

    jquery321(document).ready(function(){
        aciveSummernote();
    });
    
});
    


/*
  $(document).ready(function() {
        $('#content').summernote({
        	height: 900,
        	tabsize: 2,
            disableResizeEditor: true,
            airMode: true,
            popover: {
                air: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ]
            },
	  toolbar: [
	    // [groupName, [list of button]]
	    ['style', ['bold', 'italic', 'underline', 'clear']],
	    ['font', ['strikethrough', 'superscript', 'subscript']],
	    ['fontsize', ['fontsize']],
	    ['color', ['color']],
	    ['para', ['style','ul', 'ol', 'paragraph','height']],
	    ['height', ['height']],
	    ['Insert', ['picture','link','video','table','hr']],
	    ['Misc', ['fullscreen','codeview','undo','redo','help']],
	  ]
		});
    });*/


</script>