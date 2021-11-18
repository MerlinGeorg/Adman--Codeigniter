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
<?php 
foreach ($scdataedit->result() as $scrow)
{


}

?>

<?php //$this->load->view('screen/header_menu.php'); ?>
 <div id="wrapper">

        <!-- Navigation -->
   
            <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">SCREEN</h4></div>
                    </li>
  <li ><a href="<?php echo site_url('screen/create_screen'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Screen</a>                          
                        </li>
                        <li style="background-color: #DDDDDD;">
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
                    Edit Screen
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <!-- <div class="row"> -->
                <div class="card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading"><?php //echo $scrow->sc_name;  ?></div> -->
                        <div class="panel-body">
                                <!-- <div class="col-lg-6"> -->
                                    <form role="form" method="post" action="<?php echo site_url('screen/screen_update');  ?>" >
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Screen Name</label>
                                                    <input name="sc_id" value="<?php echo  $scrow->sc_id; ?>" style="display : none ;">
                                                    <input class="form-control" placeholder="Enter Screen Name" name="screen_name"  value="<?php echo $scrow->sc_name;  ?>" >
                                                    <!-- <input class="form-control" style="display : none;" name="sc_id"  value="<?php echo $scrow->sc_id;  ?>" >
                                                    <input class="form-control"  name="screen_name"  value="<?php echo $scrow->sc_name;  ?>" > -->
                                                                <div style="color: red;"><?php echo form_error('screen_name'); ?></div>			
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" placeholder="Enter Screen Location" name="city"  value="<?php echo $scrow->city;  ?>" >
                                                    <div style="color: red;"><?php echo form_error('city'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select class="form-control" name="state">
                                                    <?php     foreach ($state->result() as $srow)
                                        { ?>  
                                                        <option  value="<?php echo $srow->code;  ?>" <?php if($srow->code==$scrow->state) { echo "selected";} ?>><?php echo $srow->name;  ?></option>
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
                                                        <option  value="<?php echo $asprow->asp_id;  ?>" <?php if($asprow->asp_id==$scrow->asp) { echo "selected";} ?>><?php echo $asprow->asp_name;  ?></option>
                                                            <?php } ?>                                     
                                                    </select>
                                                
                                                </div>
                                            </div> 
                                            <div class="col-lg-6">                   
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                    <?php $status = $scrow->sc_status; 
                                                    if($status==1) { $a = "selected" ; $d = "" ; } else { $d = "selected" ; $a = "" ;}
                                                    
                                                    
                                                    ?> 
                                                    
                                                        <option <?php echo $a ; ?> value="1">Active</option>
                                                        <option  <?php echo $d ; ?> value="0">Deactive</option>
                                                    
                                                    </select>
                                                </div> 
                                            </div>    

                                        <!-- </div> -->
                                        <!-- /.col-lg-6 (nested) -->
                                        <!-- <div class="col-lg-6"> -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>UOM</label>
                                                <input class="form-control"  name="uom_qty" value="<?php echo $scrow->uom_qty;  ?>" readonly >
                                            </div> 
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Price</label>
                                                    <input class="form-control" placeholder="Enter Price" type="number" name="price" value="<?php echo $scrow->sc_price;  ?>" >
                                                    <div style="color: red;"><?php echo form_error('price'); ?></div>
                                                </div> 
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>CGST</label>
                                                    <input class="form-control"  type="number" name="cgst" value="<?php echo $scrow->cgst;  ?>" >
                                                </div> 
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>SGST</label>
                                                    <input class="form-control"  type="number" name="sgst" value="<?php echo $scrow->sgst;  ?>" >
                                                </div>
                                        </div> 
                                        <div class="col-lg-6">					
                                                <div class="form-group">
                                                    <label>IGST</label>
                                                    <input class="form-control"  type="number" name="igst" value="<?php echo $scrow->igst;  ?>" >

                                                </div>
                                        </div>
                                        <div class="col-lg-6"> 	
                                                <div class="form-group">
                                                    <label>Local Tax</label>
                                                    <input class="form-control"  type="number" name="ltax" value="<?php echo $scrow->local_tax;  ?>" >

                                                </div>
                                        </div>
                                        <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Screen Info</label>
                                                    <textarea class="form-control" rows="2" name="screen_info" ><?php echo $scrow->sc_info;  ?></textarea>
                                                </div>
                                        </div> 	                                    				
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn mt-4 btn-submit" style="width: 230px">Save</button>
                                        </div>
                            <!-- </div> -->
                                        </div>
                                    </form>
                                              
                                
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
                  
               

