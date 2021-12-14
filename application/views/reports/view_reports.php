<script src="<?php echo base_url() ?>Assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>
<?php //$this->load->view('screen/header_menu.php'); 
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
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;">SCREEN</h4></div>
                    </li>
  <li style="background-color: #DDDDDD;"><a href="<?php echo site_url('screen/create_screen'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Screen</a>                          
                        </li>
                        <li>
                            <a href="<?php echo site_url('screen/list_screen'); ?>" ><i class="fa fa-table fa-fw"></i>List All Screen</a>
                        </li>
                       
                                          
                     </ul> -->
    <!-- /.nav-second-level -->

    <!-- </div> -->
    <!-- /.sidebar-collapse -->
    <!-- </div> -->
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <div class="card">
            <div class="card-header">
                View Reports
            </div>

            <!-- /////////////////////////////////////////////////////////.panel-body -->

            <!-- <div class="row"> -->
            <div class="card-body">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">Create New Screen</div> -->
                    <div class="panel-body">
                        <!-- <div class="row"> -->
                        <!-- <div class="col-lg-6"> -->
                        <form role="form" method="post" action="<?php echo site_url('reports/createReport');  ?>">
                            <div class="row">
                                <!--  <div class="col-lg-6">
                                    <div class="form-group">
                                    <select class="form-control" name="report" onChange="outputValue()" required>
                                                    <option value="">Report Type</option>
                                                    
                                                        <option value="advertiser">Advertiser Based</option>
                                                        <option value="daily">Daily Report</option>
                                                        <option value="weekly">Weekly Report</option>
                                                        <option value="monthly">Monthly Report</option>
                                                </select>
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Advertiser Based</label>
                                        <input class="d-print-none addrow" type="radio" name="report" id="advertiser" value="advertiser">
                                        <div class="form-group" id="advertisername" style="display: none;">

                                            <select class="form-control" name="ad_name">
                                                <option value="">SELECT</option>
                                                <?php
                                                foreach ($adv->result() as $advrow) {
                                                ?>
                                                    <option value="<?php echo $advrow->adv_id;     ?>"><?php echo $advrow->adv_name;     ?></option>
                                                <?php }    ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Daily Report</label>
                                        <!-- <input class="d-print-none addrow" type="radio" name="report" id="daily" value="daily" onchange="showDate()"> -->
                                        <input class="d-print-none addrow" type="radio" name="report" id="daily" value="daily">
                                        <div class="form-group" id="dailydate" style="display: none;">
                                            <input class="form-control" name="date" id="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <label>Weekly Report</label>
                                    <input class="d-print-none addrow" type="radio" name="report" id="weekly" value="weekly">
                                    <div class="form-group" id="weeklydate" style="display: none;">
                                        <div><label>FROM</label> <input class="form-control" name="from_date" id="from_date"> </div>
                                        <div> <label>TO</label> <input class="form-control" name="to_date" id="to_date"> </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">

                                    <label>Monthly Report</label>
                                    <input class="d-print-none addrow" type="radio" name="report" id="monthly" value="monthly">
                                    <div class="form-group" id="monthlydate" style="display: none;">

                                        <select class="form-control" name="month">
                                            <option value="">SELECT</option>
                                            <option value="1">JANUARY</option>
                                            <option value="2">FEBRUARY</option>

                                            <option value="3">MARCH</option>
                                            <option value="4">APRIL</option>
                                            <option value="5">MAY</option>
                                            <option value="6">JUNE</option>
                                            <option value="7">JULY</option>

                                            <option value="8">AUGUST</option>
                                            <option value="9">SEPTEMBER</option>
                                            <option value="10">OCTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DECEMBER</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-12 text-center">

                                    <button type="submit" class="btn mt-4 btn-submit" style="width: 230px">Get Report</button>
                                </div>

                            </div>
                        </form>

                        <!-- </div> -->
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type='text/javascript'>
    /*  function showDate() {
        $('#hiddate').show();
      // alert("hello");
    } */


    $(document).ready(function() {

        $('input:radio[name="report"]').prop('checked', false);

        $('input:radio[name="report"]').change(function() {
            //  if(document.getElementById('daily').checked){  
            if ($(this).val() == 'advertiser') {
                $('#advertisername').show();
                $('#dailydate').hide();
                $('#weeklydate').hide();
                $('#monthlydate').hide();
            }
            if ($(this).val() == 'daily') {
                $('#dailydate').show();
                $('#advertisername').hide();
                $('#weeklydate').hide();
                $('#monthlydate').hide();
            }
            if ($(this).val() == 'weekly') {
                $('#weeklydate').show();
                $('#advertisername').hide();
                $('#dailydate').hide();
                $('#monthlydate').hide();
            }
            if ($(this).val() == 'monthly') {
                $('#monthlydate').show();
                $('#dailydate').hide();
                $('#advertisername').hide();
                $('#weeklydate').hide();
            }
        });

        $('#date').datepicker({
            autoclose: true,
            showOnFocus: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });

        $('#from_date').datepicker({
            autoclose: true,
            showOnFocus: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",

        }).on('changeDate', function(e) {
            //    var endDate = new Date(Date.parse(e.date));
            //endDate.setDate(endDate.getDate() + parseInt($('#duration').val()));
            //var fromDate = new Date(selected.date.valueOf());
            var fromDate = new Date(Date.parse(e.date));
            var endDate = new Date(Date.parse(e.date));
            //alert(fromDate);
         endDate.setDate(endDate.getDate() + parseInt(7));
       //   alert(toDate);
           // alert(fromDate);
          // var lastDate=val(formatDate(toDate));
       //      alert(lastDate);
           // dateRange(fromDate,toDate);
           
           /* $('#to_date').datepicker({
                autoclose: true,
                showOnFocus: true,
                // todayHighlight: true,
                format: "yyyy-mm-dd",
             //   startDate: toDate,
                beforeShowDay: function(date) {
                   // var startDate = new Date("2016-02-28");
                  //  endDate = new Date("2016-04-12");
                    return [date >= fromDate && date <= toDate];
                }
            }); */

            $('#to_date').datepicker('setStartDate', fromDate);
        $('#to_date').datepicker({beforeShowDay: function (date) {
                var startDate = fromDate; 
                var endDate = endDate; 
                return [date>=startDate && date<=endDate];
            }
});
            //$('#to_date').datepicker('maxDate', toDate);
         // $('#to_date').datepicker({'setStartDate':fromDate,'maxDate':toDate});
            /* beforeShowDay: function(date) {
                   var startDate = new Date("2016-02-28");
                   endDate = new Date("2016-04-12");
                   return [date >= startDate && date <= endDate]; 
                }*/

            //  $('#to_date').datepicker('setEndDate', endDate+1);
            //    $('#to_date').val(formatDate(endDate));

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
    
     
       // function dateRange(fromDate,toDate) {
          //  alert("hi");
            $('#to_date').datepicker({
                autoclose: true,
                showOnFocus: true,
                // todayHighlight: true,
                format: "yyyy-mm-dd",
                //minDate: 
             //   startDate: toDate,
                /* beforeShowDay: function(date) {
                    var fromDate = new Date("2016-02-28");
                    toDate = new Date("2016-04-12");
                    return [date >= fromDate && date <= toDate];
                } */
            });
        });
    //    }

        /*  $('#to_date').datepicker({
                autoclose: true,
                showOnFocus: true,
               // todayHighlight: true,
                format: "yyyy-mm-dd"
            });
 */

 
</script>