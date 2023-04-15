<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // Koneksi
    private $dbh;
    private $stmt;

    
    public function __construct()
    {
        // data source nama
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

        // option
        $option = [
            PDO::ATTR_PERSISTENT => true, // menjaga agar koneksi selalu terjaga
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // mengatur erormode
        ];

        // cek koneksi
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }

    // query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // binding data
    public function bind($param, $value, $type = null)
    {
        if ( is_null($type) ) {
            switch ( true ) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // eksekusi
    public function execute()
    {
        $this->stmt->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // menghitug perubahan di database
    public function rowCount() // ini punya kita
    {
        return $this->stmt->rowCount(); //ini punya PDO
    }
}