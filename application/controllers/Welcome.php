<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends Layout_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome/mymodel');
	}
	public function index()
	{

		if (isset($this->session->userdata('logged_in')['username']) && $this->session->userdata('logged_in')['username'] != '') {


			$this->data['title'] = "Dashboard";
			$this->data['username'] = $this->session->userdata('logged_in')['username'];
			$this->data['email'] = $this->session->userdata('logged_in')['email'];
			$this->data['total_campaign'] = $this->mymodel->get_campaign_total()['camp_count_total'];
			$this->data['active_campaign'] = $this->mymodel->get_campaign_active()['camp_count_active'];
			$this->data['total_ro'] = $this->mymodel->get_ro_total()['ro_count_total'];
			$this->data['active_ro'] = $this->mymodel->get_ro_active()['ro_count_active'];
			$this->data['total_advertiser'] = $this->mymodel->get_advertiser_total()['advertiser_count_total'];
			$this->data['total_asp'] = $this->mymodel->get_asp_total()['asp_count_total'];
			$this->page = "welcome/admin_dash";
			$this->layout();
		} else
			$this->load->view('welcome/login_form');
	}
	public function user_login_process()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->mymodel->login($data);
		if ($result != false) {
			$session_data = array(
				'uid' => $result[0]->id,
				'username' => $result[0]->user_name,
				'email' => $result[0]->user_email,
			);
			$this->session->set_userdata('logged_in', $session_data);
			redirect('/', 'refresh');
		} else {
			echo "error";
		}
	}
	public function user_logout()
	{

		$user_data = $this->session->all_userdata();

		foreach ($user_data as $key => $value) {

			$this->session->unset_userdata($key);
		}


		redirect('/', 'refresh');
	}
}
