<?php

class Khs extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL);
            exit();
        } else {
            $id = $_SESSION['username'];
            $data['mhs'] = $this->model('profile_model')->getMahasiswaById($id);
            $data['link'] = null;
            $this->view('templates/header', $data);
            $this->view('khs/index', $data);
            $this->view('templates/footer');
        }
    }
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL);
            exit();
        } else {
            $id = $_SESSION['username'];
            $data['mhs'] = $this->model('profile_model')->getMahasiswaById($id);
            $data['link'] = null;
            $this->view('templates/header', $data);
            $this->view('khs/index', $data);
            $this->view('templates/footer');
        }
    }
    

    public function semester1($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester2($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester3($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester4($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester5($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester6($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester7($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
    public function semester8($id)
    {
        $data['matkul'] = $this->model('khs_model')->getAllNilaiBySMT($id);
        return $data['matkul'];
    }
}
