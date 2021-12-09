
<?php 
?>
<style>
    .card-header {
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }

    .card-footer {
        background-color: initial;
    }

    button[type=submit] {
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fbfbfb;
    }
</style>
<div id="wrapper">

   
    <div id="page-wrapper">
        <div class="row card">
            <div class="card-header">
                Create New Inward invoice
            </div>
            <!-- <?php if ($msg == 1) {
                        $a = "block";
                    } else {
                        $a = "none";
                    } ?>
                <div class="alert alert-success" style="display:<?php echo $a; ?>">
                <h5>Asp has been saved</h5>
                </div> -->
            <!-- /////////////////////////////////////////////////////////.panel-body -->

            <!-- <div class="row"> -->
            <div class="col-lg-12 card-body">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Advertise Service Provider</div> -->
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo site_url('asp/asp_save');  ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>RO ID</label>
                                        
                                        <input class="form-control" placeholder="Enter RO ID" name="roid" value="<?php echo set_value('roid'); ?>">
                                        <div style="color: red;"><?php echo form_error('roid'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Campaign</label>
                                        <input class="form-control" placeholder="Enter Campaign Name" name="campaign_name" value="<?php echo set_value('campaign_name') ?>">
                                        <div style="color: red;"><?php echo form_error('campaign_name'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input class="form-control" placeholder="Enter duration" name="duration" value="<?php echo set_value('duration'); ?>">
                                        <div style="color: red;"><?php echo form_error('duration'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Advertiser</label>
                                        <input class="form-control" placeholder="Enter Advertiser" name="advertiser" value="<?php echo set_value('advertiser'); ?>">
                                        <div style="color: red;"><?php echo form_error('advertiser'); ?></div>
                                    </div>
                                </div>


                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Contact Name</label>
                                        <input class="form-control" placeholder="Enter Contact Name" name="contact_name" value="<?php echo set_value('contact_name'); ?>">
                                        <div style="color: red;"><?php echo form_error('contact_name'); ?></div>
                                    </div>
                                </div>
                               
                                
                                
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn mt-4">Save</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </form>

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
</div>