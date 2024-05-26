<?php

class M_profile extends CI_Model
{
    public $table = 'profil';

    //crud
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->limit(1);
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function getbyid($id)
    {
        $this->db->where('id_profil', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_profil', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id, $data)
    {
        $this->db->where('id_profil', $id);
        $this->db->update($this->table, $data);
    }
}
