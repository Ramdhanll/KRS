<?php

class auth_model
{
    private $db;
    private $db2;
    private $db3;

    public function __construct()
    {
        $this->db = new database;
        $this->db2 = new database;
        $this->db3 = new database;
    }

    public function getAllMahasiswa()
    {
        $this->db2->query('SELECT * FROM mahasiswa');
        return $this->db2->resultSet();
    }

    public function authDataMahasiswa($data)
    {
        $user = $data['username'];
        $this->db->query("SELECT * FROM mahasiswa WHERE nim=" . $user);

        return $this->db->single();
    }
}
