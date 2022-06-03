<script src="<?php echo base_url() ?>Assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>
<script type="text/javascript">
    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }
</script>
<style>
    .card-header {
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }

    .card-footer {
        background-color: initial;
    }

    .btn-submit {
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fbfbfb;
    }
</style>

<body onload="getData();">
    <div id="wrapper">

        <!-- Navigation -->

        <!-- <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">RO</h4></div>
                    </li>
                        <li><a href="<?php echo site_url('ro/create_ro'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Release Orders</a>                          
                        </li>
                        <li><a href="<?php echo site_url('ro/list_ro'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>List Release Orders</a>                          
                        </li>
                       <li><a href="<?php echo site_url('ro/oldlist_ro'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Old Release Orders</a>                          
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
                    Edit RO
                </div>
                <!-- /////////////////////////////////////////////////////////.panel-body -->

                <!-- <div class="row"> -->
                <div class="col-lg-12 card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Release Order</div> -->
                        <div class="panel-body">
                            <?php
                            if (!empty($data)) {


                                foreach ($data as $row) {
                                   // print_r($row);
                                } ?>
                                <form role="form" method="post" action="<?php echo site_url('ro/updateOldReleaseOrder');  ?>" target="_blank">
                                    <input name="ro_id" value="<?php echo $row->ro_id;   ?>" style="display : none ;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Campaign Name</label>
                                                <select class="form-control" id="campId" name="campId">
                                                    <option value="<?php echo $row->est_id;   ?>"><?php echo $row->name;   ?></option>
                                                    <?php foreach ($rolist->result() as $rorow) : ?>
                                                        <option value="<?php echo $rorow->est_id;     ?>"><?php echo $rorow->name;   ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Campaign Date</label>

                                                <input class="form-control" name="camp_date" id="camp_date" value="<?php echo $row->est_cr_date;   ?>">

                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Advertiser Name</label>

                                                <select class="form-control" id="ro_adv" name="ro_adv">
                                                    <option value="<?php echo $row->adv_id;     ?>"><?php echo $row->adv_name;   ?></option>
                                                    <?php foreach ($adv->result() as $rorow) :
                                                    ?>
                                                        <option value="<?php echo $rorow->adv_id;     ?>"><?php echo $rorow->adv_name;   ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>ASP Name</label>
                                                <!-- <input class="form-control" name="ro_asp" id="ro_asp" readonly > -->
                                                <select class="form-control" id="aspId" name="aspId" onChange="outputValue(this)" required>
                                                    <option value="<?php echo $row->asp_id;     ?>"><?php echo $row->asp_name;   ?></option>
                                                    <!-- <?php //foreach ($asp->result() as $rorow): 
                                                            ?>
                                              <option value="<?php //echo $rorow->asp_id;     
                                                                ?>"><?php //echo $rorow->asp_name;   
                                                                    ?></option>
                                                <?php //endforeach; 
                                                ?> -->

                                                </select>
                                                <input type="text" name="aspname" id="aspname" style="display : none ;" />
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>User</label>
                                                <select class="form-control" id="user" name="user" required>
                                                    <option value="">Select</option>
                                                    <?php foreach ($user->result() as $rorow) : ?>
                                                        <option value="<?php echo $rorow->logo_id;     ?>"><?php echo $rorow->company_name;   ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Publishing Date</label>
                                                <input class="form-control" name="ad_date" id="ad_date" value="<?php echo $row->publish_date; ?>" required>
                                            </div>

                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Duration</label>
                                                <input class="form-control" name="duration" id="duration" value="<?php echo $row->duration;   ?>">

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <?php
                                                $date = $row->est_cr_date;
                                                $duartion = $row->duration;

                                                $date = strtotime($date);

                                                $date = strtotime("+ " . $duartion . "day", $date);
                                                $endDate = date('Y-m-d', $date);

                                                ?>
                                                <input class="form-control" name="end_date" id="end_date" value="<?php echo $endDate;   ?>" readonly>
                                                <div style="color: red;"><?php echo form_error('end_date'); ?></div>
                                                <!-- <select class="form-control" id="end_date" name="end_date" required>
                                                <option value="">Select</option>
                                                
                                                
                                                </select> -->
                                            </div>

                                        </div>

                                        <div class="col-lg-6" >

                                            <div class="form-group" id="output_batch">
                                                <!-- <label>Select Pending Screen</label> -->
                                                <select class="form-control" id="newpending" name="newpending" onChange="outputscreen(this)">

                                                    <option value="">Select Pending Screen</option>
                                                    <?php
                                                    foreach ($var->result() as $pscreen){
                                                        ?>
                                                       <option value="<?php echo $pscreen->sc_id; ?>"><?php echo $pscreen->sc_name; ?></option>
                                                        <?php }  
                                                //    }
                                                    ?>

                                                </select>
                                                        
                                            </div>
                                            <input type="text" name="scname" id="scname" style=" display:  none;" />
                                        </div>

                                        <button class="js-arrow addrow" name="remove"  id="pendingscreen_id" onclick="removeScreen(this)"><img src="<?php echo base_url('Assets/img/icon/delete.png'); ?>" style="<height:2></height:2>0px; width:20px" title="Remove"></button>
                                        <!-- <a class="js-arrow addrow">
                                                    <img src="<?php echo base_url('Assets/img/icon/delete.png'); ?>" style="<height:2></height:2>0px; width:20px" title="Remove"></a> -->
                                        

                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn mt-4 btn-submit" id="savero">Save</button>
                                        </div>
                                </form>

                        </div>
                    <?php } else { ?>
                        No Data Available!
                    <?php } ?>
                    <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <!-- </div> -->
            <!-- /.col-lg-12 -->
            <div class="card-footer" style="margin-top: -74px; height: 69px;"></div>
        </div>
        <!-- /.row -->
    </div>


    <div class="panel-heading">

    </div>

    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    // body.onload = function() {
    // $(window).on('load', function() {

    function getData() {

        //   $(window).on('load', function() {
        $('#camp_date').datepicker({
            autoclose: true,
            showOnFocus: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
            startDate: new Date("<?= date('Y-m-d') ?>")
        }).on('changeDate', function(e) {
            var endDate = new Date(Date.parse(e.date));
            endDate.setDate(endDate.getDate() + parseInt($('#duration').val()));
            $('#end_date').val(formatDate(endDate));
        });


        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
        //}
    }


    var campId = $('#campId').val();
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            camp_id: campId
        },
        url: "<?php echo site_url('ro/get_camdata') ?>",
        success: function(response) {
            // console.log(response);
            $('#camp_date').val(response[0]['est_cr_date']);
            //   $('#ro_adv').val(response[0]['adv_name']);    
            // $('#ro_asp').val(response[0]['asp_name']);    
            $('#duration').val(response[0]['duration']);
            $('#aspId').empty();
            var option = "";
            $.each(response['asp'], function(index) {
                var Id = response['asp'][index].asp_id;
                var aspname = response['asp'][index].asp_name;
                option += '<option value="' + Id + '">' + aspname + '</option>';
            });
            $('#aspId').append('<option value="">Select</option>' + option);

        }

    });



    function outputValue(item) {

        document.getElementById('aspname').value = e = item.options[item.selectedIndex].text;

        // document.getElementById('adv_id').value = item.value;

    }

    
    function pendingscreen_id(data) {
        // var p=
    //    alert(data);
        $('#pendingscreen_id').html(data);
// document.getElementById('scname').value = e = screen.options[screen.selectedIndex].text;
// alert(data);

}

    function get_newpending() {

         $.ajax({
            type: "post",
            data: {
                course_id: $('#aspId').val(),
            },
            url: "<?php echo site_url('ro/get_newpending') ?>",
            success: function(var) {
//alert(var);
//die();
                $('#output_batch').html(data);
            }
        }); 
        // $('#screendiv').show();
    }


    function removeScreen(sc_id) {
           var sc= $('#pendingscreen_id').val();
            // alert(sc);
        // alert('hi');
        $.ajax({
            method: "POST",
            url: "<?php echo site_url('ro/deletePendingScreen') ?>",
            data: {
                sc_id: sc_id
            }, // serializes the form's elements.
            success: function(data) {
                // alert(data);  

                //  var res = JSON.parse(data);
                // var new_course = res.course_name;

                // alert(res.student_id);
                location.reload();

                // console.log(data);
                //  $('#trainid').val(res.trainer_id);
                // $('#tcivilid').val(res.trainer_civilid);

            }
        });
    }
    // $('#ad_date').datepicker();



    //$('#campId').change(function(){

    //  });
    $(document).ready(function() {


        function outputscreen(screen) {
alert("hi");
        //document.getElementById('scname').value = e = screen.options[screen.selectedIndex].text;
      //  alert(document.getElementById('scname'));
      $sc=document.getElementById('scname').value();
      alert($sc);
      $('#pendingscreen_id').val($sc);
    }

        /* $('#campId').on('change',function(){
       
    });
 */
        $('#ad_date').datepicker({
            autoclose: true,
            showOnFocus: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
            startDate: new Date("<?= date('Y-m-d') ?>")
        }).on('changeDate', function(e) {
            var endDate = new Date(Date.parse(e.date));
            endDate.setDate(endDate.getDate() + parseInt($('#duration').val()));
            $('#end_date').val(formatDate(endDate));
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
    });
</script>