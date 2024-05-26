<?php
defined('BASEPATH') or exit('No direct script access allowed');

final class Admin_model extends CI_Model
{
    // init all table into variable
    public $galeri = "galeri";
    public $informasi = "informasi";
    public $kelahiran = "keterangan_kelahiran";
    public $kematian = "keterangan_kematian";
    public $sktm = "keterangan_tidak_mampu";
    public $kontak = "kontak";
    public $pengaduan = "pengaduan";
    public $nikah = "pengantar_nikah";
    public $spot = "penghasilan_orang_tua";
    public $profil = "profil";
    public $spkck = "spkck";
    public $user = "user";

    function get_count_dashboard()
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM " . $this->spot . ") AS spot,
            (SELECT COUNT(*) FROM " . $this->sktm . ") AS sktm, 
            (SELECT COUNT(*) FROM " . $this->kelahiran . ") AS kelahiran,
            (SELECT COUNT(*) FROM " . $this->kematian . ") AS kematian,
            (SELECT COUNT(*) FROM " . $this->nikah . ") AS nikah,
            (SELECT COUNT(*) FROM " . $this->spkck . ") AS spkck
        ");
        return $query->result_array();
    }

    function get_profiles($id_profile = null)
    {
        if ($id_profile != null) {
            $this->db->where('id_profil', $id_profile);
            return $this->db->get($this->profil)->row();
        } else {
            return $this->db->get($this->profil)->result();
        }
    }

    function save_profile($data_profile)
    {
        $this->db->insert($this->profil, $data_profile);
    }
    
    function delete_profile($id_profile)
    {
        $this->db->where('id_profil', $id_profile);
        $this->db->delete($this->profil);
    }
    
    function update_profile($data_profile, $id_profile)
    {
        $this->db->where('id_profil', $id_profile);
        $this->db->update($this->profil, $data_profile);
    }
    
    function get_informations($id_information = null)
    {
        if ($id_information != null) {
            $this->db->where('id_informasi', $id_information);
            return $this->db->get($this->informasi)->row();
        } else {
            return $this->db->get($this->informasi)->result();
        }
    }
    
    function save_information($data_information)
    {
        $this->db->insert($this->informasi, $data_information);
    }
    
    function delete_information($id_information)
    {
        $this->db->where('id_informasi', $id_information);
        $this->db->delete($this->informasi);
    }
    
    function update_information($data_information, $id_information)
    {
        $this->db->where('id_informasi', $id_information);
        $this->db->update($this->informasi, $data_information);
    }

    function get_parent_incomes($id_parent_income = null)
    {
        if ($id_parent_income != null) {
            $this->db->where('id_penghasilan', $id_parent_income);
            return $this->db->get($this->spot)->row();
        } else {
            return $this->db->get($this->spot)->result();
        }
    }
}
