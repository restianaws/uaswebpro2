<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_m', 'mbuku');
        $this->load->model('auth_model');

        if(!$this->auth_model->current_user()){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['konten'] = "buku/daftarbuku";
        $data['judul'] = "Daftar Buku";

        $data['daftar_buku'] = $this->mbuku->daftar_buku();
        $data['test'] = "test";
        $this->load->view('layout/master', $data);
    }

    public function Lihat($kode_buku)
    {

        $data['konten'] = "buku/lihat";
        $data['buku'] = $this->mbuku->lihat($kode_buku);
        $this->load->view('layout/master', $data);
    }


    public function Tambah()
    {
        $data['konten'] = "buku/tambah"; //ini akan ada di view
        $data['judul'] = "Tambah Buku";
        $data['kategori'] = $this->db->query("SELECT * FROM tkategori")->result();
        $this->load->view('layout/master', $data);
    }

    public function Simpan()
    {
        //Upload gambar
        $upload = $this->do_upload();
        if ($upload['error']) {
            $this->session->set_flashdata('flash', 'Gagal' . $upload['error']);
            redirect('buku');
        }


        //Ambil Kategori
        $kategori = $this->input->post('kategori');
        $kode_kategori = $this->db->query("SELECT kode_kategori from tkategori where id_kategori=$kategori")->row();
        $kode_kat       = $kode_kategori->kode_kategori;
        $kode = $this->db->query("SELECT MAX(substring(kode_buku, -4))+1 AS kode FROM `tbuku` WHERE kode_buku LIKE '$kode_kat%'
        ")->row();
        $kode_buku = $kode_kategori->kode_kategori . '-' . sprintf("%04d", $kode->kode);;
        $judul = $this->input->post('judul_buku');
        $sampul = $this->input->post('cover_buku');

        //array untuk menampung data yang akan disimpan
        $data = array(
            'kode_buku' => $kode_buku,
            'judul_buku' => $judul,
            'kategori_buku' => $kategori,
            'cover_buku' => $upload['file_name']
        );
        $simpan = $this->db->insert('tbuku', $data);

        if ($simpan) {
            $this->session->set_flashdata('flash', 'Tersimpan');
            redirect(base_url('buku'));
        } else {
            $this->session->set_flashdata('flashGagal', 'Gagal Tersimpan');
            redirect(base_url('buku'));
        };
    }

    public function Edit($kode)
    {
        $data['konten'] = "buku/edit";  //Ini akan ditampilkan di halaman
        $judul['judul'] = "Edit Daftar Buku";
        //Ambil data kategori dari database
        $data['kategori'] = $this->db->query("SELECT * FROM tkategori")->result();
        //Pengambilan data dari db
        $this->db->select('*');
        $this->db->from('tbuku');
        $this->db->where('kode_buku', $kode);
        $buku = $this->db->get()->row();
        $data['buku'] = $buku;
        $this->load->view('layout/master', $data);
    }

    public function Simpan_edit()
    {
        $kode_buku = $this->input->post('kode_buku');
        $judul     = $this->input->post('judul_buku');
        $kategori = $this->input->post('kategori');


        if ($_FILES['sampul']['name']) {
            $upload = $this->do_upload();
            if ($upload['error']) {
                $this->session->set_flashdata('flash', 'Gagal' . $upload['error']);
                redirect('buku');
            }
            $data = array(
                'judul_buku' => $judul,
                'kategori_buku' => $kategori,
                'cover_buku' => $upload['file_name']
            );
        } else {
            $data = array(
                'judul_buku' => $judul,
                'kategori_buku' => $kategori,
            );
        }

        $this->db->where('kode_buku', $kode_buku);
        $update = $this->db->update('tbuku', $data);

        if ($update) {
            $this->session->set_flashdata('flashUpdate', 'Terupdate');
            redirect(base_url('buku'));
        } else {
            $this->session->set_flashdata('fUpdaateGagal', 'Gagal Terupdate');
            redirect(base_url('buku'));
        };
    }


    public function Hapus($kode)
    {
        $hapus = $this->db->delete('tbuku', array('kode_buku' => $kode));

        if ($hapus) {
            $this->session->set_flashdata('flashHapus', 'Terhapus');
            redirect('buku');
        } else {
            $this->session->set_flashdata('fGagalHapus', 'Gagal Terhapus');
            redirect('buku');
        };
    }

    public function do_upload()
    {
        $config['upload_path'] = 'upload_img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = date("YmdHis") . $this->input->post('judul_buku');

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('sampul')) {
            $error = $this->upload->display_errors();
            return $error;
        } else {
            $data = $this->upload->data();
            return $data;
        }
    }
}
