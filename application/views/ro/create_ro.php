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
                Create RO
            </div>
            <!-- /////////////////////////////////////////////////////////.panel-body -->

            <!-- <div class="row"> -->

            <form role="form" method="post" action="<?php echo site_url('ro/add_ro');  ?>" target="_blank">
                <div class="col-lg-12 card-body">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Release Order</div> -->
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Campaign Name</label>
                                        <select class="form-control" id="campId" name="campId" required>
                                            <option value="">Select</option>
                                            <?php foreach ($rolist->result() as $rorow) : ?>
                                                <option value="<?php echo $rorow->est_id;     ?>"><?php echo $rorow->name;   ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Campaign Date</label>
                                        <input class="form-control" name="camp_date" id="camp_date" readonly disabled>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Advertiser Name</label>
                                        <input class="form-control" name="ro_adv" id="ro_adv" readonly>

                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ASP Name</label>
                                        <!-- <input class="form-control" name="ro_asp" id="ro_asp" readonly > -->
                                        <select class="form-control" id="aspId" name="aspId" onChange="outputValue(this),get_batch()" required>
                                            <option value="">Select</option>


                                        </select>
                                        <input type="text" name="aspname" id="aspname" style="display : none ;" />
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Publishing Date</label>
                                        <input class="form-control" name="ad_date" id="ad_date">
                                    </div>

                                </div>


                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input class="form-control" name="duration" id="duration" readonly>

                                    </div>

                                </div>
                             

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>End Date</label>

                                        <input class="form-control" name="end_date" id="end_date" placeholder="Select Publishing Date" readonly disabled required>
                                        <!-- <select class="form-control" id="end_date" name="end_date" required>
                                                <option value="">Select</option>
                                                
                                                
                                                </select> -->
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="row" id="secadd" style="padding: 25px;">
                        <div class="col-lg-12 box">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">



                                        <div class="col-lg-12">

                                            <div class="form-group" id="output_batch">
                                                <label>Select Pending Screen</label>
                                                <select class="form-control" name="batch" onChange="outputscreen(this)">

                                                    <option value="">Select Screen</option>
                                                
                                                </select>
                                            </div>
                                            <input type="text" name="scname" id="scname" style=" display:  none;" />
                                        </div>


                                        <div class="col-lg-12 mt-4 text-center">
                                            <button type="button" class="btn" style="border-radius: 50%;" onclick="addRow('dataTable',aspId, aspname, scname, batch)"><i style="font-size: 38px; color: #47a3f3;" class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         

                    <div class="panel-heading">
                        <TABLE id="dataTable" width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" style="font-size: 10px;">
                            <thead>
                                <tr>
                                    <th>NO:</th>
                                    <th>ASP</th>
                                    <th>ASP Name</th>
                                    <th>SID</th>
                                    <th>Screen Name</th>                  

                            </thead>
                            </tr>
                        </TABLE>
                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTable" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;margin-bottom: -14px;">


                        </table>
                    </div>


                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn mt-4 btn-submit" id="savero">Save</button>
                    </div>

                </div>
            </form>
            <div class="card-footer" style="margin-top: -74px; height: 69px;"></div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->

    <!-- /.panel -->
    <!-- </div> -->
    <!-- /.col-lg-12 -->
    <!-- <div class="card-footer" style="margin-top: -74px; height: 69px;"></div> -->
</div>
</div>
<!-- /.row -->
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
        $('#campId').change(function() {
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
                    $('#ro_adv').val(response[0]['adv_name']);
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

            })
        });
        // $('#ad_date').datepicker();
        $('#campId').on('change', function() {
            if ($('#campId').val() != '') {
                $('#aspId').prop('disabled', false);
                $('#camp_date').prop('disabled', false);
            } else {
                $('#aspId').prop('disabled', true);
                $('#camp_date').prop('disabled', true);
            }
        });

        /*  $('#savero').on('click',function(){
       
        window.location.href = "<?php echo site_url('ro/list_ro'); ?>";
    }) 
 */

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
    })
</script>