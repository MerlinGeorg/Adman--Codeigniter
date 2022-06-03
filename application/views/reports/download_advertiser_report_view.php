<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">
   

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'> 
  
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    

    <script type='text/javascript'></script>
</head>

<body>

    <div class="container-fluid">
        <!-- <div class="container-fluid" id="printthis"> -->
        <div id="ui-view" data-select2-id="ui-view">

            <div class="card">
            <style>
                    .card {
                        margin-bottom: 1.5rem
                    }

                    .card {
                        position: relative;
                        display: -ms-flexbox;
                        /* display: flex; */
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
                        /* padding-right: 40px; */

                    }
                </style>

<!-- <form method="post" id="reportForm" action="<?php //echo site_url('reports/downloadReport'); ?>">

<input type="text" name="fileData" type="hidden" value="<?php //echo file_get_contents(__FILE__);?>" style="display: none;">
</form> -->
                <div class="card-header">
                
                    <h5>REPORT</h5><?php if (!empty($advertiser)) {
                                    ?>
                        Advertiser :
                        <strong><?php
                                        echo $advertiser->adv_name;
                                ?></strong>
                    <?php }
   

                    ?>
                   
                     <a class="float-right mr-1 d-print-none" href="<?php echo site_url('reports/downloadReport'); ?>?adv_id=<?php echo $advId;?>&report=advertiser" data-abc="true" target="_blank">
                       
                        <i class="fa fa-save fa-fw" title="Download Report"></i>
                    </a>


                </div>
            </div>
           

            <div class="card-body">



                Report Date: <?php echo Date('Y-m-d'); ?>


            </div>


            <hr>
            <div class="table-responsive ">
                <div style="display: block; ">



                    <div class="bill-table">
                        <?php
                        if ($estlineedit != '') {
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
                                    $sales = 0;
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

                                        $ad_duration = $estlrow->duration;



                                        $pram = $estlrow->price;

                                        $subamount = ($pram * $ad_duration) * $estlrow->package;

                                        $dis = $estlrow->discount;

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

                                        $sales = $sales + $deal_total;

                                    ?>

                                        <tr>
                                            <td><?php echo $i; ?> </td>

                                            <td><i class="fas table-result"></i> <?php echo $estlrow->asp_name; ?> </td>
                                            <td><i class="fas table-result"></i> <?php echo $estlrow->name; ?></td>


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

                                        <?php } ?>
                                        </tr>
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

    