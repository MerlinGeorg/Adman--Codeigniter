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
                <div class="title-5 m-b-35 text-center">RO List</div>
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
                                            <!-- <th>Invo ID</th>      -->

                                            <th>Campaign</th>
                                            <th>Duration</th>

                                            <th>Edit</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($involist->result() as $estrow) { ?>
                                            <tr>

                                                <!-- <td><?php echo $estrow->invo_id;     ?></td> -->

                                                <td><?php echo $estrow->camp_ame; ?></td>




                                                <td><?php echo $estrow->campaignDuration; ?></td>
                                                <td><a href="<?php echo site_url('ro/ro_edit') . '/' . $estrow->ro_id; ?>" target="_blank"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
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

        </div>
    </div>
</div>
</div>
        <!-- </body> -->