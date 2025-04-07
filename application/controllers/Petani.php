<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petani extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['petani'] = $this->db->get('petani')->result();
        $data['title'] = 'Petani';
        $this->load->view('petani/index', $data);
    }

    public function create()
    {
        $nik =  $this->input->post('nik');
        $data = array(
            'nik' =>  $nik,
            'nama' =>  $this->input->post('nama'),
            'alamat' =>  $this->input->post('alamat'),
            'rt' =>  $this->input->post('rt'),
            'rw' =>  $this->input->post('rw'),
            'luas_tanah' =>  $this->input->post('luas_tanah'),
            'jenis_tanaman_1' =>  $this->input->post('jenis_tanaman_1'),
            'jenis_tanaman_2' =>  $this->input->post('jenis_tanaman_2'),
            'jenis_tanaman_3' =>  $this->input->post('jenis_tanaman_3'),
        );

        $is_exist_nik = $this->db->get_where('petani', array('nik' => $nik))->num_rows() > 0;

        if ($is_exist_nik) {
            set_alert("Nilai NIK tidak boleh sama dengan petani lain", 'danger');
        } else {
            $this->load->helper('pertanian');
            $data['foto_sppt'] = upload_file('foto_sppt');

            $result = $this->db->insert('petani', $data);
            if ($result) {
                set_alert('Data Petani Berhasil di Tambahkan.', 'success');
            } else {
                set_alert('Data Petani Gagal di Tambahkan.', 'danger');
            }
        }

        redirect('petani');
    }

    public function edit()
    {
        $id_petani =  $this->input->post('id_petani');
        $nik =  $this->input->post('nik');
        $data = array(
            'nik' =>  $nik,
            'nama' =>  $this->input->post('nama'),
            'alamat' =>  $this->input->post('alamat'),
            'rt' =>  $this->input->post('rt'),
            'rw' =>  $this->input->post('rw'),
            'luas_tanah' =>  $this->input->post('luas_tanah'),
            'jenis_tanaman_1' =>  $this->input->post('jenis_tanaman_1'),
            'jenis_tanaman_2' =>  $this->input->post('jenis_tanaman_2'),
            'jenis_tanaman_3' =>  $this->input->post('jenis_tanaman_3'),
        );

        $is_exist_nik = $this->db->get_where('petani', array('nik' => $nik))->num_rows() > 0;
        $query = $this->db->get_where('petani', array('id_petani' => $id_petani));

        if ($is_exist_nik && $nik != $query->row('nik')) {
            set_alert("Nilai NIK tidak boleh sama dengan petani lain", 'danger');
        } else {
            if ($_FILES['foto_sppt']['name']) {
                $foto_sppt = $this->db->get_where('petani', array('id_petani' => $id_petani))->row('foto_sppt');
                unlink("./uploads/$foto_sppt");
                $data['foto_sppt'] = upload_file('foto_sppt');
            }

            $this->db->where('id_petani', $id_petani);
            $result = $this->db->update('petani', $data);

            if ($result) {
                set_alert('Data Petani Berhasil di Update.', 'success');
            } else {
                set_alert('Data Petani Gagal di Update.', 'danger');
            }
        }

        redirect('petani');
    }


    public function delete($id_petani)
    {
        $foto_sppt = $this->db
            ->get_where('petani', array('id_petani' => $id_petani))
            ->row('foto_sppt');
        unlink("./uploads/$foto_sppt");

        $this->db->where('id_petani', $id_petani);
        $result = $this->db->delete('petani');

        if ($result) {
            set_alert('Data Petani Berhasil di Hapus.', 'success');
        } else {
            set_alert('Data Petani Gagal di Hapus.', 'danger');
        }
        redirect('petani');
    }
}
