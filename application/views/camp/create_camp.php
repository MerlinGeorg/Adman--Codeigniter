<script src="<?php echo base_url() ?>Assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>
<!-- <head> -->
<script type="text/javascript">
    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }
</script>
<!-- </head>
<body> -->

<style>
    .btn:focus,
    .btn:active {
        outline: none !important;
        box-shadow: none;
    }

    .card-header {
        background-color: rgb(71, 163, 243);
        border-bottom: 1px solid rgba(71, 92, 243, 0.58);
        color: white;
    }

    .card-footer {
        background-color: initial;
    }

    input[type=button] {
        width: 230px;
        background-color: #47a3f3;
        color: white;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fbfbfb;
    }

    @media screen and (max-width:479px){
        #exutton{
            margin-top: 10px !important;
        }
    }
</style>
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
  <li style="background-color: #DDDDDD;"><a href="<?php echo site_url('camp/create_camp'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Create Campaign</a>                          
                        </li>
						<li><a href="<?php echo site_url('camp/list_estimates'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Estimates</a>                          
                        </li>
                       <li><a href="<?php echo site_url('camp/list_invoiced'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Invoiced</a>                          
                        </li>
                        
                       
                                          
                     </ul>
                            <!-- /.nav-second-level -->

    <!-- </div> -->
    <!-- /.sidebar-collapse -->
    <!-- </div> -->
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <div class="card">
            <div class="card-header">
                Create New Campaign
            </div>

            <?php if ($msg == 1) {
                $a = "block";
            } else {
                $a = "none";
            } ?>
            <div class="alert alert-success" style="display:<?php echo $a; ?>;">
                <h5>Estimate has been saved</h5>

            </div>
            <!-- </div> -->
            <!-- /////////////////////////////////////////////////////////.panel-body -->

            <!-- <div class="row">  -->
            <div class="card-body">
                <div style="color:mediumseagreen;padding: 10px;">*All Fields Must Be Filled*</div>
                <form id="form-element">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Campaign Name</label>
                                        <input class="form-control" placeholder="Enter Campaign Name" name="camp_name" id="camp_name" required>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Campaign Date</label>
                                        <input class="form-control" type="date" name="cr_date" value="<?php print(date("Y-m-d")); ?>" readonly>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Content Duration</label></label>
                                        <input class="form-control" name="du" type="number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Select Advertiser</label>
                                        <!-- <input class="form-control" placeholder="Search Advertiser" name="name" id="myInput" onkeyup="filterFunction()"> -->

                                        <!-- </div>  -->


                                        <!-- <div style="margin-bottom: 10px; /* margin-left: -37px; */height: 99px;/* overflow:scroll; *//* overflow-y:hidden; */overflow-x:scroll;">
		<div id="myDropdown" class="dropdown-content"> -->

                                        <?php

                                        //foreach ($adv->result() as $advrow)
                                        //{ 
                                        ?>

                                        <!-- <a><button style="padding: 1px;color: #5bc0de;borde-color: red;background-color: white;border: none;" class="btn btn-outline btn-primary btn-lg btn-block" type="button" name="btnSeven" id="btnSeven" value="<?php echo $advrow->adv_id; ?>" onclick="setText7(this)"><?php echo $advrow->adv_name;     ?></button>
</a> -->


                                        <?php //}	
                                        ?>
                                        <!-- <div class="form-group" >  -->
                                        <select class="form-control" id="b" name="b" required="required">
                                            <?php
                                            foreach ($adv->result() as $advrow) {
                                            ?>
                                                <option value="<?php echo $advrow->adv_id;     ?>"><?php echo $advrow->adv_name;     ?></option>
                                            <?php }    ?>
                                        </select>
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
                                        <input class="form-control" name="publish_date" id="publish_date">

                                    </div>
                                </div>
                                <input type="text" id="adv_id" style="display: none;">


                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>

                    <div class="row" id="secadd" style="padding: 25px;">
                        <div class="col-lg-12 box">
                            <div class="mybtn row d-flex justify-content-center mt-4 ">
                                <ul class="nav btn-group btn-group-lg" id="side-menu">
                                    <li>
                                        <button class="btn  btn-info " id="newbutton" onclick="youFunction()">New Content
                                        </button>
                                    </li>
                                    <li>
                                        <button class="btn  btn-info " style="margin-left: 10px !important;" id="exutton" onclick="myFunction()">Ex Content
                                        </button>

                                    </li>

                                </ul>
                            </div>


                            <div class="form-group">
                                <div class="row" id="divnew">
                                    <div class="col-lg-12">
                                        <!-- <h4 align="center" class="page-header head_clr" > New</h4> -->
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <label>Content Name</label>
                                            <input class="form-control" placeholder="Content Name" name="content_name" required="required">
                                        </div>
                                        <!-- <input name="nest_id" value="<?php echo $inest_id; ?>" style="display:none;"> -->
                                        <div class="form-group">
                                            <label>Content Type</label>
                                            <select class="form-control" name="content_type" required="required">
                                                <option value="">Choose Content Type
                                                <option>
                                                    <?php foreach ($c_type->result() as $crow) {
                                                    ?>

                                                <option><?php echo $crow->content_type;
                                                        ?></option>
                                            <?php }
                                            ?>

                                            </select>
                                        </div>
                                        <!-- <div class="d-flex justify-content-center">
                                            <input type="submit" class="btn btn-info " value="Submit">
                                        </div> -->
                                    </div>

                                </div>
                            </div>


                            <!-- <div class="d-flex h-100 ">
          <div class="m-auto"> -->

                            <!-- <form method="post" action="<?php echo site_url('camp/content_exist'); ?>"> -->
                            <div class="form-group row" style="display : none;" id="divexist">
                                <div class="col-lg-16">
                                    <h4 class="page-header head_clr"> Campaign Dash</h4>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">

                                        <select class="form-control" name="cnt" id="cnt">
                                            <option value="">Choose Content</option>
                                            <?php

                                            foreach ($exist_content->result() as $excrow) {
                                            ?>

                                                <option value="<?php echo $excrow->con_id; ?>"><?php echo $excrow->con_id;
                                                                                                ?> &nbsp; &nbsp; <?php echo $excrow->content_name;
                                                                                                                    ?>


                                                    <!-- <button class="btn btn-outline btn-primary btn-lg btn-block" type="button" name="btnSeven" id="btnSeven" value="<?php //echo $excrow->con_id; 
                                                                                                                                                                            ?>" onclick="setText7(this)"><?php //echo $excrow->con_id; 
                                                                                                                                                                                                            ?>***<?php //echo $excrow->content_name;  
                                                                                                                                                                                                                ?></button> -->


                                                </option>


                                            <?php }
                                            ?>

                                        </select>

                                        <!-- <div class="col-lg-12 mt-4">
                                            <input class="form-control lign-text-bottom text-center" name="content_id" id="exid" readonly>
                                            <input class="form-control" name="est_id" style="display : none;" value="<?php //echo $inest_id; 
                                                                                                                        ?>">

                                        </div> -->
                                        <!-- <div class="d-flex justify-content-center mt-4">
                                            <input type="submit" class="btn btn-info " value="Submit">
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                            <!-- </div>


        </div> -->
                        </div>
                    </div>
                    <!-- /.panel-body -->
                    <!-- </div> -->
                    <!-- /.panel -->
                    <!-- </div> -->
                    <!-- /.col-lg-12 -->
                    <div class="row" id="secadd" style="padding: 25px;">
                        <div class="col-lg-12 box">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select class="form-control" id="a" name="a" onChange="outputValue(this), get_batch()" required>
                                                    <option value="">Select ASP</option>
                                                    <?php
                                                    foreach ($asp->result() as $asprow) {
                                                    ?>
                                                        <option value="<?php echo $asprow->asp_id;     ?>"><?php echo $asprow->asp_name;     ?></option>
                                                    <?php }    ?>
                                                </select>
                                                <input type="text" name="aspname" id="aspname" style="display : none ;" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group" id="output_batch">
                                                <select class="form-control" name="batch" onChange="outputscreen(this)" required>

                                                    <option value="">Select Screen</option>
                                                </select>
                                            </div>
                                            <input type="text" name="scname" id="scname" style=" display:  none;" />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select class="form-control" name="pol" required>
                                                    <option value="">Campaign Duration</option>
                                                    <?php
                                                    foreach ($tpolicy->result() as $tprow) {
                                                    ?>
                                                        <option value="<?php echo $tprow->tpc;     ?>"><?php echo $tprow->tp_name;     ?></option>
                                                    <?php }    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select class="form-control" name="play" required>
                                                    <option value="">Position</option>
                                                    
                                                        <option value="preshow">Preshow</option>
                                                        <option value="during interval">During Interval</option>
                                                   
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-12 mt-4 text-center">
                                            <button type="button" class="btn" style="border-radius: 50%;" onclick="addRow('dataTable', a, du, aspname, scname, batch, pol,play)"><i style="font-size: 38px; color: #47a3f3;" class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
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
                                    <th>Time</th>
                                    <th>Position</th>
                            </thead>
                            </tr>
                        </TABLE>

                        <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTable" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;margin-bottom: -14px;">


                        </table>

                    </div>
                    <div class="col-lg-12 text-center">
                        <input class="btn btn-info mt-5" style="width: 230px" type="button" value="Save" onclick="gatherData(a,du, camp_name, b,user, publish_date,content_name,content_type,cnt)">
                    </div>
            </div>
            </form>
            <div class="card-footer" style="margin-top: -74px; height: 69px;"></div>
        </div>
    </div>
</div>
                                                    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('#b').select2({
        theme: 'bootstrap4',
    });

    const ps = new PerfectScrollbar('#b');
    ps.update();

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function setText7(obj) {
        var val = obj.value;
        console.log(val);
        document.getElementById('b').value = val;
        var area = document.getElementById("b");
        document.getElementById('adv_id').value = val;

    }

    function outputValue(item) {

        document.getElementById('aspname').value = e = item.options[item.selectedIndex].text;

        // document.getElementById('adv_id').value = item.value;

    }

    function outputscreen(screen) {

        document.getElementById('scname').value = screen.options[screen.selectedIndex].text;

    }


    function addRow(tableID, a, du, aspname, scname, batch, pol,play) {

        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        //////////////////////



        var cell0 = row.insertCell(0);
        cell0.innerHTML = rowCount;

        var cell1 = row.insertCell(1);
        cell1.innerHTML = (a.value);
        var cell2 = row.insertCell(2);
        cell2.innerHTML = (aspname.value);
        var cell3 = row.insertCell(3);
        cell3.innerHTML = (batch.value);
        var cell4 = row.insertCell(4);
        cell4.innerHTML = (scname.value);
        var cell5 = row.insertCell(5);
        cell5.innerHTML = (pol.value);
        var cell6=row.insertCell(6);
        cell6.innerHTML=play.value;
    }


    function get_batch() {
        $.ajax({
            type: "post",
            data: {
                course_id: $('#a').val(),
            },
            url: "<?php echo site_url('camp/get_batch') ?>",
            success: function(data) {
                $('#output_batch').html(data);
            }
        });
    }



    function gatherData(a, du, camp_name, b, user, publish_date, content_name, content_type, cnt) {

        var data = [];
        var table = document.getElementById('dataTable');

//alert("hi");
        for (r = 0; r < table.rows.length - 1; r++) {

            var row = table.rows[r + 1];
            var cells = row.cells;

            data.push({
                aspId: (a.value),
                asp: cells[1].innerHTML,
                sid: cells[3].innerHTML,
                pol: cells[5].innerHTML,
                dur: (du.value),
                cname: (camp_name.value),
                adv: (b.value),
                user: (user.value),
                publish_date: (publish_date.value),
                content_name: (content_name.value),
                content_type: (content_type.value),
                cnt: (cnt.value),
                play: cells[6].innerHTML
            });


        }

        var mydatas = JSON.stringify(data)

        window.location.href = '<?php echo site_url('camp/create_estimate'); ?>/?mdata=' + encodeURI(mydatas);

    }

    function youFunction() {

        var x = document.getElementById("divexist");
        var y = document.getElementById("divnew");
        if (y.style.display === "none") {
            y.style.display = "block";
            x.style.display = "none";
        }

    }

    function myFunction() {

        var x = document.getElementById("divexist");
        var y = document.getElementById("divnew");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        }
        $("#newbutton").prop('disabled', false);
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

        $('#publish_date').datepicker({
            autoclose: true,
            showOnFocus: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
            startDate: new Date("<?= date('Y-m-d') ?>")
        });

    });
</script>
<!-- </body> -->