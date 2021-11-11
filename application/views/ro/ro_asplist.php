<?php //$this->load->view('ro/header_menu.php'); ?>
 <div id="wrapper">

        <!-- Navigation -->
   
            <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;"> R O</h4></div>
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
                    <h4 class="page-header"> Release Order Dash</h4>
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  <?php
  
 $a=array();
  
    foreach ($ro_reg as $estrow) 
    
  {  
  
 
  echo $num = $estrow->asp ;  echo "</br>";
// array_push($a);
  
  
  }
  print_r($a);


  ?>

    <!-- ////////////////////////////////////////////////////////////////.panel-body -->
                    <div class="panel-heading">

                        </div>
                        
                    </div></div>
                  
               


