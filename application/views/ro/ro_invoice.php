<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Release Order</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>

<body>

    <div class="container-fluid">



        <style>
            .card {
                margin-bottom: 1.5rem
            }

            .card {
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid #c8ced3;
                border-radius: .25rem
            }

            .card-header:first-child {
                border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
            }

            .card-header {
                padding: .75rem 1.25rem;
                margin-bottom: 0;
                background-color: #346a7d;
                border-bottom: 1px solid #c8ced3;
                color: #ffffff;
            }

            .table-header1 {
                background-color: #346a7d;
                color: #ffffff;
                -webkit-print-color-adjust: exact;
                /* display: table-header-group;
    -webkit-print-color-adjust: exact;  */
            }

            .fa-print {
                font-size: 24px;
                color: #ffffff;
            }


            .body-main {
                background: #ffffff;
                /* border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23; */
                margin-top: 30px;
                margin-left: 306px;
                padding: 40px 30px !important;
                position: relative;
                /* box-shadow: 0 1px 21px #808080; */
                font-size: 10px
            }

            .container-fluid {
                -webkit-print-color-adjust: exact;
                /* padding-right: 40px; */
            }

            .fa-fw {
                font-size: 24px;
                color: #ffffff;
            }
        </style>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
        <script type='text/javascript'></script>
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">

                    <div class="card-header text-center">
                        <h5>Release Order</h5>
                        <strong></strong>

                        <a class="float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                            <i class="fa fa-print " title="Print"></i></a></span>
                        
                        <!-- <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                        <i class="fa fa-save"></i> Save</a> -->


                        <!-- <a href="<?php echo site_url('camp/camp_invo') . '/' . $estrow->est_id; ?>" class="d-print-none float-right mr-1" ><img src="<?php echo base_url(); ?>Assets/img/icon/invoice.png" height="35" width="35" title="Make Invoice" ></a>  </span>
          <a href="<?php echo site_url('camp/camp_cancel') . '/' . $estrow->est_id; ?>"  class="d-print-none float-right mr-1" ><img src="<?php echo base_url(); ?>Assets/img/icon/invoice2.png" height="35" width="35" title="Cancel Estimate"></a>   -->


                    </div>

                    <?php
                    // $img = $this->session->userdata('image_name');
                    //   $companyname = $this->session->userdata('company_nam');
                    //  $cmpadrs = $this->session->userdata('company_adrs');
                    $email = $this->session->userdata('email');
                    $phone = $this->session->userdata('phone');
                    ?>
                    <?php if(!empty($logo)){
                    foreach ($logo as $estrow) {
                    } ?>

                    <div class="card-body" style="margin-bottom: -53px;">
                        <div>
                            <div class="row mb-4">
                                <div class="col-sm-8 address2">

                                    <div>
                                        <?php
                                        if (!empty($estrow->logo_image)) {
                                        ?>
                                            <h6><img name="logo_img" id="logo_id" class="logo_id" src='<?php echo base_url("assets/img/logo/$estrow->logo_name") ?>' height='40px' width='40px'> <strong><?php echo $estrow->company_name ?></strong></h6>
                                        <?php
                                        } else {

                                        ?>
                                            <h6> <strong><?php echo $estrow->company_name ?></strong></h6>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col-sm-4">
                                        <div><?php echo $estrow->address ?></div>
                                        <!-- <div>New York City, New york, 10394</div> -->
                                        <div>Email: <?php echo $estrow->email ?></div>
                                        <div>Phone: <?php echo $estrow->phone ?></div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>BBBootstrap.com</strong>
                            </div>
                            <div>42, Awesome Enclave</div>
                            <div>New York City, New york, 10394</div>
                            <div>Email: admin@bbbootstrap.com</div>
                            <div>Phone: +48 123 456 789</div>
                        </div> -->
                                <div class="col-sm-4 ml-auto">
                                    <h6 class="mb-3">To</h6>

                                    <div>
                                        <strong><?php echo $adv_cp = $advaddr->asp_person; ?></strong>
                                    </div>
                                    <div><?php echo $adv_name = $advaddr->asp_name; ?></div>
                                    <!-- <div>New York City, New york, 10394</div> -->
                                    <div><?php echo $adv_add1 = $advaddr->asp_add; ?></div>
                                    <!-- <div>Phone: +48 123 456 789</div> -->
                                </div>

                            </div>
                        </div>



<?php }?>
                    </div>

                    <!-- 
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead class="table-header">
                                <tr>
                                    <th class="center">ASP</th>
                                    <th class="left">SCREEN</th>
                                    <th class="left">Package</th>
                                    <th class="center">Rate</th>
                                    <th class="right">Amount</th>
                                    <th class="right">Discount</th>
                                    <th class="right">IGST</th>
                                    <th class="right">CGST</th>
                                    <th class="right">SGST</th>
                                    <th class="right">L-Tax</th>
                                    <th class="left">Total</th>
                                    
                                    <th class="left d-print-none">CLR</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div> -->

                    <div class="col-sm-5 mt-4">
                        <p><strong><i>Dear sir,</strong></p>
                        <p>We hereby confirm the following for release as follows,</i></p>
                    </div>

                    <?php
                    $originalDate = $advaddr->est_cr_date;
                    $newDate = date("d/m/Y", strtotime($originalDate));
                    
                    ?>



                    <div class=" col-md-8   mt-4 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <!-- <tr>
                                    <th class="left">
                                        <h5>Description</h5>
                                    </th>
                                    <th>
                                        <h5>Amount</h5>
                                    </th>
                                </tr> -->

                            </thead>
                            <tbody>
                                <tr>
                                    <td>PRODUCT NAME</td>
                                    <td style="padding-right: 113px;"><?php echo $content->content_name; ?> </td>
                                </tr>
                                <tr>
                                    <td>COMMENCING DATE</td>
                                    <td><?php echo $campdata->publish_date; ?> </td>
                                </tr>
                                <!-- <tr>
                                    <td>POSITION</td>
                                    <td><?php //echo $campdata->play; ?>  </td>
                                </tr> -->
                                <tr>
                                    <td>CONTENT TYPE</td>
                                    <td> <?php echo $content->content_type; ?></td>
                                </tr>
                                <tr>
                                    <td>CONTENT DURATION </td>
                                    <td><?php echo $advaddr->Contentdur . ' ' . 'Seconds'; ?> </td>
                                </tr>
                                <tr>
                                    <td>CAMPAIGN DURATION</td>
                                    <td><?php echo $campdata->package . ' ' . 'Weeks'; ?> </td>
                                </tr>
                                <!-- <tr>
                                    <td>CAMPAIGN DURATION</td>
                                    <td> <?php //echo $campdata->duration . ' ' . 'Weeks'; ?> </td>
                                </tr> -->









                                <?php 
                                 $sub_total = 0;
                                 $cgst_total = 0;
                                 $igst_total = 0;
                                 $sgst_total = 0;
                                 $sub_amount = 0;
                                 $trade_discount = 0;
                                 $ltax_total = 0;
                                 $ad_duration = $advaddr->Contentdur;
                                 $index = 1;
                                 $i = 0;
                                 $deal_total=0;
                                 foreach ($estlineedit->result() as $estlrow) {
                                     $i++;
         
                                     $pram = $estlrow->price;
                                     $subamount = ($pram * $ad_duration) * $estlrow->package;
         
                                     $dis = $estlrow->discount;
                                     $dcamount = ($ad_duration * $estlrow->price) * $estlrow->package;
         
                                     $x = ($dcamount * $dis) / 100;
                                     $acval = $dcamount - $x;
         
                                     $igst = $estlrow->igst;
                                     $igst_value = ($acval * $igst) / 100;
         
                                     $cgst = $estlrow->cgst;
                                     $cgst_value = ($acval * $cgst) / 100;
         
                                     $sgst = $estlrow->sgst;
                                     $sgst_value = ($acval * $sgst) / 100;
         
                                     $ltax = $estlrow->local_tax;
                                     $ltax_value = ($acval * $ltax) / 100;
         
                                     $line_total = $acval + $igst_value + $cgst_value + $sgst_value + $ltax_value;
         
                                     $sub_amount += $subamount;
                                     $trade_discount += $x;
                                     $sub_total += $acval;
                                     $cgst_total += $cgst_value;
                                     $igst_total += $igst_value;
                                     $sgst_total += $sgst_value;
                                     $ltax_total += $ltax_value;
                                     $deal_total = $sub_total + $cgst_total + $igst_total + $sgst_total + $ltax_total;
                                     
                                 }
         
                                ?>
                                <tr>
                                    <td class="text-right">
                                        <p> <strong>Amount</strong> </p>
                                        <p> <strong>Trade discount </strong> </p>
                                        <p> <strong>Taxable Amount</strong> </p>
                                        <p> <strong>Gst </strong> </p>
                                        <p> <strong>Deal value </strong> </p>
                                        <p> <strong>DMaterial</strong> </p>

                                    </td>
                                    <td class="text-left">
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $sub_amount; ?> </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $trade_discount; ?> </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $sub_total; ?> </strong> </p>
                                        <p> <strong><i class="" area-hidden="true"></i> 18 % </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $deal_total; ?> </strong> </p>
                                        <p> <strong>Along with RO We transfer link</strong> </p>

                                    </td>
                                </tr>






                                <tr style="color: #346a7d;">
                                    <td class="text-right">
                                        <h4><strong>Deal value </strong></h4>
                                    </td>
                                    <td class="text-left">
                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php
                                                                                                            if (empty($deal_total)) {
                                                                                                                echo "Error:" . "No screen selected";
                                                                                                            } else {
                                                                                                                echo $deal_total . "/-";
                                                                                                            }
                                                                                                            ?> </strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        SCREENS :
                        <table class="table table-md table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Screens</th>                    
                                    <th scope="col" class="text-center">city</th>
                                    <th scope="col" class="text-center" >Webcode</th>
                                    <th scope="col" class="text-center" >Position</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>

                                
                                <?php $i = 0;
                                foreach ($screens as $screen) : $i++; ?>
                                   <th scope="row" class="text-center"> <?php echo $i; ?> </th>
                                        <td class="text-center"><?php echo $screen->sc_name; ?></td>

                                        <?php /* $city= $screen->city; 
                                        if($city!=''){ */
                                            ?>

                                        <td class="text-center"><?php echo $screen->city; ?></td>
                                       <?php /* }
                                       $webcode= $screen->web_code; 
                                       if($webcode!=''){
 */
                                       
                                       ?>

                                        <td class="text-center"><?php echo $screen->web_code; ?></td>
                                        <?php
                                  //     }
                                       ?>
                                       <td class="text-center"><?php echo $screen->play; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-sm-5 mt-4">
                        <p>Thanking You, Yours Sincerely</p>
                        <p><img src="<?php echo base_url(); ?>Assets/img/icon/sign.png" style="height : 76px;"></p>
                    </div>





                </div>
            </div>
        </div>
    </div>
    </div>




    <!-- script -->


    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#checkbox1').change(function() {
                if (!this.checked)
                    //  ^
                    $('#autoUpdate').show();
                else
                    $('#autoUpdate').hide();
            });
        });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        // function printthis()

        // {
        // var w = window.open('', '', 'width=595,height=842,scrollbars');
        // w.document.write($("#printthis").html());
        // w.document.close(); // needed for chrome and safari
        // javascript:w.print();
        // w.close();
        // return false;
        // }
        function makeinvoice()

        {
            alert("please wait");
        }
    </script>
    <script>
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

        function outputscreen(screen) {

            document.getElementById('scrval').value = screen.value;

        }
    </script>


    <script>
        function myFunction(sal) {
            var tstvalu = $("#chDiscount").val()

            var disvalues = $("#disfrm").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('camp/update_discount'); ?>",
                data: disvalues,
                dataType: "html",
                success: function(data) {

                    $(sal).each(function() {
                        if ($(this).val() != "") {
                            location.reload();
                        }
                    });

                },
                error: function() {
                    alert("Error posting feed.");
                }
            });
        }
    </script>
    <!-- script -->



</body>

</html>