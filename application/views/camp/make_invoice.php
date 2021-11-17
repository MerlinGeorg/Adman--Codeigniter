
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/frm_style.css') ?>">


<script src="<?php echo base_url()?>Assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>



<script>

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
function setText7(obj){
    var val = obj.value;
    console.log(val);
    document.getElementById("exid").value = val;

     
}

function myFunction() {

    var x = document.getElementById("divexist");
	 var y = document.getElementById("divnew");
    if (x.style.display === "none") {
        x.style.display = "block";
		y.style.display = "none";
    } 
}
function youFunction() {

    var x = document.getElementById("divexist");
	 var y = document.getElementById("divnew");
    if (y.style.display === "none") {
        y.style.display = "block";
		x.style.display = "none";
    } 

}

$(document).ready(function(){
    $("#newbutton").trigger('click');  
});


</script>

 <div id="wrapper">
  <div id="page-wrapper">
       <div class="row card">
             <div class="card-header">
                   Add Content
             </div>

           <div class="col-lg-12 card-body">
             <div class="panel panel-default">
                        <!-- <div class="panel-heading">Advertise Service Provider</div> -->
                <div class="panel-body">

                <div  class="d-flex justify-content-center" >  

                  <!-- <i class="fa fa-square-o" aria-hidden="true"> -->
                  <h3 class="pull-right">Est # <?php echo $inest_id ; ?></h3>
                  <!-- <label class="label_head"> Estimate # :<?php echo $inest_id ; ?></label> -->
                </i>
                </div>
                <div class="mybtn row d-flex justify-content-center mt-4 " >
                  <ul class="nav btn-group btn-group-lg" id="side-menu" >
                     <li>
                        <button  class="btn  btn-info " id="newbutton"  onclick="youFunction()">New Content
                       </button>                        
                     </li>
                    <li>
                      <button  class="btn  btn-info " style="margin-left: 10px !important;"  id="exutton" onclick="myFunction()">Ex Content
                      </button>
                               
                    </li>
                                          
                     </ul>
                   </div>
                   <div class="form-group">

          <form method="post" action="<?php echo site_url('camp/content_new') ; ?>" >  
          <div class="row" id="divnew">
            <div class="col-lg-12">
                 <!-- <h4 align="center" class="page-header head_clr" > New</h4> -->
             </div>
        <div class="col-lg-12 ">
           <div class="form-group">
             <label>Content Name</label>
             <input class="form-control" placeholder="Content Name" name="content_name" required="required" >
           </div>
        <input  name="nest_id" value="<?php echo $inest_id ; ?>" style="display:none;" >
       <div class="form-group"> 
           <label>Content Type</label>
           <select class="form-control" name="content_type" required="required">
               <?php  foreach ($c_type->result() as $crow) {  ?>

                         <option ><?php echo $crow->content_type; ?></option>
              <?php } ?>
                                                 
           </select> 
     </div>  
     <div class="d-flex justify-content-center">
      <input type="submit" class="btn btn-info " value="Submit">
      </div>
    </form>
    </div>

</div>
        </div>



<div class="d-flex h-100 " >
<div class="m-auto">

        <form method="post"  action="<?php echo site_url('camp/content_exist') ; ?>" >  
        <div class="form-group row" style="display : none;" id="divexist">
                <div class="col-lg-16">
                    <h4 class="page-header head_clr"> Campaign Dash</h4>
                </div>
 
          <div class="col-lg-12">
                <div class="form-group">
          
          <select class="form-control" name="cnt" id="cnt" onChange="setText7(this)">
            
             <?php 

             foreach ($exist_content->result() as $excrow)
              { ?>
           <option  value="<?php echo $excrow->con_id; ?>" ><?php echo $excrow->con_id; ?>  	&nbsp; &nbsp;  <?php echo $excrow->content_name;  ?>
 
    
<!-- <button class="btn btn-outline btn-primary btn-lg btn-block" type="button" name="btnSeven" id="btnSeven" value="<?php echo $excrow->con_id; ?>" onclick="setText7(this)"><?php echo $excrow->con_id; ?>***<?php echo $excrow->content_name;  ?></button> -->


</option>


             <?php } ?>  
       
        </select>             
                
            <div class="col-lg-12 mt-4">
            <input class="form-control lign-text-bottom text-center" name="content_id" id="exid" readonly >
            <input class="form-control" name="est_id" style="display : none;" value="<?php echo $inest_id ; ?>"  >
          
            </div>
            <div class="d-flex justify-content-center mt-4">
      <input type="submit" class="btn btn-info " value="Submit">
      </div></form>
                    </div>
   
                    
                     </div>   
                    </div>
       </div>
     </div>

        <!-- Navigation -->
   
     <!-- ////////////////////////////////////////////////////////////////.panel-body -->        
          </div>


<script>
  $('#cnt').select2({
    theme: 'bootstrap4',
});
const ps = new PerfectScrollbar('#cnt');
ps.update();
  </script>