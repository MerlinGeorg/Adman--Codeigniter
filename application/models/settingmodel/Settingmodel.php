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
                  //  $this->db->select('a.*,b.company_name');
                  $this->db->select('a.*,b.*');
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
                 //   $data=$this->db->get();
                    //return $data->row();
                    return $this->db->get();
                    
                   // return $data->result_array();
        }
        public function update_logo($data,$id)
        {
            $this->db->select('*');
            $this->db->from('adman_logo');
            $this->db->where('logo_id', $id);
            $this->db->update('adman_logo', $data);
        }
        public function update_address($data,$id)
        {
            $this->db->select('*');
            $this->db->from('adman_company_address');
            $this->db->where('logo_id', $id);
            $this->db->update('adman_company_address', $data);
        }
    }