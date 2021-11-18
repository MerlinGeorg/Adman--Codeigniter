<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Screen extends Layout_Controller {

public function __construct() 
{
parent::__construct();
$this->load->model('screen/screenmodel');
}

public function index()
					{
if(isset($this->session->userdata['logged_in'])){
				
						$this->load->view('screen/screen_dash');
					}
					else {
						echo "no";
					}
				}
					// else { $this->sess_out();	}		
					// }
/////////////////////////////////////////////////////////////////////////////////////////////
public function create_screen()
					{
if(isset($this->session->userdata['logged_in'])){	

						$sdata['username'] = $this->session->userdata('logged_in')['username'];
						$sdata['email'] = $this->session->userdata('logged_in')['email'];
 						$sdata['state'] = $this->screenmodel->getstate();	
						$sdata['asp'] = $this->screenmodel->getasp();
						$sdata['title'] = "Create Screen";
		                $sdata['msg'] = 0;
						$this->data = $sdata;
						$this->page = "screen/create_screen";
						$this->layout();

						// $this->load->view('screen/create_screen', $sdata);
						}
						else{
							echo "no";
						}
						
					}
////////////////////////////////////////////////////////////////////////////////////////////
public function screen_save()
	{
			if(isset($this->session->userdata['logged_in'])){
///////////////////////////////////////////////////////			
						
$this->form_validation->set_rules('screen_name', 'Screen name', 'trim|required');
$this->form_validation->set_rules('city', 'City', 'trim|required');
$this->form_validation->set_rules('price','Price','numeric|required');

				if($this->form_validation->run()==true)
				{
					
					$cr_date = date("Y/m/d") ;
					$sc_data = array(	'sc_name'=>$this->input->post('screen_name'),
										 		'city' => $this->input->post('city'),
										 		'state' => $this->input->post('state'),
							   		 		'asp' => $this->input->post('asp'),
										 		'uom_qty' => $this->input->post('uom_qty'),
										 		'sc_price' => $this->input->post('price'),
										 		'sc_info' => $this->input->post('screen_info'),
										 		'cgst' => $this->input->post('cgst'),
										 		'sgst' => $this->input->post('sgst'),
									  			'igst' => $this->input->post('igst'),
									  			'local_tax' => $this->input->post('ltax'),
										 		'sc_status' => 1,
										 		'sc_cr_date' => $cr_date 
										 		);
					$this->screenmodel->insert_screen_data('screen', $sc_data);
					// redirect($_SERVER['HTTP_REFERER']);
					//$ttdata['infomsg'] = "yes" ;	
 					//$this->load->view('create_asp',$ttdata);
					 $sdata['msg'] = 1;			
					}	
				else{ 
					$sdata['msg'] = 0;
				}
					$sdata['username'] = $this->session->userdata('logged_in')['username'];
						$sdata['email'] = $this->session->userdata('logged_in')['email'];
 						$sdata['state'] = $this->screenmodel->getstate();	
						$sdata['asp'] = $this->screenmodel->getasp();
						$sdata['title'] = "Create Screen";
		 
						$this->data = $sdata;
						$this->page = "screen/create_screen";
						$this->layout();


				// $sdata['state'] = $this->screenmodel->getstate();	
 				// 		$sdata['asp'] = $this->screenmodel->getasp();								
				// 		$this->load->view('screen/create_screen', $sdata);
				}
///////////////////////////////////////////////////////////////////				
								
					else 
					{ $this->sess_out();	
					}	
							}
					
					
////////////////////////////////////////////////////////////////////////////////////////////////
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
////////////////////////////////////////screen-list////////////////////////////////////////////
public function sess_out()
{


echo "sess out" ;

}
public function list_screen()
					{
if(isset($this->session->userdata['logged_in'])){
						$sc_list['username'] = $this->session->userdata('logged_in')['username'];
						$sc_list['email'] = $this->session->userdata('logged_in')['email'];
						$sc_list['scdata'] = $this->screenmodel->screen_list_profile();
						$sc_list['title'] = "List All Screen";
		 
						$this->data = $sc_list;
						$this->page = "screen/list_screen";
						$this->layout();

						// $this->load->view('screen/list_screen', $sc_list);
					}
					else { echo "no";	}		
					}
					
public function screen_edit()
					{
if(isset($this->session->userdata['logged_in'])){
	$sc_id = $this->uri->segment(3);
	$edit_sc['username'] = $this->session->userdata('logged_in')['username'];
	$edit_sc['email'] = $this->session->userdata('logged_in')['email'];
	$edit_sc['title'] = "Edit Screen";
	$edit_sc['state'] = $this->screenmodel->getstate();	
 	$edit_sc['asp'] = $this->screenmodel->getasp();
	$edit_sc['scdataedit'] = $this->screenmodel->getdata_id('screen', $sc_id);

	$this->data = $edit_sc;
	$this->page = "screen/edit_sc";
	$this->layout();

	// $this->load->view('screen/edit_sc', $edit_sc);
		
					}
					else { $this->sess_out();	}		
					}
public function screen_update()
					{
						$scid =$this->input->post('sc_id');
if(isset($this->session->userdata['logged_in'])){
//  $scid =$this->input->post('sc_id');
$this->form_validation->set_rules('screen_name', 'Screen name', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
$this->form_validation->set_rules('city', 'City', 'trim|required|callback__alpha_dash_space|min_length[3]|xss_clean');
$this->form_validation->set_rules('price','Price','numeric|required|xss_clean');
		
				if($this->form_validation->run()==true)
				{
					
					$cr_date = date("Y/m/d") ;
					$sc_data = array(	'sc_name'=>$this->input->post('screen_name'),
										 		'city' => $this->input->post('city'),
										 		'state' => $this->input->post('state'),
							   		 		    'asp' => $this->input->post('asp'),
										 		'uom_qty' => $this->input->post('uom_qty'),
										 		'sc_price' => $this->input->post('price'),
										 		'sc_info' => $this->input->post('screen_info'),
										 		'cgst' => $this->input->post('cgst'),
										 		'sgst' => $this->input->post('sgst'),
										 		'igst' => $this->input->post('igst'),
										 		'local_tax' => $this->input->post('ltax'),
										 		'sc_status' => $this->input->post('status'),
										 		'sc_cr_date' => $cr_date 
										 		);
				   $this->screenmodel->update_screen_data('screen', $scid, $sc_data);
					// redirect($_SERVER['HTTP_REFERER']); 
					redirect('screen/list_screen');
				}
					else{ 
						$sc_list['scdata'] = $this->screenmodel->screen_list_profile();
						$this->load->view('screen/list_screen', $sc_list);
				}
					}
					else { $this->sess_out();	}		
					}					
//////////////////////////////////////////////////////////////////////////////////////////////


}
?>
