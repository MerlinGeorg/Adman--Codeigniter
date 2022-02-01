<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
                        <h5>REPORT</h5>
               <?php if(!empty($date)){
                    ?>         
                        Date:
                        <strong><?php 
                        echo $date; 
                                ?></strong>
                                <?php } ?>

                                <?php if(!empty($fromDate)){
                    ?>         
                        From :
                        <strong><?php  
                        echo $fromDate; 
                                ?></strong>
                                <?php } ?><br>
                                <?php if(!empty($toDate)){
                    ?>         
                        To :
                        <strong><?php 
                        echo $toDate; 
                                ?></strong>
                                <?php } ?>
                                <?php if(!empty($month)){
                    ?>         
                        Month :
                        <strong><?php 
                        echo $month; 
                                ?></strong>
                                <?php } ?><br>
                                <?php if(!empty($advertiser)){
                    ?>         
                        Advertiser :
                        <strong><?php echo $advertiser; 
                                ?></strong>
                                <?php } ?>
                                <?php $view_path= $_ci_view;
                               $page=explode('/',$view_path);
                              ?>
                       
                    </div>

                   
                    <div class="card-body">


                        <div class="table-responsive ">
                        Report Date:<?php echo Date('Y-m-d');?>

                        </div>
                    </div>


                    <hr>
                    <div style="display: block; ">



                        <div class="bill-table">
                        <h4><strong>No Sales!</strong></h4>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</body>

</html>