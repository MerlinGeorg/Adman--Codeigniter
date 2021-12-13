<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">
    <!-- <link rel="stylesheet" type="text/css" href="print.css" media="screen, print" /> -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <!-- <script src="custom_script.js"></script>
 -->
    <script type="text/javascript">
        function savePDF() {
            var imgData;

            html2canvas($('#ui-view'), {
                useCORS: true,
                onrendered: function(canvas) {
                    imgData = canvas.toDataURL('image/png');
                    var doc = new jsPDF('l', 'pt', 'a4');

                    doc.addImage(imgData, 'PNG', 4, 35);

                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    today = mm + '/' + dd + '/' + yyyy;

                    doc.save('SalesReport_' + today + '.pdf');

                   
                }
            });
        }
    </script>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <script type='text/javascript'></script>
</head>

<body>
   
    <div class="container-fluid" id="printthis">
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
                /* background-color: #fff; */
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

            .fa-save {
                font-size: 24px;
                color: #ffffff;
            }

            .fa-file-invoice {
                font-size: 24px;
                color: #ffffff;
            }

            .fa-file-excel {
                font-size: 24px;
                color: #ffffff;
            }


            .table-header {
                background-color: #346a7d;
                color: #ffffff;
                -webkit-print-color-adjust: exact;
                /* display: table-header-group;
-webkit-print-color-adjust: exact;  */
            }



            .body-main {
                /* -webkit-print-color-adjust: exact;  */

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
                padding-right: 40px;

            }

            }
        </style>

        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">

                    <div class="card-header">
                        <h5>REPORT</h5>Date:
                        <strong><?php //foreach ($date as $current_date) {} 
                        echo $date; 
                                ?></strong>

                        <a class="float-right mr-1 d-print-none" href="#" onclick="savePDF();return false;" data-abc="true">
                            <i class="fa fa-save fa-fw" title="Download Report"></i></a>
                        <!-- <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                        <i class="fa fa-save"></i> Save</a> -->

                        <!-- <a href="<?php //echo site_url('camp/camp_invo') . '/' . $estrow->est_id; 
                                        ?>" class="d-print-none float-right mr-1"><i class="fas fa-file-invoice fa-fw" title="Make Invice"></i></a> </span>
                        <a href="<?php //echo site_url('camp/camp_cancel') . '/' . $estrow->est_id; 
                                    ?>" class="d-print-none float-right mr-1" mt-4><i class="fas fa-file-excel fa-fw" title="Cancel Invoice"></i></a>
 -->

                    </div>

                    <?php

                    // $email = $this->session->userdata('email');
                    // $phone = $this->session->userdata('phone');
                    ?>

                    <div class="card-body">


                        <div class="table-responsive ">
                        Report Date: <?php echo Date('Y-m-d');?>

                        </div>
                    </div>


                    <hr>
                    <div style="display: block; page-break-before: always; ">



                        <div class="bill-table">
                            <?php 
                            if($estlineedit !=''){
                                ?>
                            
                            <table class="table text-centered table-bordered bill-tab">
                                <thead class="table-header" id="theader">
                                    <tr>
                                        <th class="left table-des">
                                            <h5>SI.NO</h5>
                                        </th>
                                        <th class="left table-des">
                                            <h5>ASP Name</h5>
                                        </th>
                                        <th class="left table-des">
                                            <h5>Campaign Name</h5>
                                        </th>
                                        <th class="left table-des">
                                            <h5>Advertiser Name</h5>
                                        </th>
                                        <th class="table-des">
                                            <h5>Sub Amount</h5>
                                        </th>
                                        <th class="left table-des">
                                            <h5>CGST</h5>
                                        </th>
                                        <th class="left table-des">
                                            <h5>SGST</h5>
                                        </th>
                                        <th class="left table-des">
                                            <h5>DISCOUNT</h5>
                                        </th>
                                        <th class="table-des">
                                            <h5>Total</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>  
                               
                     
                    <?php
                   $sales=0;
                    $sub_total = 0;
                    $cgst_total = 0;
                    $igst_total = 0;
                    $sgst_total = 0;
                    $sub_amount = 0;
                    $trade_discount = 0;
                    $ltax_total = 0;
                    $index = 1;
                    
                    $i = 0;

                    foreach ($estlineedit as $estlrow) {
                        $i++;
                       // echo json_encode($estlrow);
                      // print_r($estlrow);
                      //   foreach ($estedit as $estrow) {
                            $ad_duration = $estlrow->duration;
                      
                         

                        $pram = $estlrow->price;
                     
                        $subamount = ($pram * $ad_duration) * $estlrow->package;
  
                        $dis = $estlrow->discount;
                        //$dcamount = ($ad_duration * $estlrow->price) * $estlrow->package;

                      //  $x = ($dcamount * $dis) / 100;
                      $x = ($subamount * $dis) / 100;
                        $acval = $subamount - $x;

                        $igst = $estlrow->igst;
                        $igst_value = ($acval * $igst) / 100;

                        $cgst = $estlrow->cgst;
                        $cgst_value = ($acval * $cgst) / 100;

                        $sgst = $estlrow->sgst;
                        $sgst_value = ($acval * $sgst) / 100;

                        $ltax = $estlrow->local_tax;
                        $ltax_value = ($acval * $ltax) / 100;

                        $deal_total = $acval + $igst_value + $cgst_value + $sgst_value + $ltax_value;
                    //    $line_total = $acval ;
                      
                      //  $sub_amount += $subamount;
                     //   $trade_discount += $x;
                       // $sub_total += $acval;
                      // $sub_total += $line_total;
                      
                    //    $cgst_total += $cgst_value;
                    //    $igst_total += $igst_value;
                     //   $sgst_total += $sgst_value;
                     //   $ltax_total += $ltax_value;
                     //   $deal_total=$line_total;
                       // $deal_total = $sub_total + $cgst_total + $igst_total + $sgst_total + $ltax_total;
                      
                        //$estrow->adv_name;
                        $sales=$sales+$deal_total;

                    ?>

<tr> 
                                         <td><?php echo $i; ?> </td> 

                                        <td><i class="fas table-result"></i> <?php echo $estlrow->asp_name; ?> </td>
                                        <td><i class="fas table-result"></i> <?php echo $estlrow->name; ?></td>
                                        <td><i class="fas table-result"></i> <?php echo $estlrow->adv_name;  ?></td>
                                        
                                        <td><i class="fas fa-rupee-sign table-result"></i> <?php echo $subamount; ?></td>
                                        <td><i class="fas fa-rupee-sign table-result"></i> <?php echo $cgst_value; ?></td>

                                        <td><i class="fas fa-rupee-sign table-result"></i> <?php echo $sgst_value; ?> </td>
                                        <td><i class="fas fa-rupee-sign table-result"></i> <?php echo $x; ?> </td>
                                        <td>
                                            <p> <strong><i class="fas fa-rupee-sign table-result" area-hidden="true"></i>
                                                    <?php

                                                    echo $deal_total . "/-";

                                                    ?></strong> </p>
                                        </td>
                                    
                                    <?php } ?></tr>
                                    <tr style="color: #346a7d;">
                                        <td class="text-right table-total">
                                            <h4><strong>Total Sales</strong></h4>
                                        </td>
                                        <td class="text-left table-total">
                                            <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php

                                                                                                                echo $sales . "/-";

                                                                                                                ?> </strong></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            } 
                            ?>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




    <!-- script -->


    <!-- <script src="<?php //echo base_url() ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->


</body>

</html>