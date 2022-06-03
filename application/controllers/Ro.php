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
			$advdata['material'] = $this->romodel->listMaterial();
			$advdata['title'] = "Create Release Order";
			$this->data = $advdata;
			$this->page = "ro/create_ro";
			$this->layout();
		} else {
			$this->sess_out();
		}
	}

	function get_batch()
	{
		$asp_id = $this->input->post('course_id');
		$campId = $this->input->post('campId');
		$data['batch'] = $this->romodel->nonPendingscreenByCampaign($asp_id, $campId);

		$this->load->view('ro/batch_list', $data);
	}

	public function getCampaignDays()
	{
		$asp_id = $this->input->post('asp');
		$campId = $this->input->post('campId');
		$data = $this->romodel->getCampaignDuration($asp_id, $campId);
		echo json_encode($data);
	}

	public function valid_date($date)
	{
		$d = DateTime::createFromFormat('Y-m-d', $date);
		return $d && $d->format('Y-m-d') === $date;
	}

	public function add_ro()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$end_date = $this->input->post('end_date');

			$scid = null;
			$camp_id = null;
			$asp_id = null;
			$duration = null;
			$logoId  = null;
			$myArray = $_REQUEST['mdata'];
			$postData = json_decode($myArray);
			foreach ($postData as $row) {
				$scid = $row->scid;
				$camp_id = $row->camp_id;
				$asp_id = $row->asp_id;
				$duration = $row->duration;
				$logoId  = $row->logoId;
				$publishingDate = $row->start_date;
				$material = $row->material;
			}
			$ro = $this->romodel->get_campData($camp_id);

			$cr_date = date("Y-m-d");
			if ($scid) {
				$status = 2;
				$sc_id = $this->romodel->update_screen($scid);
			} else {
				$status = 1;
			}
			if (!empty($ro)) {

				$ro_data = array(
					'est_id' => $ro->est_id,
					'adv_id' => $ro->adv_id,
					'asp' => $asp_id,
					'est_name' => $ro->name,
					'campaignDuration' => $duration,//contentDuration
					'content_id' => $ro->content_id,
					'package' => $ro->package,
					'cr_date' => $cr_date,
					'status' => $status,
					'logo_id' => $logoId,
					'ro_material' => $material
				);
				$ro_id = $this->romodel->insert_get_ro($ro_data);

				$this->romodel->updatePublishingDate($ro->est_id, $publishingDate);

				$url = base_url() . "ro/ro_generate/" . $ro_id;
				redirect($url);
			}
			$url = base_url() . "ro/create_ro/";
			redirect($url);
		} else {
			$this->sess_out();
		}
	}

	public function ro_generate($invoiceId)
	{
		$adsdata =  $this->romodel->adscontact($invoiceId);
		$data['advaddr'] = $adsdata;
		$campid =  $adsdata->est_id;
		$asp = $adsdata->asp;
		$campdata = $this->romodel->get_campDataByAsp($campid, $asp);
		$data['campdata'] = $campdata;
		$contentId = $campdata->content_id;
		$data['content'] = $this->romodel->getContentById($contentId);

		$estlineedit = $this->romodel->get_ExcludingPendingScreen($campid, $asp);

		foreach ($estlineedit->result() as $row) {
			$sc_id[] = $row->screen;
		}
		$data['estlineedit'] = $estlineedit;
		$screens = [];
		if (!empty($sc_id)) {
			foreach ($sc_id as $screen) {
				$screens[]  = $this->romodel->get_screensByAsp($asp, $campid, $screen);
			}
		}
		$data['screens']  = $screens;
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
		} else {
			$this->sess_out();
		}
	}
	///////////////////////////////

	public function ro_edit()

	{
		if (isset($this->session->userdata['logged_in'])) {

			$ro_id = $this->uri->segment(3);

			$ro_list['ro_reg'] = $this->romodel->get_roreglist($ro_id);

			$ro_list['username'] = $this->session->userdata('logged_in')['username'];
			$ro_list['email'] = $this->session->userdata('logged_in')['email'];
			$ro_list['rolist'] = $this->romodel->get_releaselist();
			$ro_list['adv'] = $this->campmodel->getadv();
			$ro_list['asp'] = $this->campmodel->getasp();
			$ro_list['data'] =  $this->romodel->getEditData($ro_id);
			$ro_list['material'] = $this->romodel->listMaterial();

			$ro_list['title'] = "Edit Release Order";

			$this->data = $ro_list;
			$this->page = "ro/ro_edit";
			$this->layout();
		} else {
			$this->sess_out();
		}
	}
	function ro_update()
	{

		$id = $this->input->post('ro_id');
		$camp_id = $this->input->post('campId');
		$asp_id = $this->input->post('aspId');
		$duration = $this->input->post('duration');
		$ro = $this->romodel->get_campData($camp_id, $asp_id);
		$cr_date = date("Y-m-d");
		$material = $this->input->post('materialnew');
		if ($material == '') {
			$material = $this->input->post('material');
		}
		$publishingDate = $this->input->post('ad_date');
		$ro_data = array(
			'est_id' => $camp_id,
			'adv_id' => $ro->adv_id,
			'asp' => $asp_id,
			'est_name' => $ro->name,
			'campaignDuration' => $duration,
			'content_id' => $ro->content_id,
			'package' => $ro->package,
			'cr_date' => $cr_date,
			'ro_material' => $material
		);
		$this->romodel->update_id('ro_reg', $id, $ro_data);
		$this->romodel->updatePublishingDate($camp_id, $publishingDate);
		$url = base_url() . "ro/ro_generate/" . $id;
		redirect($url);
	}
	////////////////////////////////////////////////////////////////
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
			$ro_list['involist'] = [];
			$roId = $this->romodel->getRoId();
			foreach ($roId as $row) {

				$estId = $this->romodel->getEstId($row->ro_id);

				$ro_list['involist'] = $this->romodel->get_rolist_old($estId->est_id);
			}
			$ro_list['title'] = "Old Release Orders";
			$this->data = $ro_list;
			$this->page = "ro/old_list";
			$this->layout();
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
		echo $encode_data;
	}

	public function getReleaseOrderData()
	{
		$roId = $this->input->post('roId');
		$encode_data = $this->romodel->getEditData($roId);
		$res = $encode_data->result()[0];
		$encode_data = json_encode($res);
		echo $encode_data;
	}

	function get_newpending()
	{
		$asp_id = $this->input->post('course_id');
		$var = $this->romodel->get_newpending('screen', $asp_id);
	}

	public function oldro_edit()

	{
		if (isset($this->session->userdata['logged_in'])) {

			$ro_id = $this->uri->segment(3);
			$ro_list['ro_reg'] = $this->romodel->get_roreglist($ro_id);

			$ro_list['username'] = $this->session->userdata('logged_in')['username'];
			$ro_list['email'] = $this->session->userdata('logged_in')['email'];
			$ro_list['rolist'] = $this->romodel->get_releaselist();
			$ro_list['adv'] = $this->campmodel->getadv();
			$ro_list['asp'] = $this->campmodel->getasp();
			$ro_list['data'] =  $this->romodel->getOldRoEditData($ro_id);
			$ro_list['user'] = $this->Settingmodel->list_logo();
			$ro_list['title'] = "Edit Release Order";
			$asp_id = ($ro_list['data'][0])->asp_id;
			$camp = ($ro_list['data'][0])->est_id;
			$ro_list['var'] = $this->romodel->screenByCampaign($asp_id, $camp);

			$this->data = $ro_list;
			$this->page = "ro/oldro_edit";
			$this->layout();
		} else {
			$this->sess_out();
		}
	}

	public function deletePendingScreen()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$camp = $this->input->post('est_id');
			$asp = $this->input->post('asp');
			$sc_id = $this->input->post('sc_id');
			$ro_list =  $this->romodel->updateScreenStatus($sc_id, $camp, $asp);
			$encode_data = json_encode($ro_list);
			echo $encode_data;
		} else {
			$this->sess_out();
		}
	}
	public function sess_out()
	{
		$this->load->view('welcome/login_form');
	}

	public function updateOldReleaseOrder()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$ro_id = $this->input->post('ro_id');
			$end_date = $this->input->post('end_date');

			$camp_id  = $this->input->post('campId');
			$asp_id = $this->input->post('aspId');
			$start_date  = $this->input->post('camp_date');
			$detail = $this->romodel->get_olro_campdetail($camp_id, $asp_id);

			$ro = $detail->result();
			$cr_date = date("Y-m-d");
			$user = $this->input->post('user');

			$ro_data = array(
				'est_id' => $ro[0]->est_id,
				'adv_id' => $ro[0]->adv_id,
				'asp' => $ro[0]->asp,
				'est_name' => $ro[0]->name,
				'campaignDuration' => $this->input->post('duration'),
				'content_id' => $ro[0]->content_id,
				'package' => $ro[0]->package,
				'cr_date' => $cr_date,
				'status' => 1,
				'logo_id' => $user
			);
			$this->romodel->updateoldRo($ro_data, $ro_id);

			$url = base_url() . "ro/ro_generate/" . $ro_id;
			redirect($url);
		} else {
			$this->sess_out();
		}
	}
}
