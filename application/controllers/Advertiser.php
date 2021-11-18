<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Advertiser extends Layout_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('advertiser/advertisermodel');
	}
	//////////////////////////////////////////////////////////////dash/////////////////////////////////////	
	public function index()
	{

		if (isset($this->session->userdata['logged_in'])) {
			$this->load->view('advertiser/advertiser_dash');
		} else {
			echo "no";
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////menu-functions/////////////////////////////////////	
	public function create_advt()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$advdata['username'] = $this->session->userdata('logged_in')['username'];
			$advdata['email'] = $this->session->userdata('logged_in')['email'];
			$advdata['state'] = $this->advertisermodel->getstate();
			$advdata['cat'] = $this->advertisermodel->getcat();
			$advdata['title'] = "Create Advertiser";
			$advdata['msg'] = 0;
			$this->data = $advdata;
			$this->page = "advertiser/create_advt";
			$this->layout();

			// $this->load->view('advertiser/create_advt', $advdata);
		} else {
			echo "no";
		}
	}
	public function list_advt()
	{

		if (isset($this->session->userdata['logged_in'])) {




			$advldata['username'] = $this->session->userdata('logged_in')['username'];
			$advldata['email'] = $this->session->userdata('logged_in')['email'];
			$advldata['list_advdata'] = $this->advertisermodel->getadvlist();
			$advldata['title'] = "List Advertisers";

			$this->data = $advldata;
			$this->page = "advertiser/list_advt";
			$this->layout();
			// $this->load->view('advertiser/list_advt', $advldata);



		} else {
			echo "no";
		}
	}

	public function adv_save()
	{
		if (isset($this->session->userdata['logged_in'])) {
			///////////////////////////////////////////////////////			

			$this->form_validation->set_rules('adv_name', 'Name', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
			$this->form_validation->set_rules('c_person', 'Person', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
			$this->form_validation->set_rules('phone_1', 'Phone-1', 'trim|numeric|required|xss_clean');
			$this->form_validation->set_rules('phone_2', 'Phone-2', 'trim|numeric|xss_clean');
			$this->form_validation->set_rules('wphone', 'Wphone', 'trim|numeric|xss_clean');


			if ($this->form_validation->run() == true) {

				$cr_date = date("Y/m/d");
				$adv_data = array(
					'adv_name' => $this->input->post('adv_name'),
					'c_person' => $this->input->post('c_person'),
					'city' => $this->input->post('city'),
					'phone_1' => $this->input->post('phone_1'),
					'phone_2' => $this->input->post('phone_2'),
					'wphone' => $this->input->post('wphone'),
					'email' => $this->input->post('email'),
					'add1' => $this->input->post('add_1'),
					'add2' => $this->input->post('add_2'),
					'web' => $this->input->post('web'),
					'pan' => $this->input->post('pan'),
					'gst' => $this->input->post('gst'),
					'sac' => $this->input->post('sac'),
					'cat' => $this->input->post('cat'),
					'state' => $this->input->post('state'),
					'adv_info' => $this->input->post('adv_info'),
					'adv_status' => 1,
					'adv_cr_date' => $cr_date
				);
				$this->advertisermodel->insert_adv_data('adv_reg', $adv_data);
				$advdata['msg'] = 1;
			} else {

				$advdata['msg'] = 0;
			}
			$advdata['username'] = $this->session->userdata('logged_in')['username'];
			$advdata['email'] = $this->session->userdata('logged_in')['email'];
			$advdata['state'] = $this->advertisermodel->getstate();
			$advdata['cat'] = $this->advertisermodel->getcat();
			$advdata['title'] = "Create Advertiser";
			$this->data = $advdata;
			$this->page = "advertiser/create_advt";
			$this->layout();
			///////////////////////////////////////////////////////////////////				
		} else {
			$this->sess_out();
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////

	function _alpha_dash_space($str_in = '')
	{
		if (!preg_match("/^([-a-z0-9_ ])+$/i", $str_in)) {
			$this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////
	public function sess_out()
	{


		echo "sess out";
	}

	public function adv_edit()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$adv_id = $this->uri->segment(3);
			$edit_adv['username'] = $this->session->userdata('logged_in')['username'];
			$edit_adv['email'] = $this->session->userdata('logged_in')['email'];
			$edit_adv['title'] = "Edit Advertiser";
			$edit_adv['advdataedit'] = $this->advertisermodel->getdata_id('adv_reg', $adv_id);

			$this->data = $edit_adv;
			$this->page = "advertiser/edit_adv";
			$this->layout();

			// $this->load->view('advertiser/edit_adv', $edit_adv);

		} else {
			$this->sess_out();
		}
	}
	public function adv_update()
	{

		echo	$advid = $this->input->post('adv_id');

		$cr_date = date("Y/m/d");
		$adv_dataup = array(
			'adv_name' => $this->input->post('adv_name'),
			'c_person' => $this->input->post('c_person'),
			'city' => $this->input->post('city'),
			'phone_1' => $this->input->post('phone_1'),
			'phone_2' => $this->input->post('phone_2'),
			'wphone' => $this->input->post('wphone'),
			'email' => $this->input->post('email'),
			'add1' => $this->input->post('add_1'),
			'add2' => $this->input->post('add_2'),
			'web' => $this->input->post('web'),
			'pan' => $this->input->post('pan'),
			'gst' => $this->input->post('gst'),
			'sac' => $this->input->post('sac'),
			'adv_status' => 1,
			'adv_cr_date' => $cr_date
		);


		$this->advertisermodel->update_id('adv_reg', $advid, $adv_dataup);
	    //$url = base_url() . "advertiser/list_advt";
		//redirect($url);
		$url = 'advertiser/list_advt';
		echo '<script>window.location.href = "' . base_url() . 'index.php?/' . $url . '";</script>';
	}
}
