<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
    /**
     * You can learn from Codeigniter 3 userguide about active record
     * Reference: https://www.codeigniter.com/userguide3/database/query_builder.html
     */
	public function getindex()
	{
        $this->db->from('user_list');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function createMember($data)
    {
        $this->db->trans_start();
        $this->db->insert('user_list', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
           return false;
        }
        else {
            return true;
        }
    }
    public function getMember($member_id)
    {
        $this->db->select('
            person_id, 
            name, 
            gender,
            address
        ');
        $this->db->from('user_list');
        $this->db->where('person_id', $member_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function updateMember($data, $member_id)
    {
        $this->db->trans_start();
        $this->db->where('person_id', $member_id);
        $this->db->update('user_list', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
           return false;
        }
        else {
            return true;
        }

    }
    public function deleteMember($member_id)
    {
        $this->db->trans_start();
        $this->db->where('person_id', $member_id);
        $this->db->delete('user_list');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
           return false;
        }
        else {
            return true;
        }
    }
}