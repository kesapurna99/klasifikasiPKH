<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <body>
             
	 <?php
   $c = array("jml_tanggungan", "kpl_rumah_tangga", "anak_usia_dini", "anak_sekolah", "jenis_lantai","jml_penghasilan","stts_kepemilikan_rumah");
?>

<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">

<?php
                    
                      $query = "select * from tbl_hasil where id_hasil='".$_GET['id_hasil']."'";
                      $r = mysqli_query($kon,$query);
                      $data = mysqli_fetch_array($r);
                      $id_hasil = $data['id_hasil'];
                      $nama_penerima = $data['nama_penerima'];
                      $jml_tanggungan = $data['jml_tanggungan'];
                      $kpl_rumah_tangga = $data['kpl_rumah_tangga'];
                      $anak_usia_dini = $data['anak_usia_dini'];
                      $anak_sekolah = $data['anak_sekolah'];
                      $jenis_lantai = $data['jenis_lantai'];
                      $jml_penghasilan = $data['jml_penghasilan'];
                      $stts_kepemilikan_rumah = $data['stts_kepemilikan_rumah'];
                      $n = (status_pkh('PENERIMA') + status_pkh('BUKAN'));
                      $ny = status_pkh('PENERIMA');
                      $nx = status_pkh('BUKAN');
                      ?>
   <h4>PROBABILITAS KELAS status_pkh</h4>
    <table border="5" class="table tabel2">
      <thead class=" text-white">
        <tr> 
            <th scope="col" rowspen="2" class="align-middle text center">Total Data</th>
            <th scope="col" rowspen="2" class="align-middle text center">Mahasiswa penerimang terpilih</th>
            <th scope="col" rowspen="2" class="align-middle text center">Mahasiswa penerimang BUKAN terpilih</th>
            <th scope="col" rowspen="2" class="text center">Probabilitas Mahasiswa PENERIMAng terpilih</th>
            <th scope="col" rowspen="2" class="text center">Probabilitas Mahasiswa yang BUKAN terpilih</th>
        </tr>
        <tr>
            <th>n</th>
            <th>y</th>
            <th>x</th>
            <th>p= y/n </th>
            <th>p= x/n </th>
        </tr>
      </thead>
      <tbody>
                <tr>
                  <td><?= $n ?></td>
                  <td><?= status_pkh('PENERIMA') ?></td>
                  <td><?= status_pkh('BUKAN') ?></td>
                  <?php
                    $status_pkhPENERIMA = status_pkh('PENERIMA') / (status_pkh('PENERIMA') + status_pkh('BUKAN'));
                    $status_pkhBUKAN = status_pkh('BUKAN') / (status_pkh('PENERIMA') + status_pkh('BUKAN'));
                    $status_pkhPENERIMA = number_format($status_pkhPENERIMA, 2, '.','');
                    $status_pkhBUKAN = number_format($status_pkhBUKAN, 2, '.','');
                  ?>
                  <td><?php echo status_pkh('PENERIMA')."/".$n."=".$status_pkhPENERIMA ?></td>
                  <td><?= status_pkh('BUKAN')."/".$n."=".$status_pkhBUKAN ?></td>
                </tr>
              </tbody>
            </table>
            <div>
              <h4>Keterangan : </h4>
              
              <h6>Ny adalah jumlah data mahasiswa terpilih</h6>
              <h6>Nx Adalah jumlah data mahasiwa BUKAN terpilih</h6>
            </div>
            <hr>
      <?php foreach ($c as $c) { ?> 
              <br> 
                <h4>PROBABILITAS <?= strtoupper($c) ?></h4>
                 ny = <?php echo status_pkh('PENERIMA') ?><br>
                 nx = <?php echo status_pkh('BUKAN') ?>
                  <table border="5" class="table table-hover">
                    <thead class=" text-white">
                      <tr>
                        <th scope="col" rowspen="2" class="align-middle text center"><?= strtoupper($c) ?></th>
                        <th scope="col" rowspen="2" class="text center">Mahasiswa yang terpilih</th>
                        <th scope="col" rowspen="2" class="text center">Mahasiswa yang BUKAN terpilih</th>
                        <th scope="col" rowspen="2" class="text center">Probabilitas Mahasiswa yang terpilih</th>
                        <th scope="col" rowspen="2" class="text center">Probabilitas Mahasiswa yang BUKAN terpilih</th>
                      </tr>
                      <tr>
                          <th></th>
                          <th>y</th>
                          <th>x</th>
                          <th>p= y/ny </th>
                          <th>p= x/nx </th>
                      </tr>
                     </thead>
                      <tbody>
                        <?php 
                        $PENERIMA = 0;
                        $BUKAN = 0;
                        foreach (c($c) as $nilai) { ?>
                          <tr>
                            <td><?= $nilai[$c] ?></td>
                            <td><?= hitung($c, $nilai[$c], 'PENERIMA')?></td>
                            <td><?= hitung($c, $nilai[$c], 'BUKAN')?></td>
                            <td><?= hitung($c, $nilai[$c], 'PENERIMA')."/".$ny."=".round(hitung($c, $nilai[$c], 'PENERIMA') / status_pkh('PENERIMA'),2) ?></td>
                            <td><?= hitung($c, $nilai[$c], 'BUKAN')."/".$nx."=".round(hitung($c, $nilai[$c], 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                          </tr>
                    <?php 
                      $PENERIMA = $PENERIMA + (hitung($c, $nilai[$c], 'PENERIMA') / status_pkh('PENERIMA'));
                      $BUKAN = $BUKAN + (hitung($c, $nilai[$c], 'BUKAN') / status_pkh('BUKAN'));
                    } ?>
                    <tr>
                      <td>Jumlah</td>
                      <td><?= status_pkh('PENERIMA') ?></td>
                      <td><?= status_pkh('BUKAN') ?></td>
                      <td><?= $PENERIMA ?></td>
                      <td><?= $BUKAN ?></td>
                    </tr>
                    </tbody>
                  </table>
                <?php } ?>
                    </div>
                  </div>
                
     </div>
     </div>
                      <h4>DATA CALON PENERIMA PKH</h4>
                      <table border="5" class="table table2">
                        <thead class="text-white">
                          <tr>
                            <th rowspan="2" class="align-middle text-center">Nama(<?= $nama_penerima ?>) </th>
                            <th colspan="2">Jumlah Tanggungan (<?= $jml_tanggungan ?>) </th>
                            <th colspan="2">kepala Rumah Tangga (<?= $kpl_rumah_tangga ?>) </th>
                            <th colspan="2">Anak Usia Dini(<?= $anak_usia_dini ?>) </th>
                            <th colspan="2">Anak Sekolah (<?= $anak_sekolah ?>) </th>
                            <th colspan="2">Jenis Lantai (<?= $jenis_lantai ?>) </th>
                            <th colspan="2">Jumlah Penghasilan (<?= $jml_penghasilan ?>) </th>
                            <th colspan="2">Status Kepemilikan Rumah (<?= $stts_kepemilikan_rumah ?>) </th>
                            <th colspan="2">status_pkh</th>
                          </tr>
                          <tr>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                            <th>Terpilih</th>
                            <th>BUKAN Terpilih</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="1">Probabilitas</td>
                            <td><?= round(hitung('jml_tanggungan', $jml_tanggungan, 'PENERIMA') / status_pkh('PENERIMA'),2) ?></td>
                            <td><?= round(hitung('jml_tanggungan', $jml_tanggungan, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= round(hitung('kpl_rumah_tangga', $kpl_rumah_tangga, 'PENERIMA') / status_pkh('PENERIMA') ,2)?></td>
                            <td><?= round(hitung('kpl_rumah_tangga', $kpl_rumah_tangga, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= round(hitung('anak_usia_dini', $anak_usia_dini, 'PENERIMA') / status_pkh('PENERIMA'),2) ?></td>
                            <td><?= round(hitung('anak_usia_dini', $anak_usia_dini, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= round(hitung('anak_sekolah', $anak_sekolah, 'PENERIMA') / status_pkh('PENERIMA') ,2)?></td>
                            <td><?= round(hitung('anak_sekolah', $anak_sekolah, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= round(hitung('jenis_lantai', $jenis_lantai, 'PENERIMA') / status_pkh('PENERIMA'),2) ?></td>
                            <td><?= round(hitung('jenis_lantai', $jenis_lantai, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= round(hitung('jml_penghasilan', $jml_penghasilan, 'PENERIMA') / status_pkh('PENERIMA') ,2)?></td>
                            <td><?= round(hitung('jml_penghasilan', $jml_penghasilan, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= round(hitung('stts_kepemilikan_rumah', $stts_kepemilikan_rumah, 'PENERIMA') / status_pkh('PENERIMA'),2) ?></td>
                            <td><?= round(hitung('stts_kepemilikan_rumah', $stts_kepemilikan_rumah, 'BUKAN') / status_pkh('BUKAN'),2) ?></td>
                            <td><?= $status_pkhPENERIMA ?></td>
                            <td><?= $status_pkhBUKAN ?></td>
                          </tr>
                        <?php 
                        $hasilPENERIMA = (hitung('jml_tanggungan', $jml_tanggungan, 'PENERIMA') / status_pkh('PENERIMA')) * 
                        (hitung('kpl_rumah_tangga', $kpl_rumah_tangga, 'PENERIMA') / status_pkh('PENERIMA')) * (hitung('anak_usia_dini', $anak_usia_dini, 'PENERIMA') / status_pkh('PENERIMA')) * 
                        (hitung('anak_sekolah', $anak_sekolah, 'PENERIMA') / status_pkh('PENERIMA')) * (hitung('jenis_lantai', $jenis_lantai, 'PENERIMA') / status_pkh('PENERIMA'))* (hitung('jml_penghasilan', $jml_penghasilan, 'PENERIMA') / status_pkh('PENERIMA'))* (hitung('stts_kepemilikan_rumah', $stts_kepemilikan_rumah, 'PENERIMA') / status_pkh('PENERIMA'));
                        //$hasilPENERIMA = number_format($hasilPENERIMA, 2, '.', '');
                        $hasilPENERIMA = $hasilPENERIMA * $status_pkhPENERIMA;

                        $hasilBUKAN = (hitung('jml_tanggungan', $jml_tanggungan, 'BUKAN') / status_pkh('BUKAN')) * 
                        (hitung('kpl_rumah_tangga', $kpl_rumah_tangga, 'BUKAN') / status_pkh('BUKAN')) * (hitung('anak_usia_dini', $anak_usia_dini, 'BUKAN') / status_pkh('BUKAN')) * 
                        (hitung('anak_sekolah', $anak_sekolah, 'BUKAN') / status_pkh('BUKAN')) * (hitung('jenis_lantai', $jenis_lantai, 'BUKAN') / status_pkh('BUKAN')) * (hitung('jml_penghasilan', $jml_penghasilan, 'BUKAN') / status_pkh('BUKAN')) * (hitung('stts_kepemilikan_rumah', $stts_kepemilikan_rumah, 'BUKAN') / status_pkh('BUKAN'));
                        //$hasilBUKAN = number_format($hasilBUKAN, 2, '.', '');
                        $hasilBUKAN = $hasilBUKAN * $status_pkhBUKAN;

                        if ($hasilBUKAN > $hasilPENERIMA) {
                          $status_pkh = 'BUKAN';
                        }else{
                          $status_pkh = 'PENERIMA';
                        }
                        ?>
                        <tr> 
                          <td>Terpilih</td>
                          <td colspan="14"><?= round(hitung('jml_tanggungan', $jml_tanggungan, 'PENERIMA') / status_pkh('PENERIMA'),2) . ' * ' . round(hitung('kpl_rumah_tangga', $kpl_rumah_tangga, 'PENERIMA') / 
                          status_pkh('PENERIMA'),2) . ' * ' . round(hitung('anak_usia_dini', $anak_usia_dini, 'PENERIMA') / status_pkh('PENERIMA'),2) . ' * ' . round(hitung('anak_sekolah', $anak_sekolah, 'PENERIMA') / status_pkh('PENERIMA'),2) . ' * ' .
                          round(hitung('jenis_lantai', $jenis_lantai, 'PENERIMA') / status_pkh('PENERIMA'),2) . ' * ' . round(hitung('jml_penghasilan', $jml_penghasilan, 'PENERIMA') / status_pkh('PENERIMA'),2) . ' * ' . round(hitung('stts_kepemilikan_rumah', $stts_kepemilikan_rumah, 'PENERIMA') / status_pkh('PENERIMA'),2) . ' * ' . $status_pkhPENERIMA . ' = <b> ' . $hasilPENERIMA . ' </b> ' ?></td>
                        </tr>
                        <tr> 
                          <td>BUKAN Terpilih</td>
                          <td colspan="14"><?= round(hitung('jml_tanggungan', $jml_tanggungan, 'BUKAN') / status_pkh('BUKAN') ,2). ' * ' . round(hitung('kpl_rumah_tangga', $kpl_rumah_tangga, 'BUKAN') / 
                          status_pkh('BUKAN'),2) . ' * ' .round( hitung('anak_usia_dini', $anak_usia_dini, 'BUKAN') / status_pkh('BUKAN'),2) . ' * ' . round(hitung('anak_sekolah', $anak_sekolah, 'BUKAN') / status_pkh('BUKAN'),2) . ' * ' .
                          round(hitung('jenis_lantai', $jenis_lantai, 'BUKAN') / status_pkh('BUKAN') ,2). ' * ' . $status_pkhBUKAN . ' = <b> ' .$hasilBUKAN . ' </b> ' ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br> 
                    <h4>KESIMPULAN</h4>
                      <table border="5" class="table table-hover mb-5">
                        <thead class=" text-white">
                          <tr>
                            <th>id_hasil</th>
                            <th>Nama</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Kepala Rumah Tangga</th>
                            <th>Anak Usia Dini</th>
                            <th>Anak Sekolah</th>
                            <th>Jenis Lantai</th>
                            <th>Jumlah Penghasilan</th>
                            <th>Status Kepemilikan Rumah
                            <th>Status Kelayakan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?= $id_hasil ?></td>
                            <td><?= $nama_penerima ?></td>
                            <td><?= $jml_tanggungan ?></td>
                            <td><?= $kpl_rumah_tangga ?></td>
                            <td><?= $anak_usia_dini ?></td>
                            <td><?= $anak_sekolah ?></td>
                            <td><?= $jenis_lantai ?></td>
                            <td><?= $jml_penghasilan ?></td>
                            <td><?= $stts_kepemilikan_rumah ?></td>
                            <td><?= $status_pkh ?></td>
                          </tr>
                        </tbody>
                      </table>
            </div>
            </form>
       
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>