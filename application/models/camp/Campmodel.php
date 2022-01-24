<?php


/**
 * Campmodel
 */
class Campmodel extends CI_Model
{
	public function insert_asp_data($table, $data)
	{
		$this->db->insert($table, $data);
	}


	public function getadv()
	{
		$this->db->select('*');
		$this->db->from('adv_reg');
		return $this->db->get();
	}

	public function getasp()
	{
		$this->db->select('*');
		$this->db->from('asp');
		$this->db->order_by("asp_id", "desc");
		return $this->db->get();
	}

	public function gettpolicy()
	{
		$this->db->select('*');
		$this->db->from('time_policy');
		return $this->db->get();
	}

	public function get_batch($table_name, $course_id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('asp', $course_id);
		return $this->db->get();
	}

	public function insert_est_data($table, $data)
	{
		$this->db->insert($table, $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function get_estlist()
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('status', 1);
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id', 'inner');
		$this->db->order_by("name", "asc");
		return $this->db->get();
	}

	public function get_estedit($id)
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('est_id', $id);
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id', 'inner');
		return $this->db->get();
	}



	public function get_invoedreglist($id)
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		//$this->db->where('est_id', $id);
		//$this->db->where('status', 1);
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id', 'inner');
		//	$this->db->join('content_reg', 'est_reg.content_id = est_reg.con_id','inner');
		//return $this->db->get();
		$this->db->join('invoice_reg','invoice_reg.est_id=est_reg.est_id');
		$this->db->where('invoice_reg.invo_id', $id);
		return $this->db->get();
		//echo $this->db->last_query();
		//die();
	}

	public function get_estline_edit($id)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_line.est_id', $id);
		$this->db->join('est_reg','est_line.est_id=est_reg.est_id','inner');
		$this->db->join('asp', 'est_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'est_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'est_line.package = time_policy.tpc', 'inner');
		$this->db->order_by("asp_name", "asc");
		return $this->db->get();
		//$this->db->get();
		//echo $this->db->last_query();
		//die();
	}



	function get_invoedline_edit($id)
	{
		$this->db->select('*'); 
		$this->db->from('est_line');
		$this->db->where('est_id', $id);
		$this->db->join('asp', 'est_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'est_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'est_line.package = time_policy.tpc', 'inner');
		$this->db->order_by("sc_name", "asc");
		return $this->db->get();
	}

	public function get_screen($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('sc_id', $id);
		return $this->db->get();
	}

	public function update_discount($id, $data)
	{
		$this->db->set('discount', $data);
		$this->db->where('est_lineid', $id);
		$this->db->update('est_line');
	}

	public function did_delete_row($rid)
	{
		$this->db->where('est_lineid', $rid);
		$this->db->delete('est_line');
	}

	public function cancel_est($id)
	{
		$this->db->set('status', 0);
		$this->db->where('est_id', $id);
		$this->db->update('est_reg');
	}

	public function get_ctype()
	{
		$this->db->select('*');
		$this->db->from('content_type');
		return $this->db->get();
	}

	public function get_content()
	{
		$this->db->select('*');
		$this->db->from('content_reg');
		return $this->db->get();
	}

	public function insert_invo_data($data)
	{
		$this->db->insert('content_reg', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function get_estdata($id)
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('est_id', $id);
		return $this->db->get();
	}

	public function create_invo_data($data)
	{
		$this->db->insert('invoice_reg', $data);
		$invoiceId = $this->db->insert_id();
	//	echo $this->db->last_query();
	//	die();
		return $invoiceId;
	}


	public function invoiced_est($id)
	{
		$this->db->set('status', 2);
		$this->db->where('est_id', $id);
		$this->db->update('est_reg');
		return $this->db->get();
	}


	public function get_eststatus($id)
	{
		$this->db->select('status');
		$this->db->from('est_reg');
		$this->db->where('est_id', $id);
		return $this->db->get();
	}


	public function get_estlinedata($id)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_id', $id);
		return $this->db->get();
	}

	public function getEstlineInvoice($id,$asp){
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_id', $id);
		$this->db->where('asp', $asp);
		return $this->db->get();
	}

	public function create_invo_ldata($data)
	{
		$this->db->insert('invo_reg_line', $data);
	}

	public function get_involist()
	{
		$this->db->select('*');
	//	$this->db->from('est_reg');
	//	$this->db->where('status', 2);
	$this->db->from('invoice_reg');
		//$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id', 'inner');

		$this->db->join('adv_reg', 'invoice_reg.adv_id = adv_reg.adv_id', 'inner');
		$this->db->order_by("est_name",'asc');
		return $this->db->get();
	}

	public function get_packdate($packid)
	{
		$this->db->select('days');
		$this->db->from('time_policy');
		$this->db->where('tpc', $packid);
		return $this->db->get();
	}

	public function getLogo($id)
	{
		$this->db->select('E.logo_id,l.*,a.*');
		$this->db->from('est_reg E');
		$this->db->join('adman_logo l', 'E.logo_id = l.logo_id');
		$this->db->join('adman_company_address a', 'l.logo_id = a.logo_id');
		$this->db->where('E.est_id', $id);
		$ro = $this->db->get();
		$res = $ro->result();
		return $res;
		//return $this->db->get();
	}
public function getEstId($id){
	/* $this->db->select('est_id');
		$this->db->from('invoice_reg E');
		$this->db->where('E.invo_id', $id); */
		$this->db->select('camp_id');
		$this->db->from('inward_invoice E');
		$this->db->where('E.inward_id', $id);
		$ro = $this->db->get();
		$res = $ro->result()[0];
	//echo $this->db->last_query();
	//	print_r($res);die();
		return $res;
}
	public function getInvoLogo($id)
	{
		$this->db->select('E.logo_id,l.*,a.*');
		$this->db->from('est_reg E');
		$this->db->join('adman_logo l', 'E.logo_id = l.logo_id');
		$this->db->join('adman_company_address a', 'l.logo_id = a.logo_id');
		$this->db->join('invoice_reg I', 'E.est_id = I.est_id');
		//$this->db->where('E.est_id', $id);
		$this->db->where('invo_id', $id);
	//	$ro = $this->db->get();
	//	$res = $ro->result();
//echo $this->db->last_query();
//die();
		//return $res;
		return $this->db->get();
	}

	public function getaspByInvoId($id)
	{
		/* $this->db->select('asp.asp_name,asp.asp_id');
		$this->db->from('invo_reg_line');
		$this->db->join('asp', 'asp.asp_id = invo_reg_line.asp');
		$this->db->where('invo_id', $id);
		$ro=$this->db->get();
	echo $this->db->last_query();
	echo '<pre>';
	
	//$res=$ro->result()[0];
	print_r($ro->result());
	exit();
	return $res; */
	$this->db->select('asp');
		$this->db->from('est_reg');
		$this->db->join('invoice_reg','invoice_reg.est_id=est_reg.est_id');
		$this->db->where('invoice_reg.invo_id', $id);
		$ro=$this->db->get();
	//echo $this->db->last_query();
	//echo '<pre>';
	
	$res=$ro->result()[0];
	//print_r($ro->result());
	//exit();
	return $res; 
	}
public function update_estData($data,$id){
	$this->db->set('asp', $data);
		$this->db->where('est_id', $id);
		$this->db->update('est_reg');
}
	public function getaspByEstId($id)
	{
		$this->db->select('est_line.asp,asp.asp_name');
		$this->db->from('est_reg');
		$this->db->join('est_line', 'est_reg.est_id = est_line.est_id');
		$this->db->join('asp', 'asp.asp_id = est_line.asp');
		$this->db->where('est_reg.est_id', $id);
	$ro=$this->db->get();
	$res=$ro->result()[0];
	//print_r($res);exit();
	return $res;
	}

	public function getEstIdByInvoId($id){
		$this->db->select('est_id');
		$this->db->from('invoice_reg');
		$this->db->where('invo_id',$id);
		$res=$this->db->get();
//print_r($res->result()[0]);
return $res->result()[0];
	}
}
