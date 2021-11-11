<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Edit RO</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
                                <link href= "<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.css' );?>" rel="stylesheet" media="all">
<link href= "<?php echo base_url('vendor/font-awesome-4.7/css/font-awesome.min.css');?>" rel="stylesheet" media="all">
  <link href= "<?php echo base_url('vendor/font-awesome-5/css/fontawesome-all.min.css');?>" rel="stylesheet" media="all">
                                <style>.card {
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
    background-color: #39678c;
    border-bottom: 1px solid #c8ced3;
    color:#ffffff;
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
 th{
    background-color: #39678c;
    color:#ffffff;
 }

</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
                                <script type='text/javascript'></script>
                            </head>
                            <body>
                            <div class="container-fluid">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card" >


            <div class="card-header"><h5 style="margin-left: 24px;">Release Order</h5><div style="margin-left: 24px;">RO-ID # 
                    <strong><?php echo $estimate_num = $ro_reg[0]->ro_id; ?></strong></div>
                   <span class="btn btn-info float-right" style="margin-left: 10px; width: 185px;"><a style="color: white;" href="printpage" onClick="printthis(); return false;">Print</a>  </span>
          <span class="btn btn-info float-right" style="width: 185px;"><a style="color: white;" href="<?php  echo site_url('ro/make_ro').'/'.$ro_reg[0]->ro_id ; ?>" >Post Invoice</a>  </span>
                        
                      
                </div>



                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-sm-4" style="margin-left: 24px;">
                            <h6 class="mb-3">Billed To:</h6>
                            <div>
                                <strong> <?php echo $advertiser = $ro_reg[0]->adv_name; ?></strong>
                            </div>
                            <div><?php echo $adv_cp = $ro_reg[0]->c_person; ?></div>
                            <!-- <div><?php  echo $adv_phone = $ro_reg[0]->phone_1; ?></div> -->
                            <div>Email: <?php echo $adv_email = $ro_reg[0]->email; ?></div>
                            <div>Phone: <?php  echo $adv_phone = $ro_reg[0]->phone_1; ?></div>
                        </div>
                        
                        <div class="col-sm-3 ml-auto mt-4">
                            
                            <div><strong>Est Date:</strong>
                               <?php echo $est_date = $ro_reg[0]->cr_date; ?>
                            </div>
                            <div><strong>Camp Name:</strong>
                                <?php echo $campname = $ro_reg[0]->est_name; ?>
                            </div>
                            <div><strong>Content Duration:</strong>
                                <?php echo $ad_duration = $ro_reg[0]->duration; ?>/sec
                            </div>
                           
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th class="column1" width="-5px">ASP</th>
                                                  <th class="column2">Screen</th>
                                                  <th class="column3">Date</th>
                                                  <th class="column4">Package</th>
                                                  <th class="column5">Rate</th>
                                                  <th class="column6">Amount</th>
                                                  <th class="column7">Discount</th>
                                                  <th class="column8">IGST</th>
                                                  <th class="column9">CGST</th>
                                                  <th class="column10">SGST</th>
                                                  <th class="column11">L-Tax</th>
                                                  <th class="column12">Total</th>
                                                  <th class="column13">ASP Disc</th>
                                                  <th class="column14">Amount</th>
                                                  <th class="column15">Invoice No.</th>
                                                  <th class="column16">Invoice Date</th>
                                                  <th class="column17">Save</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ro_reg as $estrow) { ?>
                                <tr>
                                <form method="post" action="<?php echo site_url('invoice/update_discount') ; ?>" >
                                     
                                    <td class="column1"><?php echo $estrow->asp_name; ?></td>
                                    <td class="column2"><?php echo $estrow->sc_name; ?></td>
                                    <td class="column3"><?php echo $estrow->start_date; ?>
                                       </br>
                                        <?php echo $estrow->end_date; ?>	</td>
                                    <td class="column4"><?php echo $estrow->tp_name; ?> </td>
                                    <td class="column5"><?php echo $estrow->price; ?></td>
                                    <td class="column6"> <?php echo $amount = ($ad_duration*$estrow->price)*$estrow->package; ?></td>
                                    <td class="column7"> <?php echo $dis = $estrow->ro_discount; ?>%</br>
                                                  <?php echo $x = ($amount*$dis)/100 ;?></br><?php echo $y = $amount-$x ;?>
                                                  </td>
                                    <td class="column8"><?php echo $igst = $estrow->igst; ?>%</br>
                                                  <?php echo $igst_val = ($y*$igst)/100 ;?></br>
                                                  
                                                  </td>  
                                   <td class="column9"><?php echo $cgst = $estrow->cgst; ?>%</br>
                                                  <?php echo $cgst_val = ($y*$cgst)/100 ;?>
                                                  </td>
                                  <td class="column10"><?php echo $sgst = $estrow->sgst; ?>%</br>
                                                  <?php echo $sgst_val = ($y*$sgst)/100 ;?></td>
                                  <td class="column11"><?php echo $ltax = $estrow->local_tax; ?>%</br>
                                                  <?php echo $ltax_val = ($y*$ltax)/100 ;?></td>
                                  <td class="column12"><h5><?php echo $totalval = $y+$igst_val+$cgst_val+$sgst_val+$ltax_val ; ?></h5></td>
                                  <td class="column13">
                                      <input type="hidden" name="ro_ids" maxlength="2"  value="<?php echo $estrow->ro_id; ?>">
                                         <input type="hidden" name="ro_lid" maxlength="2"  value="<?php echo $estrow->ro_lid; ?>">
                                     <div class="d-flex">
                                      <input type="text" name="ro_discount" maxlength="2"  value="<?php echo $aspdis = $estrow->asp_discount; ?>" style="width: 27px;outline: 1px solid #7d7b7b6b;"><span>%</span></div></br>
                                      <?php echo $fdisval = ($totalval*$aspdis)/100 ;?>
                                              

                                </td>
                                <td class="column14" ><?php echo $roactval = $totalval-$fdisval ; ?>
                                 <input type="number" name="final_amount"  value="<?php echo $roactval ; ?>" style="display:none;">

                              </td>
                              <td class="column15" ><input type="text" name="invo_no" value="<?php echo $estrow->invo_no; ?>" style="width: 70px;outline: 1px solid #7d7b7b6b;"></br></td>
                              <td class="column16" ><input type="text" name="invo_date" value="<?php echo $estrow->invo_date; ?>" style="width: 70px;outline: 1px solid #7d7b7b6b;"></br></td>
                              <td class="column17" > <button type="submit" style="font-size: 20px; color:#2283d8;"><i class="fas fa-save"></i></button></td>








                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>

                        <div id="printthis" style="display:none;" >





<style>
  .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, .15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
  }
  
  .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
  }
  
  .invoice-box table td {
      padding: 5px;
      vertical-align: top;
  }
  
  .invoice-box table tr td:nth-child(2) {
      text-align: right;
  }
  
  .invoice-box table tr.top table td {
      padding-bottom: 20px;
  }
  
  .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
  }
  
  .invoice-box table tr.information table td {
      padding-bottom: 40px;
  }
  
  .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
  }
  
  .invoice-box table tr.details td {
      padding-bottom: 20px;
  }
  
  .invoice-box table tr.item td{
      border-bottom: 1px solid #eee;
  }
  
  .invoice-box table tr.item.last td {
      border-bottom: none;
  }
  
  .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
  }
  
  @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
      }
      
      .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
      }
  }
  
  /** RTL **/
  .rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  }
  
  .rtl table {
      text-align: right;
  }
  
  .rtl table tr td:nth-child(2) {
      text-align: left;
  }
  #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #d4d4d4;
  color:#000000;
}
  </style>


<?php
                           $img= $this->session->userdata('image_name');
                           $companyname=$this->session->userdata('company_nam');
                           $cmpadrs=$this->session->userdata('company_adrs');
                           $email=$this->session->userdata('email');
                           $phone=$this->session->userdata('phone');
                            ?>

<div class="invoice-box">
      <table cellpadding="0" cellspacing="0" style="
  max-width: 101%;
">
          <tr class="top">
              <td colspan="2">
                  <table>
                   <tr >
              <p style="color: #b1aeae;font-weight: 600;font-size: 21px;text-align:  center;"> Release Order </p>               
          </tr>
                      <tr>
                          <td class="title">
                              <img src='<?=base_url("Assets/img/logo/$img") ?>' style="height : 76px;">
                          </td>
                   
                          <td>
                              RO #: <?php echo $estimate_num ; ?><br>
                             <?php echo $est_date ;?>
                            
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          
          <tr class="information">
           <tr class="heading">
              <td>
               
              </td>
              
              <td>
                 Billed To:
              </td>
          </tr>
              <td colspan="2">
                  <table>
                      <tr>
                          <td>
                          
       <?php echo $companyname ?><br>
       <?php echo $cmpadrs ?><br>
       <!-- <?php echo $companyname ?><br> -->
       <!-- <?php echo $companyname ?><br> -->
       Email :  <?php echo $email ?><br>
       Phone :  <?php echo $phone ?><br>

                             
                          </td>
                          
                          <td>
                             <?php echo $adv_cp ; ?><br>
                              <?php  echo $adv_phone ; ?><br>
                             <?php echo $adv_email ; ?>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          
          <tr class="heading">
              <td>
                 Camp Name
              </td>
              
              <td>
                  Content Duration
              </td>
          </tr>
          
          <tr class="details">
              <td>
                  <?php echo $campname  ; ?>
              </td>
              
              <td>
                   <?php echo $ad_duration  ; ?>/sec
              </td>
          </tr>
                   
      </table>
<div class="container-table100">
  <div class="wrap-table100">
      <div class="table100">		
          <table id="customers">
              <thead>
                  <tr class="table100-head" style="font-size: 12px;">
                                              <th class="column1">ASP</th>
                                              <th class="column2">SCREEN</th>
                                              <th class="column3">Package</th>
                                              <th class="column4">Rate</th>
                                              <th class="column5">Discount</th>
                                              <th class="column6">IGST</th>
                                              <th class="column7">CGST</th>
                                              <th class="column8">SGST</th>
                                              <th class="column9">L-Tax</th>
                                              <th class="column10">Total</th>
                  </tr>
              </thead>
          <?php 
          $sub_total = 0 ;

          foreach ($ro_reg as $estlrow) { ?>
          <tr>
              <td class="column1"><?php echo $estlrow->asp_name; ?></td>
              <td class="column2"><?php echo $estlrow->sc_name; ?></td>
              <td class="column3"><?php echo $estlrow->tp_name; ?></td>
              <td class="column4"><?php echo $estlrow->price; ?></td>
                              <td class="column5"><?php echo $dis = $estlrow->asp_discount; ?>%<br>
              <?php	$dcamount = ($ad_duration*$estlrow->price)*$estlrow->package; 
              
              echo $x = ($dcamount*$dis)/100 ;
              $acval = $dcamount-$x ;
              
              ?></td>

                          <td class="column6"><?php echo $igst = $estlrow->igst; ?>%<br><?php echo $igst_value = ($acval*$igst)/100 ;?></td>

                              <td class="column7"><?php echo $cgst = $estlrow->cgst; ?>%</br>
                                              <?php echo $cgst_value = ($acval*$cgst)/100 ;?></td>

                                  <td class="column8"><?php echo $sgst = $estlrow->sgst; ?>%</br>
                                              <?php echo $sgst_value = ($acval*$sgst)/100 ;?></td>

                                      <td class="column9"><?php echo $ltax = $estlrow->local_tax; ?>%</br>
                                              <?php echo $ltax_value = ($acval*$ltax)/100 ;?></td>
                                              
                                              <td class="column10"><?php echo $line_total = $acval+$igst_value+$cgst_value+$sgst_value+$ltax_value ; ?></td>


          </tr>
          <?php

          $sub_total += $line_total;

          } ?>
          </table>
      </div>
  </div>
</div>
<table>
       
           <tr class="information">
           <tr class="heading">
              <td>
              Total Amount
              </td>
              
              <td>
                <?php echo $sub_total ; ?>/-
              </td>
          </tr>
          <tr >
              <td style=" font-size: 11px;">
Paymet By Cheque/Bank transfer to the name MEHARALI P.I
              <td>
                
              </td>
          </tr>
          <tr >
              <td style=" font-weight: 100;font-size: 10px;">
              Account Number : 0250073000050159<br>
IFSC Code SIBL0000250                </td>
              
            
          </tr>
          </tr>
      </table>
  </div>
</div>


                        
                    </div>
                    <script>

                        
function printthis()

{
var w = window.open('', '', 'width=500,height=800,resizeable,scrollbars');
w.document.write($("#printthis").html());
w.document.close(); // needed for chrome and safari
javascript:w.print();
w.close();
return false;
}
function makeinvoice()

{
alert("please wait") ;
}
</script>
</body>
