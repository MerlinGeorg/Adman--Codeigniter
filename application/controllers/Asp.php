<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asp extends Layout_Controller {

public function __construct() {
parent::__construct();
$this->load->model('asp/aspmodel');
}

public function index()
					{
if(isset($this->session->userdata['logged_in'])){
				
						$this->load->view('asp/asp_dash');
					}
					else { $this->sess_out();	}		
					}
public function create_asp()
					{
if(isset($this->session->userdata['logged_in'])){	
						$ttdata['username'] = $this->session->userdata('logged_in')['username'];
						$ttdata['email'] = $this->session->userdata('logged_in')['email'];
						$ttdata['infomsg'] = "no" ;
						$ttdata['title'] = "Create ASP" ;
						 
						$this->data = $ttdata;
						$this->page = "asp/create_asp";
						$this->layout();

						// $this->load->view('asp/create_asp', $ttdata);
						}
					else { $this->sess_out();	}		
					}
public function asp_save()
					{
			if(isset($this->session->userdata['logged_in'])){
///////////////////////////////////////////////////////			
						
$this->form_validation->set_rules('asp_name', 'Asp name', 'trim|required|callback__alpha_dash_space|min_length[5]|xss_clean');
$this->form_validation->set_rules('asp_person', 'Asp person', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
$this->form_validation->set_rules('person_desig', 'Person_desig', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
$this->form_validation->set_rules('asp_phone_1','Phone number','numeric|required|max_length[10]|min_length[10]|xss_clean');
$this->form_validation->set_rules('asp_phone_2','Phone','numeric|max_length[10]|min_length[10]|xss_clean');
				if($this->form_validation->run()==true)
				{
					$cr_date = date("Y/m/d") ;
					$asp_data = array(	'asp_name'=>$this->input->post('asp_name'),
										 		'asp_add' => $this->input->post('asp_address'),
										 		'asp_person' => $this->input->post('asp_person'),
							   		 		'phone_1' => $this->input->post('asp_phone_1'),
										 		'phone_2' => $this->input->post('asp_phone_2'),
										 		'email' => $this->input->post('asp_email'),
										 		'web' => $this->input->post('asp_web'),
										 		'person_desig' => $this->input->post('person_desig'),
										 		'asp_info' => $this->input->post('asp_info'),
										 		'status' => 1,
										 		'cr_date' => $cr_date 
										 		);
					$this->aspmodel->insert_asp_data('asp', $asp_data);
					redirect($_SERVER['HTTP_REFERER']);
					//$ttdata['infomsg'] = "yes" ;	
 					//$this->load->view('create_asp',$ttdata);
										
					}	
				else{ 
				
				$ttdata['username'] = $this->session->userdata('logged_in')['username'];
				$ttdata['email'] = $this->session->userdata('logged_in')['email'];
				$ttdata['infomsg'] = "no" ;
				$ttdata['title'] = "Create ASP" ;
				 
				$this->data = $ttdata;
				$this->page = "asp/create_asp";
				$this->layout();	


				// $this->load->view('asp/create_asp', $ttdata);
				}
///////////////////////////////////////////////////////////////////				
								}
					else { $this->sess_out();	}	
					
					}
/////////////////////////////////////////form-valid-function///////////////

function _alpha_dash_space($str_in = '')
{
    if (! preg_match("/^([-a-z0-9_ ])+$/i", $str_in))
    {
        $this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}
////////////////////////////////////////asp-list////////////////////////////////////////////


public function list_asp()
					{
if(isset($this->session->userdata['logged_in'])){
	
						$asp_list['username'] = $this->session->userdata('logged_in')['username'];
						$asp_list['email'] = $this->session->userdata('logged_in')['email'];
						$asp_list['aspdata'] = $this->aspmodel->asp_list_profile();
						$asp_list['title'] = "List ASP";

						$this->data = $asp_list;
						$this->page = "asp/list_asp";
						$this->layout();

						// $this->load->view('asp/list_asp', $asp_list);
					}
					else { $this->sess_out();	}		
					}
/////////////////////////////////////////////////////////////////////////////////////////////

public function asp_edit()
					{
if(isset($this->session->userdata['logged_in'])){
	$asp_id = $this->uri->segment(3);
	$edit_asp['username'] = $this->session->userdata('logged_in')['username'];
	$edit_asp['email'] = $this->session->userdata('logged_in')['email'];
	$edit_asp['title'] = "Edit ASP";
	$edit_asp['aspdataedit'] = $this->aspmodel->getdata_id('asp', $asp_id);

	$this->data = $edit_asp;
	$this->page = "asp/edit_asp";
	$this->layout();

	// $this->load->view('asp/edit_asp', $edit_asp);
		
					}
					else { $this->sess_out();	}		
					}
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

public function asp_update()
					{
						$aspid =$this->input->post('asp_id');
if(isset($this->session->userdata['logged_in'])){
	
	
						
$this->form_validation->set_rules('asp_name', 'Asp name', 'trim|required|callback__alpha_dash_space|min_length[5]|xss_clean');
$this->form_validation->set_rules('asp_address', 'Asp address', 'trim|required|callback__alpha_dash_space|min_length[5]|xss_clean');
$this->form_validation->set_rules('asp_person', 'Asp person', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
$this->form_validation->set_rules('person_desig', 'Person_desig', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
$this->form_validation->set_rules('asp_phone_1','Phone number','numeric|required|max_length[10]|min_length[10]|xss_clean');
$this->form_validation->set_rules('asp_phone_2','Phone','numeric|max_length[10]|min_length[10]|xss_clean');
$this->form_validation->set_rules('asp_email','Email','required|valid_email');
				if($this->form_validation->run()==true)
				{
					$cr_date = date("Y/m/d") ;
					$asp_data = array(	'asp_name'=>$this->input->post('asp_name'),
										 		'asp_add' => $this->input->post('asp_address'),
										 		'asp_person' => $this->input->post('asp_person'),
							   		 		'phone_1' => $this->input->post('asp_phone_1'),
										 		'phone_2' => $this->input->post('asp_phone_2'),
										 		'email' => $this->input->post('asp_email'),
										 		'web' => $this->input->post('asp_web'),
										 		'person_desig' => $this->input->post('person_desig'),
										 		'asp_info' => $this->input->post('asp_info'),
										 		'status' => $this->input->post('status'),
										 		'cr_date' => $cr_date 
										 		);
					$this->aspmodel->update_id('asp', $aspid, $asp_data);
					redirect($_SERVER['HTTP_REFERER']);
													
					}	
					else{ 
						$asp_list['aspdata'] = $this->aspmodel->asp_list_profile();
						$this->load->view('asp/list_asp', $asp_list);
				}
					}
					else { $this->sess_out();	}		
					}
/////////////////////////////////////////////////////////////////////////////////////////////
public function sess_out()
{


echo "sess out" ;

}

}
?>
