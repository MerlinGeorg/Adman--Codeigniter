<?php //$this->load->view('screen/header_menu.php'); 
?>
<div id="wrapper">
  
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
                                                <?php foreach ($scdata->result() as $scrow) { ?>
                                                    <tr>

                                                        <td><?php echo $scrow->sc_name;  ?></td>
                                                        <td><?php echo $scrow->city;  ?></td>
                                                        <td><?php echo $scrow->asp_name;  ?></td>
                                                        <td><?php echo $scrow->sc_price;  ?></td>
                                                        <td><?php $status = $scrow->sc_status;
                                                            if ($status == 1) {
                                                                echo "Active";
                                                            } else {
                                                                echo "Deactive";
                                                            }


                                                            ?></td>
                                                        <td><a href="<?php echo site_url('screen/screen_edit') . '/' . $scrow->sc_id; ?>"><i class="fas fa-edit"></i></a>
                                                    </tr>
                                                <?php  }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                              
                            </div>                          
                        </div>                       
                    </div>                  
                </div>             
            </div>
        </div>


        <div class="panel-heading">

        </div>

    </div>
</div>