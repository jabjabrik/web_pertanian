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
    }

    public function find($nik)
    {
        $is_exist_nik = $this->db->get_where('petani', array('nik' => $nik))->num_rows() > 0;

        if (!$is_exist_nik) {
            $response = ['message' => 'NIK Tidak Ditemukan'];
            echo json_encode($response);
            return;
        }

        $query = "SELECT subsidi_pupuk.*
            FROM subsidi_pupuk
            LEFT JOIN petani ON subsidi_pupuk.id_petani = petani.id_petani
            WHERE petani.nik = '$nik'";
        $result = $this->db->query($query)->row();

        if (is_null($result)) {
            $response = ['message' => "Anda Belum mendapatkan subsidi pupuk"];
            echo json_encode($response);
            return;
        }

        if ($result->validasi_desa == 'ditolak') {
            $response = ['message' => 'Pengajuan ditolak oleh desa : ' . $result->penolakan_desa];
            echo json_encode($response);
            return;
        }

        if ($result->validasi_bpp == 'ditolak') {
            $response = ['message' => 'Pengajuan ditolak oleh bpp : ' . $result->penolakan_bpp];
            echo json_encode($response);
            return;
        }

        $response = ['message' => 'Selamat!!. Anda mendapat subsidi pupuk'];
        echo json_encode($response);
    }
}
