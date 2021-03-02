<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-arrow-circle-o-right"></i> Email Templates</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="<?php echo site_url("backend/admin/dashboard"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <li><b>Email Templates</b></li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <header class="panel-heading" style="background: #fff;">
                <form action="<?php current_url() ?>" method="get" accept-charset="utf-8">
                    <table class="responsive table_head" cellpadding="5">
                        <thead>
                            <tr>
                                <!-- <th width="13%"><i class="icon-user"></i> Name</th> -->
                                <th width="30%">Search By Tiltle</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="">                
                                        <input type="text" name="title" value="<?php echo trim($this->input->get('title')); ?>" class="form-control" placeholder="Search By Tiltle">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    <a href="<?php echo current_url() ?>" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </header>
            <div class="panel-body" style="background: #fff;">
                <div class="adv-table">
                    <table id="myTable" class="table table-striped table-hover" >
                        <thead class="thead_color">
                            <tr>
                                <th width="5%">S.No</th>
                                <!-- <th width="3%">ID</th> -->
                                <th width="30%">Title</th>
                                <th width="30%">Subject</th>
                                <th width="20%">Created</th>
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                if(!empty($news)):
                                  $j=1; 
                                foreach($news as $row): 
                                ?>
                            <tr>
                                <td><?php echo $j ?></td>
                                <!-- <td><?php echo $row->id ?></td> -->
                                <td><?php echo ucfirst($row->template_name) ?></td>
                                <td><?php echo $row->template_subject ?></td>
                                <td class="to_hide_phone"><i class="fa fa-calendar"></i>&nbsp; <?php echo date('m/d/y,h:i  A',strtotime($row->template_created)); ?></td>
                                <td class="ms">
                                    <a href="<?php echo base_url().'backend/template/email_templates_edit/'.$row->id ?>" class="btn btn-primary btn-xs tooltips" rel="tooltip"  data-placement="left" data-original-title="Edit" ><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                            </tr>
                            <?php $j++;  endforeach; ?>
                        </tbody>
                        <?php else: ?>
                        <tr>
                            <th colspan="6" class="msg">
                                <center>No Template Found.</center>
                            </th>
                        </tr>
                        <?php endif; ?> 
                    </table>
                    <div class="row-fluid  control-group mt15 pull-right">
                        <div class="span12">
                            <?php if(!empty($pagination))  echo $pagination;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- left column -->
    </div>
    <!--/.col (left) -->
</div>