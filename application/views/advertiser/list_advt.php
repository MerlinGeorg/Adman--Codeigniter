<?php //$this->load->view('advertiser/advheader_menu.php'); ?>
<style>
.table-data3 thead tr th {
    font-weight: 500;
    font-size: 13px;
}
.table-data3 tbody td{
    font-size: 13px;
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
                        <li style="background-color: #DDDDDD;">
                            <a href="<?php echo site_url('advertiser/list_advt'); ?>" ><i class="fa fa-table fa-fw"></i>List All Advertisers</a>
                        </li>
                        
                       
                                          
                     </ul> -->
                            <!-- /.nav-second-level -->
                       
                <!-- </div> -->
                <!-- /.sidebar-collapse -->
            <!-- </div> -->
            <!-- /.navbar-static-side -->
                <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-5 m-b-35 text-center">List All Advertisers</div>
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <!-- ////////////////////////////////////////////////////////////////.panel-body -->
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Listed All Advertise Service Providers</div> -->
                        <div class="panel-body">
                            <!-- <div class="row"> -->
                           
                        <div class="panel-body">
                            
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                          
                                            <th>ADV NAME</th>                                               
                                            <th>PERSON</th>
                                            <th>PHONE</th>
                                            <th> EMAIL</th>
                                            <th>STATUS</th>
                                             <th>EDIT</th>
                                               
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php     foreach ($list_advdata->result() as $advrow)
                       			{ ?>  
                                        <tr>
                                           
                                            <td><?php echo $advrow->adv_name;  ?></td>
                                            <td><?php  echo $advrow->c_person;  ?></td>
                                            <td><?php echo $advrow->phone_1;  ?></td>
                                            <td><?php echo $advrow->email;  ?></td>
                                             <td><?php $status = $advrow->adv_status; 
                                             if($status=1) { echo "Active" ; } else { echo "Deactive";}
                                              ?></td>
 <td><a href="<?php echo site_url('advertiser/adv_edit').'/'.$advrow->adv_id ; ?>"><i class="fas fa-edit"></i></a>
                                           <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    
                                <!-- /.col-lg-6 (nested) -->
                            <!-- </div> -->
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>


                    <div class="panel-heading">

                        </div>
                        
                    </div>
                  
             

