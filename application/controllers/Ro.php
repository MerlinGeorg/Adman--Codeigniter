<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ro extends Layout_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ro/romodel');
		$this->load->model('camp/campmodel');
		$this->load->model('settingmodel/Settingmodel');
	}

	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$this->load->view('ro/ro_dash');
		} else {
			$this->sess_out();
		}
	}

	public function create_ro()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$advdata['username'] = $this->session->userdata('logged_in')['username'];
			$advdata['email'] = $this->session->userdata('logged_in')['email'];
			$advdata['rolist'] = $this->romodel->get_releaselist();
			$advdata['adv'] = $this->campmodel->getadv();
			$advdata['asp'] = $this->campmodel->getasp();
			$advdata['user'] = $this->Settingmodel->list_logo();
			$advdata['title'] = "Create Release Order";

			$this->data = $advdata;
			$this->page = "ro/create_ro";
			$this->layout();

			// $this->load->view('ro/create_ro',$advdata);
		} else {
			$this->sess_out();
		}
	}
	function get_batch()
	{
		$asp_id = $this->input->post('course_id');
		$data['batch'] = $this->romodel->get_batch('screen', $asp_id);

		$this->load->view('ro/batch_list', $data);
	}

	public function valid_date($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

	public function add_ro()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$end_date = $this->input->post('end_date');
			
			if(empty($end_date)){
				
				echo "<script type='text/javascript'>";
				echo "alert('End date has empty value!Select Publish Date')";
				echo "</script>";
				
			$advdata['username'] = $this->session->userdata('logged_in')['username'];
			$advdata['email'] = $this->session->userdata('logged_in')['email'];
			$advdata['rolist'] = $this->romodel->get_releaselist();
			$advdata['adv'] = $this->campmodel->getadv();
			$advdata['asp'] = $this->campmodel->getasp();
			$advdata['user'] = $this->Settingmodel->list_logo();
			$advdata['title'] = "Create Release Order";

			$this->data = $advdata;
			$this->page = "ro/create_ro";
			$this->layout();
			}
			else{

			$camp_id  = $this->input->post('campId');
			$asp_id = $this->input->post('aspId');
			$scid = $this->input->post('batch');
		//echo $scid;die();
			$start_date  = $this->input->post('camp_date');
			

			$detail = $this->romodel->get_campdetail($camp_id, $asp_id);
			$ro = $detail->result();
			$cr_date = date("Y-m-d");
			$user = $this->input->post('user');
			if(empty($scid)){
				$status=1;
			}
			else{
				$status=2;
			}
			
			$ro_data = array(
				'est_id' => $ro[0]->est_id,
				'adv_id' => $ro[0]->adv_id,
				'asp' => $ro[0]->asp,
				'est_name' => $ro[0]->name,
				'duration' => $ro[0]->duration,
				'content_id' => $ro[0]->content_id,
				'package' => $ro[0]->package,
				'cr_date' => $cr_date,
				'status' => $status,
				'logo_id' => $user
			);
			$ro_id = $this->romodel->insert_get_ro($ro_data);
			$sc_id = $this->romodel->update_screen($scid);
			// return true;
			// $end_date = '+'.$ro[0]->pack_date.' day';
			// $newdate = strtotime ($end_date , strtotime ( $cr_date ) ) ;
			// $newdate = date ( 'Y-m-d' , $newdate );
			// echo "<pre>";
			// print_r($ro);
			// return $ro;
			foreach ($ro as $rorow) {
				$est_data = array(
					'ro_id' => $ro_id,
					'est_id' => $camp_id,
					'invo_id' => $rorow->invo_id,
					'invo_lid' => $rorow->invo_reg_lineid,
					'screen' => $rorow->screen,
					'package' => $rorow->package,
					'discount' => $rorow->screen,
					'price' => $rorow->price,
					'cgst' => $rorow->cgst,
					'sgst' => $rorow->sgst,
					'ltax' => $rorow->ltax,
					'igst' => $rorow->igst,
					'est_name' => $rorow->name,
					'adv_id' => $rorow->adv_id,
					'asp' => $rorow->asp,
					'cr_date' => $cr_date,
					'duration' => $rorow->duration,
					'start_date' => $start_date,
					'end_date' => $end_date,
					'status' => 1
				);

				// print_r($est_data);
				$this->romodel->insert_ro_data($est_data);
			}
			// return false;
	
			$url = base_url() . "ro/ro_generate/" . $ro_id;
			redirect($url);

	}

			//	$url = 'ro/ro_generate/'.$ro_id;
			//	echo '<script>window.location.href = "' . base_url() . 'index.php?/' . $url . '";</script>';
		} else {
			$this->sess_out();
		}
	}

	public function ro_generate($invoiceId)
	{
		$adsdata =  $this->romodel->adscontact($invoiceId);
		$data['advaddr'] = $adsdata;
		$campid =  $adsdata->est_id;
		$data['campdata'] = $this->romodel->campdata($campid);
		$data['screens']  = $this->romodel->get_screens($campid);
		$data['logo']  = $this->romodel->getLogo($invoiceId);
		$this->load->view('ro/ro_invoice', $data);
	}
	public function list_ro()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$ro_list['username'] = $this->session->userdata('logged_in')['username'];
			$ro_list['email'] = $this->session->userdata('logged_in')['email'];
			$ro_list['involist'] = $this->romodel->get_rolist();
			$ro_list['title'] = "List All Release Orders";

			$this->data = $ro_list;
			$this->page = "ro/invoice";
			$this->layout();

			// $this->load->view('ro/invoice', $ro_list);
		} else {
			$this->sess_out();
		}
	}
	///////////////////////////////

	public function ro_edit()

	{
		if (isset($this->session->userdata['logged_in'])) {

			//$this->form_validation->set_rules('end_date', 'End Date', 'required|xss_clean');
			//if($this->form_validation->run()==true){

			$ro_id = $this->uri->segment(3);

			$ro_list['ro_reg'] = $this->romodel->get_roreglist($ro_id);

			$ro_list['username'] = $this->session->userdata('logged_in')['username'];
			$ro_list['email'] = $this->session->userdata('logged_in')['email'];
			$ro_list['rolist'] = $this->romodel->get_releaselist();
			$ro_list['adv'] = $this->campmodel->getadv();
			$ro_list['asp'] = $this->campmodel->getasp();
			$ro_list['data'] =  $this->romodel->getEditData($ro_id);
			//$ro_list['campdata'] =  $this->romodel->getCampData($ro_id); 

			$ro_list['title'] = "Edit Release Order";

			$this->data = $ro_list;
			$this->page = "ro/ro_edit";
			$this->layout();


			//}else{
			//	redirect($_SERVER['HTTP_REFERER']);
			//}



			// 		$ro_list['ro_reg'] = $this->romodel->get_roreglist($ro_id);

			//		$this->load->view('ro_edit', $ro_list);

		} else {
			$this->sess_out();
		}
	}
	//////////////////////////
	function update_discount()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$rordid = $this->input->post('ro_ids');
			$rolid = $this->input->post('ro_lid');
			$rodis = $this->input->post('ro_discount');
			$invo_no = $this->input->post('invo_no');
			$invo_date = $this->input->post('invo_date');
			$rototal = $this->input->post('final_amount');

			// print_r($this->input->post());
			// return true;

			$this->romodel->update_discount($rolid, $rodis, $invo_no, $invo_date, $rototal);

			$ro_list['ro_reg'] = $this->romodel->get_roreglist($rordid);

			$this->load->view('ro/ro_edit', $ro_list);
		} else {
			$this->sess_out();
		}
	}
	function make_ro()
	{

		if (isset($this->session->userdata['logged_in'])) {
			$ro_idst = $this->uri->segment(3);

			$this->romodel->update_ro_status($ro_idst);
			$this->romodel->update_ro_line_status($ro_idst);
			echo  "<script type='text/javascript'>";
			echo "window.close();";
			echo "</script>";
		} else {
			$this->sess_out();
		}
	}

	public function oldlist_ro()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$ro_list['username'] = $this->session->userdata('logged_in')['username'];
			$ro_list['email'] = $this->session->userdata('logged_in')['email'];
			$ro_list['involist'] = $this->romodel->get_rolist_old();
			$ro_list['title'] = "Old Release Orders";

			$this->data = $ro_list;
			$this->page = "ro/old_list";
			$this->layout();

			// $this->load->view('ro/old_list', $ro_list);
		} else {
			$this->sess_out();
		}
	}

	public function get_camdata()
	{
		$campId = $this->input->post('camp_id');
		$camplist =  $this->romodel->getcampaignlist($campId);
		$campasplist['asp'] = $this->romodel->getcampaignasplist($campId);

		$campfinallist = array_merge($camplist, $campasplist);

		$encode_data = json_encode($campfinallist);
		// $encode_data = json_encode($camplist);
		echo $encode_data;
	}
	/////////////////////////////
}
