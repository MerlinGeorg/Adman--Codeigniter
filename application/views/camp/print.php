<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Invoice</title>
                                <link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">
                                <link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url('Assets/css/print/style.css')?>" />
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
                                
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
                                <script src="<?php echo base_url()?>js/jquery.min.js"></script>

          
              
             <link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url('Assets/css/print/style.css')?>" />


    
 </head>
    <body>
    <?php  foreach ($invo_reg->result() as $estrow) {  }?>
    <div id="printthis">
      <div class="container-fluid">
     
         <div id="ui-view" data-select2-id="ui-view">
           <div>
            <div class="card" >
          


            <style>



  input[type="checkbox"][checked]
  {
    visibility: visible;
  }
}
   
              
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
    background-color:#346a7d;
    border-bottom: 1px solid #c8ced3;
    color:#ffffff;
}
.fa-print
{
    font-size: 24px;
    color:#ffffff;
}

.fa-file-invoice
{
    font-size: 24px;
    color:#ffffff;
}

.fa-file-excel
{
    font-size: 24px;
    color:#ffffff;
}


.table-header
{ 
    background-color:#346a7d!important;; 
    color:#ffffff; 
  -webkit-print-color-adjust: exact;
    /* display: table-header-group;
    -webkit-print-color-adjust: exact;  */
}



.body-main {
    -webkit-print-color-adjust: exact; 
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
     padding-right:40px;
     
 }
   /* NOTE: This style tag can go anywhere in the email. */
  
   @print{
    @page :footer {color: #fff }
    @page :header {color: #fff}
}
@media print
    {
         .addrow {
           display:none;
       }
       .list_div{
           width: 100%;
           /* padding-left:250px; */
           overflow-x: auto;
           border: 1px ;
           
       }
       .address
       {   
                float:right;
                
                word-wrap: break-word;

       }
       .address2
       {
           
           padding-left:50px;
                 float:left;
          
       }
       .date-div
       {
           padding-top:180px;
           /* float:left; */
          
       }
       .bill-table
       {
        padding-left:150px; 
        padding-right:150px; 
      
        box-sizing: border-box;
        
       }
     
       .bill-tab 
       {
       
        border-spacing: 2px;
        border: 1px solid #dee2e6;
        max-width: 100%;
       }
       td  th
       {
          display: table-cell;
       }
       .table-head
       {
           padding:12px;
       }
       .table-result
       {
           padding:1px;
       }
       .table-total
       {
        font-weight: bolder;
        font-size: 1.5rem;
           padding:15px;
       } 
      
      .div-cal

       {
           padding:12px;
        text-align: right!important;
       }
       .table-des:
       {
        border-bottom-width: 2px;
        vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
    padding: .75rem;
    text-align: inherit;
    font-weight: bold;

       }

    }
    }

</style>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
<script type='text/javascript'></script> 
                <div class="card-header"><h5>INVOICE</h5>Invoice # 2018-2019/MPIBSA/00<?php echo $estimate_num = $estrow->est_id; ?></strong>
                   
                <a class="float-right mr-1 d-print-none" href="#" onclick="printthis()" data-abc="true">
                    <i class="fa fa-print fa-fw" title="Print Invoice"></i></a>
                    <!-- <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                        <i class="fa fa-save"></i> Save</a> -->

            <a href="<?php  echo site_url('camp/camp_invo').'/'.$estrow->est_id ; ?>" class="d-print-none float-right mr-1" ><i class="fas fa-file-invoice fa-fw" title="Make Invice" ></i></a>  </span>
          <a href="<?php  echo site_url('camp/camp_cancel').'/'.$estrow->est_id ; ?>"  class="d-print-none float-right mr-1" mt-4 ><i class="fas fa-file-excel fa-fw" title="Cancel Invoice"></i></a>  


                </div>

                <?php
                           $img= $this->session->userdata('image_name');
                           $companyname=$this->session->userdata('company_nam');
                           $cmpadrs=$this->session->userdata('company_adrs');
                           $email=$this->session->userdata('email');
                           $phone=$this->session->userdata('phone');
                            ?>


                <div class="card-body">
<div class="table-responsive " style=" padding-right: 3px;  padding-left: 3px;"
>
                        <table class="table table-striped list_div ">
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
                                    
                                    <th class="left d-print-none addrow">CLR</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach ($involineedit->result() as $estlrow) { $i++;?>
                                <td class="center"><?php echo $estlrow->asp_name; ?></td>
                                  <td class="left"><?php echo $estlrow->sc_name; ?></td>
                                  <td class="left"><?php echo $estlrow->tp_name; ?></td>
                                  <td class="center"><?php echo $estlrow->price; ?></td>
                                  <td class="center">
                                  <?php echo $amount = ($ad_duration*$estlrow->price)*$estlrow->package; ?></td>
                                  <td class="text-left">
                                  
                                 <?php echo $dis = $estlrow->discount; ?>%</br>
                                  <?php echo $x = ($amount*$dis)/100 ;?></br><?php echo $y = $amount-$x ;?>
                                  </td>
                                  <td class="centert"><?php echo $igst = $estlrow->igst; ?>%</br>
                                  <?php echo $igst_val = ($y*$igst)/100 ;?></br>
                                  
                                  </td>
                                  <td class="center"><?php echo $cgst = $estlrow->cgst; ?>%</br>
                                  <?php echo $cgst_val = ($y*$cgst)/100 ;?>
                                  </td>
                                  <td class="center"><?php echo $sgst = $estlrow->sgst; ?>%</br>
                                  <?php echo $sgst_val = ($y*$sgst)/100 ;?></td>
                                  <td class="center"><?php echo $ltax = $estlrow->local_tax; ?>%</br>
                                  <?php echo $ltax_val = ($y*$ltax)/100 ;?></td>
                                  
                                  <td class="center" style=" font-weight: 600;font-size: 21px;"><?php echo $y+$igst_val+$cgst_val+$sgst_val+$ltax_val ; ?></td>
                                  <td class="left d-print-none" style="width: 1px;">
                                                  
                                  <input name="est_rl_id" id="d2" value="<?php echo $estlrow->est_lineid; ?>" style="display :none ;">
                                  <input name="estid" id="d4" value="<?php echo  $estrow->est_id; ?>" style="display :none ;">
                                

                              </form>
                              <a class="js-arrow addrow" href="<?php echo site_url('camp/invorow_del')?>?var1=<?php echo $estlrow->est_lineid;?>&var2=<?php echo $estrow->est_id; ?>">
<img  src="<?php echo base_url('Assets/img/icon/delete.png'); ?>" style="<height:2></height:2>0px; width:20px" title="Remove"></a></td>


                              </tr>
                            <?PHP } ?>
                            </tbody>
                        </table>
                    </div>
                            </div>     
                    
                    <?php 
$sub_total = 0 ;
$cgst_total = 0 ;
$igst_total = 0 ;
$sgst_total = 0 ;
$sub_amount = 0 ;
$trade_discount = 0 ;
$ltax_total = 0 ;
$index = 1;
$i=0;

foreach ($involineedit->result() as $estlrow) {  $i++;
    
 $pram = $estlrow->price;
     $subamount = ($pram*$ad_duration)*$estlrow->package ;

     $dis = $estlrow->discount;
  $dcamount = ($ad_duration*$estlrow->price)*$estlrow->package;

     $x = ($dcamount*$dis)/100 ;
  $acval = $dcamount-$x ;

     $igst = $estlrow->igst;
     $igst_value = ($acval*$igst)/100 ;

     $cgst = $estlrow->cgst;
     $cgst_value = ($acval*$cgst)/100 ;

     $sgst = $estlrow->sgst;
     $sgst_value = ($acval*$sgst)/100 ;

     $ltax = $estlrow->local_tax;
     $ltax_value = ($acval*$ltax)/100 ;

  $line_total = $acval+$igst_value+$cgst_value+$sgst_value+$ltax_value ;

  $sub_amount += $subamount;
  $trade_discount += $x;
  $sub_total += $acval;
  $cgst_total += $cgst_value;
  $igst_total += $igst_value ;
  $sgst_total += $sgst_value ;
  $ltax_total += $ltax_value ;
  $deal_total = $sub_total+$cgst_total+$igst_total+$sgst_total+$ltax_total ;
  $estrow->adv_name;
}
    
    ?> 
<hr>



<div class="table-responsive " style=" padding-right: 3px;  padding-left: 3px;"
>
                        <table class="table table-striped list_div ">
                            <thead class="table-header">

<!-- <div id="printthis_bill"  style="display: none; page-break-before: always; ">


                    <div class="col-md-8 offset-md-4 bill-table" >
                        <table class="table text-centered table-responsive table-bordered bill-tab">
                            <thead class="table-header" id="theader"> -->
                                <tr>
                                    <th class="lefttable-des">
                                        <h5>Description</h5>
                                    </th>
                                    <th calss="table-des">
                                        <h5>Amount</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td class="table-head"> Campaign / Ad Name </td>
                                    <td style="padding-right: 101px;">  <?php echo $estrow->adv_name; ?> </td>
                                </tr>
                            <tr>
                                    <td class="table-head"> Screens</td>
                                    <td  style="padding-right: 101px;"><?php echo $i ; ?> </td>
                                </tr>
                                <tr>
                                    <td class="table-head"> Sub Amount</td>
                                    <td  style="padding-right: 101px;"><i class="fas fa-rupee-sign" area-hidden="true"></i>  <?php echo $sub_amount ; ?>/- </td>
                                </tr>
                                <!-- <tr>
                                    <td class="col-md-9">Trade Discount</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 5,200 </td>
                                </tr> -->
                                <tr>
                                    <td class="table-head">Total Taxable Amount</td>
                                    <td><i class="fas fa-rupee-sign" area-hidden="true"></i>  <?php echo $sub_total ; ?>/- </td>
                                </tr>
                                <tr>
                                    <td class="table-head">IGST</td>
                                    <td ><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $igst_total ; ?>/-</td>
                                </tr>
                                <tr>
                                    <td class="table-head">CGST</td>
                                    <td ><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $cgst_total ; ?>/-</td>
                                </tr>
                                <tr>
                                    <td class="table-head">SGST</td>
                                    <td ><i class="fas fa-rupee-sign" area-hidden="true"></i>  <?php echo $sgst_total ; ?>/- </td>
                                </tr>
                                
                                <tr>
                                    <td class="text-right div-cal">
                                        <p> <strong>Local Tax:</strong> </p>
                                        <p> <strong>Trade Discount: </strong> </p>
                                        <!-- <p> <strong>Discount: </strong> </p> -->
                                        <p> <strong> Total </strong> </p>
                                    </td>
                                    <td>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $ltax_total ; ?>/- </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>  <?php echo $trade_discount ; ?>/-</strong> </p>
                                        <!-- <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong> </p> -->
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 
                                        <?php
                if(empty($deal_total))
                {
                    echo "Error:"."No screen selected";
                }
                else
                {
                 echo $deal_total."/-" ; 
                }
                 ?></strong> </p>
                                    </td>
                                </tr>
                                <tr style="color: #346a7d;">
                                    <td class="text-right table-total">
                                        <h4><strong> Deal Value </strong></h4>
                                    </td>
                                    <td class="text-left table-total">
                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i>  <?php
                if(empty($deal_total))
                {
                    echo "Error:"."No screen selected";
                }
                else
                {
                    echo $textval = round($deal_total)  ."/-" ; 
                }
                 ?> </strong></h4>
                                    </td>
            </tr>
                      
                                <tr >
              <td style=" font-weight: 100;font-size: 10px;">
            
​
<div  id="autoUpdate" class="autoUpdate"><img src="<?php echo base_url();?>Assets/img/icon/sign.png" style="height : 76px;"> </div>   <br>
Authorised Signatory <br>
Meharali Poilungal Ismail<br>
Advertising Service Provider <br>
Current Account Details: Name: MEHARALI P I, Account No: 0250073000050159, IFSC: SIBL0000250, Bank: South Indian Bank
  </td>
     
            
          </tr>
                            </tbody>
                        </table>
                    </div>



                    
            
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script>

$(document).ready(function () {
  $('#checkbox1').change(function () {
      if (!this.checked) 
      //  ^
         $('#autoUpdate').show();
      else 
          $('#autoUpdate').hide();
  });
});

$('.chDiscount').on('keyup', function(){
    var tstvalu=$(this).val();
    //   alert(sal.value);
    // alert($(this).parent('form').html());
      var disvalues = $(this).parent('form').serialize();
    //   alert(disvalues);
      $.ajax({
          type: "POST",
          url: "<?php echo site_url('camp/update_discount'); ?>",
          data: disvalues ,
          dataType: "html",
          success: function(data){
              if(tstvalu.length!=0)
              {

            location.reload() ;
              }

            //   $(sal).each(function(){
            // if($(this).val()!="")
            //   {
            //       location.reload() ;
            //   }
            //   });
             
          },
          error: function() { alert("Error posting feed."); }
     });  
  });
</script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script type="text/javascript">


function printthis()

{
var divToPrint2 = document.getElementById('printthis_bill').style.display='block';
var w = window.open('', '', 'width=500,height=800,resizeable,scrollbars');

w.document.write($("#printthis").html());
w.document.close(); // needed for chrome and safari
javascript:w.print();
w.close();
var divToPrint2 = document.getElementById('printthis_bill').style.display='none';
return false;
}




$('.start_date').on('change',function(){
    var start_value=$(this).val();
    var disvalues = $(this).parent('form').serialize();
    
      $.ajax({
          type: "POST",
          url: "<?php echo site_url('invoice/update_sdate'); ?>",
          data: disvalues ,
          dataType: "html",
          success: function(data){
              
              if(start_value.length!=0)
              {

            location.reload() ;
              }

            //   $(sal).each(function(){
            // if($(this).val()!="")
            //   {
            //       location.reload() ;
            //   }
            //   });
             
          },
          error: function() { alert("Error posting feed."); }
     });  

   
   
})

function makeinvoice()

{
alert("please wait") ;
}
</script>
<script>

function get_batch()
  {
      
          $.ajax({
          type:"post",
          data:{course_id:$('#a').val(),},
          url:"<?php echo site_url('camp/get_batch')?>",
          success:function(data){
          $('#output_batch').html(data);
          }
      });
      
  }
  
function outputscreen(screen){
      
document.getElementById('scrval').value =screen.value;

}
</script>



</body>
 </html>

