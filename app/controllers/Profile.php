<?php

class Profile extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header("Location: " . BASEURL);
            exit();
        } else {
            $id = $_SESSION['username'];
            $data['mhs'] = $this->model('profile_model')->getMahasiswaById($id);
            $data['link'] = 'null';
            $this->view('templates/header', $data);
            $this->view('profile/index', $data);
            $this->view('templates/footer');
        }
    }
}
