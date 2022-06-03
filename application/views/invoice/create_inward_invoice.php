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
            <?php if ($msg == 1) {
                $a = "block";
            } else {
                $a = "none";
            } ?>
            <div class="alert alert-success" style="display:<?php echo $a; ?>;">
                <h5>inward invoice has been saved</h5>

            </div>
            <!-- /////////////////////////////////////////////////////////.panel-body -->

            <!-- <div class="row"> -->
            <div class="col-lg-12 card-body">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Advertise Service Provider</div> -->
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo site_url('invoice/inward_invoice_save');  ?>">
                            <div class="row">
                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>RO ID</label>
                                        
                                        <input class="form-control" placeholder="Enter RO ID" name="ro_id" value="<?php //echo set_value('ro_id'); ?>">
                                        <div style="color: red;"><?php //echo form_error('ro_id'); ?></div>
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>RO ID</label>
                                        <select class="form-control" name="ro" id="ro" required>
                                            <option value="">Select</option>
                                            <?php foreach ($ro->result() as $rorow) : ?>
                                                <option value="<?php echo $rorow->ro_id;     ?>"><?php echo $rorow->ro_id;   ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- <input class="form-control" placeholder="Enter Campaign Name" name="camp_name" value="<?php echo set_value('camp_name') ?>">
                                        <div style="color: red;"><?php echo form_error('camp_name'); ?></div> -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Campaign</label>
                                        <input class="form-control" name="camp" id="camp" readonly>
                                       <!--  <select class="form-control" id="campId" name="campId" required>
                                            <option value="">Select</option>
                                            <?php //foreach ($camp->result() as $rorow) : ?>
                                                <option value="<?php //echo $rorow->est_id;     ?>"><?php //echo $rorow->name;   ?></option>
                                            <?php //endforeach; ?>
                                        </select> -->
                                        <!-- <input class="form-control" placeholder="Enter Campaign Name" name="camp_name" value="<?php //echo set_value('camp_name') ?>">
                                        <div style="color: red;"><?php //echo form_error('camp_name'); ?></div> -->
                                    </div>
                                </div>
                                

                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input class="form-control" name="duration" id="duration" readonly>
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Advertiser Name</label>
                                        <input class="form-control" name="ro_adv" id="ro_adv" readonly>
                                    </div>
                                </div>


                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Invoice Details</label>
                                        <input class="form-control" placeholder="Enter Invoice Details" name="content_name" value="<?php echo set_value('content_name'); ?>">
                                        <div style="color: red;"><?php echo form_error('content_name'); ?></div>
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
                                        <label>ASP</label>
                                        <input class="form-control" name="aspId" id="aspId" readonly>
                                       <!--  <select class="form-control" id="aspId" name="aspId" required>
                                            <option value="">Select</option>
                                            <?php //foreach ($asp->result() as $rorow) : ?>
                                                <option value="<?php //echo $rorow->asp_id;     ?>"><?php //echo $rorow->asp_name;   ?></option>
                                            <?php //endforeach; ?>
                                        </select> -->
                                        <!-- <input class="form-control" placeholder="Enter Campaign Name" name="camp_name" value="<?php //echo set_value('camp_name') ?>">
                                        <div style="color: red;"><?php //echo form_error('camp_name'); ?></div> -->
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn mt-4 btn-submit" style="width: 230px">Save</button>
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
                                            </div>
<script>
    function outputValue(item) {

        document.getElementById('aspname').value = e = item.options[item.selectedIndex].text;

        // document.getElementById('adv_id').value = item.value;

    }

    function outputscreen(screen) {

        document.getElementById('scname').value = screen.options[screen.selectedIndex].text;

    }

    function addRow(tableID, aspId, aspname, scname, batch, ) {

        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);


        var cell0 = row.insertCell(0);
        cell0.innerHTML = rowCount;

        var cell1 = row.insertCell(1);
        cell1.innerHTML = (aspId.value);
        var cell2 = row.insertCell(2);
        cell2.innerHTML = (aspname.value);
        var cell3 = row.insertCell(3);
        cell3.innerHTML = (batch.value);
        var cell4 = row.insertCell(4);
        cell4.innerHTML = (scname.value);


    }

    function get_batch() {
        $.ajax({
            type: "post",
            data: {
                course_id: $('#aspId').val(),
            },
            url: "<?php echo site_url('ro/get_batch') ?>",
            success: function(data) {
                $('#output_batch').html(data);
            }
        });
    }

    function gatherData(campId) {

        var data = [];
        var table = document.getElementById('dataTable');


        for (r = 0; r < table.rows.length - 1; r++) {

            var row = table.rows[r + 1];
            var cells = row.cells;

            data.push({

                asp: cells[1].innerHTML,
                sid: cells[3].innerHTML,

                cname: (campId.value),

            });


        }

        var mydatas = JSON.stringify(data)

        window.location.href = '<?php echo site_url('ro/ro_generate'); ?>/?mdata=' + encodeURI(mydatas);

    }
</script>
<script type="text/javascript">
    $(document).ready(function() {

        var timeout = 3000; // in miliseconds (3*1000)

        $('.alert').delay(timeout).fadeOut(300, function() {
            $('.alert').css({
                display: "none"
            })

        });


    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
     
        $('#ro').change(function() {
          
            var roId = $('#ro').val();
           // alert(roId);
            $.ajax({
                type: "post",
                dataType: "json",
                data: {
                    roId: roId
                },
               
                url: "<?php echo site_url('ro/getReleaseOrderData') ?>",
                success: function(response) {
                 //   alert("hi");
                  //   console.log(response);
               //   alert(response['adv_name']);
                   // $('#camp_date').val(response[0]['est_cr_date']);
                    $('#ro_adv').val(response['adv_name']);
                    $('#camp').val(response['est_name']);
                    $('#aspId').val(response['asp_name']);
                    // $('#ro_asp').val(response[0]['asp_name']);    
                 //   $('#duration').val(response[0]['duration']);
                   // $('#ad_date').val(response[0]['publish_date']);
                  /*   $('#aspId').empty();
                    var option = "";
                    $.each(response['asp'], function(index) {
                        var Id = response['asp'][index].asp_id;
                        var aspname = response['asp'][index].asp_name;
                        option += '<option value="' + Id + '">' + aspname + '</option>';
                    });
                    $('#aspId').append('<option value="">Select</option>' + option); */

                }

            });
        });
        // $('#ad_date').datepicker();
      /*   $('#campId').on('change', function() {
            if ($('#campId').val() != '') {
                $('#aspId').prop('disabled', false);
                $('#camp_date').prop('disabled', false);
            } else {
                $('#aspId').prop('disabled', true);
                $('#camp_date').prop('disabled', true);
            }
        }); */

        /*  $('#savero').on('click',function(){
       
        window.location.href = "<?php echo site_url('ro/list_ro'); ?>";
    }) 
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