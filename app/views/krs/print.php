<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Print Kartu Rencana Studi</title>
  <link rel="stylesheet" href=" <?= BASEURL ?>/css/styleprint.css" />
  <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.min.css">
  <style>
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
      .judul1 {
        font-size: 25px;
      }

      .judul2 {
        font-size: 10px;
      }
    }

    /* Portrait */
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait) {
      .judul1 {
        font-size: 25px;
      }

      .judul2 {
        font-size: 10px;
      }
    }

    /* Landscape */
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: landscape) {
      .judul1 {
        font-size: 25px;
      }

      .judul2 {
        font-size: 10px;
      }
    }

    @media print {
      #btn {
        display: none;
      }

      @page {
        size: auto;
        margin: 0mm;
      }

      .pemisah {
        background-color: white;
        display: none;
      }

      .semua {
        background-color: white;
      }

    }
  </style>
</head>
<?php
// if (!isset($data['krs'])) {
//   header('Location: ' . BASEURL . '/krs');
// }
?>

<body>
  <div class="semua">
    <div id="btn" style="background: rgb(2, 0, 36);
        background: linear-gradient(286deg, rgba(2, 0, 36, 1) 0%, rgba(41, 41, 182, 1) 35%, rgba(0, 212, 255, 1) 100%);">
      <button class="btn mt-1 ml-2  hover" to onclick="window.print();return false;"><img src="https://img.icons8.com/metro/26/000000/print.png">
        <p>PRINT ME ! </p>
      </button>
    </div>

    <div class="container container-awal col-12 bg-white">
      <div class="row" style="overflow-x:a">
        <div class="col-sm-6 border border-dark">
          <img src="<?= BASEURL ?>/img/UMT.png" style="float: left; margin-right:10px;" width="100px" height="80px" alt="" />

          <h2 style="margin-top:32px;" class="judul judul1 pr-2" id="pertama">FAKULTAS TEKNIK</h2>
          <p class="judul judul2 mr-2">
            UNIVERSITAS MUHAMMADIYAH TANGERANG <br>
          </p>
          <hr class="mt-5 bg-dark" style="height: 3px">

          <div class="contentpeserta">
            <h4 style="text-align: center">PESERTA UJIAN</h4>
            <table class="ta" style="margin:auto">
              <tr>
                <th class="ta-0pky">NAMA</th>
                <th class="ta-0pky">: <?= strtoupper(($data['mhs']['nama'])) ?></th>
              </tr>
              <tr>
                <td class="ta-0pky">NIM</td>
                <td class="ta-0pky">: <?= $data['mhs']['nim'] ?></td>
              </tr>
              <tr>
                <td class="ta-0pky">PROG STUDI</td>
                <td class="ta-0pky">: <?= strtoupper($data['mhs']['fakultas']) . ' ' ?> <?= strtoupper($data['mhs']['prodi']) ?></td>
              </tr>
              <tr>
                <td class="ta-0pky">KELAS</td>
                <td class="ta-0pky">: <?= strtoupper($data['mhs']['kelas']) ?></td>
              </tr>
              <tr>
                <?php $angkatan = $data['mhs']['angkatan'];
                $angkatan = explode("/", $angkatan);
                $hasilAngkatan = $angkatan[0] . '-' . $angkatan[1];

                ?>
                <td class="ta-0pky">SMT/Th.Akd</td>
                <td class="ta-0pky">: <?= $data['krs']['a'][0][0]['semester'] . ' / ' . $hasilAngkatan ?></td>
              </tr>
            </table>
          </div>
          <br>
          <div class="contentketerangan">
            <br />
            <p>Keterangan :</p>
            <ul>
              <li>Kartu ujian harus dibawa saat ujian.</li>
              <li>
                Kartu ujian ini sah jika ditandatangani
                oleh ketua jurusan dan distempel
              </li>
            </ul>
          </div>


        </div>
        <div class="col-sm-6 border border-dark">
          <div class="contentkedua">
            <table class="tg" style="margin:auto">
              <h3 id="textkuas" class="mt-3">
                KARTU <br />
                UJIAN TENGAH SEMESTER ( UTS )
              </h3>
              <hr class="mt-4 bg-dark" style="height: 3px">
              <br />
              <tr class="">
                <th class="bg-secondary">No</th>
                <th class="bg-secondary">KODE MK</th>
                <th style="text-align: center" class="bg-secondary">MATA KULIAH</th>
                <th class="bg-secondary">SMT</th>
                <th class="bg-secondary">SKS</th>
                <th class="bg-secondary" style="font-size: 9px;text-align: center">
                  PARAF <br />PENGAWAS
                </th>
              </tr>
              <?php for ($i = 0; $i < count($data['krs']['a']); $i++) : ?>
                <tr>
                  <td class="tg-0pky"><?= $i + 1; ?></td>
                  <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['kode_mk'] ?></td>
                  <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['nama_mk'] ?></td>
                  <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['semester'] ?></td>
                  <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['sks'] ?></td>
                  <td class="tg-0pky"></td>
                  <?php @$jmlsks1 += $data['krs']['a'][$i][0]['sks']  ?>
                <?php endfor; ?>

                <tr>
                  <td class="tg-c3ow" colspan="5">JUMLAH SKS</td>
                  <td class="tg-0pky" style="text-align:center"><?= $jmlsks1 ?></td>
                </tr>
            </table>

            <div class="tt" id="ttp">
              <p class="mt-4">Ketua Prodi</p>
              <br /><br />
              (.....................)
            </div>
            <div class="tt">
              <p class="mt-4">Tangerang, <?php echo date("d-m-Y") ?></p>
              <p>Mahasiswa</p>
              <br /><br />
              (.....................)
              <br> <br>
              <br>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="pemisah" style="background: rgb(2, 0, 36);
        background: linear-gradient(286deg, rgba(2, 0, 36, 1) 0%, rgba(41, 41, 182, 1) 35%, rgba(0, 212, 255, 1) 100%);padding:15px"></div>

    <div class="container col-12 bg-white" style="page-break-before: always">
      <div class="row">
        <div class="col-sm-6 border border-dark">

          <img src="<?= BASEURL ?>/img/UMT.png" style="float: left; margin-right:10px;" width="100px" height="80px" alt="" />

          <h2 style="margin-top:32px;" class="judul judul1 pr-2" id="pertama">FAKULTAS TEKNIK</h2>
          <p class="judul judul2 mr-2">
            UNIVERSITAS MUHAMMADIYAH TANGERANG <br>
          </p>
          <hr class="mt-5 bg-dark" style="height: 3px">

          <div class="contentpeserta">
            <h4 style="text-align: center">PESERTA UJIAN</h4>
            <table class="ta" style="margin:auto">
              <tr>
                <th class="ta-0pky">NAMA</th>
                <th class="ta-0pky">: <?= strtoupper(($data['mhs']['nama'])) ?></th>
              </tr>
              <tr>
                <td class="ta-0pky">NIM</td>
                <td class="ta-0pky">: <?= $data['mhs']['nim'] ?></td>
              </tr>
              <tr>
                <td class="ta-0pky">PROG STUDI</td>
                <td class="ta-0pky">: <?= strtoupper($data['mhs']['fakultas']) . ' ' ?> <?= strtoupper($data['mhs']['prodi']) ?></td>
              </tr>
              <tr>
                <td class="ta-0pky">KELAS</td>
                <td class="ta-0pky">: <?= strtoupper($data['mhs']['kelas']) ?></td>
              </tr>
              <tr>
                <?php $angkatan = $data['mhs']['angkatan'];
                $angkatan = explode("/", $angkatan);
                $hasilAngkatan = $angkatan[0] . '-' . $angkatan[1];

                ?>
                <td class="ta-0pky">SMT/Th.Akd</td>
                <td class="ta-0pky">: <?= $data['krs']['a'][0][0]['semester'] . ' / ' . $hasilAngkatan ?></td>
              </tr>
            </table>
          </div>
          <br>
          <div class="contentketerangan">
            <br />
            <p>Keterangan :</p>
            <ul>
              <li>Kartu ujian harus dibawa saat ujian.</li>
              <li>
                Kartu ujian ini sah jika ditandatangani
                oleh ketua jurusan dan distempel
              </li>
            </ul>
          </div>


        </div>
        <div class="col-sm-6 border border-dark">
          <div class="contentkedua">
            <table class="tg" style="margin:auto">
              <h3 id="textkuas" class="mt-3">
                KARTU <br />
                UJIAN AKHIR SEMESTER ( UAS )
              </h3>
              <hr class="mt-4 bg-dark" style="height: 2px">

              <br />
              <tr class="">
                <th class="bg-secondary">No</th>
                <th class="bg-secondary">KODE MK</th>
                <th style="text-align: center" class="bg-secondary">MATA KULIAH</th>
                <th class="bg-secondary">SMT</th>
                <th class="bg-secondary">SKS</th>
                <th class="bg-secondary" style="font-size: 9px;text-align: center">
                  PARAF <br />PENGAWAS
                </th>
              </tr>
              <?php for ($i = 0; $i < count($data['krs']['a']); $i++) : ?>
                <tr>
                  <td class="tg-0pky"><?= $i + 1; ?></td>
                  <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['kode_mk'] ?></td>
                  <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['nama_mk'] ?></td>
                  <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['semester'] ?></td>
                  <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['sks'] ?></td>
                  <td class="tg-0pky"></td>
                </tr>
                <?php @$jmlsks2 += $data['krs']['a'][$i][0]['sks']  ?>
              <?php endfor; ?>

              <tr>
                <td class="tg-c3ow" colspan="5">JUMLAH SKS</td>
                <td class="tg-0pky" style="text-align:center"><?= $jmlsks2 ?></td>
              </tr>
            </table>

            <div class="tt" id="ttp">
              <p class="mt-4">Ketua Prodi</p>
              <br /><br />
              (.....................)
            </div>
            <div class="tt">
              <p class="mt-4">Tangerang, <?php echo date("d-m-Y") ?></p>
              <p>Mahasiswa</p>
              <br /><br />
              (.....................)
              <br> <br>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pemisah" style="background: rgb(2, 0, 36);
        background: linear-gradient(286deg, rgba(2, 0, 36, 1) 0%, rgba(41, 41, 182, 1) 35%, rgba(0, 212, 255, 1) 100%);padding:15px"></div>

  <div class="container col-12 bg-white" style="page-break-before: always">
    <div class="row">
      <div class="col-sm-6 border border-dark">

        <img src="<?= BASEURL ?>/img/UMT.png" style="float: left; margin-right:10px;" width="100px" height="80px" alt="" />

        <h2 style="margin-top:32px;" class="judul judul1 pr-2" id="pertama">FAKULTAS TEKNIK</h2>
        <p class="judul judul2 mr-2">
          UNIVERSITAS MUHAMMADIYAH TANGERANG <br>
        </p>
        <hr class="mt-5 bg-dark" style="height: 3px">

        <div class="contentpeserta">
          <h4 style="text-align: center">PESERTA UJIAN</h4>
          <table class="ta" style="margin:auto">
            <tr>
              <th class="ta-0pky">NAMA</th>
              <th class="ta-0pky">: <?= strtoupper(($data['mhs']['nama'])) ?></th>
            </tr>
            <tr>
              <td class="ta-0pky">NIM</td>
              <td class="ta-0pky">: <?= $data['mhs']['nim'] ?></td>
            </tr>
            <tr>
              <td class="ta-0pky">PROG STUDI</td>
              <td class="ta-0pky">: <?= strtoupper($data['mhs']['fakultas']) . ' ' ?> <?= strtoupper($data['mhs']['prodi']) ?></td>
            </tr>
            <tr>
              <td class="ta-0pky">KELAS</td>
              <td class="ta-0pky">: <?= strtoupper($data['mhs']['kelas']) ?></td>
            </tr>
            <tr>
              <?php $angkatan = $data['mhs']['angkatan'];
              $angkatan = explode("/", $angkatan);
              $hasilAngkatan = $angkatan[0] . '-' . $angkatan[1];

              ?>
              <td class="ta-0pky">SMT/Th.Akd</td>
              <td class="ta-0pky">: <?= $data['krs']['a'][0][0]['semester'] . ' / ' . $hasilAngkatan ?></td>
            </tr>
          </table>
        </div>
        <br>
        <div class="contentketerangan">
          <br />
          <p>Keterangan :</p>
          <ul>
            <li>Kartu ujian harus dibawa saat ujian.</li>
            <li>
              Kartu ujian ini sah jika ditandatangani
              oleh ketua jurusan dan distempel
            </li>
          </ul>
        </div>


      </div>
      <div class="col-sm-6 border border-dark">
        <div class="contentkedua">
          <table class="tg" style="margin:auto">
            <h3 id="textkuas" class="mt-5">
              KARTU RENCANA STUDI
            </h3>
            <hr class="mt-4 bg-dark" style="height: 2px">

            <br />
            <tr class="">
              <th class="bg-secondary">No</th>
              <th class="bg-secondary">KODE MK</th>
              <th style="text-align: center" class="bg-secondary">MATA KULIAH</th>
              <th class="bg-secondary">SMT</th>
              <th class="bg-secondary">SKS</th>
              <th class="bg-secondary" style="font-size: 9px;text-align: center">
                PARAF <br />PENGAWAS
              </th>
            </tr>
            <?php for ($i = 0; $i < count($data['krs']['a']); $i++) : ?>
              <tr>
                <td class="tg-0pky"><?= $i + 1; ?></td>
                <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['kode_mk'] ?></td>
                <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['nama_mk'] ?></td>
                <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['semester'] ?></td>
                <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['sks'] ?></td>
                <td class="tg-0pky"></td>
              </tr>
              <?php @$jmlsks2 += $data['krs']['a'][$i][0]['sks']  ?>
            <?php endfor; ?>

            <tr>
              <td class="tg-c3ow" colspan="5">JUMLAH SKS</td>
              <td class="tg-0pky" style="text-align:center"><?= $jmlsks2 ?></td>
            </tr>
          </table>

          <div class="tt" id="ttp">
            <p class="mt-4">Ketua Prodi</p>
            <br /><br />
            (.....................)
          </div>
          <div class="tt">
            <p class="mt-4">Tangerang, <?php echo date("d-m-Y") ?></p>
            <p>Mahasiswa</p>
            <br /><br />
            (.....................)
            <br> <br>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="pemisah" style="background: rgb(2, 0, 36);
        background: linear-gradient(286deg, rgba(2, 0, 36, 1) 0%, rgba(41, 41, 182, 1) 35%, rgba(0, 212, 255, 1) 100%);padding:15px"></div>

  <div class="container col-12 bg-white" style="page-break-before: always">
    <div class="row">
      <div class="col-sm-6 border border-dark">

        <img src="<?= BASEURL ?>/img/UMT.png" style="float: left; margin-right:10px;" width="100px" height="80px" alt="" />

        <h2 style="margin-top:32px;" class="judul judul1 pr-2" id="pertama">FAKULTAS TEKNIK</h2>
        <p class="judul judul2 mr-2">
          UNIVERSITAS MUHAMMADIYAH TANGERANG <br>
        </p>
        <hr class="mt-5 bg-dark" style="height: 3px">

        <div class="contentpeserta">
          <h4 style="text-align: center">PESERTA UJIAN</h4>
          <table class="ta" style="margin:auto">
            <tr>
              <th class="ta-0pky">NAMA</th>
              <th class="ta-0pky">: <?= strtoupper(($data['mhs']['nama'])) ?></th>
            </tr>
            <tr>
              <td class="ta-0pky">NIM</td>
              <td class="ta-0pky">: <?= $data['mhs']['nim'] ?></td>
            </tr>
            <tr>
              <td class="ta-0pky">PROG STUDI</td>
              <td class="ta-0pky">: <?= strtoupper($data['mhs']['fakultas']) . ' ' ?> <?= strtoupper($data['mhs']['prodi']) ?></td>
            </tr>
            <tr>
              <td class="ta-0pky">KELAS</td>
              <td class="ta-0pky">: <?= strtoupper($data['mhs']['kelas']) ?></td>
            </tr>
            <tr>
              <?php $angkatan = $data['mhs']['angkatan'];
              $angkatan = explode("/", $angkatan);
              $hasilAngkatan = $angkatan[0] . '-' . $angkatan[1];

              ?>
              <td class="ta-0pky">SMT/Th.Akd</td>
              <td class="ta-0pky">: <?= $data['krs']['a'][0][0]['semester'] . ' / ' . $hasilAngkatan ?></td>
            </tr>
          </table>
        </div>
        <br>
        <div class="contentketerangan">
          <br />
          <p>Keterangan :</p>
          <ul>
            <li>Kartu ujian harus dibawa saat ujian.</li>
            <li>
              Kartu ujian ini sah jika ditandatangani
              oleh ketua jurusan dan distempel
            </li>
          </ul>
        </div>


      </div>
      <div class="col-sm-6 border border-dark">
        <div class="contentkedua">
          <table class="tg" style="margin:auto">
            <h3 id="textkuas" class="mt-5">
              KARTU RENCANA STUDI
            </h3>
            <hr class="mt-4 bg-dark" style="height: 2px">

            <br />
            <tr class="">
              <th class="bg-secondary">No</th>
              <th class="bg-secondary">KODE MK</th>
              <th style="text-align: center" class="bg-secondary">MATA KULIAH</th>
              <th class="bg-secondary">SMT</th>
              <th class="bg-secondary">SKS</th>
              <th class="bg-secondary" style="font-size: 9px;text-align: center">
                PARAF <br />PENGAWAS
              </th>
            </tr>
            <?php for ($i = 0; $i < count($data['krs']['a']); $i++) : ?>
              <tr>
                <td class="tg-0pky"><?= $i + 1; ?></td>
                <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['kode_mk'] ?></td>
                <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['nama_mk'] ?></td>
                <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['semester'] ?></td>
                <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['sks'] ?></td>
                <td class="tg-0pky"></td>
              </tr>
              <?php @$jmlsks2 += $data['krs']['a'][$i][0]['sks']  ?>
            <?php endfor; ?>

            <tr>
              <td class="tg-c3ow" colspan="5">JUMLAH SKS</td>
              <td class="tg-0pky" style="text-align:center"><?= $jmlsks2 ?></td>
            </tr>
          </table>

          <div class="tt" id="ttp">
            <p class="mt-4">Ketua Prodi</p>
            <br /><br />
            (.....................)
          </div>
          <div class="tt">
            <p class="mt-4">Tangerang, <?php echo date("d-m-Y") ?></p>
            <p>Mahasiswa</p>
            <br /><br />
            (.....................)
            <br> <br>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="pemisah" style="background: rgb(2, 0, 36);
        background: linear-gradient(286deg, rgba(2, 0, 36, 1) 0%, rgba(41, 41, 182, 1) 35%, rgba(0, 212, 255, 1) 100%);padding:15px"></div>

  <div class="container col-12 bg-white" style="page-break-before: always">
    <div class="row">
      <div class="col-sm-6 border border-dark">

        <img src="<?= BASEURL ?>/img/UMT.png" style="float: left; margin-right:10px;" width="100px" height="80px" alt="" />

        <h2 style="margin-top:32px;" class="judul judul1 pr-2" id="pertama">FAKULTAS TEKNIK</h2>
        <p class="judul judul2 mr-2">
          UNIVERSITAS MUHAMMADIYAH TANGERANG <br>
        </p>
        <hr class="mt-5 bg-dark" style="height: 3px">

        <div class="contentpeserta">
          <h4 style="text-align: center">PESERTA UJIAN</h4>
          <table class="ta" style="margin:auto">
            <tr>
              <th class="ta-0pky">NAMA</th>
              <th class="ta-0pky">: <?= strtoupper(($data['mhs']['nama'])) ?></th>
            </tr>
            <tr>
              <td class="ta-0pky">NIM</td>
              <td class="ta-0pky">: <?= $data['mhs']['nim'] ?></td>
            </tr>
            <tr>
              <td class="ta-0pky">PROG STUDI</td>
              <td class="ta-0pky">: <?= strtoupper($data['mhs']['fakultas']) . ' ' ?> <?= strtoupper($data['mhs']['prodi']) ?></td>
            </tr>
            <tr>
              <td class="ta-0pky">KELAS</td>
              <td class="ta-0pky">: <?= strtoupper($data['mhs']['kelas']) ?></td>
            </tr>
            <tr>
              <?php $angkatan = $data['mhs']['angkatan'];
              $angkatan = explode("/", $angkatan);
              $hasilAngkatan = $angkatan[0] . '-' . $angkatan[1];

              ?>
              <td class="ta-0pky">SMT/Th.Akd</td>
              <td class="ta-0pky">: <?= $data['krs']['a'][0][0]['semester'] . ' / ' . $hasilAngkatan ?></td>
            </tr>
          </table>
        </div>
        <br>
        <div class="contentketerangan">
          <br />
          <p>Keterangan :</p>
          <ul>
            <li>Kartu ujian harus dibawa saat ujian.</li>
            <li>
              Kartu ujian ini sah jika ditandatangani
              oleh ketua jurusan dan distempel
            </li>
          </ul>
        </div>


      </div>
      <div class="col-sm-6 border border-dark">
        <div class="contentkedua">
          <table class="tg" style="margin:auto">
            <h3 id="textkuas" class="mt-5">
              KARTU IJIN KULIAH
            </h3>
            <hr class="mt-4 bg-dark" style="height: 2px">

            <br />
            <tr class="">
              <th class="bg-secondary">No</th>
              <th class="bg-secondary">KODE MK</th>
              <th style="text-align: center" class="bg-secondary">MATA KULIAH</th>
              <th class="bg-secondary">SMT</th>
              <th class="bg-secondary">SKS</th>
              <th class="bg-secondary" style="font-size: 9px;text-align: center">
                PARAF <br />PENGAWAS
              </th>
            </tr>
            <?php for ($i = 0; $i < count($data['krs']['a']); $i++) : ?>
              <tr>
                <td class="tg-0pky"><?= $i + 1; ?></td>
                <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['kode_mk'] ?></td>
                <td class="tg-0pky"><?= $data['krs']['a'][$i][0]['nama_mk'] ?></td>
                <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['semester'] ?></td>
                <td style="text-align:center" class="tg-0pky"><?= $data['krs']['a'][$i][0]['sks'] ?></td>
                <td class="tg-0pky"></td>
              </tr>
              <?php @$jmlsks2 += $data['krs']['a'][$i][0]['sks']  ?>
            <?php endfor; ?>

            <tr>
              <td class="tg-c3ow" colspan="5">JUMLAH SKS</td>
              <td class="tg-0pky" style="text-align:center"><?= $jmlsks2 ?></td>
            </tr>
          </table>

          <div class="tt" id="ttp">
            <p class="mt-4">Ketua Prodi</p>
            <br /><br />
            (.....................)
          </div>
          <div class="tt">
            <p class="mt-4">Tangerang, <?php echo date("d-m-Y") ?></p>
            <p>Mahasiswa</p>
            <br /><br />
            (.....................)
            <br> <br>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>