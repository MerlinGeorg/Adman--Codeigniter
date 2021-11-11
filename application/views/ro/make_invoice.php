

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
</script>


<div style="display :none ;"><?php $this->load->view('ro/header_menu.php'); ?></div>
 <div id="wrapper">

        <!-- Navigation -->
   
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>                
                    <div class="fa fa-dashboard fa-fw"><h4 style="text-align:center;  color: #9f2ab3;"> Estimate # :<?php echo $inest_id ; ?></h4></div>
                    </li>
                        <li><button  class="btn btn-outline btn-primary btn-lg btn-block"  onclick="youFunction()">New Content</button>                        
                        </li>
                        <li>
						<button  class="btn btn-outline btn-primary btn-lg btn-block"  onclick="myFunction()">Ex Content</button>
					                     
                        </li>
                        
                       
                                          
                     </ul>
                            <!-- /.nav-second-level -->
                       
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
                <div id="page-wrapper">
	<!-- /////////////////////////////////////////////////////////.panel-body -->    
	<form method="post" action="<?php echo site_url('camp/content_new') ; ?>" >  
            <div class="row" id="divnew">
                <div class="col-lg-12">
                    <h4 class="page-header"> New</h4>
                </div>
				<div class="col-lg-6">
   							<div class="form-group">
                                            <label>Content Name</label>
            <input class="form-control" placeholder="Content Name" name="content_name"  >
                                        </div>
										 <input  name="nest_id" value="<?php echo $inest_id ; ?>" style="display:none;" >
										
									<div class="form-group"> 
									 <label>Content Type</label>
       <select class="form-control" name="content_type">
	    <?php  foreach ($c_type->result() as $crow) {  ?>

                                            			<option ><?php echo $crow->content_type; ?></option>
                                          			<?php } ?>
                                          	     
          </select> 
</div>	
			<input type="submit" class="btn btn-info" value="Submit"></form>
										</div>
										
               </div>
		 <!-- ////////////////////////////////////////////////////////////////.panel-body -->
<!-- /////////////////////////////////////////////////////////.panel-body -->   
	<form method="post" action="<?php echo site_url('camp/content_exist') ; ?>" >  
            <div class="row" style="display : none;" id="divexist">
                <div class="col-lg-12">
                    <h4 class="page-header"> Campaign Dash</h4>
                </div>
 
  				<div class="col-lg-6">
   							<div class="form-group">
                                            <label>Content Search</label>
    <input class="form-control" placeholder="Product Search.." name="name" id="myInput" onkeyup="filterFunction()">                                    </div>									
										
									<div class="form-group"> 
									
									 <div style="margin-bottom: 10px;margin-left: -37px;height:179px;overflow:scroll;overflow-y:scroll;overflow-x:scroll;">
      <div id="myDropdown" class="dropdown-content">
    
 <?php 

			foreach ($exist_content->result() as $excrow)
				{ ?>
    
<a><button style="padding: 1px;color: #5bc0de;borde-color: red;background-color: white;border: none;" class="btn btn-outline btn-primary btn-lg btn-block" type="button" name="btnSeven" id="btnSeven" value="<?php echo $excrow->con_id; ?>" onclick="setText7(this)"><?php echo $excrow->con_id; ?>***<?php echo $excrow->content_name; ?></button>
</a>


  <?php }	?>  
  </div>

         </div>                            
								</div>
								<div class="col-lg-6">
						<input class="form-control" name="content_id" id="exid" readonly >
						<input class="form-control" name="est_id" style="display : none;" value="<?php echo $inest_id ; ?>"  >
					
						</div></br></br>
			<input type="submit" class="btn btn-info" value="Submit"></form>
										</div>
   
                    
                        
                    </div>
		 <!-- ////////////////////////////////////////////////////////////////.panel-body -->				 
					</div>
                  
               


