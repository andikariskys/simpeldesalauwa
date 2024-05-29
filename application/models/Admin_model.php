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
    public $pernikahan = "pengantar_nikah";
    public $spot = "penghasilan_orang_tua";
    public $profil = "profil";
    public $spkck = "spkck";
    public $user = "user";

    function get_count_dashboard()
    {
        $query = $this->db->query("SELECT 
            (SELECT COUNT(*) FROM " . $this->spot . ") AS spot,
            (SELECT COUNT(*) FROM " . $this->spot . " WHERE Status_penghasilanorangtua = 'Terverifikasi') AS spot_verified,
            (SELECT COUNT(*) FROM " . $this->sktm . ") AS sktm, 
            (SELECT COUNT(*) FROM " . $this->sktm . " WHERE Status_keterangantidakmampu = 'Terverifikasi') AS sktm_verified, 
            (SELECT COUNT(*) FROM " . $this->kelahiran . ") AS kelahiran,
            (SELECT COUNT(*) FROM " . $this->kelahiran . " WHERE Status_keterangankelahiran = 'Terverifikasi') AS kelahiran_verified,
            (SELECT COUNT(*) FROM " . $this->kematian . ") AS kematian,
            (SELECT COUNT(*) FROM " . $this->kematian . " WHERE Status_keterangankematian = 'Terverifikasi') AS kematian_verified,
            (SELECT COUNT(*) FROM " . $this->pernikahan . ") AS nikah,
            (SELECT COUNT(*) FROM " . $this->pernikahan . " WHERE Status_pengantarnikah = 'Terverifikasi') AS nikah_verified,
            (SELECT COUNT(*) FROM " . $this->spkck . ") AS spkck,
            (SELECT COUNT(*) FROM " . $this->spkck . " WHERE Status_pengantarskck = 'Terverifikasi') AS spkck_verified
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

    function save_parent_income($data_parent_income)
    {
        $this->db->insert($this->spot, $data_parent_income);
    }

    function update_parent_income($data_parent_income, $id_parent_income)
    {
        $this->db->where('id_penghasilan', $id_parent_income);
        $this->db->update($this->spot, $data_parent_income);
    }

    function delete_parent_income($id_parent_income)
    {
        $this->db->where('id_penghasilan', $id_parent_income);
        $this->db->delete($this->spot);
    }

    function get_financial_hardships($id_financial_hardship = null)
    {
        if ($id_financial_hardship != null) {
            $this->db->where('id_keterangantidakmampu', $id_financial_hardship);
            return $this->db->get($this->sktm)->row();
        } else {
            return $this->db->get($this->sktm)->result();
        }
    }

    function save_financial_hardship($data_financial_hardship)
    {
        $this->db->insert($this->sktm, $data_financial_hardship);
    }

    function update_financial_hardship($data_financial_hardship, $id_financial_hardship)
    {
        $this->db->where('id_keterangantidakmampu', $id_financial_hardship);
        $this->db->update($this->sktm, $data_financial_hardship);
    }

    function delete_financial_hardship($id_financial_hardship)
    {
        $this->db->where('id_keterangantidakmampu', $id_financial_hardship);
        $this->db->delete($this->sktm);
    }

    function get_death_certificates($id_death_certificate = null)
    {
        if ($id_death_certificate != null) {
            $this->db->where('id_keterangankematian', $id_death_certificate);
            return $this->db->get($this->kematian)->row();
        } else {
            return $this->db->get($this->kematian)->result();
        }
    }

    function save_death_certificate($data_death_certificate)
    {
        $this->db->insert($this->kematian, $data_death_certificate);
    }

    function update_death_certificate($data_death_certificate, $id_death_certificate)
    {
        $this->db->where('id_keterangankematian', $id_death_certificate);
        $this->db->update($this->kematian, $data_death_certificate);
    }

    function delete_death_certificate($id_death_certificate)
    {
        $this->db->where('id_keterangankematian', $id_death_certificate);
        $this->db->delete($this->kematian);
    }

    function get_birth_announcements($id_birth_announcement = null)
    {
        if ($id_birth_announcement != null) {
            $this->db->where('id_keterangankelahiran', $id_birth_announcement);
            return $this->db->get($this->kelahiran)->row();
        } else {
            return $this->db->get($this->kelahiran)->result();
        }
    }

    function save_birth_announcement($data_birth_announcement)
    {
        $this->db->insert($this->kelahiran, $data_birth_announcement);
    }

    function update_birth_announcement($data_birth_announcement, $id_birth_announcement)
    {
        $this->db->where('id_keterangankelahiran', $id_birth_announcement);
        $this->db->update($this->kelahiran, $data_birth_announcement);
    }

    function delete_birth_announcement($id_birth_announcement)
    {
        $this->db->where('id_keterangankelahiran', $id_birth_announcement);
        $this->db->delete($this->kelahiran);
    }

    function get_marriage_recommendations($id_marriage_recommendation = null)
    {
        if ($id_marriage_recommendation != null) {
            $this->db->where('id_pengantarnikah', $id_marriage_recommendation);
            return $this->db->get($this->pernikahan)->row();
        } else {
            return $this->db->get($this->pernikahan)->result();
        }
    }

    function save_marriage_recommendation($data_marriage_recommendation)
    {
        $this->db->insert($this->pernikahan, $data_marriage_recommendation);
    }

    function update_marriage_recommendation($data_marriage_recommendation, $id_marriage_recommendation)
    {
        $this->db->where('id_pengantarnikah', $id_marriage_recommendation);
        $this->db->update($this->pernikahan, $data_marriage_recommendation);
    }

    function delete_marriage_recommendation($id_marriage_recommendation)
    {
        $this->db->where('id_pengantarnikah', $id_marriage_recommendation);
        $this->db->delete($this->pernikahan);
    }

    function get_police_reports($id_police_report = null)
    {
        if ($id_police_report != null) {
            $this->db->where('id_pengantarskck', $id_police_report);
            return $this->db->get($this->spkck)->row();
        } else {
            return $this->db->get($this->spkck)->result();
        }
    }

    function save_police_report($data_police_report)
    {
        $this->db->insert($this->spkck, $data_police_report);
    }

    function update_police_report($data_police_report, $id_police_report)
    {
        $this->db->where('id_pengantarskck', $id_police_report);
        $this->db->update($this->spkck, $data_police_report);
    }

    function delete_police_report($id_police_report)
    {
        $this->db->where('id_pengantarskck', $id_police_report);
        $this->db->delete($this->spkck);
    }

    function get_galleries($id_gallery = null)
    {
        if ($id_gallery != null) {
            $this->db->where('id_galeri', $id_gallery);
            return $this->db->get($this->galeri)->row();
        } else {
            return $this->db->get($this->galeri)->result();
        }
    }

    function save_gallery($data_gallery)
    {
        $this->db->insert($this->galeri, $data_gallery);
    }

    function delete_gallery($id_gallery)
    {
        $this->db->where('id_galeri', $id_gallery);
        $this->db->delete($this->galeri);
    }

    function update_gallery($data_gallery, $id_gallery)
    {
        $this->db->where('id_galeri', $id_gallery);
        $this->db->update($this->galeri, $data_gallery);
    }

    function get_contacts($id_contact = null)
    {
        if ($id_contact != null) {
            $this->db->where('id_kontak', $id_contact);
            return $this->db->get($this->kontak)->row();
        } else {
            return $this->db->get($this->kontak)->result();
        }
    }

    function save_contact($data_contact)
    {
        $this->db->insert($this->kontak, $data_contact);
    }

    function delete_contact($id_contact)
    {
        $this->db->where('id_kontak', $id_contact);
        $this->db->delete($this->kontak);
    }

    function update_contact($data_contact, $id_contact)
    {
        $this->db->where('id_kontak', $id_contact);
        $this->db->update($this->kontak, $data_contact);
    }

    function get_users($id_user = null)
    {
        if ($id_user != null) {
            $this->db->where('id_user', $id_user);
            return $this->db->get($this->user)->row();
        } else {
            return $this->db->get($this->user)->result();
        }
    }

    function save_user($data_user)
    {
        $this->db->insert($this->user, $data_user);
    }

    function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete($this->user);
    }

    function update_user($data_user, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update($this->user, $data_user);
    }
}
