<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->db->get('user')->result();
        $data['title'] = 'User';
        $this->load->view('user/index', $data);
    }

    public function create()
    {
        $username =  $this->input->post('username');

        $data = array(
            'username' =>  $username,
            'password' =>  $this->input->post('password'),
            'role' =>  $this->input->post('role'),
        );

        $is_exist_username = $this->db->get_where('user', array('username' => $username))->num_rows() > 0;
        if ($is_exist_username) {
            set_alert("Username '$username' telah terpakai, Mohon inputkan username baru.", 'danger');
        } else {
            $result = $this->db->insert('user', $data);
            if ($result) {
                set_alert('Data User Berhasil di Buat.', 'success');
            } else {
                set_alert('Data User Gagal di Buat.', 'danger');
            }
        }
        redirect('user');
    }

    public function edit()
    {
        $id_user = $this->input->post('id_user');
        $username =  $this->input->post('username');

        $data = array(
            'username' =>  $username,
            'password' =>  $this->input->post('password'),
            'role' =>  $this->input->post('role'),
        );

        $is_exist_username = $this->db->get_where('user', array('username' => $username))->num_rows() > 0;
        $query = $this->db->get_where('user', array('id_user' => $id_user));

        if ($is_exist_username && $username != $query->row('username')) {
            set_alert("Username '$username' telah terpakai, Mohon inputkan username baru.", 'danger');
        } else {
            $this->db->where('id_user', $id_user);
            $result = $this->db->update('user', $data);
            if ($result) {
                set_alert('Data User Berhasil di Update.', 'success');
            } else {
                set_alert('Data User Gagal di Update.', 'danger');
            }
        }

        redirect('user');
    }


    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $result = $this->db->delete('user');
        if ($result) {
            set_alert('Data User Berhasil di Hapus.', 'success');
        } else {
            set_alert('Data User Gagal di Hapus.', 'danger');
        }
        redirect('user');
    }
}
