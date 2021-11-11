<?php
class Advertisermodel extends CI_Model 									
{
	
public function login($data) {
				
$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$this->db->limit(1);
if ($query->num_rows() == 1) 
{
 return $query->result();
} else 
{
return false;
}
}
function getcat()
	
												{
													$this->db->select('*');
													$this->db->from('adv_cat');
													$query = $this->db->get();
													return $query;
												}	
function getstate()
	
												{
													$this->db->select('*');
													$this->db->from('state');
													$query = $this->db->get();
													return $query;
												}	
function insert_adv_data($table, $data)
	
												{
													$this->db->insert($table, $data);	
												}
	function getadvlist()
	
												{
													$this->db->select('*');
													$this->db->from('adv_reg');
													$this->db->order_by("adv_name", "asc");
													$query = $this->db->get();
													return $query;
												}	
function getdata_id($table, $id)
	
												{
													$this->db->select('*');
													$this->db->from($table);
													$this->db->where('adv_id', $id);
													$query = $this->db->get();
													return $query;
												}	
function update_id($table, $id, $data)
	
												{
													$this->db->select('*');
													$this->db->from($table);
													$this->db->where('adv_id', $id);
													$this->db->update($table, $data);
													
												}
																																																
}	
?>

