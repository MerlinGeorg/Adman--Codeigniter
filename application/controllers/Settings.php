<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Layout_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('form_validation');
		$this->load->model('settingmodel/Settingmodel');
		$this->load->helper('security');
	}


	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$stdata['username'] = $this->session->userdata('logged_in')['username'];
			$stdata['email'] = $this->session->userdata('logged_in')['email'];
			$stdata['infomsg'] = "no";
			$stdata['title'] = "Settings";
			$stdata['logodata'] = $this->Settingmodel->list_logo();

			
			$this->data = $stdata;
			//	$this->page = "settings/setting_view";
			$this->page = "settings/list_logo";
			$this->layout();

			// $this->load->view('asp/create_asp', $ttdata);
		} else {
			$this->sess_out();
		}
	}

	public function add_logo()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$stdata['username'] = $this->session->userdata('logged_in')['username'];
			$stdata['email'] = $this->session->userdata('logged_in')['email'];
			$stdata['infomsg'] = "no";
			$stdata['title'] = "Settings";

			$this->data = $stdata;
			$this->page = "settings/add_logo";
			$this->layout();

			// $this->load->view('asp/create_asp', $ttdata);
		} else {
			$this->sess_out();
		}
	}

	public function addLogo()
	{



		if (isset($this->session->userdata['logged_in'])) {
			
			$this->form_validation->set_rules('cmpname', 'CompanyName', 'required|xss_clean');
			$this->form_validation->set_rules('adrs', 'Adress', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
			if(empty($_FILES['file']['name'])){
				$this->form_validation->set_rules('file', 'Logo Image', 'required');
			}
			
			if ($this->form_validation->run() == true) {
				$data['company_name'] = $this->input->post('cmpname');
				$data['address'] = $this->input->post('adrs');
				$data['phone'] = $this->input->post('phone');
				$data['email'] = $this->input->post('email');


				$data['pan'] = $this->input->post('pan');
				$data['cstin'] = $this->input->post('cstin');


				$data['sac_code	'] = $this->input->post('sac');
				$data['des_service	'] = $this->input->post('des');

				$fileName = $_FILES['file']['name'];
				//echo $fileName;die();
				$new_name = time() . $fileName;

				$logo['logo_image'] = $fileName;
				$logo['logo_name'] = $new_name;
				$table = 'adman_logo';
				$data['logo_id'] = $this->Settingmodel->save_data($logo, $table);

				$table = 'adman_company_address';
				$this->Settingmodel->save_data($data, $table);

				$config['upload_path']    = './Assets/img/logo/';
				$config['allowed_types']  = 'gif|jpg|png';
				$config['file_name']      = $new_name;
				// $config['max_size']             =100 ;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());

				//	return redirect('newlogo');
				} else {
					$data = array('upload_data' => $this->upload->data());
				}
				return redirect('settings');
			}
			else{
				$stdata['username'] = $this->session->userdata('logged_in')['username'];
			$stdata['email'] = $this->session->userdata('logged_in')['email'];
			$stdata['infomsg'] = "no";
			$stdata['title'] = "Settings";

			$this->data = $stdata;
			$this->page = "settings/add_logo";
			$this->layout();
			}
				
			
			
		} else {
			$this->sess_out();
		}
	}


	public function save()
	{

		if (isset($this->session->userdata['logged_in'])) {


			$this->form_validation->set_rules('logo', 'logo', 'required');
			if ($this->form_validation->run() == TRUE) {
				$logo = $this->input->post('logo');
				$image_name = $this->input->post('imgnm');
				$cmpnm = $this->input->post('cpmnm');
				$cmpadrs = $this->input->post('cmpadrs');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');



				$session_data = array(
					'logo_id' => $logo, 'image_name' => $image_name, 'company_nam' => $cmpnm,
					'company_adrs' => $cmpadrs, 'email' => $email, 'phone' => $phone
				);
				$this->session->set_userdata($session_data);
			}
			$logos = $this->session->userdata('company_adrs');
			return redirect('Settings');
			//  echo $logos;


		} else {
			$this->sess_out();
		}
	}


	public function get_data()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$id = $this->input->post('lgo_id');

			//echo $id;
			//die();
			$stdata['username'] = $this->session->userdata('logged_in')['username'];
			$stdata['email'] = $this->session->userdata('logged_in')['email'];
			$stdata['infomsg'] = "no";
			$stdata['title'] = "Settings";
			$lgdata = $this->Settingmodel->get_data($id);
			echo json_encode($lgdata);
			//die();


			// $this->data = $stdata;
			// $this->page = "settings/setting_view";
			// $this->layout();

			// $this->load->view('asp/create_asp', $ttdata);
		} else {
			$this->sess_out();
		}
	}

	public function get_editData()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$id = $this->uri->segment(3);

			
			$lgdata['username'] = $this->session->userdata('logged_in')['username'];
			$lgdata['email'] = $this->session->userdata('logged_in')['email'];
			$lgdata['infomsg'] = "no";
			$lgdata['title'] = "Settings";
			$lgdata['data'] = $this->Settingmodel->get_data($id);
			


			$this->data = $lgdata;
			$this->page = "settings/edit_view";
			$this->layout();

			
		} else {
			$this->sess_out();
		}
	}

	public function updateLogo()
	{
		if (isset($this->session->userdata['logged_in'])) {

			$logoId = $address['logo_id'] = $this->input->post('lgo_id');

			$this->form_validation->set_rules('cmpname', 'CompanyName', 'required|xss_clean');
			$this->form_validation->set_rules('adrs', 'Adress', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			if (empty($_FILES['image_file']['name'])) {
			$this->form_validation->set_rules('image_file', 'Logo Image', 'required|xss_clean');
			}

			if ($this->form_validation->run() == true) {
				$address['company_name'] = $this->input->post('cmpname');
				$address['address'] = $this->input->post('adrs');
				$address['phone'] = $this->input->post('phone');
				$address['email'] = $this->input->post('email');

				$address['pan'] = $this->input->post('pan');
				$address['cstin'] = $this->input->post('cstin');

				$address['sac_code	'] = $this->input->post('sac');
				$address['des_service	'] = $this->input->post('des');

				$img = $this->Settingmodel->get_data($logoId);

					$im = $img->result()[0];
					$fillimg = $im->logo_name;
				if (empty($_FILES['image_file']['name'])) {
					
					$fileName = $new_name = $fillimg;
				} else {

					$fileName = $_FILES['image_file']['name'];
					$new_name = time() . $fileName;

					$config['upload_path'] = "./Assets/img/logo/";
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['file_name']      = $new_name;
					$this->load->library('upload', $config);
					$data = array('upload_data' => $this->upload->data());
					$this->upload->initialize($config);

					if (!$this->upload->do_upload('image_file')) {
						$error = array('error' => $this->upload->display_errors());
					} else {
						$data = array('upload_data' => $this->upload->data());
					}

					if ($_FILES['image_file']['size'] == 0) {
						$fileName = $fillimg;
					} else {

						if (!empty($logoId)) {
							$unlink_path = 'Assets/img/logo/' . $fillimg;
							if (!empty($fillimg)) {
								unlink($unlink_path);
							}
						}
						$fileName = $data['upload_data']['file_name'];
					}
				}
				$logo['logo_image'] = $fileName;

				$logo['logo_name'] = $new_name;

				$this->Settingmodel->update_logo($logo, $logoId);

				$this->Settingmodel->update_address($address, $logoId);

				
			
			}
			//return redirect('settings');
				$url = 'settings';
				echo '<script>window.location.href = "' . base_url() . 'index.php?/' . $url . '";</script>';
		}
		else {
			$this->sess_out();
		}
	}

	public function sess_out()
	{


		echo "sess out";
	}
}
