<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subsidi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $query = "SELECT petani.*, petani.id_petani AS id_tani, subsidi_pupuk.*
            FROM petani
            LEFT JOIN subsidi_pupuk ON subsidi_pupuk.id_petani = petani.id_petani";
        $data['subsidi_pupuk'] = $this->db->query($query)->result();
        // $this->db->select('*');
        // $this->db->from('subsidi_pupuk');
        // $this->db->join('petani', 'subsidi_pupuk.id_petani = petani.id_petani', 'right');
        // $this->db->where('subsidi_pupuk.id_petani IS NUlL');
        // $data['petani_tersubsidi'] = $this->db->get()->num_rows() == 0;

        $data['role'] = $this->session->userdata('role');
        $data['title'] = 'Subsidi Pupuk';

        $this->load->view('subsidi/index', $data);
    }

    public function create()
    {
        $data = array(
            'id_petani' =>  $this->input->post('id_petani'),
            'jenis_pupuk_1' =>  $this->input->post('jenis_pupuk_1'),
            'jenis_pupuk_2' =>  $this->input->post('jenis_pupuk_2'),
            'jenis_pupuk_3' =>  $this->input->post('jenis_pupuk_3'),
            'tanggal' =>  $this->input->post('tanggal'),
        );


        $result = $this->db->insert('subsidi_pupuk', $data);
        if ($result) {
            set_alert('Data Subsidi Pupuk Berhasil di Tambahkan.', 'success');
        } else {
            set_alert('Data Subsidi Pupuk Gagal di Tambahkan.', 'danger');
        }

        redirect('subsidi');
    }

    public function edit()
    {
        $id_petani =  $this->input->post('id_petani');
        $data = array(
            'jenis_pupuk_1' =>  $this->input->post('jenis_pupuk_1'),
            'jenis_pupuk_2' =>  $this->input->post('jenis_pupuk_2'),
            'jenis_pupuk_3' =>  $this->input->post('jenis_pupuk_3'),
            'tanggal' =>  $this->input->post('tanggal'),
        );

        $this->db->where('id_petani', $id_petani);
        $result = $this->db->update('subsidi_pupuk', $data);

        if ($result) {
            set_alert('Data Subsidi Berhasil di Update.', 'success');
        } else {
            set_alert('Data Subsidi Gagal di Update.', 'danger');
        }
        redirect('subsidi');
    }

    public function delete($id_subsidi)
    {
        $this->db->where('id_subsidi', $id_subsidi);
        $result = $this->db->delete('subsidi_pupuk');

        if ($result) {
            set_alert('Data Subsidi Berhasil di Hapus.', 'success');
        } else {
            set_alert('Data Subsidi Gagal di Hapus.', 'danger');
        }
        redirect('subsidi');
    }

    public function reject()
    {
        $id_subsidi =  $this->input->post('id_subsidi');
        $role =  $this->input->post('role');
        $pesan_penolakan =  $this->input->post('pesan_penolakan');

        if ($role == 'bpp') {
            $data['validasi_bpp'] = 'ditolak';
            $data['penolakan_bpp'] = $pesan_penolakan;
        }

        if ($role == 'desa') {
            $data['validasi_desa'] = 'ditolak';
            $data['penolakan_desa'] = $pesan_penolakan;
        }

        $this->db->where('id_subsidi', $id_subsidi);
        $result = $this->db->update('subsidi_pupuk', $data);

        set_alert('Data Subsidi Berhasil di Tolak.', 'success');
        redirect('subsidi');
    }

    public function approve($id_subsidi, $role)
    {
        $data = array();
        if ($role == 'bpp') {
            $data['validasi_bpp'] = 'disetujui';
        } else {
            $data['validasi_desa'] = 'disetujui';
        }

        $this->db->where('id_subsidi', $id_subsidi);
        $result = $this->db->update('subsidi_pupuk', $data);

        if ($result) {
            set_alert('Data Subsidi Berhasil di Validasi.', 'success');
        } else {
            set_alert('Data Subsidi Gagal di Validasi.', 'danger');
        }
        redirect('subsidi');
    }

    public function report()
    {
        $query = "SELECT petani.*, petani.id_petani AS id_tani, subsidi_pupuk.*
            FROM petani
            LEFT JOIN subsidi_pupuk ON subsidi_pupuk.id_petani = petani.id_petani";
        $data['subsidi_pupuk'] = $this->db->query($query)->result();
        $data['title'] = 'Laporan Penyaluran Pupuk Subsidi';
        $html = $this->load->view('subsidi/report', $data);
        // $html = $this->load->view('subsidi/report', $data, true);
        // $this->load->library('pdf');
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->loadHtml($html);
        // $this->pdf->render();
        // $this->pdf->stream("laporan_subsidi_petani.pdf", array("Attachment" => false));
    }
}
