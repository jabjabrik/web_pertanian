<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style;

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

    public function import()
    {
        $file_tmp = $_FILES['import_file']['tmp_name'];
        $spreadsheet = IOFactory::load($file_tmp);
        $data = [];

        foreach ($spreadsheet->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();

            for ($row = 4; $row <= $highestRow; $row++) {
                $nama = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $nik = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                $alamat = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                $luas_tanah = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                $jenis_tanaman_1 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                $jenis_tanaman_2 = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                $jenis_tanaman_3 = $worksheet->getCellByColumnAndRow(26, $row)->getValue();

                $data[] = [
                    'nama' => $nama,
                    'nik' => str_replace("`", '', $nik),
                    'alamat' => $alamat,
                    'luas_tanah' => $luas_tanah,
                    'jenis_tanaman_1' => $jenis_tanaman_1,
                    'jenis_tanaman_2' => $jenis_tanaman_2,
                    'jenis_tanaman_3' => $jenis_tanaman_3,
                ];
            }
        }


        $this->db->insert_batch('petani', $data);

        set_alert('Data Petani Berhasil di Import.', 'success');
        redirect("petani");
    }

    public function create()
    {
        $nik =  $this->input->post('nik');
        $data = array(
            'nik' =>  $nik,
            'nama' =>  $this->input->post('nama'),
            'alamat' =>  $this->input->post('alamat'),
            'luas_tanah' =>  $this->input->post('luas_tanah'),
            'jenis_tanaman_1' =>  $this->input->post('jenis_tanaman_1'),
            'jenis_tanaman_2' =>  $this->input->post('jenis_tanaman_2'),
            'jenis_tanaman_3' =>  $this->input->post('jenis_tanaman_3'),
        );

        $this->load->helper('pertanian');

        if ($_FILES['foto_sppt']['name']) {
            $data['foto_sppt'] = upload_file('foto_sppt');
        }

        $result = $this->db->insert('petani', $data);
        if ($result) {
            set_alert('Data Petani Berhasil di Tambahkan.', 'success');
        } else {
            set_alert('Data Petani Gagal di Tambahkan.', 'danger');
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
            'luas_tanah' =>  $this->input->post('luas_tanah'),
            'jenis_tanaman_1' =>  $this->input->post('jenis_tanaman_1'),
            'jenis_tanaman_2' =>  $this->input->post('jenis_tanaman_2'),
            'jenis_tanaman_3' =>  $this->input->post('jenis_tanaman_3'),
        );

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
