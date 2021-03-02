<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-arrow-circle-o-right"></i> Add Page Template</h1>
<!--         <ol class="breadcrumb">
            <li><a href="<?php echo site_url("admin/home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Council</li>
        </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php echo $this->session->flashdata('success_msg'); ?> 

            <div class="col-xs-12">
                <div class="bread_parent">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('backend/admin/dashboard');?>"><i class="icon-home"></i> Dashboard  </a></li>
                        <li><a href="<?php echo base_url('backend/page'); ?>">Page Templates </a></li>
                        <li>Add Page Template</li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal tasi-form" action="<?php echo current_url()?>" enctype="multipart/form-data" method="post" data-parsley-validate>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Template Name<span class="error">*</span> :</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="template_name" value="<?php echo set_value('template_name');?>" required maxlength="100" data-parsley-required-message="Template name is required"><?php echo form_error('template_name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Page Template Body<span class="error">*</span> :</label>
                                <div class="col-md-10">
                                    <textarea  class="tinymce_edittor form-control" cols="100" rows="7" name="template_body" required data-parsley-required-message="Page template body is required"><?php echo set_value('template_body'); ?></textarea><?php echo form_error('template_body'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-2 col-md-10">
                                <button  class="btn btn-primary" type="submit"> Submit</button>
                                <a class="btn btn-danger" href="<?php echo base_url()?>backend/template"> Cancel</a>               
                            </div>
                        </div>
                    </form>
                    <!-- END FORM--> 
                </div>
            </div>
        </div>
    </section>
</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: ".tinymce_edittor",
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        menubar: false,
        // width :832,
        height :300,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor media",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime table contextmenu paste textcolor directionality",
        ],
        image_advtab: true,
        resize: false,
        toolbar: "insertfile undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | preview code ", 
        //toolbar: "styleselect | bold italic | bullist | link image media | preview code",    
        file_browser_callback : elFinderBrowser,   
    });

    function elFinderBrowser(field_name, url, type, win){
        tinymce.activeEditor.windowManager.open({
            file: '<?php echo base_url("elfinders/index") ?>',// use an absolute path!
            title: 'File Manager',
            width: 900,
            height: 450,
            resizable: 'yes'
        },{
            setUrl: function (url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    }
</script>
<style type="text/css">
   .error{
      color:red;
   }
</style>