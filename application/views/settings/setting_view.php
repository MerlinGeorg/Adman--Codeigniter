

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">

<?php //$this->load->view('asp/header_menu.php'); ?>
<style>
    .card-header{
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }
    .card-footer{
        background-color: initial;
    }
    button[type=submit]{
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }
</style>
 <div id="wrapper">

        <!-- Navigation -->
   
            <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">ASP</h4></div>
                    </li>
  <li style="background-color: #DDDDDD;"><a href="<?php echo site_url('asp/create_asp'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create ASP</a>                          
                        </li>
                        <li>
                            <a href="<?php echo site_url('asp/list_asp'); ?>" ><i class="fa fa-table fa-fw"></i>List All ASP</a>
                        </li>
                        
                       
                                          
                     </ul> -->
                            <!-- /.nav-second-level -->
                       
                <!-- </div> -->
                <!-- /.sidebar-collapse -->
            <!-- </div> -->
            <!-- /.navbar-static-side -->
                <div id="page-wrapper">
            <div class="row card">
                <div class="card-header">
                    Select Logo
                    <!-- <a class="js-arrow" href="<?php echo site_url('camp/g')?>">
<img  src="<?php echo base_url('Assets/img/icon/plus.png'); ?>" class=" img_icon" title="Remove"></a> -->

                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <!-- <div class="row"> -->
                <div class="col-lg-12 card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Advertise Service Provider</div> -->
                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo site_url('Settings/save');  ?>" >
                            <div class="row">
                                 <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <label>SELECT LOGO</label>
                                            <select class="form-control" name="logo" id="logo" onchange="details(this)">
                                            <option>select your logo</option> 
                                            <?php if($this->session->userdata('logo_id'))
                                            {
                                               $lgid= $this->session->userdata('logo_id')
                                            ?>
                                            
                                     <?php foreach($logodata->result() as $list_logo) { print_r($list_logo);die();?>
                                     <option <?php if($lgid==$list_logo['logo_id']) {?> selected <?php } ?> data-subtext="<img width='10px' height='10px''  src='<?=base_url("Assets/img/logo/".$list_logo['logo_name']);?>'>"  
    value="<?php echo $list_logo['logo_id']; ?>"  ><?php echo $list_logo['company_name']; ?></option>
                                          <?php 
                                            }
                                             
                                            }
                                            else{
                                                
                                            ?>
                                                
                                                <?php foreach($logodata->result() as $list_logo) { ?>
                                                    <option data-subtext="<img width='10px' height='10px''  src='<?=base_url("Assets/img/logo/".$list_logo['logo_name']);?>'>"  
    value="<?php echo $list_logo['logo_id']; ?>"  ><?php echo $list_logo['company_name']; ?></option>
                                                    <?php 
                                                    }
                                                }
                                                    ?>
                                            </select>
                                            
                                            <div style="color: red;"><?php echo form_error('asp_name'); ?></div>            
                                        </div>
                                </div>
                                <div class="col-lg-12 text-center dtlc" id="dtl" style="display:none;">
                                   
                                </div>
                                
                                
                                <div class="col-lg-12 text-center " id="hidata" style="display:none;">
                                   
                                   </div> 
                                <!-- <div class="alert"></div> -->
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn mt-4">Save</button>
                                  <a href="<?php echo site_url('newlogo')?>" > <button type="submit" class="btn mt-4">Add New Logo</button></a>
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
                    <script src="<?php echo base_url('Assets/js/jquery.min.js'); ?>"></script> 
               <script>
              $(document).ready(function() {
                  var loid=$('#logo').val();
                  if (loid != '') {
                                  $.ajax({
                                        url :'<?php echo site_url('get_data');  ?>',
                                        method :'post',
                                        data :{lgo_id: loid},
                                        dataType :'JSON',
                                        success: function(data){
                                        
                                            
                                            $("#dtl").show();
                                            // $("#hidata").show();
                                            
                                            $("#dtl").html("<img src='<?php echo base_url() ?>/assets/img/logo/"+data.logo_name+"' height='40px' width='40px'> <p style='font-size: 2.0em;'>"+data.company_name+"</p><br><p>"+data.address+"</p>");
                                            $("#hidata").html("<input type='text' name='imgnm' value='"+data.logo_name+"'> <input name='cpmnm' value='"+data.company_name+"'><input name='cmpadrs' value='"+data.address+"'><input name='phone' value='"+data.phone+"'><input name='email' value='"+data.email+"'>");
                                        }
                                    })  
       
                      }
                 
                  
               })
               </script>
               <script>
               function details(lgid)
               {
               var lg_id=lgid.value;
               $.ajax({
                   url :'<?php echo site_url('get_data');  ?>',
                   method :'post',
                   data :{lgo_id: lg_id},
                   dataType :'JSON',
                   success: function(data){
                   
                      
                       $("#dtl").show();
                      // $("#hidata").show();
                       
                       $("#dtl").html("<img src='<?php echo base_url() ?>/assets/img/logo/"+data.logo_name+"' height='40px' width='40px'> <p style='font-size: 2.0em;'>"+data.company_name+"</p><br><p>"+data.address+"</p>");
                       $("#hidata").html("<input type='text' name='imgnm' value='"+data.logo_name+"'> <input name='cpmnm' value='"+data.company_name+"'><input name='cmpadrs' value='"+data.address+"'><input name='phone' value='"+data.phone+"'><input name='email' value='"+data.email+"'>");
                   }
               })       
               
                   
               }
               </script>

