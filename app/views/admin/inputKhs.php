<?php
if (isset($_POST['submitsem'])) {
    $selected_val = $_POST['semester'];
    if ($selected_val == '1') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '1';
        $data['matkul'] = $this->semester1(1);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec1 = true;
    } elseif ($selected_val == '2') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '2';
        $data['matkul'] = $this->semester2(2);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec2 = true;
    } elseif ($selected_val == '3') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '3';
        $data['matkul'] = $this->semester3(3);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec3 = true;
    } elseif ($selected_val == '4') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '4';
        $data['matkul'] = $this->semester4(4);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec4 = true;
    } elseif ($selected_val == '5') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '5';
        $data['matkul'] = $this->semester5(5);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec5 = true;
    } elseif ($selected_val == '6') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '6';
        $data['matkul'] = $this->semester6(6);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec6 = true;
    } elseif ($selected_val == '7') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '7';
        $data['matkul'] = $this->semester7(7);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec7 = true;
    } elseif ($selected_val == '8') {
        $cek['nim'] = $data['mhs']['nim'];
        $cek['semester'] = '8';
        $data['matkul'] = $this->semester8(8);
        $data['nilaikhs'] = $this->datanilai($cek);
        $selec8 = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $data['link']; ?></title>
    <style>
        @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
            #a {
                height: 40px;
                width: 500px;
                text-align: center;
                position: absolute;
                margin-left: 40px;
            }
        }
    </style>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/library/DataTablesAdmin/datatables.css">
    <script type="text/javascript" charset="utf8" src="<?= BASEURL ?>/library/DataTablesAdmin/datatables.js"></script>
    <!-- <script src="https://kit.fontawesome.com/437e7a97ad.js"></script> -->
</head>
<div class="jumbotron bg-warning col-md-12" style="color:white; width:100% background: rgb(7, 0, 130);
    background: linear-gradient(270deg, rgba(7, 0, 130, 1) 0%, rgba(12, 12, 131, 1) 35%, rgba(245, 245, 245, 1) 100%);">
    <h1 class="display-4">Selamat Datang Dihalaman Admin.</h1>
    <p class="lead">Dihalaman ini Admin dapat Create Read Update Detele Data Mahasiswa.</p>
    <hr class="my-4">
    <p></p>
    <a class="btn btn-primary btn-ms tombolTambahData" href="<?= BASEURL ?>" role="button">Kembali</a>
    <a class="btn btn-danger btn-ms" href="<?= BASEURL ?>/logout" role="button">Logout</a>
</div>

<div class="container ml-2">
    <h1 class="mt-4">INPUT KARTU HASIL UJIAN</h1>
    <form action="" method="post">
        <div class="input-group mb-3 col-12 mt-3 row">
            <div class="input-group-prepend ml-1">
                <label class="input-group-text" for="inputGroupSelect01">Kartu Hasil Ujian</label>
                <select class="custom-select col-6" id="inputGroupSelect01" name="semester" style="width:50px;">
                    <option <?php if (isset($selec1)) echo 'selected' ?> value="1">Semester 1</option>
                    <option <?php if (isset($selec2)) echo 'selected' ?> value="2">Semester 2</option>
                    <option <?php if (isset($selec3)) echo 'selected' ?> value="3">Semester 3</option>
                    <option <?php if (isset($selec4)) echo 'selected' ?> value="4">Semester 4</option>
                    <option <?php if (isset($selec5)) echo 'selected' ?> value="5">Semester 5</option>
                    <option <?php if (isset($selec6)) echo 'selected' ?> value="6">Semester 6</option>
                    <option <?php if (isset($selec7)) echo 'selected' ?> value="7">Semester 7</option>
                    <option <?php if (isset($selec8)) echo 'selected' ?> value="8">Semester 8</option>
                </select>
                <input type="hidden" name="nim" value="<?= $data['mhs']['nim'] ?>">
                <button type="submit" name="submitsem" class="btn btn-success shadow col-3">Pilih</button>
            </div>
        </div>
    </form>

    <div style="overflow-x:auto">
        <form action="<?= $data['nilaikhs'] == null ? BASEURL . '/admin/tambahNilai' : BASEURL . '/admin/editNilai' ?>" method="post">
            <table class="table col-6">
                <thead class="thead-light">
                    <?php if (isset($_POST['semester'])) { ?>
                        <tr style="text-align:center">
                            <th></th>
                            <th scope="col">Semester</th>
                            <th scope="col">Kode MK</th>
                            <th scope="col">Nama MK</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">A.M</th>
                        </tr>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['semester'])) {
                        $i = 0;
                        foreach ($data['matkul'] as $matkul) {
                            $i++;
                            ?>
                            <tr>
                                <th><input required style="width:70px; text-align:center" name="nim<?php echo $i ?>" type="hidden" value="<?= $data['mhs']['nim'] ?>"></th>
                                <th><input required style="width:70px; text-align:center" name="semester<?php echo $i ?>" type="text" value="<?= $matkul['semester'] ?>"></th>
                                <td><input required style="width:80px; text-align:center" name="kode_mk<?php echo $i ?>" type="text" value="<?= $matkul['kode_mk'] ?>"></td>
                                <td><input required style="width:250px; text-align:center" name="nama_mk<?php echo $i ?>" type="text" value="<?= $matkul['nama_mk'] ?>"></td>
                                <td><input required style="width:70px; text-align:center" name="sks<?php echo $i ?>" type="text" value="<?= $matkul['sks'] ?>"></td>
                                <td><input required autocomplete="off" style="width:70px; text-align:center" name="nilai<?php echo $i ?>" type="text" value="<?= $data['nilaikhs'] == null ? '' : $data['nilaikhs'][$i - 1]['nilai'] ?>"></td>
                                <td><input required autocomplete="off" style="width:70px; text-align:center" name="am<?php echo $i ?>" type="text" value="<?= $data['nilaikhs'] == null ? '' : $data['nilaikhs'][$i - 1]['am'] ?>"></td>
                                <td><input required style="width:70px; text-align:center" name="total" type="hidden" value="<?= count($data['matkul']) ?>"></td>

                                <td></td>
                            </tr>

                    <?php
                        }
                        echo '<tfoot>
        </tfoot>';
                    }
                    ?>
                </tbody>
            </table>
            <?php if (isset($_POST['semester'])) {  ?>
                <button type="submit" id="a" class="btn btn-success mr-3 btn-krs" style="width:69%">SIMPAN</button>
            <?php } ?>
    </div>
    </form>

</div>


<br><br>
<script src="<?= BASEURL ?>/library/DataTablesAdmin/datatables.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/js/scriptadm.js"></script>
<script src="<?= BASEURL; ?>/js/jq.js"></script>
</body>

</html>