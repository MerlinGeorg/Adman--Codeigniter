<!-- <body> -->

<?php //$this->load->view('invoice/header_menu.php'); 
?>
<div id="wrapper">

    <!-- Navigation -->

    <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">INVOICE </h4></div>
                    </li>
 
                   </ul>
                                             
                </div> -->
    <!-- /.sidebar-collapse -->
    <!-- </div> -->
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="title-5 m-b-35 text-center">Outward Invoices</h4>
            </div>
            <!-- /////////////////////////////////////////////////////////.panel-body -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Listed All Invoice</div> -->
                    <div class="panel-body">
                        <!-- <div class="row"> -->

                        <div class="panel-body">

                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Invo ID</th>
                                            <th>Est ID</th>
                                            <th>Campaign</th>
                                            <th>Duration</th>
                                            <th>Advertiser</th>
                                            <!-- <th>Content ID</th>  -->
                                            <th>Content Name</th>
                                            <th>Edit</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($involist->result() as $estrow) { ?>
                                            <tr>

                                                <td><?php echo $estrow->invo_id;     ?></td>
                                                <td><?php echo $estrow->est_id; ?></td>
                                                <td><?php echo $estrow->est_name; ?></td>
                                                <td><?php echo $estrow->duration; ?></td>
                                                <td><?php echo $estrow->adv_name; ?></td>
                                                <!-- <td><?php //echo $estrow->content_id; 
                                                            ?></td> -->
                                                <td><?php echo $estrow->content_name; ?></td>
                                                <td><a href="<?php echo site_url('invoice/invoice_edit') . '/' . $estrow->invo_id;; ?>" target="_blank"><i class="fas fa-edit"></i></a>
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

        <!-- </body> -->