<?php
class krs_model
{
    private $db;
    public $tampungNilai;
    public $tampung;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNilaiByKDMK($data)
    {
        for ($i = 0; $i < count($data['checked']); $i++) {
            $kode = $data['checked'][$i];
            $this->db->query("SELECT * FROM mata_kuliah WHERE kode_mk ='" . $kode . "'");
            $a['a'][$i] = $this->db->resultSet();
        }
        return $a;
    }
}
