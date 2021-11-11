<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Invoice extends Layout_Controller {

public function __construct() {
parent::__construct();
$this->load->model('invoice/invomodel');
$this->load->library('numbertowords');

}
	
public function index()
					{
if(isset($this->session->userdata['logged_in'])){
				
						$this->load->view('invoice/invo_dash');
					}
					else { $this->sess_out();	}		
					}


public function list_outward_invoice()
					{
if(isset($this->session->userdata['logged_in'])){	
				 $invo_list['username'] = $this->session->userdata('logged_in')['username'];
				 $invo_list['email'] = $this->session->userdata('logged_in')['email'];
				 $invo_list['involist'] = $this->invomodel->get_involist();
				 $invo_list['title'] = "Outward Invoices";

				$this->data = $invo_list;
				$this->page = "invoice/outward_invoice";
				$this->layout();

				// $this->load->view('invoice/invoice', $invo_list);
						}
					else { $this->sess_out();	}		
					}
///////////////////////////////

public function list_inward_invoice()
					{
if(isset($this->session->userdata['logged_in'])){	
				 $invo_list['username'] = $this->session->userdata('logged_in')['username'];
				 $invo_list['email'] = $this->session->userdata('logged_in')['email'];	
				 $invo_list['involist'] = $this->invomodel->get_inward_involist();
				 $invo_list['title'] = "Inward Invoices";

				$this->data = $invo_list;
				$this->page = "invoice/inward_invoice";
				$this->layout();

				// $this->load->view('invoice/invoice', $invo_list);
						}
					else { $this->sess_out();	}		
					}
///////////////////////////////


public function invoice_edit()
					{
if(isset($this->session->userdata['logged_in'])){	


		$invo_id = $this->uri->segment(3);
 		$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($invo_id);
		$invo_list['n_asp'] = $this->invomodel->getasp();	
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($invo_id);
				$this->load->view('invoice/invoice_edit', $invo_list);
						}
					else { $this->sess_out();	}		
					}

//////////////////////////
public function invoice_inward_edit()
{
	if(isset($this->session->userdata['logged_in'])){	
	
	
			 $ro_id = $this->uri->segment(3);
			 $ro_list['ro_reg'] = $this->invomodel->get_roreglist($ro_id);
		
			 $this->load->view('invoice/ro_edit', $ro_list);
			
							}
						else { $this->sess_out();	}		
						}
	//////////////////////////
	function update_discount()
	{
	if(isset($this->session->userdata['logged_in'])){
	
		$rordid = $this->input->post('ro_ids');
		$rolid = $this->input->post('ro_lid');
		$rodis = $this->input->post('ro_discount');
		$invo_no = $this->input->post('invo_no');	
		$invo_date = $this->input->post('invo_date');		
		$rototal = $this->input->post('final_amount');	
		
		// print_r($this->input->post());
		// return true;
	
		$this->invomodel->update_discount($rolid,$rodis,$invo_no,$invo_date,$rototal);
		
		$ro_list['ro_reg'] = $this->invomodel->get_roreglist($rordid);
		
			$this->load->view('invoice/ro_edit', $ro_list);
		
	}
	else{
		$this->sess_out();
	}	
	}
	function post_ro()
	{
		
	if(isset($this->session->userdata['logged_in'])){
	 $ro_idst = $this->uri->segment(3);
	
		$this->invomodel->update_ro_status($ro_idst);
		$this->invomodel->update_ro_line_status($ro_idst);
		echo  "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";	
		
	}
	else{
		$this->sess_out();
	}
}	

///////////////////////////////////
function nr_involine()
{

if(isset($this->session->userdata['logged_in'])){
	
$invoid = $this->input->post('nr_invoid');
$nestid = $this->input->post('nr_estid');
$nr_asp = $this->input->post('nr_asp');
$nrs = $this->input->post('nr_screen');
$nr_duration = $this->input->post('nr_duration');
$nr_pack = $this->input->post('nr_pack');
$cr_date = date("Y/m/d") ;
$nr_discount = $this->input->post('nr_discount');


$pack_dates = $this->invomodel->get_packdate($nr_pack);
foreach ($pack_dates->result() as $pdate) 
{
$next_date = $pdate->days ;
}

$en_d = '+'.$next_date.' day' ;
$newdate = strtotime ($en_d , strtotime ( $cr_date ) ) ;
$newdate = date ( 'Y-m-d' , $newdate );

if($nr_discount=='')
{
	$nr_discount = 0;
}

/////////////////////////////////////////////////////////////////

$mscreen_data =$this->invomodel->get_screen('screen',$nrs);
	 foreach ($mscreen_data->result() as $scdata) 
	 {
		$sc_price = $scdata->sc_price;
		$cgst = $scdata->cgst;
		$sgst = $scdata->sgst;
		$igst = $scdata->igst;
		$ltax = $scdata->local_tax;
	 }
$newest_ldata = array(
					'invo_id'=>$invoid,
					'est_id'=>$nestid,
					'asp' => $nr_asp,
					'screen' => $nrs,
					'duration' => $nr_duration,
					'package' => $nr_pack,
					'price' => $sc_price,
					'cgst' => $cgst,
					'sgst' => $sgst,
					'igst' => $igst,
					'ltax' => $ltax,
					'start_date' => $cr_date,
					'end_date' => $newdate,
					'pack_date' => $next_date,
					'status' => 1,
					'discount' => $nr_discount
				);
				
$this->invomodel->insert_invo_data('invo_reg_line', $newest_ldata);
		$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($invoid);
		$invo_list['n_asp'] = $this->invomodel->getasp();	
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($invoid);
		$this->load->view('invoice/invoice_edit', $invo_list);

}
else{
	$this->sess_out();
}	

}
////////////////////////////
function row_del()
{
if(isset($this->session->userdata['logged_in'])){

	$rowid = $this->input->post('row_id');
	$rowestid = $this->input->post('row_invoid');	
	$this->invomodel->did_delete_row($rowid);
	$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($rowestid);
		$invo_list['n_asp'] = $this->invomodel->getasp();	
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($rowestid);
		$this->load->view('invoice/invoice_edit', $invo_list);
	
}
else{
	$this->sess_out();
}	
}
////////////////////////////
function update_sdate()
{
if(isset($this->session->userdata['logged_in'])){

	 $cr_date = $this->input->post('start_date');
	 $invoid = $this->input->post('invo_id');
     $involid = $this->input->post('invo_lid');
	 $next_date= $this->input->post('pkdate');
$en_d = '+'.$next_date.' day' ;
$newdate = strtotime ($en_d , strtotime ( $cr_date ) ) ;
$newdate = date ( 'Y-m-d' , $newdate );

$invo_linedata = array(
					
					'start_date' => $cr_date,
					'end_date' => $newdate
					
				);
				
$this->invomodel->update_invo_data('invo_reg_line', $invo_linedata,  $involid);
	$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($invoid);
		$invo_list['n_asp'] = $this->invomodel->getasp();	
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($invoid);
		//$this->load->view('invoice/invoice_edit', $invo_list);
		echo json_encode( $invo_list );
	
}
else{
	$this->sess_out();
}	
}
////////////////////////////////////////
function make_ro()
{
	

if(isset($this->session->userdata['logged_in'])){
		$invo_id = $this->uri->segment(3);
		
	$adv =	 $this->invomodel->get_involinedata_adv($invo_id);
	foreach($adv->result() as $row) {
		
		$adv_id = $row->adv_id ;
		$content_id = $row->content_id ;
		$est_name = $row->est_name ;
	}
	
		$invoice_line_data = $this->invomodel->get_involinedata($invo_id);

			
foreach ($invoice_line_data->result() as $involinedata) 
	 { 	 
	 $cr_date = date("Y/m/d") ;
	
	$invo_reg_line = array(
	
				'invo_lid' =>  $involinedata->invo_reg_lineid,
				'invo_id' =>  $invo_id,
				'adv_id' =>  $adv_id,
				'est_name' =>  $est_name,
				'content_id' =>  $content_id,
				'est_id' =>  $involinedata->est_id,
				'asp' =>  $involinedata->asp,
					'screen' =>  $involinedata->screen,
					'duration' =>  $involinedata->duration,
					'package' => $involinedata->package,
					'discount' => $involinedata->discount,
					'price' => $involinedata->price,
					'cgst' => $involinedata->cgst,
					'sgst' => $involinedata->sgst,
					'igst' => $involinedata->igst,
					'ltax' => $involinedata->ltax,
					'start_date' => $involinedata->start_date,
					'end_date' => $involinedata->end_date,
					'end_date' => $involinedata->end_date,
					'line_total' =>0,
					'asp_discount' => 0,
					'cr_date' => $cr_date,
					'status' => 1
				      			);
$this->invomodel->create_ro_data($invo_reg_line);

	 }
$this->invomodel->invo_status($invo_id);
 echo  "<script type='text/javascript'>";
    echo "window.close();";
    echo "</script>";
	
	
}
else{
	$this->sess_out();
}	


}
//////////////////////////
function pl_involine()
{
 $plinvoid = $this->input->post('pl_invoid');
 $play = $this->input->post('play');
  $this->invomodel->update_play_data($play,  $plinvoid);
	   $invo_list['invo_reg'] = $this->invomodel->get_invoreglist($plinvoid);
		$invo_list['n_asp'] = $this->invomodel->getasp();	
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($plinvoid);
				$this->load->view('invoice/invoice_edit', $invo_list);
}

}

?>
