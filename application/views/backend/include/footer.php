

</div>
</div>
<!-- END CONTENT -->  
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner" style="color:#3B3F51">
        <?php echo date("Y"); ?> &copy; <?php echo SITE_NAME_WITH_EXTENTION; ?>
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
<script src="<?php echo BACKEND_THEME_URL; ?>/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>admin/pages/scripts/form-validation.js" type="text/javascript"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>jquery.richtext.js" type="text/javascript"></script>
<script src="<?php echo BACKEND_THEME_URL; ?>jquery.richtext.min.js" type="text/javascript"></script>
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
</body>
<!-- END BODY -->
</html>