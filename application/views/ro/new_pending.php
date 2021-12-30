<div style="display :none; ">

    <?php // $this->load->view('ro/header_menu.php');
    ?>

</div>


<div class="form-group">


    <select name="newpending" id="newpending" class="form-control" onChange="outputscreen(this)">
        <option value="">Select Pending Screen</option>
        <?php foreach ($newpending->result() as $row) { ?>
            <option value="<?php echo $row->sc_id ?>"><?php echo $row->sc_name; ?></option>
        <?php } ?>
    </select>
</div>