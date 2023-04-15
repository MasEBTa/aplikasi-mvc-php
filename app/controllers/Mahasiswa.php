<?php

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/head', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/foot');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/head', $data);
        $this->view('mahasiswa/detil', $data);
        $this->view('templates/foot');
    }

    public function tambah()
    {
        if ( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST)>0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('LOCATION: '.BASEURL.'/mahasiswa'); // arahkan ke halaman Baseurl/mahasiswa
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('LOCATION: '.BASEURL.'/mahasiswa'); // arahkan ke halaman Baseurl/mahasiswa
            exit;
        }
    }
    public function hapus($idMahasiswa)
    {
        if ( $this->model('Mahasiswa_model')->hapusDataMahasiswa($idMahasiswa)>0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('LOCATION: '.BASEURL.'/mahasiswa'); // arahkan ke halaman Baseurl/mahasiswa
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('LOCATION: '.BASEURL.'/mahasiswa'); // arahkan ke halaman Baseurl/mahasiswa
            exit;
        }
    }
    
    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id'])); // karena json maka bisa di echo dan akan muncul di console
    }
    
    public function ubah()
    {
        if ( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST)>0 ) {
            Flasher::setFlash('berhasil', 'dirubah', 'warning');
            header('LOCATION: '.BASEURL.'/mahasiswa'); // arahkan ke halaman Baseurl/mahasiswa
            exit;
        } else {
            Flasher::setFlash('gagal', 'dirubah', 'danger');
            header('LOCATION: '.BASEURL.'/mahasiswa'); // arahkan ke halaman Baseurl/mahasiswa
            exit;
        }
    }
}