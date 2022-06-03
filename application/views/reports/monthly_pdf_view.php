<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='text/html;charset="UTF-8"' http-equiv="Content-Type">
    <title>Report</title>

</head>

<body>
   
    <div class="container-fluid" id="printthis">
        <style>
      
        </style>

        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">

                    <div class="card-header">
                        <h5>REPORT</h5><?php if(!empty($month)){
                    ?>         
                        Month :
                        <strong><?php 
                        echo $month; 
                                ?></strong>
                                <?php } ?>
                               
                        <!-- <a class="float-right mr-1 d-print-none" href="#" onclick="savePDF();return false;" data-abc="true"> -->
                        <a class="float-right mr-1 d-print-none" href="<?php echo site_url('reports/downloadReport'); ?>?month=<?php echo $month;?>&report=monthly" data-abc="true">    
                        <i class="fa fa-save fa-fw" title="Download Report"></i></a>
                        
                    </div>

                  
                    <div class="card-body">


                       

                       Report Date: <?php echo Date('Y-m-d');?>
                        
                    </div>


                    <hr> <div class="table-responsive ">
                    <div style="display: block;  ">



                        <div class="bill-table" style="overflow-x: auto;box-sizing: border-box;">
                            <?php 
                            if($estlineedit !=''){
                                ?>
                            
                            <table class="table text-centered table-bordered bill-tab" style="overflow-x: auto;
                                    border-spacing: 2px;
                                    border: 1px solid #dee2e6;
                                    max-width: 100%;
                                    width: 100%;">
                                <thead class="table-header" id="theader" style="background-color: #346a7d;color: #ffffff;-webkit-print-color-adjust: exact;">
                                    <tr>
                                        <th class="left table-des" style="padding:12px;">
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
                                        <td style="padding-bottom:12px;">
                                            <p> <strong><i class="fas fa-rupee-sign table-result" area-hidden="true"></i>
                                                    <?php

                                                    echo $deal_total . "/-";

                                                    ?></strong> </p>
                                        </td>
                                    
                                    <?php } ?></tr>
                                    <tr style="color: #346a7d;">
                                        <td class="text-right table-total" style="font-weight: bolder;
                                    font-size: 1.5rem;
                                    padding: 15px;">
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






                    </div></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</body>

</html>