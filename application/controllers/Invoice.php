<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invoice extends Layout_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('invoice/invomodel');
		$this->load->model('camp/campmodel');
		$this->load->model('ro/romodel');
		$this->load->library('numbertowords');
	}

	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$this->load->view('invoice/invo_dash');
		} else {
			$this->sess_out();
		}
	}

	public function create_inward_invoice()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$invodata['username'] = $this->session->userdata('logged_in')['username'];
			$invodata['email'] = $this->session->userdata('logged_in')['email'];
			//	$invodata['camp'] = $this->romodel->get_releaselist();
			// $invodata['camp'] = $this->romodel->get_ro_reg_list();
			$invodata['camp'] = $this->invomodel->getCampaignInRoreg();
			$invodata['asp'] = $this->invomodel->getAspInRoreg();
			$invodata['adv'] = $this->campmodel->getadv();
			$invodata['title'] = "Create Inward Invoices";
			$invodata['msg'] = 0;
			$this->data = $invodata;
			$this->page = "invoice/create_inward_invoice";
			$this->layout();
		} else {
			echo "no";
		}
	}
	public function inward_invoice_save()
	{
		if (isset($this->session->userdata['logged_in'])) {
			// $this->form_validation->set_rules('ro_id', 'ro_id', 'numeric|required');
			$this->form_validation->set_rules('content_name', 'content_name', 'trim|required');

			if ($this->form_validation->run() == true) {
				$cr_date = date("Y/m/d");

				$camp_id = $this->input->post('campId');
				$camp_name = $this->invomodel->get_ro_re_list($camp_id);
				$adv_name = $this->input->post('ro_adv');
				$adv_id = $this->invomodel->get_adv_list($adv_name);
				$asp_id = $this->input->post('aspId');

				// print_r($aspName);
				// die();
				$invo_data = array(
					'ro_id' => $camp_name->ro_id,
					'adv_id' => $adv_id->adv_id,
					'camp_id' => $camp_id,
					'asp' => $asp_id,
					'camp_name' => $camp_name->est_name,
					'duration' => $this->input->post('duration'),
					'adv_name' => $adv_name,
					'content_name' => $this->input->post('content_name'),
					'cr_date' => $cr_date,
					'play' => "preshow",
				);
				// print_r($invo_data);
				// exit();
				$id = $this->invomodel->insert_inward_invoice('inward_invoice', $invo_data);

				$screen = $this->campmodel->get_batch('screen', $asp_id);

				// print_r($screen->result());
				// die();
				foreach ($screen->result() as $sc) { //print_r($sc);die();

					// $mscreen_data = $this->invomodel->get_screen('screen', $screen);
					$mscreen_data = $this->invomodel->get_screen('screen', $sc->sc_id);
				}
				// print_r($mscreen_data->result());
				// die();
				foreach ($mscreen_data->result() as $scdata) {
					//	print_r($scdata);
					//	die();
					$nrs = $scdata->sc_id;
					$sc_price = $scdata->sc_price;
					$cgst = $scdata->cgst;
					$sgst = $scdata->sgst;
					$igst = $scdata->igst;
					$ltax = $scdata->local_tax;
				}
				$ro = $this->invomodel->getDataByInwardId($id);
				$roId = $ro->result()[0];
				//	print_r($roId->ro_id);die();
				$roPackage = $this->invomodel->getRoPackage($roId->ro_id);
				$package = $roPackage->result()[0];
				//print_r($package->result()[0]);die();
				$pack_dates = $this->invomodel->get_packdate($package->package);
				foreach ($pack_dates->result() as $pdate) {
					$next_date = $pdate->days;
				}

				$en_d = '+' . $next_date . ' day';
				$newdate = strtotime($en_d, strtotime($cr_date));
				$newdate = date('Y-m-d', $newdate);

				$newest_ldata = array(
					'inward_id' => $id,
					'invo_id' => 0,
					'asp' => $asp_id,
					'est_id' => $camp_id,
					'screen' => $nrs,
					'duration' => $this->input->post('duration'),
					'package' => $package->package,
					'start_date' => $cr_date,
					'end_date' => $newdate,
					'pack_date' => $next_date,
					'status' => 1,
					'discount' => 0,

					'price' => $sc_price,
					'cgst' => $cgst,
					'sgst' => $sgst,
					'igst' => $igst,
					'ltax' => $ltax,
				);
				//	print_r($newest_ldata);
				//	die();
				$this->invomodel->insert_invo_data('invo_reg_line', $newest_ldata);
				$invodata['msg'] = 1;
			} else {
				$invodata['msg'] = 0;
			}
			$invodata['username'] = $this->session->userdata('logged_in')['username'];
			$invodata['email'] = $this->session->userdata('logged_in')['email'];
			$invodata['camp'] = $this->invomodel->getCampaignInRoreg();
			$invodata['asp'] = $this->invomodel->getAspInRoreg();
			// $invodata['camp'] = $this->romodel->get_ro_reg_list();
			$invodata['adv'] = $this->campmodel->getadv();
			$invodata['title'] = "Create Inward Invoices";

			$this->data = $invodata;
			$this->page = "invoice/create_inward_invoice";
			$this->layout();
		} else {
			$this->sess_out();
		}
	}
	//////////////////////////////////////////////////////////////////////////////
	function _alpha_dash_space($str_in = '')
	{
		if (!preg_match("/^([-a-z0-9_ ])+$/i", $str_in)) {
			$this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	////////////////////////////////////////////////////////// 
	public function list_outward_invoice()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$invo_list['username'] = $this->session->userdata('logged_in')['username'];
			$invo_list['email'] = $this->session->userdata('logged_in')['email'];
			$invo_list['involist'] = $this->invomodel->get_involist();
			$invo_list['title'] = "Outward Invoices";

			$this->data = $invo_list;
			$this->page = "invoice/outward_invoice";
			$this->layout();

			// $this->load->view('invoice/invoice', $invo_list);
		} else {
			$this->sess_out();
		}
	}
	///////////////////////////////

	public function list_inward_invoice()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$invo_list['username'] = $this->session->userdata('logged_in')['username'];
			$invo_list['email'] = $this->session->userdata('logged_in')['email'];
			// $invo_list['involist'] = $this->invomodel->get_inward_involist();
			$invo_list['title'] = "Inward Invoices";
			$invo_list['involist']    = $this->invomodel->list_inward_invoices();
			$this->data = $invo_list;
			$this->page = "invoice/inward_invoice";
			$this->layout();

			// $this->load->view('invoice/invoice', $invo_list);
		} else {
			$this->sess_out();
		}
	}
	///////////////////////////////


	public function invoice_edit()
	{
		if (isset($this->session->userdata['logged_in'])) {


			$invo_id = $this->uri->segment(3);
			$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($invo_id);
			$invo_list['n_asp'] = $this->invomodel->getasp();
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
			$invo_list['involineedit'] = $this->invomodel->get_involine_edit($invo_id);
			$this->load->view('invoice/invoice_edit', $invo_list);
		} else {
			$this->sess_out();
		}
	}

	////////////////////////////////////////////////////////////////////
	public function invoice_inward_edit()
	{
		if (isset($this->session->userdata['logged_in'])) {


			$invo_id = $this->uri->segment(3);
			
			$invo_list['invo_reg'] = $this->invomodel->get_invoreglinelist($invo_id);
			$invo_list['n_asp'] = $this->invomodel->getasp();
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
			$invo_list['involineedit'] = $this->invomodel->inward_involine_edit($invo_id); //to display data on clicking addRow
		
			$this->load->view('invoice/inward_invoice_edit', $invo_list);
		} else {
			$this->sess_out();
		}
	}
	/////////////////////////////////////////////////////////////
	function update_discount()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$rordid = $this->input->post('ro_ids');
			$rolid = $this->input->post('ro_lid');
			$rodis = $this->input->post('ro_discount');
			$invo_no = $this->input->post('invo_no');
			$invo_date = $this->input->post('invo_date');
			$rototal = $this->input->post('final_amount');



			$this->invomodel->update_discount($rolid, $rodis, $invo_no, $invo_date, $rototal);

			$ro_list['ro_reg'] = $this->invomodel->get_roreglist($rordid);

			$this->load->view('invoice/ro_edit', $ro_list);
		} else {
			$this->sess_out();
		}
	}
	////////////////////////////////////////////////////////////////
	function post_ro()
	{

		if (isset($this->session->userdata['logged_in'])) {
			$ro_idst = $this->uri->segment(3);

			$this->invomodel->update_ro_status($ro_idst);
			$this->invomodel->update_ro_line_status($ro_idst);
			echo  "<script type='text/javascript'>";
			echo "window.close();";
			echo "</script>";
		} else {
			$this->sess_out();
		}
	}

	///////////////////////////////////////////////////////////////////
	function nr_involine()
	{

		if (isset($this->session->userdata['logged_in'])) {

			$invoid = $this->input->post('nr_invoid');
			$nestid = $this->input->post('nr_estid');
			$nr_asp = $this->input->post('nr_asp');
			$nrs = $this->input->post('nr_screen');
			$nr_duration = $this->input->post('nr_duration');
			$nr_pack = $this->input->post('nr_pack');
			$cr_date = date("Y/m/d");
			$nr_discount = $this->input->post('nr_discount');

			$pack_dates = $this->invomodel->get_packdate($nr_pack);
			foreach ($pack_dates->result() as $pdate) {
				$next_date = $pdate->days;
			}

			$en_d = '+' . $next_date . ' day';
			$newdate = strtotime($en_d, strtotime($cr_date));
			$newdate = date('Y-m-d', $newdate);

			if ($nr_discount == '') {
				$nr_discount = 0;
			}

			/////////////////////////////////////////////////////////////////

			$mscreen_data = $this->invomodel->get_screen('screen', $nrs);
			foreach ($mscreen_data->result() as $scdata) {
				$sc_price = $scdata->sc_price;
				$cgst = $scdata->cgst;
				$sgst = $scdata->sgst;
				$igst = $scdata->igst;
				$ltax = $scdata->local_tax;
			}
			$newest_ldata = array(
				'invo_id' => $invoid,
				'est_id' => $nestid,
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
			$url = base_url() . "invoice/invoice_edit/" . $invoid;
			redirect($url);

			// $invo_list['invo_reg'] = $this->invomodel->get_invoreglist($invoid);
			// $invo_list['n_asp'] = $this->invomodel->getasp();
			// $invo_list['n_package'] = $this->invomodel->gettpolicy();
			// $invo_list['involineedit'] = $this->invomodel->get_involine_edit($invoid);
			// $this->load->view('invoice/invoice_edit', $invo_list);
		} else {
			$this->sess_out();
		}
	}
	///////////////////////////////////////////////////
	function row_del()
	{
		$rowid = $this->input->get('var1');
		$rowestid = $this->input->get('var2');
		if (isset($this->session->userdata['logged_in'])) {

			
			$this->invomodel->did_delete_row($rowid);
			// $url = base_url() . "invoice/invoice_edit/" . $rowestid;
			// redirect($url);

			$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($rowestid);
			$invo_list['n_asp'] = $this->invomodel->getasp();
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
			$invo_list['involineedit'] = $this->invomodel->get_involine_edit($rowestid);
			$this->load->view('invoice/invoice_edit', $invo_list);
			

		} else {
			$this->sess_out();
		}
	}
	function inward_row_del()
	{
		$rowid = $this->input->get('var1');
		$rowestid = $this->input->get('var2');
		if (isset($this->session->userdata['logged_in'])) {

			$this->invomodel->did_delete_row($rowid);
			// $url = base_url() . "invoice/invoice_inward_edit/" . $rowestid;
			// redirect($url);
			 $invo_list['invo_reg'] = $this->invomodel->get_invoreglinelist($rowestid);
			$invo_list['n_asp'] = $this->invomodel->getasp();
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
			$invo_list['involineedit'] = $this->invomodel->inward_involine_edit($rowestid);
			$this->load->view('invoice/inward_invoice_edit', $invo_list); 
		} else {
			$this->sess_out();
		}
	}

	function inward_involine()
	{

		if (isset($this->session->userdata['logged_in'])) {

			$invoid = $this->input->post('nr_invoid');

			// print_r($invoid);
			// die();
			$nestid = $this->input->post('nr_estid');
			// 	print_r($nestid);
			// die();			
			$nr_asp = $this->input->post('nr_asp');
			$nrs = $this->input->post('nr_screen');
			$nr_duration = $this->input->post('nr_duration');
			$nr_pack = $this->input->post('nr_pack');
			$cr_date = date("Y/m/d");
			$nr_discount = $this->input->post('nr_discount');

			//print_r($nrs);
			//die();

			$pack_dates = $this->invomodel->get_packdate($nr_pack);
			foreach ($pack_dates->result() as $pdate) {
				$next_date = $pdate->days;
			}

			$en_d = '+' . $next_date . ' day';
			$newdate = strtotime($en_d, strtotime($cr_date));
			$newdate = date('Y-m-d', $newdate);

			if ($nr_discount == '') {
				$nr_discount = 0;
			}

			/////////////////////////////////////////////////////////////////

			$mscreen_data = $this->invomodel->get_screen('screen', $nrs);
			foreach ($mscreen_data->result() as $scdata) {

				$sc_price = $scdata->sc_price;
				$cgst = $scdata->cgst;
				$sgst = $scdata->sgst;

				$igst = $scdata->igst;

				$ltax = $scdata->local_tax;
			}
			$newest_ldata = array(
				//'invo_id' => $invoid,
				'inward_id' => $invoid,
				'est_id' => $nestid,
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
			// print_r($newest_ldata);
			// 	die();
			$invo_regline_id = $this->invomodel->insert_invo_data('invo_reg_line', $newest_ldata);

			$url = base_url() . "invoice/invoice_inward_edit/" . $invoid;
			redirect($url);

			/* $invo_list['invo_reg'] = $this->invomodel->get_invoreglinelist($invoid);
			$invo_list['n_asp'] = $this->invomodel->getasp();
			// $invo_list['n_asp'] =$this->invomodel->getAspByInwardId($invoid);
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
			$invo_list['involineedit'] = $this->invomodel->inward_involine_edit($invoid);
			$this->load->view('invoice/inward_invoice_edit', $invo_list); */
		} else {
			$this->sess_out();
		}
	}

	///////////////////////////////////
	/* function nr_involine()
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


		if (isset($this->session->userdata['logged_in'])) 
		{
			$invo_id = $this->uri->segment(3);

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
		$estId=$this->campmodel->getEstId($nestid);
		$invo_list['logo']  = $this->campmodel->getInvoLogo($estId->est_id);
		$this->load->view('invoice/invoice_edit', $invo_list);

				$adv_id = $row->adv_id;
				$content_id = $row->content_id;
				$est_name = $row->est_name;
			}

}
////////////////////////////
function row_del()
{
	$rowid = $this->input->get('var1');
	$rowestid = $this->input->get('var2');	
if(isset($this->session->userdata['logged_in'])){

	// $rowid = $this->input->post('row_id');
	// $rowestid = $this->input->post('row_invoid');	
	$this->invomodel->did_delete_row($rowid);
	$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($rowestid);
		$invo_list['n_asp'] = $this->invomodel->getasp();	
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($rowestid);
		$estId=$this->campmodel->getEstId($rowestid);
		$invo_list['logo']  = $this->campmodel->getInvoLogo($estId->est_id);
		$this->load->view('invoice/invoice_edit', $invo_list);
		// redirect('invoice/list_outward_invoice');
	
}
else{
	$this->sess_out();
}	
}*/
	////////////////////////////
	function update_sdate()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$cr_date = $this->input->post('start_date');
			$invoid = $this->input->post('invo_id');
			$involid = $this->input->post('invo_lid');
			$next_date = $this->input->post('pkdate');
			$en_d = '+' . $next_date . ' day';
			$newdate = strtotime($en_d, strtotime($cr_date));
			$newdate = date('Y-m-d', $newdate);

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
			echo json_encode($invo_list);
		} else {
			$this->sess_out();
		}
	}
	////////////////////////////////////////
	function make_ro()
	{


		if (isset($this->session->userdata['logged_in'])) {
			$invo_id = $this->uri->segment(3);

			$adv =	 $this->invomodel->get_involinedata_adv($invo_id);
			foreach ($adv->result() as $row) {

				$adv_id = $row->adv_id;
				$content_id = $row->content_id;
				$est_name = $row->est_name;
			}

			$invoice_line_data = $this->invomodel->get_involinedata($invo_id);


			foreach ($invoice_line_data->result() as $involinedata) {
				$cr_date = date("Y/m/d");

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
					'line_total' => 0,
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
		} else {
			$this->sess_out();
		}
	}
	////////////////////////////////////////////////////////////////
	function pl_involine()
	{
		$plinvoid = $this->input->post('pl_invoid');
		$play = $this->input->post('play');
		$this->invomodel->update_play_data($play,  $plinvoid);
		$invo_list['invo_reg'] = $this->invomodel->get_invoreglist($plinvoid);
		$invo_list['n_asp'] = $this->invomodel->getasp();
		$invo_list['n_package'] = $this->invomodel->gettpolicy();
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($plinvoid);
		$estId = $this->campmodel->getEstId($plinvoid);
		$invo_list['logo']  = $this->campmodel->getInvoLogo($estId->est_id);
		$this->load->view('invoice/invoice_edit', $invo_list);
	}
}
