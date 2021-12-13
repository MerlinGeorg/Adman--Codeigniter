<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">

<?php //$this->load->view('asp/header_menu.php'); 
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
</style>



<div id="wrapper">
    <div id="page-wrapper">
        <div class="card">
            <div class="card-header">
               Edit Logo
            </div>
            <!-- <?php if ($msg == 1) {
                        $a = "block";
                    } else {
                        $a = "none";
                    } ?>
            <div class="alert alert-success" style="display:<?php echo $a; ?>;" >
                <h5>Estimate has been saved</h5>
                 
                    </div> -->
                    <?php   foreach ($data->result() as $estrow) { }?>
            <div class="card-body">
                <form action="<?php echo site_url('settings/updateLogo');?>" name="logofrm" id="logofrm" method="post" enctype="multipart/form-data">
                <input name="lgo_id" value="<?php echo $estrow->logo_id;?>" style="display : none ;">
                <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Name </label>
                                        <input class="form-control" placeholder="Enter Company Name" type="type" value="<?php echo $estrow->company_name; ?>" name="cmpname" id="cmpname">
                                        <div style="color: red;"><?php echo form_error('cmpname'); ?></div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Address </label>
                                        <input type="text" class="form-control" value="<?php echo $estrow->address; ?>" name="adrs" id="adrs" required>   
                                        <div style="color: red;"><?php echo form_error('adrs'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" placeholder="Enter Phone Number" value="<?php echo $estrow->phone; ?>" type="number" name="phone" id="phone">
                                        <div style="color: red;"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Enter Email" value="<?php echo $estrow->email; ?>" id="email" name="email" type="email">
                                        <div style="color: red;"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>PAN Number</label>
                                        <input class="form-control" name="pan" id="pan" value="<?php echo $estrow->pan; ?>" type="number" placeholder="Enter Pan Number">
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <label>CSTIN</label>
                                        <input class="form-control" name="cstin" id="cstin" value="<?php echo $estrow->cstin; ?>" type="text" placeholder="Enter CSTIN">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>SAC CODE</label>
                                        <input class="form-control" name="sac" id="sac" value="<?php echo $estrow->sac_code; ?>" type="text" placeholder="Enter SAC CODE">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>DESCRIPTION</label>
                                        <input class="form-control" value="<?php echo $estrow->des_service; ?>" name="des" id="des" type="text" placeholder="Enter CSTIN"></textarea>
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Choose Your Logo</label></label>
                                        <input class="form-control" name="image_file" id="imgInp" type="file" >
                                        <input type="hidden" name="image1" id="image1">
                                        <div id="imagefill"></div>
                                        <div style="color: red;"><?php echo form_error('image_file'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <div class="form-group">
                                        <img name="logo_img" id="logo_id" class="logo_id" src='<?php echo base_url("assets/img/logo/$estrow->logo_name") ?>' height='40px' width='40px'>                                       
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <div class="form-group">
                                        <input type="submit" name="save" value="Save" id="addlogo" class="btncls">

                                    </div>
                                </div>






                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>

                   
                  
                    <div class="card-footer" style="margin-top: -74px; height: 69px;"></div>
                </form>
        </div>
        </div>
    </div>
</div>