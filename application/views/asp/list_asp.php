


<?php //$this->load->view('asp/header_menu.php'); ?>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-5 m-b-35 text-center"> List All ASP</div>
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Listed All Advertise Service Providers</div> -->
                        <div class="panel-body">
                            <div class="row">
                           
                        <div class="panel-body">
                            
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                          
                                            <th>ASP NAME</th>                                               
                                            <th>ASP PERSON</th>
                                            <th>ASP PHONE</th>
                                            <th>ASP EMAIL</th>
                                            <th>STATUS</th>
                                             <th>EDIT</th>
                                               
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php     foreach ($aspdata->result() as $asprow)
                       			{ ?>  
                                        <tr>
                                           
                                            <td><?php echo $asprow->asp_name;  ?></td>
                                            <td><?php echo $asprow->asp_person;  ?></td>
                                            <td><?php echo $asprow->phone_1;  ?></td>
                                            <td><?php echo $asprow->email;  ?></td>
                                            <td><?php $status = $asprow->status; 
if($status==1) {    echo "Active" ; } else { echo "Deactive" ; }                                       
                                            
                                            
                                              ?></td>
                  <td><a href="<?php echo site_url('asp/asp_edit').'/'.$asprow->asp_id ; ?>"><i class="fas fa-edit"></i></a>
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
                  
             

