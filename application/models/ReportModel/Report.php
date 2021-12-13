<?php
class Report extends CI_Model
{

	function dailyReport($table, $data)

	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('start_date', $data);
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
		$res = $this->db->get();
		return $res->result();
	}

	public function get_estline_edit($id)
	{
		$this->db->select('*');
		$this->db->from('est_line');
		$this->db->where('est_line.est_id', $id);
		$this->db->join('asp', 'est_line.asp = asp.asp_id', 'inner');
		$this->db->join('est_reg', 'est_line.est_id = est_reg.est_id', 'inner');
		$this->db->join('screen', 'est_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'est_line.package = time_policy.tpc', 'inner');
		$this->db->join('adv_reg', 'est_reg.adv_id = adv_reg.adv_id', 'inner');
		$this->db->order_by("asp_name", "asc");
//	$this->db->from('ro_reg');
		$res = $this->db->get();
		return $res->result()[0];
	}

	function monthlyReport($table, $data)

	{
		$this->db->select('*');
		 $this->db->from($table); 
		$this->db->where('month(`start_date`)=',date($data));
		 
		 $this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
	
		$res=$this->db->get();
		//echo $this->db->last_query();
		//echo '<pre>';
		//print_r($res);
		//exit();
		return $res->result();
	}

	function weeklyReport($table, $fromDate, $toDate)

	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('start_date >=', $fromDate);
		$this->db->where('start_date <=', $toDate);
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
		$res = $this->db->get();
		return $res->result();
	}

	function advertiserReport($table, $data)

	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('invoice_reg.adv_id', $data);
		$this->db->join('invoice_reg', 'invo_reg_line.invo_id = invoice_reg.invo_id', 'inner');
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
	    $this->db->join('adv_reg', 'invoice_reg.adv_id = adv_reg.adv_id', 'inner');
		
		
		$res = $this->db->get();
		return $res->result();
	}

	function advertiserName($data)

	{
		$this->db->select('adv_name');
		$this->db->from('adv_reg');
		$this->db->where('adv_id', $data);
	
		$res = $this->db->get();
		return $res->result()[0];
		
	}

}
