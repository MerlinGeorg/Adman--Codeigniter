<?php
class Invomodel extends CI_Model
{

	///////////////////////////////////////////////	
	function get_involist()
	{
		$this->db->select('*');
		$this->db->from('invoice_reg');
		$this->db->where('status', 1);
		$this->db->join('adv_reg', 'invoice_reg.adv_id = adv_reg.adv_id', 'inner');
		$this->db->join('content_reg', 'invoice_reg.content_id = content_reg.con_id', 'inner');
		$this->db->order_by("est_name");
		return $this->db->get();
	}
	/////////////////////////////
	function get_inward_involist()
	{
		$this->db->select('Rl.*,R.content_id,C.content_name,A.adv_name');
		$this->db->from('ro_reg R');
		$this->db->where('R.status', 2);
		$this->db->join('ro_line Rl', 'R.ro_id = Rl.ro_id', 'inner');
		$this->db->join('adv_reg A', 'R.adv_id = A.adv_id', 'inner');
		$this->db->join('content_reg C', 'R.content_id = C.con_id', 'inner');
		$this->db->group_by("A.adv_name");
		$this->db->order_by("R.est_name");
		return $this->db->get();
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
	///////////////////////////////////////////////		
	function get_involine_edit($id)
	{
		$this->db->select('*');
		$this->db->from('invo_reg_line');
		$this->db->where('invo_id', $id);
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
		$this->db->order_by("sc_name");
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
	function get_involinedata_adv($id)
	{
		$this->db->select('*');
		$this->db->from('invoice_reg');
		$this->db->where('invo_id', $id);
		$this->db->limit(1);
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
	////////////////////////
	function	get_packdate($packid)
	{

		$this->db->select('days');
		$this->db->from('time_policy');
		$this->db->where('tpc', $packid);
		return $this->db->get();
	}
	function update_play_data($data, $id)

	{

		$this->db->set('play', $data);
		$this->db->where('invo_id', $id);
		$this->db->update('invoice_reg');
	}
	function get_roasplist($id)
	{
		$this->db->select('*');
		$this->db->select('Rl.discount as ro_discount');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 2);
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

	function get_roreglist($id)
	{
		$this->db->select('*');
		$this->db->select('Rl.discount as ro_discount');
		$this->db->from('ro_reg R');
		$this->db->where('R.ro_id', $id);
		$this->db->where('R.status', 2);
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
}
