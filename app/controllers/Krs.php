<?php

class Krs extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL);
            exit();
        } else {
            $id = $_SESSION['username'];
            $data['mhs'] = $this->model('profile_model')->getMahasiswaById($id);
            $this->view('templates/header', $data);
            $this->view('krs/index', $data);
            $this->view('templates/footer');
        }
    }
    public function print()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL);
            exit();
        } else {
            $nim = $_SESSION['username'];
            $data['mhs'] = $this->model('profile_model')->getMahasiswaById($nim);
            $data['krs'] = $this->model('krs_model')->getNilaiByKDMK($_POST);
            $this->view('krs/print', $data);
        }
    }

    public function semester1($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester2($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester3($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester4($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester5($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester6($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester7($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }
    public function semester8($id)
    {
        $data['matkul'] = $this->model('matkul_model')->getAllMatkulBySMT($id);
        return $data['matkul'];
    }

    public function dataNilai($cek)
    {
        $data['nilaikhs'] = $this->model('khs_model')->getAllNilaiByADM($cek);
        return $data['nilaikhs'];
    }
}
