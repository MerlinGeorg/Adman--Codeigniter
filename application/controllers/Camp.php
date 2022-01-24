<?php

/**
 * camp
 */
class camp extends Layout_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('camp/campmodel');
		$this->load->model('invoice/invomodel');
		$this->load->model('settingmodel/Settingmodel');
	}


	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$this->load->view('camp/camp_dash');
		} else {
			$this->sess_out();
		}
	}


	public function create_camp()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$advdata['username'] = $this->session->userdata('logged_in')['username'];
			$advdata['email'] = $this->session->userdata('logged_in')['email'];
			$advdata['title'] = "Create Campaign";
			$advdata['msg'] = 0;
			$advdata['adv'] = $this->campmodel->getadv();
			$advdata['asp'] = $this->campmodel->getasp();
			$advdata['tpolicy'] = $this->campmodel->gettpolicy();
			$advdata['user'] = $this->Settingmodel->list_logo();
			$advdata['exist_content'] = $this->campmodel->get_content();
			$advdata['c_type'] = $this->campmodel->get_ctype();

			$this->data = $advdata;
			$this->page = "camp/create_camp";
			$this->layout();
			// $this->load->view('camp/create_camp', $advdata);
		} else {
			$this->sess_out();
		}
	}
	///////////////////////////////
	function get_batch()
	{
		$asp_id = $this->input->post('course_id');
		$data['batch'] = $this->campmodel->get_batch('screen', $asp_id);

		$this->load->view('camp/batch_list', $data);
	}
	////////////////////
	public function create_estimate()
	{
		if (isset($this->session->userdata['logged_in'])) {
//echo "hi";
//die();
			$myArray =  $_REQUEST['mdata'];
			$estdata = json_decode($myArray);

			foreach ($estdata as $estim) {
				$customer = $estim->cname;
				$duration = $estim->dur;
				$adv = $estim->adv;
				$user = $estim->user;
				$publish = $estim->publish_date;
				$asp = $estim->aspId;
				$content_inid = $estim->cnt;
				$content_name = $estim->content_name;
				$content_type = $estim->content_type;
				$nr_pack=$estim->pol;
			//	$endDate=$estim->endDate;
			}
//print_r($customer);
//print_r($duration);
//print_r($adv);
//die();
			if (($customer != '') && ($duration != '') && ($adv != '')) {

				/////////////////////////////////////////////////////
				if (!empty($content_name && $content_type)) {
					$new_content = array(
						'content_name' => $content_name,
						'content_type' => $content_type
					);
					$content_inid = $this->campmodel->insert_invo_data($new_content);
				}
				$cr_date = date("Y/m/d");
//print_r($nr_pack);die(); //2
				$pack_dates = $this->invomodel->get_packdate($nr_pack);
				//print_r($pack_dates->result());die(); 
			foreach ($pack_dates->result() as $pdate) {
				$next_date = $pdate->days; //13
				//print_r($next_date);
			}
//die();
			$en_d = '+' . $next_date . ' day';
		//	print_r($en_d);die();//+13 day
			$newdate = strtotime($en_d, strtotime($publish));
		//	print_r($newdate);die();//1643929200
			$newdate = date('Y-m-d', $newdate);
//print_r($newdate);die();
				$est_data = array(
					'name' => $customer,
					'duration' => $duration, //content duration
					'est_cr_date' => $cr_date,
					'lst_date' => $newdate,
					'status' => 1,
					'adv_id' => $adv,
					'logo_id' => $user,
					'publish_date' => $publish,
					//'asp' => $asp,
					'content_id' => $content_inid,
				);
		//print_r($est_data);die();		
				$est_id = $this->campmodel->insert_est_data('est_reg', $est_data);
				//////////////////////////////////////////////////////////
				foreach ($estdata as $estim) {
					//////////////////////////////////////////////////////	
					$screen_id = $estim->sid;
					$play=$estim->play;
					$screen_data = $this->campmodel->get_screen('screen', $screen_id);
					foreach ($screen_data->result() as $scdata) {
						$sc_price = $scdata->sc_price;
						$cgst = $scdata->cgst;
						$sgst = $scdata->sgst;
						$igst = $scdata->igst;
						$ltax = $scdata->local_tax;
					}
					/////////////////////////////////////////////////////
					$est_ldata = array(
						'est_id' => $est_id,
						'asp' => $estim->asp,
						'screen' => $estim->sid,
						'duration' => $duration,
						'package' => $estim->pol,//campaignDuration
						'price' => $sc_price,
						'cgst' => $cgst,
						'sgst' => $sgst,
						'igst' => $igst,
						'ltax' => $ltax,
						'cr_date' => $cr_date,
						'discount' => 0,
						'sc_status'=>1,
						'play'=>$play
					);
					$this->campmodel->insert_est_data('est_line', $est_ldata);
				}

				$advdata['username'] = $this->session->userdata('logged_in')['username'];
				$advdata['email'] = $this->session->userdata('logged_in')['email'];
				$advdata['infomsg'] = "no";
				$advdata['title'] = "";
				$advdata['msg'] = 1;
				$advdata['adv'] = $this->campmodel->getadv();
				$advdata['asp'] = $this->campmodel->getasp();
				$advdata['tpolicy'] = $this->campmodel->gettpolicy();
				$advdata['user'] = $this->Settingmodel->list_logo();
				$advdata['exist_content'] = $this->campmodel->get_content();
				$advdata['c_type'] = $this->campmodel->get_ctype();

				$this->data = $advdata;
				$this->page = "camp/create_camp";
				$this->layout();



				/*$advdata['msg'] = 1;
 						$advdata['adv'] = $this->campmodel->getadv();
 						$advdata['asp'] = $this->campmodel->getasp();	
 						$advdata['tpolicy'] = $this->campmodel->gettpolicy();	


 						$this->load->view('camp/create_camp', $advdata);*/
			} else {

				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$this->sess_out();
		}
	}
	////////////estimate///////////
	function list_estimates()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$esti_list['username'] = $this->session->userdata('logged_in')['username'];
			$esti_list['email'] = $this->session->userdata('logged_in')['email'];
			$esti_list['estlist'] = $this->campmodel->get_estlist();
			$esti_list['title'] = "Estimates";

			$this->data = $esti_list;
			$this->page = "camp/estimate";
			$this->layout();

			// $this->load->view('camp/estimate', $esti_list);
		} else {
			$this->sess_out();
		}
	}
	////////////////////////////
	function update_discount()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$estid = $this->input->post('estid');
			$dvalue = $this->input->post('dis_value');
			$eid = $this->input->post('est_rl_id');

			$this->campmodel->update_discount($eid, $dvalue);
			$est_edit['n_package'] = $this->campmodel->gettpolicy();
			$est_edit['n_asp'] = $this->campmodel->getasp();
			$est_edit['estedit'] = $this->campmodel->get_estedit($estid);
			$est_edit['estlineedit'] = $this->campmodel->get_estline_edit($estid);
			//$this->load->view('camp/estimate_edit', $est_edit);

			echo json_encode($est_edit);
		} else {
			$this->sess_out();
		}
	}

	/////////////////////////////
	function camp_edit()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$est_id = $this->uri->segment(3);
			$est_status = $this->campmodel->get_eststatus($est_id);
			foreach ($est_status->result() as $stcdata) {
				$status = $stcdata->status;
			}

			if ($status == 1) {
				$est_edit['n_package'] = $this->campmodel->gettpolicy();
				$est_edit['n_asp'] = $this->campmodel->getasp();
				$est_edit['estedit'] = $this->campmodel->get_estedit($est_id);
				$est_edit['estlineedit'] = $this->campmodel->get_estline_edit($est_id);
				$est_edit['logo']  = $this->campmodel->getLogo($est_id);
				//$est_edit['asp'] = $this->campmodel->getaspByEstId($est_id);
				$this->load->view('camp/estimate_edit', $est_edit);
			} else {


				$esti_list['estlist'] = $this->campmodel->get_estlist();
				$this->load->view('estimate', $esti_list);
				echo  "<script type='text/javascript'>";
				echo "window.close();";
				echo "</script>";
			}
		} else {
			$this->sess_out();
		}
	}




	//////////////////////////


	function invo_edit()
	{
		if (isset($this->session->userdata['logged_in'])) {


			$invo_id = $this->uri->segment(3);
			//print_r($invo_id);die();
			$invo_list['invo_reg'] = $this->campmodel->get_invoedreglist($invo_id);
			$invo_list['n_asp'] = $this->campmodel->getasp();
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
		//	$invo_list['involineedit'] = $this->campmodel->get_invoedline_edit($invo_id);
		$invo_list['involineedit'] = $this->invomodel->get_involine_edit($invo_id);
		//	$invo_list['logo']  = $this->campmodel->getLogo($invo_id);
		$invo_list['logo']  =$this->campmodel->getInvoLogo($invo_id);
//print_r($invo_list['logo']->result());die();
			//	$estId=$this->campmodel->getEstId($invo_id);
			$invo_list['asp'] = $this->campmodel->getaspByInvoId($invo_id);
			$this->load->view('camp/invoice_edit', $invo_list);
			//   $this->load->view('camp/invoice_edittest', $invo_list);
		} else {
			$this->sess_out();
		}
	}


	/////////////////////////////
	function camp_cancel()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$est_cid = $this->uri->segment(3);
			$this->campmodel->cancel_est($est_cid);
			$this->list_estimates();
		} else {
			$this->sess_out();
		}
	}
	/////////////////////////////
	function nr_estline()
	{

		if (isset($this->session->userdata['logged_in'])) {
			$nestid = $this->input->post('nr_estid');
			$nr_duration = $this->input->post('nr_duration');
			$nr_asp = $this->input->post('nr_asp');
			if ($nr_asp == '') {
				$nr_asp = $this->input->post('aspHid');
			}
			$nrs = $this->input->post('nr_screen');
			$cr_date = date("Y/m/d");
			$nr_pack = $this->input->post('nr_pack');
			$nr_discount = $this->input->post('nr_discount');
			if ($nr_discount == '') {
				$nr_discount = 0;
			}
			$play = $this->input->post('play');
			/////////////////////////////////////////////////////////////////

			$mscreen_data = $this->campmodel->get_screen('screen', $nrs);
			foreach ($mscreen_data->result() as $scdata) {
				$sc_price = $scdata->sc_price;
				$cgst = $scdata->cgst;
				$sgst = $scdata->sgst;
				$igst = $scdata->igst;
				$ltax = $scdata->local_tax;
			}
			$newest_ldata = array(
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
				'cr_date' => $cr_date,
				'discount' => $nr_discount,
				'sc_status'=>1,
				'play'=>$play
			);
			$this->campmodel->update_estData($nestid, $nr_asp);
			$this->campmodel->insert_est_data('est_line', $newest_ldata);
			//////////////////////////////////////////////////////////////////
			$est_edit['n_package'] = $this->campmodel->gettpolicy();
			$est_edit['n_asp'] = $this->campmodel->getasp();
			$est_edit['estedit'] = $this->campmodel->get_estedit($nestid);
			$est_edit['estlineedit'] = $this->campmodel->get_estline_edit($nestid);
			$invo_list['logo']  = $this->campmodel->getLogo($nestid);
			redirect($_SERVER['HTTP_REFERER']);
			$this->load->view('camp/estimate_edit', $est_edit);
		} else {
			$this->sess_out();
		}
	}
	////////////////////////////

	function nr_inline()
	{

		if (isset($this->session->userdata['logged_in'])) {
			$nestid = $this->input->post('nr_estid');
			$nr_duration = $this->input->post('nr_duration');
			$nr_asp = $this->input->post('nr_asp');
			if ($nr_asp == '') {
				$nr_asp = $this->input->post('aspHid');
			}

			$nrs = $this->input->post('nr_screen');
			$cr_date = date("Y/m/d");
			$nr_pack = $this->input->post('nr_pack');
			$nr_discount = $this->input->post('nr_discount');
			if ($nr_discount == '') {
				$nr_discount = 0;
			}
			/////////////////////////////////////////////////////////////////

			$mscreen_data = $this->campmodel->get_screen('screen', $nrs);
			foreach ($mscreen_data->result() as $scdata) {
				$sc_price = $scdata->sc_price;
				$cgst = $scdata->cgst;
				$sgst = $scdata->sgst;
				$igst = $scdata->igst;
				$ltax = $scdata->local_tax;
			}
			$newest_ldata = array(
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
				'cr_date' => $cr_date,
				'discount' => $nr_discount,
				'sc_status'=>1
			);

			$this->campmodel->insert_est_data('est_line', $newest_ldata);
			//////////////////////////////////////////////////////////////////
			//    $est_edit['n_package'] = $this->campmodel->gettpolicy();		
			// 	$est_edit['n_asp'] = $this->campmodel->getasp();	
			// 	$est_edit['estedit'] = $this->campmodel->get_estedit($nestid);
			// 	$est_edit['estlineedit'] = $this->campmodel->get_estline_edit($nestid);
			// 	$this->load->view('camp/invoice_edit', $est_edit);


			$invo_list['invo_reg'] = $this->campmodel->get_invoedreglist($nestid);
			$invo_list['n_asp'] = $this->campmodel->getasp();
			$invo_list['n_package'] = $this->invomodel->gettpolicy();
			$invo_list['involineedit'] = $this->campmodel->get_invoedline_edit($nestid);
			$invo_list['logo']  = $this->campmodel->getLogo($nestid);
			redirect($_SERVER['HTTP_REFERER']); // to avoid form submit on page refresh
			$this->load->view('camp/invoice_edit', $invo_list);
			//	redirect('camp/invoice_edit',$invo_list);
			//$this->load->view('camp/invoice_edittest', $invo_list);
			//$this->load->view('camp/print', $invo_list);

		} else {
			$this->sess_out();
		}
	}

	//////////////////////////////////////////////////////////////////

	function row_del()
	{
		$rowid = $this->input->get('var1');
		$rowestid = $this->input->get('var2');

		if (isset($this->session->userdata['logged_in'])) {

			// $rowid = $this->input->post('row_id');
			// $rowestid = $this->input->post('row_estid');	
			$this->campmodel->did_delete_row($rowid);
			$est_edit['n_package'] = $this->campmodel->gettpolicy();
			$est_edit['n_asp'] = $this->campmodel->getasp();
			$est_edit['estedit'] = $this->campmodel->get_estedit($rowestid);
			$est_edit['estlineedit'] = $this->campmodel->get_estline_edit($rowestid);
			$est_edit['logo']  = $this->campmodel->getLogo($rowestid);
			$est_edit['asp'] = $this->campmodel->getaspByEstId($rowestid);
			$this->load->view('camp/estimate_edit', $est_edit);
		} else {
			$this->sess_out();
		}
	}
	function invorow_del()
	{
		$rowid = $this->input->get('var1');
		$rowestid = $this->input->get('var2');

		if (isset($this->session->userdata['logged_in'])) {

			// $rowid = $this->input->post('row_id');
			// $rowestid = $this->input->post('row_estid');	
			$this->campmodel->did_delete_row($rowid);
			$est_edit['n_package'] = $this->campmodel->gettpolicy();
			$est_edit['n_asp'] = $this->campmodel->getasp();
			$est_edit['invo_reg'] = $this->campmodel->get_estedit($rowestid);
			$est_edit['involineedit'] = $this->campmodel->get_estline_edit($rowestid);
			$est_edit['logo']  = $this->campmodel->getLogo($rowestid);
			$est_edit['asp'] = $this->campmodel->getaspByInvoId($rowestid);
			$this->load->view('camp/invoice_edit', $est_edit);
			//$this->load->view('camp/invoice_edittest', $est_edit);


			// 	$invo_list['invo_reg'] = $this->campmodel->get_invoedreglist($invo_id);
			// 	$invo_list['n_asp'] = $this->campmodel->getasp();		
			// 	$invo_list['n_package'] = $this->invomodel->gettpolicy();
			// 	$invo_list['involineedit'] = $this->campmodel->get_invoedline_edit($invo_id);
			//    $this->load->view('camp/invoice_edit', $invo_list);



		} else {
			$this->sess_out();
		}
	}
	//////////////////////////
	function camp_invo()
	{
		if (isset($this->session->userdata['logged_in'])) {
			/* $invoest['username'] = $this->session->userdata('logged_in')['username'];
			$invoest['email'] = $this->session->userdata('logged_in')['email'];
			$invoest['infomsg'] = "no";
			$invoest['title'] = "ADMAN";
			$invoest['inest_id'] = $this->uri->segment(3);
			$invoest['c_type'] = $this->campmodel->get_ctype();
			$invoest['exist_content'] = $this->campmodel->get_content();



			$this->data = $invoest;
			$this->page = "camp/make_invoice";
			$this->layout();
 */
$estimate_id=$this->uri->segment(3);
$est_data = $this->campmodel->get_estdata($estimate_id);
		$cr_date = date("Y/m/d");
		// $estId=$this->campmodel->getEstId($estimate_id);
		// $asp=$this->campmodel->getaspByInvoId($estId->est_id);
		foreach ($est_data->result() as $estdata) {
		}
$invo_reg = array(
	'est_id' => $estdata->est_id,
	'est_name' =>  $estdata->name,
	'adv_id' =>  $estdata->adv_id,
	'duration' =>  $estdata->duration,
	'content_id' => $estdata->content_id,
	'cr_date' => $cr_date,
	'status' => 1,
	//'play' => "preshow",
	//'asp'=>$asp
);
$invoice_id = $this->campmodel->create_invo_data($invo_reg);
$this->campmodel->invoiced_est($estimate_id);

$est_line_data = $this->campmodel->get_estlinedata($estimate_id);
		$est_reg_data = $this->campmodel->get_estdata($estimate_id);
		$estreg_result = $est_reg_data->result()[0];
		$publish_date = $estreg_result->publish_date;
		foreach ($est_line_data->result() as $estlinedata) {

			$pack_id =  $estlinedata->package;
			$pack_dates = $this->campmodel->get_packdate($pack_id);
			foreach ($pack_dates->result() as $pdate) {
				$next_date = $pdate->days;
			}


			//$next_date = $estlinedata->package ;
			$en_d = '+' . $next_date . ' day';
			$newdate = strtotime($en_d, strtotime($publish_date));
			$newdate = date('Y-m-d', $newdate);

			$est_id = $estlinedata->est_id;
			$invo_reg_line = array(
				'invo_id' => $invoice_id,
				'est_id' => $est_id,
				'asp' =>  $estlinedata->asp,
				'screen' =>  $estlinedata->screen,
				'duration' =>  $estlinedata->duration,
				'package' => $estlinedata->package,
				'discount' => $estlinedata->discount,
				'price' => $estlinedata->price,
				'cgst' => $estlinedata->cgst,
				'sgst' => $estlinedata->sgst,
				'igst' => $estlinedata->igst,
				'ltax' => $estlinedata->ltax,
				'start_date' => $publish_date,
				'end_date' => $newdate,
				'pack_date' => $next_date,
				'status' => 1,
				'play'=>$estlinedata->play
			);
			$this->campmodel->create_invo_ldata($invo_reg_line);
		}
echo "<script type='text/javascript'>alert('Campaign Invoiced Successfully.Please Check Invoiced List');</script>";
		echo  "<script type='text/javascript'>window.close();</script>";
			// $this->load->view('asp/create_asp', $ttdata);
		} else {
			$this->sess_out();
		}





		/*$invoest['inest_id'] = $this->uri->segment(3);
	$invoest['c_type'] = $this->campmodel->get_ctype();
	$invoest['exist_content'] = $this->campmodel->get_content();
	$this->load->view('camp/make_invoice', $invoest);*/
	}
	/////////////////////////////
	function content_exist()
	{
		$this->input->post('content_id');
		$this->input->post('est_id');


		echo  "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";
	}
	/////////////////////////////
	function content_new()
	{
		$estimate_id = $this->input->post('nest_id');
		$content_name = $this->input->post('content_name');
		$content_type = $this->input->post('content_type');
		$new_content = array(
			'content_name' => $content_name,
			'content_type' => $content_type
		);
		$content_inid = $this->campmodel->insert_invo_data($new_content);
		$est_data = $this->campmodel->get_estdata($estimate_id);
		$cr_date = date("Y/m/d");
		// $estId=$this->campmodel->getEstId($estimate_id);
		// $asp=$this->campmodel->getaspByInvoId($estId->est_id);
		foreach ($est_data->result() as $estdata) {
		}

		$invo_reg = array(
			'est_id' => $estdata->est_id,
			'est_name' =>  $estdata->name,
			'adv_id' =>  $estdata->adv_id,
			'duration' =>  $estdata->duration,
			'content_id' => $content_inid,
			'cr_date' => $cr_date,
			'status' => 1,
			'play' => "preshow",
			//'asp'=>$asp
		);
		$invoice_id = $this->campmodel->create_invo_data($invo_reg);
		$est_line_data = $this->campmodel->get_estlinedata($estimate_id);
		$est_reg_data = $this->campmodel->get_estdata($estimate_id);
		$estreg_result = $est_reg_data->result()[0];
		$publish_date = $estreg_result->publish_date;
		foreach ($est_line_data->result() as $estlinedata) {

			$pack_id =  $estlinedata->package;
			$pack_dates = $this->campmodel->get_packdate($pack_id);
			foreach ($pack_dates->result() as $pdate) {
				$next_date = $pdate->days;
			}


			//$next_date = $estlinedata->package ;
			$en_d = '+' . $next_date . ' day';
			$newdate = strtotime($en_d, strtotime($publish_date));
			$newdate = date('Y-m-d', $newdate);

			$est_id = $estlinedata->est_id;
			$invo_reg_line = array(
				'invo_id' => $invoice_id,
				'est_id' => $est_id,
				'asp' =>  $estlinedata->asp,
				'screen' =>  $estlinedata->screen,
				'duration' =>  $estlinedata->duration,
				'package' => $estlinedata->package,
				'discount' => $estlinedata->discount,
				'price' => $estlinedata->price,
				'cgst' => $estlinedata->cgst,
				'sgst' => $estlinedata->sgst,
				'igst' => $estlinedata->igst,
				'ltax' => $estlinedata->ltax,
				'start_date' => $cr_date,
				'end_date' => $newdate,
				'pack_date' => $next_date,
				'status' => 1
			);
			$this->campmodel->create_invo_ldata($invo_reg_line);
		}



		$this->campmodel->invoiced_est($estimate_id);
		echo "<script type='text/javascript'>alert('Campaign Invoiced Successfully.Please Check Invoiced List');</script>";
		echo  "<script type='text/javascript'>window.close();</script>";
		// $url = base_url()."camp/list_outward_invoiced";
		// redirect($url);	

	}
	///////////////////////////////
	function sess_out()
	{
		echo "exit sess";
	}
	function list_outward_invoiced()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$esti_list['username'] = $this->session->userdata('logged_in')['username'];
			$esti_list['email'] = $this->session->userdata('logged_in')['email'];
			$esti_list['estlist'] = $this->campmodel->get_involist();
			$esti_list['title'] = "Invoiced";

			$this->data = $esti_list;
			$this->page = "camp/outward_invoice";
			$this->layout();

			// $this->load->view('camp/invoice', $esti_list);
		} else {
			$this->sess_out();
		}
	}


	//////////////////////////
}
