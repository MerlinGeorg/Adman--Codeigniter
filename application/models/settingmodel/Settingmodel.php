<?php
class Settingmodel extends CI_Model 									
{
        public function save_data($data,$table)
        {
                $data=$this->db->insert($table,$data);
                return $this->db->insert_id();
        }
        // public function save_address($data,$table)
        // {

        //         $data=$this->db->insert($table,$data);
        //         return $this->db->insert_id();
        // }


    public function list_logo()
        {
                    $this->db->select('a.*,b.company_name');
                    $this->db->from('adman_logo as a');
                    $this->db->join('adman_company_address as b','b.logo_id=a.logo_id');
                    $data=$this->db->get();
                    
                    return $data;
        } 
    public function get_data($id)
        {
                    $this->db->select('a.*,b.*');
                    $this->db->from('adman_logo as a');
                    $this->db->join('adman_company_address as b','b.logo_id=a.logo_id');
                    $this->db->where('a.logo_id',$id);
                    $data=$this->db->get();
                    return $data->row();
                    
                   // return $data->result_array();
        }
    }