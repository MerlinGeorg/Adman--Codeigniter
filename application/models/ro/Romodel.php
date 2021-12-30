<?php
class Romodel extends CI_Model
{

	///////////////////////////////////////////////	
	function get_rolist()
	{


		$this->db->select('DISTINCT(R.ro_id),R.duration,E.name AS camp_ame,R.est_id');
		$this->db->from('ro_reg R');
		$this->db->where('R.status', 1);
		$this->db->where('R.duration !=', '0');
		$this->db->where('R.asp !=', '0');
		$this->db->where('R.package !=', '0');
		$this->db->join('est_reg E ', 'R.est_id = E.est_id');
		$this->db->order_by("est_name", "asc");



		/* $this->db->select('*');
		$this->db->from('ro_reg');
		$this->db->where('status', 1);
		$this->db->join('adv_reg', 'ro_reg.adv_id = adv_reg.adv_id','inner');
		$this->db->join('content_reg', 'ro_reg.content_id = content_reg.con_id','inner');
		 */

		// $this->db->order_by("E.name");

		return $this->db->get();
		$this->db->from('ro_reg');
	}


	function get_ro_reg_list()
	{
		$this->db->select('*');
		$this->db->from('ro_reg');
		return $this->db->get();
	}
	function get_ro()
	{
		$this->db->select('ro_id');
		$this->db->from('ro_reg');
		$this->db->where("est_id", $est_id);
		return $this->db->get();
	}

	function update_get_ro($table,$ro,$ro_data)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('ro_id', $ro);
		$this->db->update($table, $ro_data);
	}

	function get_releaselist()
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		// $this->db->join('invo_reg_line Il', 'E.est_id = Il.est_id','left');
		$this->db->where('status', 2);
		$this->db->order_by("est_id", "desc");
		return $this->db->get();
	}

	public function get_campdetail($campId, $aspId)
	{
		$this->db->select('*');
		$this->db->from('est_reg E');
		$this->db->join('est_line El', 'E.est_id = El.est_id', 'inner');
		$this->db->join('invoice_reg Ir', 'E.est_id = Ir.est_id', 'inner');
		$this->db->join('invo_reg_line Il', 'E.est_id = Il.est_id', 'inner');
		$this->db->join('adv_reg A', 'E.adv_id = A.adv_id', 'inner');
		$this->db->where('E.est_id', $campId);
		$this->db->where('El.asp', $aspId);
		return $this->db->get();
	//$res=$this->db->get();
	//echo $this->db->last_query();
	//print_r($res);
	//exit();
	}
	/////////////////////////////
	function get_invoreglist($id)
	{
		$this->db->select('*');
		$this->db->from('invoice_reg');
		$this->db->where('invo_id', $id);
		$this->db->where('status', 1);
		$this->db->join('adv_reg', 'invoice_reg.adv_id = adv_reg.adv_id', 'inner');
		$this->db->join('content_reg', 'invoice_reg.content_id = content_reg.con_id', 'inner');

		return $this->db->get();
	}
	/////////////////////////////	

	function get_roreglist($id)
	{
		// $this->db->select('*');
		// $this->db->from('ro_reg');
		// $this->db->where('ro_id', $id);
		// $this->db->where('ro_reg.status', 1);
		// $this->db->join('asp', 'ro_reg.asp = asp.asp_id','inner');
		// $this->db->join('screen', 'ro_reg.screen = screen.sc_id','inner');
		// $this->db->join('adv_reg', 'ro_reg.adv_id = adv_reg.adv_id','inner');
		// $this->db->join('content_reg', 'ro_reg.content_id = content_reg.con_id','inner');
		// $this->db->join('time_policy', 'ro_reg.package = time_policy.tpc','inner');
		// $this->db->order_by("ro_id", "desc");
		// return $this->db->get();

		$this->db->select('*');
		$this->db->select('Rl.discount as ro_discount');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 1);
		$this->db->join('ro_line Rl', 'R.ro_id = Rl.ro_id', 'inner');
		$this->db->join('est_line', 'R.est_id = est_line.est_id', 'inner');
		$this->db->join('asp', 'R.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'Rl.screen = screen.sc_id', 'left');
		$this->db->join('adv_reg', 'R.adv_id = adv_reg.adv_id', 'inner');
		$this->db->join('content_reg', 'R.content_id = content_reg.con_id', 'inner');
		$this->db->join('time_policy', 'R.package = time_policy.tpc', 'inner');
		$this->db->group_by('Rl.screen');
		$this->db->order_by("sc_name", "asc");
		$ro = $this->db->get();
		return $ro->result();
	}

	function update_discount($id, $dis, $ino, $idate, $tval)

	{
		$this->db->set('asp_discount', $dis);
		$this->db->set('invo_no', $ino);
		$this->db->set('invo_date', $idate);
		$this->db->set('line_total', $tval);
		$this->db->where('ro_lid', $id);
		$this->db->update('ro_line');
	}


	function update_ro_status($id)

	{
		$this->db->set('status', 2);
		$this->db->where('ro_id', $id);
		$this->db->update('ro_reg');
	}

	function update_ro_line_status($id)

	{
		$this->db->set('status', 2);
		$this->db->where('ro_id', $id);
		$this->db->update('ro_line');
	}



	///////////////////////////////	
	function getasp()
	{
		$this->db->select('*');
		$this->db->from('asp');
		return $this->db->get();
	}
	function gettpolicy()
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


	public function get_newpending($table_name, $course_id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('asp', $course_id);
		$this->db->where('sc_status',0);
		return $this->db->get();
	}

	//////////////////////////////////////////////////
	function get_screen($table, $id)

	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('sc_id', $id);
		return $this->db->get();
	}
	///////////////////////////////////////////////	
	////////////////////////
	function insert_invo_data($table, $data)

	{
		$this->db->insert($table, $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	function insert_get_ro($ro_data)
	{
		$table = 'ro_reg';
		$this->db->insert($table, $ro_data);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	function getEditData($id)
	{
		$this->db->select('*');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 1);
		$this->db->join('est_reg', 'R.est_id = est_reg.est_id');
		$this->db->join('asp', 'R.asp = asp.asp_id');
		//$this->db->join('screen', 'Rl.screen = screen.sc_id');
		$this->db->join('adv_reg', 'R.adv_id = adv_reg.adv_id');
		$query = $this->db->get();
		return $query;
	}

	function update_id($table, $id, $data)

	{
		
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('ro_id', $id);
		$this->db->update($table, $data);
		
	// $this->db->get();
	// echo $this->db->last_query();
	// return $res;
	// exit();
	}
	function getCampData($id)
	{
		$this->db->select('est_reg.cr_date AS cr_date');
		//$this->db->from('est_reg');
		$this->db->join('est_reg', 'ro_reg.est_id = est_reg.est_id');
		$this->db->where('ro_reg.ro_id', $id);
		$this->db->where('ro_reg.status', 1);
		$query = $this->db->get();
		return $query;
	}

	function get_contentId($id)
	{
		$this->db->select('*');
		$this->db->from('invoice_reg');
		$this->db->where('est_id', $id);
		return $this->db->get();
	}
	function update_camp($table, $id, $start_date, $duration)

	{
		$this->db->where('est_id', $id);
		$this->db->set('est_cr_date', $start_date);
		$this->db->set('duration', $duration);
		$this->db->update($table);
	}
	function update_estline($table, $id, $start_date, $duration)

	{
		$this->db->where('est_id', $id);
		$this->db->set('est_cr_date', $start_date);
		$this->db->set('duration', $duration);
		$this->db->update($table);
	}
	function insert_ro_data($data)
	{
		$table = 'ro_line';
		$this->db->insert($table, $data);
		$error = $this->db->error();
		print_r($error);
		return true;
		// $this->db->distinct()->select('est_id')->where('est')
		// $insertId = $this->db->insert_id();
		// return  $insertId;

	}
	///////////////////////////////////////////////		
	function get_involine_edit($id)
	{
		$this->db->select('*');
		$this->db->from('invo_reg_line');
		$this->db->where('invo_id', $id);
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
		return $this->db->get();
	}
	function did_delete_row($rid)

	{

		$this->db->where('invo_reg_lineid', $rid);
		$this->db->delete('invo_reg_line');
	}
	function update_invo_data($table, $data, $id)

	{

		$this->db->where('invo_reg_lineid', $id);
		$this->db->update('invo_reg_line', $data);
	}
	function get_involinedata($id)
	{
		$this->db->select('*');
		$this->db->from('invo_reg_line');
		$this->db->where('invo_id', $id);
		return $this->db->get();
	}

	function create_ro_data($data)

	{
		$this->db->insert('ro_reg', $data);
	}
	///////////////////////////////////////////////////////////////////////												
	function invo_status($id)

	{

		$this->db->set('status', 2);
		$this->db->where('invo_id', $id);
		$this->db->update('invoice_reg');
	}
	//////////////////////////////
	function getEstId($id)
	{

		$this->db->select('est_id');
		$this->db->from('ro_reg');
		$this->db->where('ro_id', $id);
		$this->db->where('status', 2);

		$res = $this->db->get();
		return $res->result()[0];
	}
	function getRoId()
	{
		$this->db->select('R.ro_id');
		$this->db->from('ro_reg R');
		$this->db->join('invoice_reg I', 'R.est_id = I.est_id', 'inner');
		$this->db->join('adv_reg A', 'R.adv_id = A.adv_id', 'inner');
		$this->db->join('content_reg C', 'R.content_id = C.con_id', 'inner');

		$this->db->where('R.status', 2);

		$res = $this->db->get();
		return $res->result();
	}
	function get_rolist_old($id)
	{
		$this->db->select('R.ro_id,R.duration,R.content_id,C.content_name,A.adv_name,I.invo_id,I.est_name');
		$this->db->from('ro_reg R');
		$this->db->join('invoice_reg I', 'R.est_id = I.est_id', 'inner');
		$this->db->join('adv_reg A', 'R.adv_id = A.adv_id', 'inner');
		$this->db->join('content_reg C', 'R.content_id = C.con_id', 'inner');
		$this->db->where('R.status', 2);
		$this->db->where('I.est_id', $id);
		$this->db->group_by("A.adv_name");
		$this->db->order_by("A.adv_name");
		return $this->db->get();
	}
	//////////////////////////////////////
	function get_roasplist($id)
	{
		/*
		$this->db->select('DISTINCT(asp), asp, invo_id, duration');
		$this->db->from('ro_reg');
	//	$this->db->join('asp', 'ro_reg.asp = asp.asp_id','inner');
		$this->db->where('invo_id', $id);*/

		// $this->db->select('*');
		// $this->db->from('ro_reg R');
		// $this->db->where('R.ro_id', $id);
		// $this->db->where('R.status', 1);
		// $this->db->join('est_line', 'R.est_id = est_line.est_id','inner');
		// $this->db->join('asp', 'R.asp = asp.asp_id','inner');
		// $this->db->join('screen', 'R.screen = screen.sc_id','left');
		// $this->db->join('adv_reg', 'R.adv_id = adv_reg.adv_id','left');
		// $this->db->join('content_reg', 'R.content_id = content_reg.con_id','left');
		// $this->db->join('time_policy', 'R.package = time_policy.tpc','left');
		// $this->db->order_by("R.ro_id", "desc");
		// $ro = $this->db->get();
		// return $ro->result();

		$this->db->select('*');
		$this->db->select('Rl.discount as ro_discount');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 1);
		$this->db->join('ro_line Rl', 'R.ro_id = Rl.ro_id', 'inner');
		$this->db->join('est_line', 'R.est_id = est_line.est_id', 'inner');
		$this->db->join('asp', 'R.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'Rl.screen = screen.sc_id', 'left');
		$this->db->join('adv_reg', 'R.adv_id = adv_reg.adv_id', 'inner');
		$this->db->join('content_reg', 'R.content_id = content_reg.con_id', 'inner');
		$this->db->join('time_policy', 'R.package = time_policy.tpc', 'inner');
		$this->db->order_by("R.ro_id", "desc");
		$ro = $this->db->get();
		return $ro->result();



		//$this->db->select('DISTINCT(asp)');
		// 	$this->db->select('*');
		//    $this->db->from('ro_reg');
		// 	$this->db->where('invo_id', $id);
		// 	$this->db->join('asp', 'ro_reg.asp = asp.asp_id','inner');
		// 	$ro = $this->db->get();
		// 	return $ro->result();


	}
	public function getcampaignlist($campId)
	{
		// $this->db->select('E.est_id,E.adv_id,E.duration,E.cr_date,A.adv_name');
		$this->db->select('*');
		$this->db->from('est_reg E');
		// $this->db->join('est_line El', 'E.est_id = El.est_id','inner');
		// $this->db->join('invo_reg_line Il', 'E.est_id = Il.est_id','inner');
		$this->db->join('adv_reg A', 'E.adv_id = A.adv_id', 'inner');
		$this->db->where('E.est_id', $campId);
		$ro = $this->db->get();
		return $ro->result_array();
	}

	public function getcampaignasplist($campId)
	{
		$this->db->select('A.asp_id,A.asp_name');
		$this->db->from('est_line E');
		$this->db->where('est_id', $campId);
		$this->db->join('asp A', 'E.asp = A.asp_id', 'inner');
		$this->db->group_by('A.asp_id');
		// $this->db->join('screen', 'est_line.screen = screen.sc_id','inner');
		// $this->db->join('time_policy', 'est_line.package = time_policy.tpc','inner');
		$ro = $this->db->get();
		return $ro->result_array();
	}

	public function adscontact($invoiceId)
	{
		//$this->db->select('A.c_person,A.adv_name,A.add1,A.phone_1,A.email,A.gst,A.pan,E.cr_date,E.name,R.duration AS Contentdur,R.camp_id');
		$this->db->select('A.asp_name,A.asp_add,A.asp_person,E.est_cr_date,E.name,R.duration AS Contentdur,R.est_id');
		$this->db->from('ro_reg R');
		$this->db->join('est_reg E', 'R.est_id = E.est_id');
		$this->db->join('asp A', 'R.asp = A.asp_id');
		// $this->db->join('adv_reg A', 'E.adv_id = A.adv_id');
		$this->db->where('R.ro_id', $invoiceId);
		$ro = $this->db->get();
		$res = $ro->result();
		return $res[0];
	}
	public function getLogo($invoiceId)
	{
		$this->db->select('R.logo_id,l.*,a.*');
		$this->db->from('ro_reg R');
		$this->db->join('adman_logo l', 'R.logo_id = l.logo_id');
		$this->db->join('adman_company_address a', 'l.logo_id = a.logo_id');
		$this->db->where('R.ro_id', $invoiceId);
		$ro = $this->db->get();
		$res = $ro->result();
		return $res;
		//return $this->db->get();
	}
	public function campdata($campId)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_id', $campId);
		$ro = $this->db->get();
		$res = $ro->result();
		return $res[0];
	}

	public function get_screens($campId)
	{
		$this->db->select('S.sc_name,S.city,S.web_code,S.sc_status');
		$this->db->from('est_line E');
		$this->db->join('screen S', 'E.screen = S.sc_id');
		$this->db->where('E.est_id', $campId);
		$this->db->where('sc_status', 1);
		$ro = $this->db->get();
		$res = $ro->result();
		return $res;
	}


	public function update_screen($sc_id)
	{
		$this->db->set('sc_status', 0);
		$this->db->where('sc_id', $sc_id);
		$this->db->update('screen');
	}


	


	function getOldRoEditData($id)
	{
		$this->db->select('*');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 2);
		$this->db->join('est_reg', 'R.est_id = est_reg.est_id');
		$this->db->join('asp', 'R.asp = asp.asp_id');
		//$this->db->join('screen', 'Rl.screen = screen.sc_id');
		$this->db->join('adv_reg', 'R.adv_id = adv_reg.adv_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
	//	print_r($query->result());exit();
		return $query->result();
	}
	function updateScreenStatus($id){
		$this->db->set('sc_status', 1);
		$this->db->where('sc_id', $id);
		$this->db->update('screen');
	}

	function updateoldRo($data,$id){
	//	$this->db->select('*');
	//	$this->db->from('ro_reg');
		$this->db->where('ro_id', $id);
		$this->db->update('ro_reg', $data);
		//$res=$this->db->get();
//echo $this->db->last_query();
	//	print_r($res);exit();
	}

	////////////////////////								
}
