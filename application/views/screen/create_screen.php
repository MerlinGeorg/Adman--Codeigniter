<?php //$this->load->view('screen/header_menu.php'); ?>
<style>
    .card-header{
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }
    .card-footer{
        background-color: initial;
    }
    .btn-submit{
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }
    .form-control:disabled, .form-control[readonly]{
        background-color: #fbfbfb;
    }
</style> 
<div id="wrapper">

        <!-- Navigation -->
   
            <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">SCREEN</h4></div>
                    </li>
  <li style="background-color: #DDDDDD;"><a href="<?php echo site_url('screen/create_screen'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Screen</a>                          
                        </li>
                        <li>
                            <a href="<?php echo site_url('screen/list_screen'); ?>" ><i class="fa fa-table fa-fw"></i>List All Screen</a>
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
                    Create Screen
                </div>
                <?php if($msg==1) { $a = "block";} else { $a = "none" ;} ?>
					<div class="alert alert-success" style="display:<?php echo $a ; ?>;" >
						<h5>Screen has been saved</h5>
                         
                            </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <!-- <div class="row"> -->
                <div class="card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Create New Screen</div> -->
                        <div class="panel-body">
                            <!-- <div class="row"> -->
                                <!-- <div class="col-lg-6"> -->
                                    <form role="form" method="post" action="<?php echo site_url('screen/screen_save');  ?>" >
                                      <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Screen Name</label>
                                                    <input class="form-control" placeholder="Enter Screen Name" name="screen_name"  value="<?php echo set_value('screen_name'); ?>" >
                                                                <div style="color: red;"><?php echo form_error('screen_name'); ?></div>			
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" placeholder="Enter Screen Location" name="city"  value="<?php echo set_value('city'); ?>" >
                                                    <div style="color: red;"><?php echo form_error('city'); ?></div>
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select class="form-control" name="state">
                                                    <?php     foreach ($state->result() as $srow)
                                        { ?>  
                                                        <option  value="<?php echo $srow->code;  ?>"><?php echo $srow->name;  ?></option>
                                                            <?php } ?>                                     
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Select ASP</label>
                                                    <select class="form-control" name="asp">
                                                    <?php     foreach ($asp->result() as $asprow)
                                        { ?>  
                                                        <option  value="<?php echo $asprow->asp_id;  ?>"><?php echo $asprow->asp_name;  ?></option>
                                                            <?php } ?>                                     
                                                    </select>
                                                
                                                </div>
                                        </div> 
                                        <!-- </div> -->
                                        <!-- /.col-lg-6 (nested) -->
                                        <!-- <div class="col-lg-6"> -->
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>UOM</label>
                                                    <input class="form-control"  name="uom_qty" value="1" readonly >

                                                </div>
                                        </div> 
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Web Code</label>
                                                    <input class="form-control" placeholder="Enter Web code" type="text" name="web_code" value="<?php echo set_value('webcode'); ?>" >
                                                    <div style="color: red;"><?php echo form_error('webcode'); ?></div>
                                                </div> 
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input class="form-control" placeholder="Enter Price" type="number" name="price" value="<?php echo set_value('price'); ?>" >
                                                    <div style="color: red;"><?php echo form_error('price'); ?></div>
                                                </div> 
                                        </div>                                       
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>CGST</label>
                                                    <input class="form-control"  type="number" name="cgst" value="9" >
                                                </div>
                                        </div> 
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>SGST</label>
                                                    <input class="form-control"  type="number" name="sgst" value="9" >
                                                </div>
                                        </div> 
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>IGST</label>
                                                    <input class="form-control"  type="number" name="igst" value="0" >
                                                </div> 
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Local Tax</label>
                                                    <input class="form-control"  type="number" name="ltax" value="0" >
                                                </div> 
                                        </div>                                                              
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Screen Info</label>
                                                    <textarea class="form-control" rows="1" name="screen_info" ></textarea>
                                                </div>          
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn mt-4 btn-submit" style="width: 230px">Save</button>
                                        </div>
                                    <!-- </div> -->
                                      </div>
                                              </form>
                                              
                                <!-- </div> -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                <!-- </div> -->
                <!-- /.col-lg-12 -->
            <div class="card-footer" style="margin-top: -74px; height: 69px;"></div>
            </div>
            <!-- /.row -->
        </div>


                    <div class="panel-heading">

                        </div>
                        
                    </div>
                  
               

                                        </div>