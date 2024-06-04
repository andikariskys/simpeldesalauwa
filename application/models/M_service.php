<?php

class M_service extends CI_Model
{
    public $table = 'user';

    // init all table into variable
    public $galeri = "galeri";
    public $informasi = "informasi";
    public $kelahiran = "keterangan_kelahiran";
    public $kematian = "keterangan_kematian";
    public $sktm = "keterangan_tidak_mampu";
    public $kontak = "kontak";
    public $pengaduan = "pengaduan";
    public $pernikahan = "pengantar_nikah";
    public $spot = "penghasilan_orang_tua";
    public $profil = "profil";
    public $spkck = "spkck";

    //login
    function check_user($username, $password)
    {
        $query = $this->db->get_where(
            $this->table,
            array(
                'Username' => $username,
                'Password' => $password,

            )
        );
        return $query;
    }

    function check_username($username)
    {
        $query = $this->db->get_where(
            $this->table,
            array(
                'Username' => $username,

            )
        );
        return $query;
    }

    //search
    function search_user($username)
    {
        $query = $this->db->get_where(
            $this->table,
            array(
                'Username' => $username,
            )
        );
        return $query;
    }

    function get_parent_incomes($user_id)
    {
        $this->db->where('created_id', $user_id);
        return $this->db->get($this->spot)->result();
    }

    function get_financial_hardships($user_id)
    {
        $this->db->where('created_id', $user_id);
        return $this->db->get($this->sktm)->result();
    }
    function get_birth_certificate($user_id)
    {
        $this->db->where('created_id', $user_id);
        return $this->db->get($this->kelahiran)->result();
    }

    function get_death_certificate($user_id)
    {
        $this->db->where('created_id', $user_id);
        return $this->db->get($this->kematian)->result();
    }

    function get_marriage_letter($user_id)
    {
        $this->db->where('created_id', $user_id);
        return $this->db->get($this->pernikahan)->result();
    }
    function get_police_record_letter($user_id)
    {
        $this->db->where('created_id', $user_id);
        return $this->db->get($this->spkck)->result();
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
