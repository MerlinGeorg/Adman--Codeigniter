<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Layout_Controller {

   public function __construct() {
parent::__construct();
//$this->load->library('form_validation');
$this->load->model('settingmodel/Settingmodel');
}


	public function index()
	{
       if(isset($this->session->userdata['logged_in'])){	
						$stdata['username'] = $this->session->userdata('logged_in')['username'];
						$stdata['email'] = $this->session->userdata('logged_in')['email'];
						$stdata['infomsg'] = "no" ;
						$stdata['title'] = "Settings" ;
						$stdata['logodata'] = $this->Settingmodel->list_logo();
						
					//	print_r($stdata['logodata']->result());
					//	die();
						$this->data = $stdata;
						$this->page = "settings/setting_view";
						$this->layout();

						// $this->load->view('asp/create_asp', $ttdata);
						}
					else { $this->sess_out();	}




	}

public function add_logo()
{
	if(isset($this->session->userdata['logged_in'])){	
		$stdata['username'] = $this->session->userdata('logged_in')['username'];
		$stdata['email'] = $this->session->userdata('logged_in')['email'];
		$stdata['infomsg'] = "no" ;
		$stdata['title'] = "Settings" ;
		//$asp_list['logodata'] = $this->Settingmodel->list_logo();


		$this->data = $stdata;
		$this->page = "settings/add_logo";
		$this->layout();

		// $this->load->view('asp/create_asp', $ttdata);
		}
	else { $this->sess_out();	}
}

public function addLogo()
{



	if(isset($this->session->userdata['logged_in'])){	
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('adrs', 'Adress', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');

		if ($this->form_validation->run() != false) 
		{
			    $data['company_name']=$this->input->post('cmpname');
				$data['address']=$this->input->post('adrs');
				$data['phone']=$this->input->post('phone');
				$data['email']=$this->input->post('email');


				$data['pan']=$this->input->post('pan');
				$data['cstin']=$this->input->post('cstin');


				$data['sac_code	']=$this->input->post('sac');
				$data['des_service	']=$this->input->post('des');
				
				$fileName = $_FILES['file']['name'];
				$new_name = time().$fileName;

				 $logo['logo_image']=$fileName;
				 $logo['logo_name']=$new_name;
				 $table='adman_logo';
			  $data['logo_id'] =$this->Settingmodel->save_data($logo,$table);
				
                $table='adman_company_address';
				$this->Settingmodel->save_data($data,$table);
				
				$config['upload_path']    = './Assets/img/logo/';
				$config['allowed_types']  = 'gif|jpg|png';
				$config['file_name']      = $new_name;
                // $config['max_size']             =100 ;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                       return redirect('newlogo');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                       
				}
				return redirect('settings');



		}	
		}

}


	public function save()
	{

		if(isset($this->session->userdata['logged_in'])){


			 $this->form_validation->set_rules('logo', 'logo', 'required');
			   if ($this->form_validation->run() == TRUE)
                {
				 $logo=$this->input->post('logo');
				 $image_name=$this->input->post('imgnm');
				 $cmpnm=$this->input->post('cpmnm');
				 $cmpadrs=$this->input->post('cmpadrs');
				 $phone=$this->input->post('phone');
				 $email=$this->input->post('email');

				 

					$session_data = array('logo_id' => $logo,'image_name'=>$image_name,'company_nam'=>$cmpnm,
					'company_adrs'=>$cmpadrs,'email'=>$email,'phone'=>$phone);  
                    $this->session->set_userdata($session_data);  
                }
				$logos=$this->session->userdata('company_adrs');
				return redirect('Settings');
               //  echo $logos;
               

		}
		else { $this->sess_out();	}		
		
	 }


	public function get_data()
	{
		if(isset($this->session->userdata['logged_in'])){	

			$id=$this->input->post('lgo_id');
		
			//echo $id;
			//die();
			$stdata['username'] = $this->session->userdata('logged_in')['username'];
			$stdata['email'] = $this->session->userdata('logged_in')['email'];
			$stdata['infomsg'] = "no" ;
			$stdata['title'] = "Settings" ;
			$lgdata = $this->setting_model->get_data($id);
			echo json_encode($lgdata);
			//die();
			

			// $this->data = $stdata;
			// $this->page = "settings/setting_view";
			// $this->layout();

			// $this->load->view('asp/create_asp', $ttdata);
			}
		else { $this->sess_out();	}




		
	}	 
}