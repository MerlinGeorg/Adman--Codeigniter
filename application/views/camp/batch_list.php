        <div style="display :none; ">
		
<?php //$this->load->view('camp/header_menu.php'); ?>

</div>


		<div class="form-group" > 


<select name="batch" id="batch" class="form-control" onChange="outputscreen(this)" >
<option value="">select screen</option>
<?php foreach($batch->result() as $row) {?>
	<option value="<?php echo $row->sc_id?>"><?php echo $row->sc_name;?>---<?php echo $row->city;?></option>
<?php }?>
</select>
                </div>