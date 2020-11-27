<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MSudi');
    }

    public function index()
    {
        if ($this->session->userdata('Login')) {
            $data['content'] = 'VBlank';
            $this->load->view('VBackend', $data);
        } else {
            redirect(site_url('Login'));
        }
    }

    public function DataSiswa()
    {



        if ($this->uri->segment(4) == 'view') {
            $nis = $this->uri->segment(3);
            $tampil = $this->MSudi->GetDataWhere('tbl_siswa', 'nis', $nis)->row();
            $data['detail']['nis'] = $tampil->nis;
            $data['detail']['nama'] = $tampil->nama;
            $data['detail']['alamat'] = $tampil->alamat;
            $data['content'] = 'VFormUpdateSiswa';
        } else {
            $data['DataSiswa'] = $this->MSudi->GetData('tbl_siswa');
            $data['content'] = 'VSiswa';
        }


        $this->load->view('VBackend', $data);
    }


    public function VFormAddSiswa()
    {
        $data['content'] = 'VFormAddSiswa';
        $this->load->view('VBackend', $data);
    }
    public function AddDataSiswa()
    {
        $add['nis'] = $this->input->post('nis');
        $add['nama'] = $this->input->post('nama');
        $add['alamat'] = $this->input->post('alamat');
        $this->MSudi->AddData('tbl_siswa', $add);
        redirect(site_url('Welcome/DataSiswa'));
    }



    public function UpdateDataSiswa()
    {
        $nis = $this->input->post('nis');
        $update['nama'] = $this->input->post('nama');
        $update['alamat'] = $this->input->post('alamat');
        $this->MSudi->UpdateData('tbl_siswa', 'nis', $nis, $update);
        redirect(site_url('Welcome/DataSiswa'));
    }


    public function DeleteDataSiswa()
    {
        $nis = $this->uri->segment('3');
        $this->MSudi->DeleteData('tbl_siswa', 'nis', $nis);
        redirect(site_url('Welcome/DataSiswa'));
    }



    public function Logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('Login');
        redirect(site_url('Login'));
    }
}
