<?php
$active = true;
$jk = $data['mhs']['jenis_kelamin'];
if ($jk == 'L') {
    $set = BASEURL . '/img/man.svg';
} elseif ($jk == 'P') {
    $set = BASEURL . '/img/girl.svg';
}
?>

<div class="wrapper">
    <nav id="sidebar">
        <ul class="list-unstyled components nav-list">
            <header>
                <img class="displaypicture" src="<?= $set ?>" alt="" />
                <div class="nama"><?= strtoupper($data['mhs']['nama']) ?></div>
            </header>
            <li class="active">
                <a href="<?= BASEURL; ?>/profile">Profile</a>
            </li>

            <li class="">
                <a href="<?= BASEURL; ?>/khs">Kartu Hasil Studi</a>
            </li>
            <li class="">
                <a href="<?= BASEURL; ?>/krs">Kartu Rencana Studi</a>
            </li>
            <li class="">
                <a href="#">Ranking</a>
            </li>
            <li class="">
                <a href="<?= BASEURL; ?>/logout">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-info btnside"><i class="fa fa-align-justify"></i> <span>toggle sidebar</span>
                </button>

                <!--<a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <img class="imgumt" src="<?= BASEURL ?>/img/logo.png" alt="" />
                        <li id="textnav">
                            UNIVERSITAS <br> MUHAMMADIYAH <br> TANGERANG
                        </li>
                        <!-- <h4 class="textumt"><span style="color: blue">U</span>NIVERSITAS <span style="color: blue">M</span>UHAMMADIYAH <span style="color: blue">T</span>ANGERANG</h4> -->
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="konten">
                <h1 class="mt-4" id="textprofile">Data Mahasiswa</h1>
                <br>
                <div class="row col-12">
                    <table class="table table-striped col-6 table-profile">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td><?= ucwords(strtolower($data['mhs']['nama'])); ?></td>
                            </tr>
                            <tr>
                                <td>Nim</td>
                                <td><?= $data['mhs']['nim']; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td><?= $data['mhs']['angkatan']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Lengkap</td>
                                <td><?= $data['mhs']['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Email</td>
                                <td><?= $data['mhs']['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>0<?= $data['mhs']['no_telepon']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>