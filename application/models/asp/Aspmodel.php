<?php
class Aspmodel extends CI_Model 									
{
	
function insert_asp_data($table, $data)
	
												{
													$this->db->insert($table, $data);	
												}
												
function asp_list_profile()
	
												{
													$this->db->select('*');
													$this->db->from('asp');
													$this->db->order_by("cr_date", "desc");
													$query = $this->db->get();
													return $query;
												}
												
function getdata_id($table, $id)
	
												{
													$this->db->select('*');
													$this->db->from($table);
													$this->db->where('asp_id', $id);
													$query = $this->db->get();
													return $query;
												}
function update_id($table, $id, $data)
	
												{
													$this->db->select('*');
													$this->db->from($table);
													$this->db->where('asp_id', $id);
													$this->db->update($table, $data);
													
												}

}
