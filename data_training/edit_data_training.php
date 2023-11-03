<?php

 if($_GET['type'] == 'edit'){
$sql            = "select * from tbl_training where id_training = ".$_GET['id_training']." ";
$q              = mysqli_query($kon,$sql);
$data           = mysqli_fetch_assoc($q);
$nama_penerima           = $data['nama_penerima'];
$jml_tanggungan       = $data['jml_tanggungan'];
$kpl_rumah_tangga            = $data ['kpl_rumah_tangga'];
$anak_usia_dini             = $data['anak_usia_dini'];
$anak_sekolah             = $data ['anak_sekolah'];
$jenis_lantai       = $data['jenis_lantai'];
$jml_penghasilan       = $data['jml_penghasilan'];
$stts_kepemilikan_rumah       = $data['stts_kepemilikan_rumah'];
$status_pkh        = $data['status_pkh'];
$id_training            = $data['id_training'];

 }


 if(isset($_POST['update'])){
   $query = 'UPDATE `tbl_training` SET `nama_penerima` = "'.$_POST['nama_penerima'].'", `jml_tanggungan` = "'.$_POST['jml_tanggungan'].'", `kpl_rumah_tangga` = "'.$_POST['kpl_rumah_tangga'].'", `anak_usia_dini` = "'.$_POST['anak_usia_dini'].'", `anak_sekolah` = "'.$_POST['anak_sekolah'].'", `jenis_lantai` = "'.$_POST['jenis_lantai'].'",`jml_penghasilan` = "'.$_POST['jml_penghasilan'].'", `stts_kepemilikan_rumah` = "'.$_POST['stts_kepemilikan_rumah'].'", `status_pkh` = "'.$_POST['status_pkh'].'"  WHERE `tbl_training`.`id_training` = '.$_GET['id_training'].';';
   $a =  mysqli_query($kon,$query);
   echo"<script>alert('Data Berstatus_pkh Diperbarui');document.location.href='index.php?id=1';</script>";
  //  return;
}
?>



<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Form Input Data Rekomendasi status_pkh Laboratorium Komputer</h3> -->
              <form action="" method="post">
              <div class="box-tools">
                <br>

                <input type="hidden" value="<?php echo $data['id_training'];?>" required class="form-control" name="id_training">


                <div>
                <label>Nama Penerima</label>
                <input type="text" value="<?php echo $data['nama_penerima'];?>" required class="form-control" name="nama_penerima" >
                </div>
                <br>
                <label>Jumlah Tanggungan</label>
                <select class="form-control select2" name="jml_tanggungan" style="width: 100%;">
                  <option value="<?php echo $data['jml_tanggungan'];?>"><?php echo $data['jml_tanggungan'];?></option>
                  <option></option>
                    <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="3+">3+</option>
                </select>
                <br> 
                <label>Kepala Rumah Tangga</label>
                <select class="form-control select2" name="kpl_rumah_tangga" style="width: 100%;">
                  <option value="<?php echo $data['kpl_rumah_tangga'];?>"><?php echo $data['kpl_rumah_tangga'];?></option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <br>
                <label>Anak Usia Dini</label>
                <select class="form-control select2" name="anak_usia_dini" style="width: 100%;">
                  <option value="<?php echo $data['anak_usia_dini'];?>"><?php echo $data['anak_usia_dini'];?></option>
                  <option value="Ada">Ada</option>
                  <option value="Tidak">Tidak</option>
                </select>
                <br>
                <label>Anak Sekolah</label>
                <select class="form-control select2" name="anak_sekolah" style="width: 100%;">
                  <option value="<?php echo $data['anak_sekolah'];?>"><?php echo $data['anak_sekolah'];?></option>
                  <option value="Ada">Ada</option>
                  <option value="Tidak">Tidak</option>
                </select>
                <br>
                <label>Jenis Lantai</label>
                <select class="form-control select2" name="jenis_lantai" style="width: 100%;">
                  <option value="<?php echo $data['jenis_lantai'];?>"><?php echo $data['jenis_lantai'];?></option>
                  <option value="Kermaik">Keramik</option>
                  <option value="Semen">Semen</option>
                  <option value="Tanah">Tanah</option>
                </select>
                <br>
                <label>jml_penghasilan</label>
                <select class="form-control select2" name="jml_penghasilan" style="width: 100%;">
                  <option value="<?php echo $data['jml_penghasilan'];?>"><?php echo $data['jml_penghasilan'];?></option>
                  <option value="Rendah">Rendah <=2.000.000</option>
                  <option value="Sedang">Sedang >2.500.000</option>
                  <option value="Tinggi">Tinggi >3.500.000</option>
                </select>
                <br>
                <label>stts_kepemilikan_rumah</label>
                <select class="form-control select2" name="stts_kepemilikan_rumah" style="width: 100%;">
                  <option value="<?php echo $data['stts_kepemilikan_rumah'];?>"><?php echo $data['stts_kepemilikan_rumah'];?></option>
                  <option value="Milik sendiri">Milik Sendiri</option>
                  <option value="Sewa">Sewa</option>
                  <option value="Bebas Sewa">Bebas Sewa</option>
                </select>
                <br>
                <label>status_pkh</label>
                <select class="form-control select2" name="status_pkh" style="width: 100%;">
                  <option value="<?php echo $data['status_pkh'];?>"><?php echo $data['status_pkh'];?></option>
                  <option value="PENERIMA">PENERIMA</option>
                  <option value="BUKAN">BUKAN</option>
                </select>
              </div>
              <br>
              <button type="submit" name="update" class="btn btn-info pull-right" style="width: 100%;height: 40px;">Ubah Data</button>
              <br>