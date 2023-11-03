
	 <?php
   $c = array("jml_tanggungan", "kpl_rumah_tangga", "anak_usia_dini", "anak_sekolah", "jenis_lantai", "jml_penghasilan", "stts_kepemilikan_rumah");
?>
    <div class="callout callout-info">
          <h4>Informasi!</h4>

          <p>Silahkan Lakukan Pengisian data training</p>
        </div>


<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">

<?php
                   if (!isset($_POST['simpan'])) { 
?>

<form action="" method="post">
              <div class="box-tools">
                <br>
                <label>Nama Penerima</label>
                <input type="hidden"   class="form-control" name="id_hasil">
                <input type="text" required class="form-control" name="nama_penerima" placeholder="Masukan Nama">
                </div>
                <br>
                <label>Jumlah Tanggungan</label>
                <select class="form-control select2" name="jml_tanggungan" style="width: 100%;">
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="3+">3+</option>
                </select>
                <br> 
                <label>Kepala Rumah Tangga</label>
                <select class="form-control select2" name="kpl_rumah_tangga" style="width: 100%;">
                  <option></option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <br>
                <label>Anak Usia Dini</label>
                <select class="form-control select2" name="anak_usia_dini" style="width: 100%;">
                  <option></option>
                  <option value="Ada">Ada</option>
                  <option value="Tidak">Tidak</option>
                </select>
                <br>
                <label>Anak Sekolah</label>
                <select class="form-control select2" name="anak_sekolah" style="width: 100%;">
                  <option></option>
                  <option value="Ada">Ada</option>
                  <option value="Tidak">Tidak</option>
                </select>
                <br>
                <label>jenis Lantai</label>
                <select class="form-control select2" name="jenis_lantai" style="width: 100%;">
                  <option></option>
                  <option value="Keramik">Keramik</option>
                  <option value="Semen">Semen</option>
                  <option value="Tanah">Tanah</option>
                </select>
                <label>Jumlah Penghasilan</label>
                <select class="form-control select2" name="jml_penghasilan" style="width: 100%;">
                  <option></option>
                  <option value="Rendah">Rendah <=2.000.000</option>
                  <option value="Sedang">Sedang >2.500.000</option>
                  <option value="Tinggi">Tinggi >3.500.000</option>
                </select>
                <label>Status Kepemilikan Rumah</label>
                <select class="form-control select2" name="stts_kepemilikan_rumah" style="width: 100%;">
                  <option></option>
                  <option value="Milik sendiri">Milik Sendiri</option>
                  <option value="Sewa">Sewa</option>
                  <option value="Bebas Sewa">Bebas Sewa</option>
                </select>
                
              </div>
              <br>
              <button type="submit" name="simpan" class="btn btn-info pull-right" style="width: 100%;height: 40px;" onclick="return simulasi()">Proses Perhitungan</button>
              
              

  </form>
  <br><br>
  
  <?php
  }
                    if (isset($_POST['simpan'])) { 
                      $nama_penerima = $_POST['id_hasil'];
                      $nama_penerima = $_POST['nama_penerima'];
                      $jml_tanggungan = $_POST['jml_tanggungan'];
                      $kpl_rumah_tangga = $_POST['kpl_rumah_tangga'];
                      $anak_usia_dini = $_POST['anak_usia_dini'];
                      $anak_sekolah = $_POST['anak_sekolah'];
                      $jenis_lantai = $_POST['jenis_lantai'];
                      $jml_penghasilan = $_POST['jml_penghasilan'];
                      $stts_kepemilikan_rumah = $_POST['stts_kepemilikan_rumah'];
                      $n = (status_pkh('PENERIMA') + status_pkh('BUKAN'));
                      $ny = status_pkh('PENERIMA');
                      $nx = status_pkh('BUKAN');
                      ?>
   <h4>PROBABILITAS KELAS status_pkh</h4>
    <table border="5" class="table tabel-hover">
      <thead class=" text-white">
        <tr> 
        <th scope="col" rowspen="2" class="align-middle text center">Total Data</th>
            <th scope="col" rowspen="2" class="align-middle text center"> Calon terpilih</th>
            <th scope="col" rowspen="2" class="align-middle text center"> Calon tidak terpilih</th>
            <th scope="col" rowspen="2" class="text center">Probabilitas  Calon terpilih</th>
            <th scope="col" rowspen="2" class="text center">Probabilitas  Calon BUKAN terpilih</th>
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
                        <th scope="col" rowspen="2" class="text center">Mahasiswa yang Tidak terpilih</th>
                        <th scope="col" rowspen="2" class="text center">Probabilitas Mahasiswa yang terpilih</th>
                        <th scope="col" rowspen="2" class="text center">Probabilitas Mahasiswa yang Tidak terpilih</th>
                      
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
                      <h4>DATA CALON status_pkh LABORATORIUM</h4>
                      <table border="5" class="table table-hover">
                        <thead class=" text-white">
                          <tr>
                            <th rowspan="2" class="align-middle text-center">nama_penerima (<?= $nama_penerima ?>) </th>
                            <th colspan="2">jml_tanggungan (<?= $jml_tanggungan ?>) </th>
                            <th colspan="2">kpl_rumah_tangga (<?= $kpl_rumah_tangga ?>) </th>
                            <th colspan="2">anak_usia_dini(<?= $anak_usia_dini ?>) </th>
                            <th colspan="2">anak_sekolah (<?= $anak_sekolah ?>) </th>
                            <th colspan="2">jenis_lantai (<?= $jenis_lantai ?>) </th>
                            <th colspan="2">jml_penghasilan (<?= $jml_penghasilan ?>) </th>
                            <th colspan="2">stts_kepemilikan_rumah (<?= $stts_kepemilikan_rumah ?>) </th>
                            <th colspan="2">status_pkh</th>
                          </tr>
                          <tr>
                            
                          <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
                            <th>Terpilih</th>
                            <th>Tidak Terpilih</th>
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
                      

  $a="INSERT INTO tbl_hasil values ('" .$_POST['id_hasil']. "','".$_POST['nama_penerima']."','".$_POST['jml_tanggungan']."','".$_POST['kpl_rumah_tangga']."','".$_POST['anak_usia_dini']."','".$_POST['anak_sekolah']."','".$_POST['jenis_lantai']."','".$_POST['jml_penghasilan']."','".$_POST['stts_kepemilikan_rumah']."','".$status_pkh."')";
	$b=mysqli_query($kon,$a);
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
                          round(hitung('jenis_lantai', $jenis_lantai, 'BUKAN') / status_pkh('BUKAN') ,2). ' * ' . round(hitung('jml_penghasilan', $jml_penghasilan, 'BUKAN') / status_pkh('BUKAN'),2) . ' * ' . round(hitung('stts_kepemilikan_rumah', $stts_kepemilikan_rumah, 'BUKAN') / status_pkh('BUKAN'),2) . ' * ' . $status_pkhBUKAN . ' = <b> ' .$hasilBUKAN . ' </b> ' ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br> 
                    <h4>KESIMPULAN</h4>
                      <table border="5" class="table table-hover mb-5">
                        <thead class=" text-white">
                          <tr>
                            <th>id_training</th>
                            <th>nama_penerima</th>
                            <th>jml_tanggungan</th>
                            <th>kpl_rumah_tangga</th>
                            <th>PF</th>
                            <th>PL1</th>
                            <th>jenis_lantai</th>
                            <th>Jumlah Penghasilan</th>
                            <th>Status Kepemilikan Rumah
                            <th>Status Rekomendasi</th>
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
                      <?php } ?>
            </div>
            </form>
        
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <script src="temp/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="temp/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>




    


