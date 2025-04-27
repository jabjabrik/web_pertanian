<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Silahkan masukan username'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Silahkan masukan password'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'masyarakat') {
                    redirect('/informasi');
                } else {
                    redirect('/dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect('auth');
    }
}
