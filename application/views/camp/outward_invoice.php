<body>

    <?php //$this->load->view('camp/header_menu.php'); 
    ?>
    <div id="wrapper">

        <!-- Navigation -->

        <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">CAMPAIGN </h4></div>
                    </li>
  <li ><a href="<?php echo site_url('camp/create_camp'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Campaign</a>                          
                        </li>
						<li><a href="<?php echo site_url('camp/list_estimates'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Estimates</a>                          
                        </li>
						<li  style="background-color: #DDDDDD;"><a href="<?php echo site_url('camp/list_invoiced'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Invoiced</a>                          
                        </li>
                   </ul>
                                             
                </div> -->
        <!-- /.sidebar-collapse -->
        <!-- </div> -->
        <!-- /.navbar-static-side -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-5 m-b-35 text-center">Invoiced</div>
                </div>
                <!-- /////////////////////////////////////////////////////////.panel-body -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Listed All Estimates</div> -->
                        <div class="panel-body">
                            <!-- <div class="row"> -->

                            <div class="panel-body">

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>CAMP NAME</th>
                                                <th style="width: 20%">CREATED</th>
                                                <th>ADVERTISER</th>
                                                <th>DURATION</th>
                                                <th>Edit</th>
                                                <!-- <th>PRINT</th> -->


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($estlist->result() as $estrow) { ?>
                                                <tr>

                                                    <td><?php echo $estrow->est_id;     ?></td>
                                                    <td><?php echo $estrow->name; ?></td>
                                                    <td><?php echo $estrow->est_cr_date; ?></td>
                                                    <td><?php echo $estrow->adv_name; ?></td>
                                                    <td><?php echo $estrow->duration; ?></td>

                                                    <td><a href="<?php echo site_url('camp/invo_edit') . '/' . $estrow->est_id; ?>" target="_blank"><i class="fas fa-edit"></i></a>
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

</body>