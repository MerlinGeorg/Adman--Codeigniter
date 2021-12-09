<?php
class Screenmodel extends CI_Model 									
{
	
function insert_screen_data($table, $data)
	
												{
													$this->db->insert($table, $data);	
												}
												
function screen_list_profile()
	
												{
													$this->db->select('*');
													$this->db->from('screen');
													$this->db->join('asp', 'screen.asp = asp.asp_id','inner');
													$this->db->order_by("sc_name", "asc");
													$query = $this->db->get();
													return $query;
												}
												
function getdata_id($table, $id)
	
												{
													$this->db->select('*');
													$this->db->from($table);
													$this->db->where('sc_id', $id);
													$query = $this->db->get();
													return $query;
												}
function update_screen_data($table, $id, $data)
	
												{
													$this->db->select('*');
													$this->db->from($table);
													$this->db->where('sc_id', $id);
													$this->db->update($table, $data);
													
												}
function getstate()
	
												{
													$this->db->select('*');
													$this->db->from('state');
													$query = $this->db->get();
													return $query;
												}												
function getasp()
	
												{
													$this->db->select('*');
													$this->db->from('asp');
													$this->db->where('status', 1);
													$query = $this->db->get();
													return $query;
												}	
function getscreen()
	
												{
													$this->db->select('*');
													$this->db->from('screen');
													$this->db->where('status', 1);
													$query = $this->db->get();
													return $query;
												}											

}	

?>

