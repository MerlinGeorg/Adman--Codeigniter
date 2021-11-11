<?php //$this->load->view('advertiser/advheader_menu.php'); ?>
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
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">ADVERTISER</h4></div>
                    </li>
             <li ><a href="<?php echo site_url('advertiser/create_advt'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Advertiser</a>                          
                        </li>
                        <li>
                            <a href="<?php echo site_url('advertiser/list_advt'); ?>" ><i class="fa fa-table fa-fw"></i>List All Advertisers</a>
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
                    Create Advertiser
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
   <!-- <div class="row"> -->
                <div class="card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Advertiser Edit Form</div> -->
                        <div class="panel-body">
                            <!-- <div class="row"> -->
                                    <form role="form" method="post" action="<?php echo site_url('advertiser/adv_update');  ?>" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                <?php foreach ($advdataedit->result() as $asprow)
                                        {           }?> 
                                                                                <input  name="adv_id"  value="<?php echo $asprow->adv_id;   ?>" style="display : none ;" >
                                                    <label>Advertiser Name</label>
                                                    <input class="form-control" placeholder="Enter event name" name="adv_name" value="<?php echo  $asprow->adv_name;  ?>" >

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Contact Person</label>
                                                    <input class="form-control"  name="c_person" value="<?php echo  $asprow->c_person;  ?>" >

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Contact Number-1</label>
                                                    <input class="form-control"  name="phone_1" value="<?php echo  $asprow->phone_1;  ?>" >

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Contact Number-2</label>
                                                    <input class="form-control"  name="phone_2" value="<?php echo  $asprow->phone_2;  ?>">

                                                </div>
                                            </div> 
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Whatsapp Number</label>
                                                    <input class="form-control"  name="wphone" value="<?php echo $asprow->wphone ; ?>">

                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control"  name="email" value="<?php echo $asprow->email ; ?>">

                                                </div> 
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address 1</label>
                                                    <input class="form-control"  name="add_1" value="<?php echo $asprow->add1 ; ?>">
                                                </div>  
                                            </div> 
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input class="form-control"  name="add_2" value="<?php echo $asprow->add2 ; ?>">
                                                </div> 
                                            </div>                         
                                    <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control"  name="city" value="<?php echo $asprow->city ; ?>">

                                                </div>  
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Web</label>
                                                    <input class="form-control" type="text"  name="web" value="<?php echo $asprow->web ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Pancard</label>
                                                    <input class="form-control"  name="pan" value="<?php echo $asprow->pan ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>GST</label>
                                                    <input class="form-control"  name="gst" value="<?php echo $asprow->gst ; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>SAC Code</label>
                                                    <input class="form-control"  name="sac" value="<?php echo $asprow->sac ; ?>">
                                                </div>
                                            </div>
                                                
                                            

                                                                    <br><br>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn mt-4 btn-submit" style="width: 230px">Save Event</button>
                                            </div>                                        
                                            </div>
                                              </form>
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
                  
               

   

