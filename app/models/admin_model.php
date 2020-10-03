<?php
class admin_model
{
    private $db;
    private $table = 'mahasiswa';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahDataMahasiswa($data)
    {
        $query  = "INSERT INTO mahasiswa VALUES
        (:nim, :nama,:jenis_kelamin, :fakultas, :prodi,:kelas, :angkatan, :email, :no_telepon, :alamat)";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahNilaiMahasiswa($data)
    {
        for ($i = 1; $i <= $data['total']; $i++) {
            $semester = $data['semester' . $i];
            $nim = $data['nim' . $i];
            $kodemk = $data['kode_mk' . $i];
            $nilai = $data['nilai' . $i];
            $am = $data['am' . $i];
            $query = " INSERT INTO khs_new VALUES 
        (:semester, :nim, :kode_mk, :nilai, :am)";

            $this->db->query($query);
            $this->db->bind('semester', $semester);
            $this->db->bind('nim', $nim);
            $this->db->bind('kode_mk', $kodemk);
            $this->db->bind('nilai', $nilai);
            $this->db->bind('am', $am);

            $this->db->execute();
        }
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($nim)
    {

        $query = "DELETE FROM mahasiswa WHERE nim = :nim";

        $this->db->query($query);
        $this->db->bind("nim", $nim);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function ubahDataMahasiswa($data)
    {

        $query = "UPDATE mahasiswa SET
        nim = :nim,
        nama = :nama,
        jenis_kelamin = :jk,
        fakultas = :fakultas,
        prodi = :prodi,
        kelas = :kelas,
        angkatan = :angkatan,
        email = :email,
        no_telepon =:no_telepon,
        alamat = :alamat
        WHERE nim = :nim";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editNilaiMahasiswa($data)
    {
        for ($i = 1; $i <= $data['total']; $i++) {
            $semester = $data['semester' . $i];
            $nim = $data['nim' . $i];
            $kodemk = $data['kode_mk' . $i];
            $nilai = $data['nilai' . $i];
            $am = $data['am' . $i];
            $query = "UPDATE khs_new 
            SET
            semester = :semester,
            nim = :nim,
            kode_mk = :kode_mk, 
            nilai = :nilai,
            am = :am
            WHERE nim = :nim AND semester = :semester AND kode_mk = :kode_mk";

            $this->db->query($query);
            $this->db->bind('semester', $semester);
            $this->db->bind('nim', $nim);
            $this->db->bind('kode_mk', $kodemk);
            $this->db->bind('nilai', $nilai);
            $this->db->bind('am', $am);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }

    public function getMahasiswaById($nim)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nim=:nim');
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }
}
