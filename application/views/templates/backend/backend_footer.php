   	    

   	     </div>
	</div>
	<!-- END CONTENT -->  
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner" style="color:#3B3F51">
		 <?php echo date("Y"); ?> &copy; NSIGN
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div> 
<script>	
	setTimeout(function(){ $(".alert-message").hide("slow") }, 5000); 
</script>
<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";
</script>
<!-- END FOOTER -->




<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   $('#sample_editable_1_length').hide();
   $('a').tooltip();
   $('[data-toggle="tooltip"]').tooltip();
});

</script>

<script type="text/javascript">
    
    $('.page-sidebar-wrapper, .page-content-wrapper').click(function(e){ 
        //alert('ok');
        $('body').removeClass('remove page-quick-sidebar-open');

    });
</script>
<!-- END JAVASCRIPTS -->

<script>
function confirmStatus(msg,url){
  swal({
      title: msg, 
      showCancelButton: true,
      closeOnConfirm: false
    }, function() {
      window.location.href = url;
  });
}

function deleteConfirm(msg,url){
  swal({
      title: msg, 
      showCancelButton: true,
      closeOnConfirm: false
    }, function() {
      window.location.href = url;
  });
}
</script> 
<script>
    $("body").on('click', '.confirm-box', function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        var msg = $(this).data('msg');
        var title = $(this).data('title');
        if(!title)
            title = "Are you sure?";

        swal({
            title: title,
            text: msg,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            }
        });
    });
</script>
</body>
<!-- END BODY -->
</html>