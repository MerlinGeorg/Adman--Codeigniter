<?php //$this->load->view('asp/header_menu.php'); ?>
<style>
    .card-header{
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }
    .card-footer{
        background-color: initial;
    }
    button[type=submit]{
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }
</style>
 <div id="wrapper">

        <!-- Navigation -->
   
            <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">ASP</h4></div>
                    </li>
  <li style="background-color: #DDDDDD;"><a href="<?php echo site_url('asp/create_asp'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create ASP</a>                          
                        </li>
                        <li>
                            <a href="<?php echo site_url('asp/list_asp'); ?>" ><i class="fa fa-table fa-fw"></i>List All ASP</a>
                        </li>
                        
                       
                                          
                     </ul> -->
                            <!-- /.nav-second-level -->
                       
                <!-- </div> -->
                <!-- /.sidebar-collapse -->
            <!-- </div> -->
            <!-- /.navbar-static-side -->
                <div id="page-wrapper">
            <div class="row card">
                <div class="card-header">
                    Create ASP
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <!-- <div class="row"> -->
                <div class="col-lg-12 card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Advertise Service Provider</div> -->
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo site_url('asp/asp_save');  ?>" >
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ASP Name</label>
                                            <input class="form-control" placeholder="Enter ASP Name" name="asp_name"  value="<?php echo set_value('asp_name'); ?>" >
														<div style="color: red;"><?php echo form_error('asp_name'); ?></div>			
                                        </div>
                                </div>
                                <div class="col-lg-6">
				                    <div class="form-group">
                                            <label>ASP Address</label>
                                            <input class="form-control" placeholder="Enter ASP Address" name="asp_address"   >
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ASP Contact Person</label>
                                            <input class="form-control" placeholder="Enter Contact Person" name="asp_person" value="<?php echo set_value('asp_person'); ?>">
                                           <div style="color: red;"><?php echo form_error('asp_person'); ?></div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
					                    <div class="form-group">
                                            <label>Contact Person Designation</label>
                                            <input class="form-control" placeholder="Enter Designation" name="person_desig" value="<?php echo set_value('person_desig'); ?>" >
                                          <div style="color: red;"><?php echo form_error('person_desig'); ?></div>
                                        </div>
                                </div>                 
                                        

                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                     <div class="form-group">
                                            <label>ASP Contact Number-1</label>
                                            <input class="form-control" placeholder="Enter ASP Phone Number" name="asp_phone_1" value="<?php echo set_value('asp_phone_1'); ?>">
                                            <div style="color: red;"><?php echo form_error('asp_phone_1'); ?></div>
                                        </div> 
                                </div>
                                <div class="col-lg-6">
					                    <div class="form-group">
                                            <label>ASP Contact Number-2</label>
                                            <input class="form-control" placeholder="Enter ASP Phone Number" name="asp_phone_2" value="<?php echo set_value('asp_phone_2'); ?>" >
                                            <div style="color: red;"><?php echo form_error('asp_phone_2'); ?></div>
                                        </div> 
                                </div>
                                <div class="col-lg-6">
					                    <div class="form-group">
                                            <label>ASP email</label>
                                            <input class="form-control" placeholder="Enter ASP Email" name="asp_email"  >
                                        </div> 
                                </div>
                                <div class="col-lg-6">
					                    <div class="form-group">
                                            <label>ASP Web</label>
                                            <input class="form-control" placeholder="Enter ASP Web" name="asp_web" >
                                        </div>
                                </div> 
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>ASP Info</label>
                                            <textarea class="form-control" rows="5" name="asp_info" ></textarea>
                                        </div>
                                </div>    
		                        <!-- <div class="alert"></div> -->
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn mt-4">Save</button>
                                </div>  
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->            
                            </form>
                                              
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
                  
               

