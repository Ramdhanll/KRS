<?php
class khs_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllNilaiBySMT($id)
    {
        $nim = $_SESSION['username'];
        $this->db->query("SELECT * FROM khs_new
        INNER JOIN mata_kuliah ON khs_new.kode_mk = mata_kuliah.kode_mk
        WHERE khs_new.semester = $id AND khs_new.nim = $nim ");
        return $this->db->resultSet();
    }
    public function getAllNilaiByADMIN($id)
    {

        $this->db->query("SELECT * FROM khs_new
        INNER JOIN mata_kuliah ON khs_new.kode_mk = mata_kuliah.kode_mk
        WHERE khs_new.nim = $id ");
        return $this->db->resultSet();
    }

    public function getAllNilaiByADM($cek)
    {
        $nim = $cek['nim'];
        $semester = $cek['semester'];
        $this->db->query("SELECT * FROM khs_new WHERE nim = $nim AND semester = $semester");
        return $this->db->resultSet();
    }
}
