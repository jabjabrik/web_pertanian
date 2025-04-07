<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['total_petani'] = $this->db->get('petani')->num_rows();
        $data['total_subsidi'] = $this->db->get('subsidi_pupuk')->num_rows();
        $data['title'] = 'Informasi';
        $this->load->view('informasi/infor', $data);
        // $this->load->view('informasi/index', $data);
    }

    public function find($nik)
    {
        $is_exist_nik = $this->db->get_where('petani', array('nik' => $nik))->num_rows() > 0;

        $response;
        if ($is_exist_nik) {
            $query = "SELECT subsidi_pupuk.id_subsidi
                FROM subsidi_pupuk
                LEFT JOIN petani ON subsidi_pupuk.id_petani = petani.id_petani
                WHERE petani.nik = '$nik'";
            $result = $this->db->query($query)->row();

            if ($result) {
                $response = ['message' => 'Selamat!!. Anda mendapat subsidi pupuk'];
            } else {
                $response = ['message' => "Anda Belum mendapatkan subsidi pupuk"];
            }
        } else {
            $response = ['message' => 'NIK Tidak Ditemukan'];
        }

        echo json_encode($response);
    }
}
