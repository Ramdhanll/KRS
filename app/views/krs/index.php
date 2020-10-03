<?php
$active = true;
$selec = true;
if (isset($_POST['submitsem'])) {
    $selected_val = $_POST['semester'];
    if ($selected_val == '1') {
        $selec1 = true;
        $data['matkul'] = $this->semester1(1);
    } elseif ($selected_val == '2') {
        $data['matkul'] = $this->semester2(2);
        $selec2 = true;
    } elseif ($selected_val == '3') {
        $selec3 = true;
        $data['matkul'] = $this->semester3(3);
    } elseif ($selected_val == '4') {
        $selec4 = true;
        $data['matkul'] = $this->semester4(4);
    } elseif ($selected_val == '5') {
        $selec5 = true;
        $data['matkul'] = $this->semester5(5);
    } elseif ($selected_val == '6') {
        $selec6 = true;
        $data['matkul'] = $this->semester6(6);
    } elseif ($selected_val == '7') {
        $selec7 = true;
        $data['matkul'] = $this->semester7(7);
    } elseif ($selected_val == '8') {
        $selec8 = true;
        $data['matkul'] = $this->semester8(8);
    }
}
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
            <li class="">
                <a href="<?= BASEURL; ?>/profile">Profile</a>
            </li>

            <li class="">
                <a href="<?= BASEURL; ?>/khs">Kartu Hasil Studi</a>
            </li>
            <li class="active">
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
                <?php
                $selected = 'selected';

                if ($selec == true) : ?>

                    <div class="container ml-2">
                        <h1 class="mt-4 judul-krs">KARTU RENCANA STUDI</h1>
                        <form action="" method="post">
                            <div class="input-group mb-3 col-12 mt-3 row">
                                <div class="input-group-prepend ml-1 choosekrs">
                                    <label class="input-group-text" for="inputGroupSelect01">Kartu Rencana Studi</label>
                                    <select class="custom-select col-6" id="inputGroupSelect01" name="semester" style="width:50px;">
                                        <option <?php if (isset($selec1)) echo 'selected'; ?> value="1">Semester 1</option>
                                        <option <?php if (isset($selec2)) echo 'selected'; ?> value="2">Semester 2</option>
                                        <option <?php if (isset($selec3)) echo 'selected'; ?> value="3">Semester 3</option>
                                        <option <?php if (isset($selec4)) echo 'selected'; ?> value="4">Semester 4</option>
                                        <option <?php if (isset($selec5)) echo 'selected'; ?> value="5">Semester 5</option>
                                        <option <?php if (isset($selec6)) echo 'selected'; ?> value="6">Semester 6</option>
                                        <option <?php if (isset($selec7)) echo 'selected'; ?> value="7">Semester 7</option>
                                        <option <?php if (isset($selec8)) echo 'selected'; ?> value="8">Semester 8</option>
                                    </select>
                                    <button type="submit" name="submitsem" class="btn btn-success shadow col-3">Pilih</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                    <div style="overflow-x:auto">
                        <form action="<?= BASEURL ?>/krs/print" target="_blank" method="post">
                            <table class="table col-9 isiform">
                                <thead class="thead-light">
                                    <?php if (isset($_POST['semester'])) { ?>
                                        <tr>
                                            <th scope="col">SEMESTER</th>
                                            <th scope="col">KODE MK</th>
                                            <th scope="col">NAMA MATA KULIAH</th>
                                            <th scope="col">SKS</th>
                                            <th>
                                                <center>
                                                    <input checked type="checkbox" name="select_all" id="select_all" class="select_all" value="">
                                                </center>
                                            </th>
                                        </tr>
                                    <?php } ?>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['semester'])) {
                                        foreach ($data['matkul'] as $matkul) {
                                            ?>
                                            <tr style="text-align:center;">
                                                <td name="semester" value=""><?= $matkul['semester'] ?></td>
                                                <td name="kode_mk" value=""><?= $matkul['kode_mk'] ?></td>
                                                <td name="nama_mk" style="text-align:justify;" value=""><?= $matkul['nama_mk'] ?></td>
                                                <td name="sks" value=""><?= $matkul['sks'] ?></td>
                                                <td align="center">
                                                    <input checked type="checkbox" name="checked[]" class="check" value="<?= $matkul['kode_mk'] ?>">
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>

                            </table>
                            <?php if (isset($_POST['submitsem'])) {
                                if (@$selected_val == '8') {
                                    echo '';
                                } else { ?>
                                    <button type="submit" class="bg-primary btn btn-krs">PRINT KRS</button>
                            <?php
                                }
                            } ?>


                    </div>
                    </form>