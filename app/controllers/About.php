<?php

class About extends Controller {
    public function index()
    {
        $data['judul'] = 'About';
        $this->view('templates/head', $data);
        $this->view('about/index');
        $this->view('templates/foot');
    }
    public function sapaan($nama = 0, $waktu = 0)
    {
        $data['judul'] = 'HALLO';
        $this->view('templates/head', $data);
        $data['nama'] = $nama;
        $data['waktu'] = $waktu;
        $this->view('about/sapaan', $data);
        $this->view('templates/foot');
    }
}