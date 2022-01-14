<?php
class Invomodel extends CI_Model
{

	///////////////////////////////////////////////	
	function insert_inward_invoice($table, $data)
	{
		$this->db->insert($table, $data);
		//return $this->db->get();
		$insertId =$this->db->insert_id();
		return $insertId;
	}

	function get_ro_re_list($camp_id)
	{
		$this->db->select('est_name,ro_id');
		$this->db->from('ro_reg');
		$this->db->where('est_id', $camp_id);
		// return $this->db->get();

		$re = $this->db->get();
		$var = $re->result()[0];
		return $var;
		
	}



	function get_adv_list($adv_name)
	{
		$this->db->select('adv_id');
		$this->db->from('adv_reg');
		$this->db->where('adv_name', $adv_name);
		// return $this->db->get();

		$resu = $this->db->get();
		$var = $resu->result()[0];
		return $var;
	}
	function get_ro_id($camp_id)
	{
		$this->db->select('ro_id');
		$this->db->from('ro_reg');
		$this->db->where('est_id', $camp_id);


		$resu = $this->db->get();
		$var = $resu->result();
		return $var;
	}

	function list_inward_invoices()
	{
		$this->db->select('*');
		$this->db->from('inward_invoice');
		$this->db->order_by("camp_name", "asc");
		return $this->db->get();
		
	}



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
	//	$res=$this->db->get();
		return $this->db->get();
//	echo $this->db->last_query();
	//print_r($res->result());
//	die();
	}

	function get_invoreglinelist($id)
	{
		$this->db->select('*');
		$this->db->from('invo_reg_line');
	//	$this->db->where('invo_reg_line.invo_reg_lineid', $id);
	$this->db->where('invo_reg_line.inward_id', $id);
		$this->db->where('invo_reg_line.status', 1);
		/* $this->db->join('invoice_reg', 'invo_reg_line.invo_id = invoice_reg.invo_id', 'inner');
		
		$this->db->join('adv_reg', 'invoice_reg.adv_id = adv_reg.adv_id', 'inner');
	$this->db->join('content_reg', 'invoice_reg.content_id = content_reg.con_id', 'inner'); */
	 $this->db->join('inward_invoice', 'invo_reg_line.inward_id = inward_invoice.inward_id', 'inner');
	$this->db->join('adv_reg', 'inward_invoice.adv_id = adv_reg.adv_id', 'inner');
	//$this->db->join('content_reg', 'inward_invoice.content_id = content_reg.con_id', 'inner'); 
		//$this->db->get();
		return $this->db->get();
	 // $res=$this->db->get();
	 // echo $this->db->last_query();
	// echo '<pre>';
	// print_r($res);
	// die();  
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
	//	echo $this->db->last_query();
	//	exit();
		$insertId = $this->db->insert_id();
		return  $insertId;
	}
	///////////////////////////////////////////////		
	function get_involine_edit($id)
	{
		$this->db->select('*');
		$this->db->from('invo_reg_line');
		//$this->db->where('invo_reg_lineid', $id);
		$this->db->where('invo_id', $id);
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
		$this->db->order_by("sc_name");
		return $this->db->get();
//	$res=$this->db->get();
//	 echo $this->db->last_query();
	//echo '<pre>';
	//print_r($res);
	//die();
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
	function get_packdate($packid)
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

	function inward_involine_edit($id)
	{
		$this->db->select('*');
		$this->db->from('invo_reg_line');
		$this->db->where('inward_id', $id);
		$this->db->join('asp', 'invo_reg_line.asp = asp.asp_id', 'inner');
		$this->db->join('screen', 'invo_reg_line.screen = screen.sc_id', 'inner');
		$this->db->join('time_policy', 'invo_reg_line.package = time_policy.tpc', 'inner');
		$this->db->order_by("sc_name");
	//	$this->db->get();
				return $this->db->get();
//	$res=$this->db->get();
	// echo $this->db->last_query();
	//echo '<pre>';
	//print_r($res);
	//die();
	}

    function getAspInRoreg(){
		$this->db->select('*');
		$this->db->from('asp');
		$this->db->join('ro_reg','asp.asp_id=ro_reg.asp','inner');
		return $this->db->get();
	}

	function getCampaignInRoreg(){
		$this->db->select('*');
		$this->db->from('est_reg');
		$this->db->where('est_reg.status', 2);
		$this->db->join('ro_reg','est_reg.est_id=ro_reg.est_id','inner');
		$this->db->order_by("est_reg.est_id", "desc");
		return $this->db->get();
	//	$r=$this->db->get();
		//echo $this->db->last_query();
		//print_r($r->result());
		//exit();
	}

	function getDataByInwardId($id){
		$this->db->select('ro_id');
		$this->db->from('inward_invoice');
		$this->db->where('inward_id',$id);
		// return $this->db->row();
		return $this->db->get();
		// $r=$this->db->get();
	//	$this->db->get();
	//	 echo $this->db->last_query();
	//return $r->result();
		// print_r($r->result()[0]);
		// exit();


	}

	function inward_getData($id){
		$this->db->select('invo_reg_lineid');
		$this->db->from('invo_reg_line');
		$this->db->where('inward_id',$id);
		// return $this->db->row();
		return $this->db->get();
	//$this->db->get();
	//echo $this->db->last_query();
	//	die();
	}

	function getRoPackage($id){
	//	print_r($id);
	//	die();
		$this->db->select('package');
		$this->db->from('ro_reg');
		$this->db->where('ro_id',$id);
		return $this->db->get();
		// $this->db->get();
		// echo $this->db->last_query();
	//	 die();
	}

	function getinward_logo($id)
	{
		$this->db->select('I.logo_id,l.*,a.*');
		$this->db->from('inward_invoice I');
		$this->db->join('adman_logo l', 'I.logo_id = l.logo_id');
		$this->db->join('adman_company_address a', 'l.logo_id = a.logo_id');
		$this->db->where('I.inward_id',$id);
		return $this->db->get();
		// $ro = $this->db->get();
		//$res = $ro->result();
		//return $res; 
		/* $this->db->get();
		echo $this->db->last_query();
		 die(); */

	}
}
