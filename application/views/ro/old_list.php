<!-- <body> -->

<?php //$this->load->view('ro/header_menu.php'); 
?>
<div id="wrapper">

    <!-- Navigation -->

    <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">RO </h4></div>
                    </li>
                     <li><a href="<?php echo site_url('ro/create_ro'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Release Orders</a>                          
                        </li>
                    <li><a href="<?php echo site_url('ro/list_ro'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>List Release Orders</a>                          
                        </li>
                       <li><a href="<?php echo site_url('ro/oldlist_ro'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Old Release Orders</a>                          
                        </li>
                        
                   </ul>
                                             
                </div> -->
    <!-- /.sidebar-collapse -->
    <!-- </div> -->
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="title-5 m-b-35 text-center">RO List</h4>
            </div>
            <!-- /////////////////////////////////////////////////////////.panel-body -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Listed All RO</div> -->
                    <div class="panel-body">
                        <!-- <div class="row"> -->

                        <div class="panel-body">

                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>
                                          <th>Invo ID</th>       
                                            <th>CAMPAIGN NAME</th> 
											 <th>ADVERTISER</th> 			
											 <th>DURATION</th> 	
												 <!-- <th>Advertiser</th>  -->
														 <!-- <th>Screen</th>  -->
												 <!-- <th>Content ID</th>  -->
 <th>Content Name</th> 	
 <!-- <th>Edit</th> 												  -->
 
 <th>EDIT</th>        
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
      <?php 
     /*  print_r($involist);
      die(); */
      if(!empty($involist)){
       if(!empty($involist->result())){

    //   echo"<pre>";print_r($involist->result());exit;
       foreach ($involist->result() as $estrow) { ?>
                                        <tr>
                                           
                                            <td><?php echo $estrow->invo_id;	 ?></td>
                                            <!-- <td><?php //echo $estrow->est_id; ?></td> -->
											<td><?php echo $estrow->est_name; ?></td>
									        <td><?php echo $estrow->adv_name; ?></td>
											<td><?php echo $estrow->duration; ?></td>
									 <!-- <td><?php //echo $estrow->screen; ?></td> -->
<!-- <td><?php //echo $estrow->content_id; ?></td> -->
									        <td><?php echo $estrow->content_name; ?></td>
                                       <!-- <td><a href="#">Print</a></td> -->
                                       <td><a href="<?php echo site_url('ro/oldro_edit').'/'.$estrow->ro_id ; ?>"><i class="fas fa-edit"></i></a>
                                    </tr>
	  <?php }
    }
 } ?>
                                        
                                     
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

        </div>

        <!-- </body> -->
    </div>
</div>