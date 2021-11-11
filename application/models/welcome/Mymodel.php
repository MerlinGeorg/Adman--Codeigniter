<?php
class Mymodel extends CI_Model 									
{	
    public function login($data) {
                    
        $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();  
        $this->db->limit(1);
        if ($query) 
        {
            return $query->result();
        } else 
        {
            return false;
        }
    }

    public function get_campaign_total() {

        $this->db->select('COUNT(*) AS camp_count_total');
        $this->db->from('est_reg');
        $query = $this->db->get();

        return $query->row_array(); 
    }

    public function get_campaign_active() {

        $this->db->select('COUNT(*) AS camp_count_active');
        $this->db->from('est_reg');
		$this->db->where('status', 1);
        $query = $this->db->get();

        return $query->row_array(); 
    }

    public function get_ro_total() {

        $this->db->select('COUNT(*) AS ro_count_total');
        $this->db->from('ro_reg');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_ro_active() {

        $this->db->select('COUNT(*) AS ro_count_active');
        $this->db->from('ro_reg');
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_advertiser_total() {

        $this->db->select('COUNT(*) AS advertiser_count_total');
        $this->db->from('adv_reg');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_asp_total() {

        $this->db->select('COUNT(*) AS asp_count_total');
        $this->db->from('asp');
        $query = $this->db->get();
        
        return $query->row_array();

    }
}	
?>