<?php

class matkul_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkulBySMT($id)
    {
        $this->db->query('SELECT * FROM mata_kuliah
        WHERE semester =' . $id);
        return $this->db->resultSet();
    }
}
