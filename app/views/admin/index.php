<?php
$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Koneksi Ke Server Errror!");
mysqli_select_db($koneksi, DB_NAME) or die('Koneksi ke database error!');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $data['link']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/library/DataTablesAdmin/datatables.css">
    <script type="text/javascript" charset="utf8" src="<?= BASEURL ?>/library/DataTablesAdmin/datatables.js"></script>
    <!-- <script src="https://kit.fontawesome.com/437e7a97ad.js"></script> -->
</head>
<div class="jumbotron col-md-12" style="color:white; width:100% background: rgb(7, 0, 130);
    background: linear-gradient(270deg, rgba(7, 0, 130, 1) 0%, rgba(12, 12, 131, 1) 35%, rgba(245, 245, 245, 1) 100%);">
    <h1 class="display-4">Selamat Datang Dihalaman Admin.</h1>
    <p class="lead">Dihalaman ini Admin dapat Create Read Update Detele Data Mahasiswa.</p>
    <hr class="my-4">
    <p></p>
    <a class="btn btn-primary btn-ms tombolTambahData" href="#" role="button" data-toggle="modal" data-target="#formModal">Tambah Data Mahasiswa</a>
    <a class="btn btn-danger btn-ms" href="<?= BASEURL ?>/logout" role="button">Logout</a>
</div>
<div class="container ">
    <div style='overflow-x:auto'>
        <table id="data" class="table table-bordered table-hover shadow" style="width:100%">
            <thead>
                <tr class="font-weight-bold" style="font-size:16px;">
                    <td>NIM</td>
                    <td>NAMA</td>
                    <td>JURUSAN</td>
                    <td>ANGKATAN</td>
                    <td>AKSI</td>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($data['mhs'] as $data) : ?>
                    <tr>
                        <td><?= $data['nim'] ?></td>
                        <td style="width:250px"><?= ucwords(strtolower($data['nama'])) ?></td>
                        <td><?= ucwords(strtolower($data['fakultas'])) . ' ' . ucwords(strtolower($data['prodi'])) ?></td>
                        <td><?= $data['angkatan'] ?></td>
                        <td class="text-center" style="width:;">
                            <a href="" class="badge badge-warning" data-toggle="modal" data-target="#formModalEdit<?= $data['nim'] ?>">EDIT</a>
                            <a href="<?= BASEURL ?>/admin/inputkhs/<?= $data['nim'] ?>" class="badge badge-success">KHS</a>
                            <a href="<?= BASEURL ?>/admin/hapus/<?= $data['nim'] ?>" class="" onclick="return confirm('Yakin akan menghapus data ?')"><img src="https://img.icons8.com/metro/26/000000/trash.png" class=" "></a>

                        </td>
                    </tr>

                    <!-- modal Edit-->
                    <div class="modal fade" id="formModalEdit<?= $data['nim'] ?>" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content col-8" style="margin:auto">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalLabel">Edit Data Mahasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="font-size:14px;">
                                    <form action="<?= BASEURL ?>/admin/ubah" method="post">
                                        <div class="form-group">
                                            <label for="nim">Nim</label>
                                            <input required type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input required type="text" class="form-control" id="nama" name="nama" value="<?= ucwords(strtolower($data['nama'])) ?>">
                                        </div>
                                        <div class="form-group">
                                            <?php if ($data['jenis_kelamin'] == 'L') {
                                                    $setl = true;
                                                    $setp = false;
                                                } elseif ($data['jenis_kelamin'] == 'P') {
                                                    $setl = false;
                                                    $setp = true;
                                                }
                                                ?>
                                            <label for="jenis_kelamin">Gender</label>
                                            <br>
                                            <input required type="radio" name="jenis_kelamin" id="" value="L" <?php if ($setl == true) echo 'checked' ?>> Laki-Laki <br>
                                            <input required type="radio" name="jenis_kelamin" id="" value="P" <?php if ($setp == true) echo 'checked' ?>> Perempuan
                                        </div>
                                        <div class="form-group">
                                            <label for="fakultas">Fakultas</label>
                                            <select required class="form-control" id="fakultas" name="fakultas" value="">
                                                <option selected value="teknik">Teknik</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">Prodi</label>
                                            <select required class="form-control" id="prodi" name="prodi" value="<?= $data['prodi'] ?>">
                                                <option selected value="Informatika">Informatika</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <input required type="text" class="form-control" id="kelas" name="kelas" value="<?= strtoupper($data['kelas']) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <select required class="form-control" id="angkatan" name="angkatan">
                                                <option value="<?= $data['angkatan'] ?>"><?= $data['angkatan'] ?></option>
                                                <option value="2014/2015">2014/2015</option>
                                                <option value="2015/2016">2015/2016</option>
                                                <option value="2016/2017">2016/2017</option>
                                                <option value="2017/2018">2017/2018</option>
                                                <option value="2018/2019">2018/2019</option>
                                                <option value="2019/2020">2019/2020</option>
                                                <option value="2020/2021">2020/2021</option>
                                                <option value="2021/2022">2021/2022</option>
                                                <option value="2022/2023">2022/2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input required type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon">Alamat</label>
                                            <br>
                                            <textarea required name="alamat" id="" cols="30" rows="3" style="width:100%"><?= $data['alamat'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon">No Telepon</label>
                                            <input required type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= $data['no_telepon'] ?>">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>


        </table>

    </div>
</div>

<!-- modal tambah-->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-8" style="margin:auto">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:14px;">
                <form action="<?= BASEURL; ?>/admin/tambah" method="post">
                    <div class="form-group">
                        <label autofocus for="nim">Nim</label>
                        <input autofocus required autocomplete="off" type="number" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required autocomplete="off" type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Gender</label>
                        <br>
                        <input required type="radio" name="jenis_kelamin" id="" value="L"> Laki-Laki <br>
                        <input required type="radio" name="jenis_kelamin" id="" value="P"> Perempuan
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <select required autocomplete="off" class="form-control" id="fakultas" name="fakultas">
                            <option value=""></option>
                            <option value="teknik">Teknik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select required autocomplete="off" class="form-control" id="prodi" name="prodi">
                            <option value=""></option>
                            <option value="Informatika">Informatika</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input required type="text" class="form-control" id="kelas" name="kelas">
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <select required autocomplete="off" class="form-control" id="angkatan" name="angkatan">
                            <option value=""></option>
                            <option value="2014/2015">2014/2015</option>
                            <option value="2015/2016">2015/2016</option>
                            <option value="2016/2017">2016/2017</option>
                            <option value="2017/2018">2017/2018</option>
                            <option value="2018/2019">2018/2019</option>
                            <option value="2019/2020">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                            <option value="2022/2023">2022/2023</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required autocomplete="off" type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">Alamat</label>
                        <br>
                        <textarea required autocomplete="off" name="alamat" id="" cols="30" rows="3" style="width:100%"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input required autocomplete="off" type="number" class="form-control" id="no_telepon" name="no_telepon">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<script src="<?= BASEURL ?>/library/DataTablesAdmin/datatables.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('#data').DataTable();
    });
</script>
</body>

</html>