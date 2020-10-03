<?php
class Admin extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: " . BASEURL);
            exit();
            } else {
            $data['link'] = 'Page Admin';
            $data['mhs'] = $this->model('auth_model')->getAllMahasiswa();
            $this->view('admin/index', $data);
        }
    }
    public function inputkhs($id)
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: " . BASEURL);
            exit();
        } else {
            $data['link'] = 'Page Admin Input Khs';
            $data['mhs'] = $this->model('admin_model')->getMahasiswaById($id);
            $this->view('admin/inputkhs', $data);
        }
    }
    

    public function tambah()
    {
        if ($this->model('admin_model')->tambahDataMahasiswa($_POST) > 0) {
            header("Location:" . BASEURL);
        } else {
            echo 'salah';
        }
    }

    public function tambahNilai()
    {
        if ($this->model('admin_model')->tambahNilaiMahasiswa($_POST) > 0) {
            header("Location:" . BASEURL);
        } else {
            echo 'salah';
        }
    }

    public function editNilai()
    {
        if ($this->model('admin_model')->editNilaiMahasiswa($_POST) <= 0) {
            header('Location: ' . BASEURL);
        } else {
            echo 'salah';
        }
    }


    public function hapus($nim)
    {
        if ($this->model('admin_model')->hapusDataMahasiswa($nim) > 0) {
            header("Location:" . BASEURL);
        } else {
            echo 'salah';
        }
    }
    public function ubah()
    {
        if ($this->model('admin_model')->ubahDataMahasiswa($_POST) > 0) {
            header("Location:" . BASEURL);
        } else {
            echo 'salah';
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
