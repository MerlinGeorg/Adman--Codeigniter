<script src="<?php echo base_url()?>Assets/js/jquery.min.js"></script>
<!-- <head> -->
<script type="text/javascript">
var uri = window.location.toString();
if (uri.indexOf("?") > 0) {
    var clean_uri = uri.substring(0, uri.indexOf("?"));
    window.history.replaceState({}, document.title, clean_uri);
}
</script>
<!-- </head> -->
<!-- <body> -->


<?php //$this->load->view('ro/header_menu.php'); ?>
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
                        
                       
                                          
                     </ul> -->
                            <!-- /.nav-second-level -->
                       
                <!-- </div> -->
                <!-- /.sidebar-collapse -->
            <!-- </div> -->
            <!-- /.navbar-static-side -->
                <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header"> Create New Campaign</h4>
					<?php if($msg==1) { $a = "block";} else { $a = "none" ;} ?>
					<div class="alert alert-success" style="display:<?php echo $a ; ?>;" >
						<h5>Estimate has been saved</h5>
                         
                            </div>
                </div>
 <!-- /////////////////////////////////////////////////////////.panel-body -->     
  
  <div class="row"> <form>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create Campaign Step 1</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Campaign Name</label>
                                            <input class="form-control" placeholder="Enter Campaign Name" name="camp_name"  >

                                        </div>
				       <div class="form-group">
				       <label style="margin-top: 10px;">Campaign Date</label>
                                            <input class="form-control" type="date" name="cr_date"  value="<?php print(date("Y-m-d")); ?>" readonly >

                                        </div>
                                        
                                  
<div class="form-group">
                                          <label>Duration</label></label>
                              <input class="form-control"   name="du" type="number">

                                        </div> 
                                </div>
                                 
                                <div class="col-lg-6">
                                     <div class="form-group">
                                          <label>Select Advertiser</label>
                              <input class="form-control" placeholder="Search Advertiser" name="name" id="myInput" onkeyup="filterFunction()">

                                        </div> 
					
					
			<div style="margin-bottom: 10px; /* margin-left: -37px; */height: 99px;/* overflow:scroll; *//* overflow-y:hidden; */overflow-x:scroll;">
		<div id="myDropdown" class="dropdown-content">
    
 <?php 

			 foreach ($adv->result() as $advrow)
				{ ?>
    
<a><button style="padding: 1px;color: #5bc0de;borde-color: red;background-color: white;border: none;" class="btn btn-outline btn-primary btn-lg btn-block" type="button" name="btnSeven" id="btnSeven" value="<?php echo $advrow->adv_id; ?>" onclick="setText7(this)"><?php echo $advrow->adv_name;	 ?></button>
</a>


  <?php }	?>  
  </div>
  </div>
   <div class="form-group" > 
       <select class="form-control" id="b" name="b" >
                                            <?php 
foreach ($adv->result() as $advrow)
				{
			?>
			<option value="<?php echo $advrow->adv_id;	 ?>"><?php echo $advrow->adv_name;	 ?></option>
                                          	<?php }	?>     
                                            </select> 
</div>
                                
<input type="text" id="adv_id" style="display: none;">
		
                                              
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
 <div class="form-group" > 
                   <select class="form-control" id="a" name="a" onChange="outputValue(this), get_batch()" >
                   <option selected >Select ASP</option>
                                            <?php 
foreach ($asp->result() as $asprow)
				{
			?>
			<option value="<?php echo $asprow->asp_id;	 ?>"><?php echo $asprow->asp_name;	 ?></option>
                                          	<?php }	?>     
                                            </select> 
                                            <input type="text" name="aspname" id="aspname" style="display : none ;" />
</div>
<div class="form-group" id="output_batch" > 
                   <select class="form-control" name="batch" onChange="outputscreen(this)">
                                          
   			<option value="">Select Screen</option>
                                           
                                           </select>                                        
</div>
                      <input type="text" name="scname" id="scname" style=" display:  none;" />            
                                </div>
                                <div class="col-lg-6">
                         <div class="form-group" > 
                   <select class="form-control" name="pol" >
                                      <option selected >Time Policy</option>
                                            <?php 
foreach ($tpolicy->result() as $tprow)
				{
			?>
			<option value="<?php echo $tprow->tpc;	 ?>"><?php echo $tprow->tp_name;	 ?></option>
                                          	<?php }	?>     
                                            </select> 
                                        
</div>            
					<button type="button" class="btn btn-outline btn-primary btn-lg btn-block"  onclick="addRow('dataTable', a, du, aspname, scname, batch, pol)" >Add Row</button>
			
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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

</thead>
</tr>
</TABLE>

<table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTable"  role="grid" aria-describedby="dataTables-example_info" style="width: 100%;margin-bottom: -14px;
">
                               
                                
                                 
                               
                            </table>
                            
                        </div>
						
              <input  class="btn btn-outline btn-primary btn-lg btn-block" type="button"  value="Save" onclick="gatherData(du, camp_name, b)">

                    </div></form>
      
  <script >
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
    document.getElementById('b').value = val;
 var area = document.getElementById ("b");
   document.getElementById('adv_id').value = val;

}
function outputValue(item){

document.getElementById('aspname').value = e = item.options[item.selectedIndex].text;

 // document.getElementById('adv_id').value = item.value;
 
}

function outputscreen(screen){

document.getElementById('scname').value =screen.options[screen.selectedIndex].text;

}


 function addRow(tableID, a, du, aspname, scname, batch, pol) 
{
	
///////////////////
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
			
    }
   
    
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

	
	
function gatherData(du, camp_name, b) {


 	 var data = [];
         var table = document.getElementById('dataTable');

	 
         for (r = 0; r < table.rows.length-1; r++) {
		
             var row = table.rows[r+1];
             var cells = row.cells;

		 data.push({
				
				 asp: cells[1].innerHTML,
				 sid: cells[3].innerHTML,
				 pol: cells[5].innerHTML,
				 dur: (du.value),
				 cname: (camp_name.value),
				 adv: (b.value)
			     });
	 				 
 
	}

var mydatas = JSON.stringify(data)

window.location.href ='<?php echo site_url('camp/create_estimate'); ?>/?mdata='+encodeURI(mydatas);

}


  </script>
<!-- </body> -->
     