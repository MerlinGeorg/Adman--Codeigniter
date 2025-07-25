<?php
class Romodel extends CI_Model
{

	///////////////////////////////////////////////	
	function get_rolist()
	{
		$this->db->select('DISTINCT(R.ro_id),R.campaignDuration,R.cr_date,E.name AS camp_ame,R.est_id');
		$this->db->from('ro_reg R');
		$this->db->where('R.status', 1);
		$this->db->where('R.campaignDuration !=', '0');
		$this->db->where('R.asp !=', '0');
		$this->db->where('R.package !=', '0');
		$this->db->join('est_reg E ', 'R.est_id = E.est_id');
		$this->db->order_by("est_name", "asc");
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

	function update_get_ro($table, $ro, $ro_data)
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
		$this->db->where('status !=', 0);
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
	}

	public function get_olro_campdetail($campId, $aspId)
	{
		$this->db->select('*');
		$this->db->from('est_reg E');
		$this->db->join('est_line El', 'E.est_id = El.est_id', 'inner');
		$this->db->join('adv_reg A', 'E.adv_id = A.adv_id', 'inner');
		$this->db->where('E.est_id', $campId);
		$this->db->where('El.asp', $aspId);
		return $this->db->get();
	}

	public function get_campData($campId)
	{
		$this->db->select('*');
		$this->db->from('est_reg E');
		$this->db->join('est_line El', 'E.est_id = El.est_id', 'inner');
		$this->db->join('adv_reg A', 'E.adv_id = A.adv_id', 'inner');
		$this->db->where('E.est_id', $campId);
		$res = $this->db->get();
		return $res->result()[0];
	}

	public function get_campDataByAsp($campId, $asp)
	{
		$this->db->select('*');
		$this->db->from('est_reg E');
		$this->db->join('est_line El', 'E.est_id = El.est_id', 'inner');
		$this->db->join('adv_reg A', 'E.adv_id = A.adv_id', 'inner');
		$this->db->where('E.est_id', $campId);
		$this->db->where('El.asp', $asp);
		$res = $this->db->get();
		return $res->result()[0];
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

	public function screenByCampaign($asp, $camp)
	{
		$this->db->select('sc_id,sc_name');
		$this->db->from('est_line');
		$this->db->where('est_id', $camp);
		$this->db->where('est_line.asp', $asp);
		$this->db->where('est_line.sc_status', 2);
		$this->db->join('screen', 'est_line.screen=screen.sc_id', 'inner');
		return $this->db->get();
	}

	public function nonPendingscreenByCampaign($asp, $camp)
	{
		$this->db->select('sc_id,sc_name');
		$this->db->from('est_line');
		$this->db->where('est_id', $camp);
		$this->db->where('est_line.asp', $asp);
		$this->db->where('est_line.sc_status', 1);
		$this->db->join('screen', 'est_line.screen=screen.sc_id', 'inner');
		return $this->db->get();
	}

	public function get_newpending($table_name, $course_id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('asp', $course_id);
		$this->db->where('sc_status', 1);
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
	}
	function getCampData($id)
	{
		$this->db->select('est_reg.cr_date AS cr_date');
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
		$this->db->join('adv_reg A', 'R.adv_id = A.adv_id', 'inner');
		$this->db->join('content_reg C', 'R.content_id = C.con_id', 'inner');
		$this->db->where('R.status', 2);
		$res = $this->db->get();
		return $res->result();
	}
	function get_rolist_old($id)
	{

		$this->db->select('R.ro_id,R.campaignDuration,R.content_id,R.est_id,E.name,C.content_name,A.adv_name');
		$this->db->from('ro_reg R');
		$this->db->join('est_reg E', 'R.est_id = E.est_id', 'inner');
		$this->db->join('adv_reg A', 'R.adv_id = A.adv_id', 'inner');
		$this->db->join('content_reg C', 'R.content_id = C.con_id', 'inner');
		$this->db->where('R.status', 2);
		$this->db->where('R.est_id', $id);
		$this->db->group_by("A.adv_name");
		$this->db->order_by("A.adv_name");
		return $this->db->get();
	}
	//////////////////////////////////////
	function get_roasplist($id)
	{

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
	}
	public function getcampaignlist($campId)
	{

		$this->db->select('*');
		$this->db->from('est_reg E');
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
		$ro = $this->db->get();
		return $ro->result_array();
	}

	public function getCampaignDuration($asp, $camp)
	{
		$this->db->select('days,tp_name,duration');
		$this->db->from('est_line');
		$this->db->where('est_id', $camp);
		$this->db->where('est_line.asp', $asp);
		$this->db->join('time_policy', 'est_line.package=time_policy.tpc', 'inner');
		$res = $this->db->get();
		return $res->result()[0];
	}

	public function adscontact($invoiceId)
	{

		$this->db->select('R.ro_material,R.asp,A.asp_name,A.asp_add,A.asp_person,E.est_cr_date,E.name,R.campaignDuration AS Contentdur,R.est_id');
		$this->db->from('ro_reg R');
		$this->db->join('est_reg E', 'R.est_id = E.est_id');
		$this->db->join('asp A', 'R.asp = A.asp_id');
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

	public function get_screensByAsp($asp, $campid, $screen)
	{
		$this->db->select('S.sc_name,S.city,S.web_code,S.sc_status,E.play');
		$this->db->from('est_line E');
		$this->db->join('screen S', 'E.screen = S.sc_id');
		$this->db->where('E.screen', $screen);
		$this->db->where('E.asp', $asp);
		$this->db->where('E.est_id', $campid);
		$this->db->where('E.sc_status', 1);
		$ro = $this->db->get();
		$res = $ro->row();
		return $res;
	}


	public function update_screen($sc_id)
	{
		$this->db->set('sc_status', 2);
		$this->db->where('screen', $sc_id);
		$this->db->update('est_line');
	}





	function getOldRoEditData($id)
	{
		$this->db->select('*');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 2);
		$this->db->join('est_reg', 'R.est_id = est_reg.est_id');
		$this->db->join('asp', 'R.asp = asp.asp_id');
		$this->db->join('adv_reg', 'R.adv_id = adv_reg.adv_id');
		$query = $this->db->get();
		return $query->result();
	}
	function updateScreenStatus($id, $camp, $asp)
	{
		$this->db->set('sc_status', 1);
		$this->db->where('screen', $id);
		$this->db->where('est_id', $camp);
		$this->db->where('asp', $asp);
		$this->db->update('est_line');
	}

	function updateoldRo($data, $id)
	{

		$this->db->where('ro_id', $id);
		$this->db->update('ro_reg', $data);
	}

	function getContentById($id)
	{
		$this->db->select('*');
		$this->db->from('content_reg');
		$this->db->where('con_id', $id);
		$res = $this->db->get();
		return $res->result()[0];
	}
	////////////////////////
	public function get_ExcludingPendingScreen($id, $asp)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_line.est_id', $id);
		$this->db->where('est_line.sc_status', 1);
		$this->db->where('est_line.asp', $asp);
		$this->db->join('ro_reg', 'est_line.asp=ro_reg.asp', 'inner');
		$this->db->where('ro_reg.est_id', $id);
		$this->db->join('asp', 'est_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'est_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'est_line.package = time_policy.tpc', 'inner');
		$this->db->where('ro_reg.asp', $asp);
		$this->db->order_by("asp_name", "asc");
		return $this->db->get();
	}

	public function updatePublishingDate($id, $date)
	{
		$this->db->set('publish_date', $date);
		$this->db->where('est_id', $id);
		$this->db->update('est_reg');
	}

	public function getRoIds()
	{
		$this->db->select('ro_id');
		$this->db->from('ro_reg');
		$this->db->join('est_reg', 'ro_reg.est_id=est_reg.est_id', 'inner');
		return $this->db->get();
	}

	public function listMaterial()
	{
		$this->db->select('*');
		$this->db->from('material');
		return $this->db->get();
	}
}
