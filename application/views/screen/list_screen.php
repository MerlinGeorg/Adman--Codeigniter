


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
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-5 m-b-35 text-center"> List All Screens</div>
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading"> View All Screens</div> -->
                        <div class="panel-body">
                            <div class="row">
                           
                        <div class="panel-body">
                            
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                          
                                            <th>SCREEN NAME</th>                                               
                                            <th>CITY</th>
                                            <th>ASP</th>
                                            <th>PRICE</th>
                                            <th>STATUS</th>
                                             <th>EDIT</th>
                                               
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php     foreach ($scdata->result() as $scrow)
                       			{ ?>  
                                        <tr>
                                           
                                            <td><?php echo $scrow->sc_name;  ?></td>
                                            <td><?php echo $scrow->city;  ?></td>
                                            <td><?php echo $scrow->asp_name;  ?></td>
                                            <td><?php echo $scrow->sc_price;  ?></td>
                                            <td><?php $status = $scrow->sc_status; 
if($status==1) {    echo "Active" ; } else { echo "Deactive" ; }                                       
                                            
                                            
                                              ?></td>
                  <td><a href="<?php  echo site_url('screen/screen_edit').'/'.$scrow->sc_id ; ?>"><i class="fas fa-edit"></i></a>
                                        </tr>
                                      <?php  }
                       			?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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
                  
             

