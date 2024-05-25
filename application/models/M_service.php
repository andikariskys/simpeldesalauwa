<?php

class M_service extends CI_Model
{
    public $table = 'user';

    //login
    function check_user($username, $password)
    {
        $query = $this->db->get_where($this->table, array(
            'Username' => $username,
            'Password' => $password,

        ));
        return $query;
    }

    //search
    function search_user($username)
    {
        $query = $this->db->get_where($this->table, array(
            'Username' => $username,
        ));
        return $query;
    }

    //user crud
    public function get_data()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function getbyid($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update($this->table, $data);
    }
}
