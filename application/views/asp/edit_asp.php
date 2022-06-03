<style>
    .card-header {
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }

    .card-footer {
        background-color: initial;
    }

    .btn-submit {
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fbfbfb;
    }
</style>
<?php //$this->load->view('asp/header_menu.php'); 
?>
<div id="wrapper">

    <!-- Navigation -->

    <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">ASP</h4></div>
                    </li>
  <li ><a href="<?php echo site_url('asp/create_asp'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create ASP</a>                          
                        </li>
                        <li style="background-color: #DDDDDD;">
                            <a href="<?php echo site_url('asp/list_asp'); ?>" ><i class="fa fa-table fa-fw"></i>List All ASP</a>
                        </li>
                        
                       
                                          
                     </ul> -->
    <!-- /.nav-second-level -->

    <!-- </div> -->
    <!-- /.sidebar-collapse -->
    <!-- </div> -->
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <div class="card">
            <div class="card-header">
                Edit ASP
            </div>
            <!-- /////////////////////////////////////////////////////////.panel-body -->

            <!-- <div class="row"> -->
            <div class="card-body">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <?php foreach ($aspdataedit->result() as $asprow) {
                            echo $asprow->asp_name;
                        } ?>  </div> -->
                    <div class="panel-body">
                        <!-- <div class="row"> -->
                        <!-- <div class="col-lg-6"> -->
                        <form role="form" method="post" action="<?php echo site_url('asp/asp_update');  ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ASP Name</label>
                                        <input name="asp_id" value="<?php echo $asprow->asp_id;   ?>" style="display : none ;">
                                        <input class="form-control" placeholder="Enter ASP Name" name="asp_name" value="<?php echo $asprow->asp_name;   ?>">
                                        <div style="color: red;"><?php echo form_error('asp_name'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP Address</label>
                                        <input class="form-control" placeholder="Enter ASP Address" name="asp_address" value="<?php echo $asprow->asp_add;  ?>">
                                        <div style="color: red;"><?php echo form_error('asp_address'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP Contact Person</label>
                                        <input class="form-control" placeholder="Enter Contact Person" name="asp_person" value="<?php echo $asprow->asp_person; ?>">
                                        <div style="color: red;"><?php echo form_error('asp_person'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Contact Person Designation</label>
                                        <input class="form-control" placeholder="Enter Designation" name="person_desig" value="<?php echo $asprow->person_desig; ?>">
                                        <div style="color: red;"><?php echo form_error('person_desig'); ?></div>
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!-- /.col-lg-6 (nested) -->
                                <!-- <div class="col-lg-6"> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP Contact Number-1</label>
                                        <input class="form-control" placeholder="Enter ASP Phone Number" name="asp_phone_1" value="<?php echo $asprow->phone_1; ?>">
                                        <div style="color: red;"><?php echo form_error('asp_phone_1'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP Contact Number-2</label>
                                        <input class="form-control" placeholder="Enter ASP Phone Number" name="asp_phone_2" value="<?php echo $asprow->phone_1; ?>">
                                        <div style="color: red;"><?php echo form_error('asp_phone_2'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP email</label>
                                        <input class="form-control" placeholder="Enter ASP Email" name="asp_email" value="<?php echo $asprow->email; ?>">
                                        <div style="color: red;"><?php echo form_error('asp_email'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP Web</label>
                                        <input class="form-control" placeholder="Enter ASP Web" name="asp_web" value="<?php echo $asprow->web; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <?php $status = $asprow->status;
                                            if ($status == 1) {
                                                $a = "selected";
                                                $b = "";
                                            } else {
                                                $b = "selected";
                                                $a = "";
                                            } ?>
                                            <option <?php echo $a; ?> value="1">Active</option>
                                            <option <?php echo $b; ?> value="0">Deactive</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ASP Info</label>
                                        <textarea class="form-control" rows="5" name="asp_info"><?php echo $asprow->asp_info; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn mt-4 btn-submit" style="width: 230px">Update</button>
                                </div>
                            </div>
                        </form>

                        <!-- </div> -->
                        <!-- /.col-lg-6 (nested) -->
                        <!-- </div> -->
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
            <!-- </div> -->
            <!-- /.row -->
            <div class="card-footer" style="margin-top: -74px; height: 69px;"></div>
        </div>


        <div class="panel-heading">

        </div>

    </div>
</div>