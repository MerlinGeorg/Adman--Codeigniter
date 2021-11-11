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
		$this->db->where('asp',$course_id);
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
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id','inner');
		$this->db->order_by("name", "asc");
		return $this->db->get();
	}

	public function get_estedit($id)
	{ 
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('est_id', $id);
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id','inner');
		return $this->db->get();
	}



	public function get_invoedreglist($id)
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('est_id', $id);
		//$this->db->where('status', 1);
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id','inner');
	//	$this->db->join('content_reg', 'est_reg.content_id = est_reg.con_id','inner');
		
		return $this->db->get();
	}

	public function get_estline_edit($id)
	{
		$this->db->select('*');
		$this->db->from('est_line'); 
		$this->db->where('est_id', $id);
		$this->db->join('asp', 'est_line.asp = asp.asp_id','inner');
		$this->db->join('screen', 'est_line.screen = screen.sc_id','inner');
		$this->db->join('time_policy', 'est_line.package = time_policy.tpc','inner');
		$this->db->order_by("asp_name", "asc");
		return $this->db->get();
	}



	function get_invoedline_edit($id)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_id', $id);
		$this->db->join('asp', 'est_line.asp = asp.asp_id','inner');
		$this->db->join('screen', 'est_line.screen = screen.sc_id','inner');
		$this->db->join('time_policy', 'est_line.package = time_policy.tpc','inner');
		$this->db->order_by("sc_name", "asc");
		return $this->db->get();
	}	

	public function get_screen($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('sc_id',$id);
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
		return $invoiceId;
	}


	public function invoiced_est($id)
	{
		$this->db->set('status', 2);
		$this->db->where('est_id', $id);
		$this->db->update('est_reg');
	}


	public function get_eststatus($id)
	{
		$this->db->select('status');
		$this->db->from('est_reg');
		$this->db->where('est_id',$id);
		return $this->db->get();
	}


	public function get_estlinedata($id)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_id', $id);
		return $this->db->get();
	}

	public function create_invo_ldata($data)
	{
		$this->db->insert('invo_reg_line', $data);	
	}

	public function get_involist()
	{
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('status', 2);
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id','inner');
		$this->db->order_by("name");
		return $this->db->get();
	}

	public function get_packdate($packid)
	{
		$this->db->select('days');
		$this->db->from('time_policy');
		$this->db->where('tpc', $packid);
		return $this->db->get();
	}
}