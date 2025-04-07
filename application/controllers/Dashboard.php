<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['total_petani'] = $this->db->get('petani')->num_rows();
        $data['total_subsidi'] = $this->db->get('subsidi_pupuk')->num_rows();
        $data['title'] = 'Dashboard';
        $this->load->view('dashboard/index', $data);
    }
}
