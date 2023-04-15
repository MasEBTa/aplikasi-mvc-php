<?php

class Mahasiswa_model {
    private $tabel = "mahasiswa";
    private $db;

    public function __construct()
    {
        $this->db = new Database;;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->tabel);
        return $this->db->resultSet(); // tampilkan semua datanya
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM '.$this->tabel.' WHERE id=:id'); // :id untuk pemgamanan binding == $id
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO ".$this->tabel." VALUES ('', :nama, :nrp, :email, :jurusan, '')";

        // jalankan query
        $this->db->query($query);

        // binding
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        // eksekusi
        $this->db->execute();

        // feedback
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($theid)
    {   
        // query
        $query = "DELETE FROM ".$this->tabel." WHERE id = :id";

        // jalankan query
        $this->db->query($query);

        // binding data
        $this->db->bind('id', $theid);

        // eksekusi
        $this->db->execute();

        // database efek
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                  WHERE id = :id";
                
        var_dump($query);

        // jalankan query
        $this->db->query($query);

        // binding
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        // eksekusi
        $this->db->execute();

        // feedback
        return $this->db->rowCount();
    }
}