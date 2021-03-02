  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- /.nav-tabs-custom -->
        <div class="dashboard_welcome_message">
            <div class="alert alert-dismissible" style="border-bottom: 1px solid #6f4141;">
              <p style="font-size: 18px;margin-left: 16px">Welcome Superadmin in <strong>NSIGN</strong> Admin Pannel.</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Counsils Count</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <span>
                            <h3>Total Counsil's</h3>
                        </span> 
                    </div>
                    <div class="col-md-3">
                        <span class="dashboard_counsil">
                            <h3><?= $total_counsil ?></h3>
                        </span>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel-info">
                <div class="counsil_pannel_info">
                    <h3 class="panel-title">7 Days Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <span>
                            <h3>Total Orders</h3>
                        </span> 
                    </div>
                    <div class="col-md-3">
                        <span class="dashboard_counsil">
                            <h3><?= $week_orders[0]->total ?></h3>
                        </span>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel-success">
                <div class="counsil_pannel_warning ">
                    <h3 class="panel-title">30 Days Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <span>
                            <h3>Total Orders</h3>
                        </span> 
                    </div>
                    <div class="col-md-3">
                        <span class="dashboard_counsil">
                            <h3><?= $month_orders[0]->total ?></h3>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Success Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <span>
                            <h3>All Success Orders</h3>
                        </span> 
                    </div>
                    <div class="col-md-3">
                        <span class="dashboard_counsil">
                            <h3>78</h3>
                        </span>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel-info">
                <div class="counsil_pannel_pening">
                    <h3 class="panel-title">Pending Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <span>
                            <h3>All Pending Orders</h3>
                        </span> 
                    </div>
                    <div class="col-md-3">
                        <span class="dashboard_counsil">
                            <h3>78</h3>
                        </span>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="panel panel-success">
                <div class="counsil_pannel_cancel">
                    <h3 class="panel-title">Cancel Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <span>
                            <h3>All Cancel Orders</h3>
                        </span> 
                    </div>
                    <div class="col-md-3">
                        <span class="dashboard_counsil">
                            <h3>78</h3>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Panel primary</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
        </div> -->
        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<style type="text/css">
    .counsil_pannel_info{
        color: #fff ;
        background-color: #033c73;
        border-color: #033c73;
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .counsil_pannel_warning{
        color: #fff;
        background-color: #dd5600;
        border-color: #dddddd;
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px
    }
    .counsil_pannel_pening{
        color: #fff;
        background-color: #d8b407;
        border-color: #dddddd;
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px
    }
    .counsil_pannel_cancel{
        color: #fff;
        background-color:  #fd2f00;
        border-color: #dddddd;
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px
    }
   
</style>