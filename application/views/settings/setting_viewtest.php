<?php foreach($logodata->result() as $list_logo) { print_r($list_logo);die();?>
                                     <option <?php if($lgid==$list_logo['logo_id']) {?> selected <?php } ?> data-subtext="<img width='10px' height='10px''  src='<?=base_url("Assets/img/logo/".$list_logo['logo_name']);?>'>"  
    value="<?php echo $list_logo['logo_id']; ?>"  ><?php echo $list_logo['company_name']; ?></option>
                                          <?php 
                                            }