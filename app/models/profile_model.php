<?php
class profile_model
{
    private $db;
    private $table = 'mahasiswa';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nim=' . $id);

        return $this->db->single();
    }
}
