<?php
   $error=false;
if(isset($_POST['simpan']))
{

  $nama_penerima = $_POST['nama_penerima'];

  $kpl_rumah_tangga = $_POST['kpl_rumah_tangga'];
  $id_baru = "";

  if($nama_penerima=="" ||$kpl_rumah_tangga==""){
    $error=true;
  }else{
    $a="INSERT INTO tbl_training values ('".$id_baru."','".$_POST['nama_penerima']."','".$_POST['jml_tanggungan']."','".$_POST['kpl_rumah_tangga']."','".$_POST['anak_usia_dini']."','".$_POST['anak_sekolah']."','".$_POST['jenis_lantai']."','".$_POST['jml_penghasilan']."','".$_POST['stts_kepemilikan_rumah']."','".$_POST['status_pkh']."')";
    $b=mysqli_query($kon,$a);
    if($b){
      echo"<script>alert('Berhasil menyimpan');document.location.href='index.php?id=1';</script>";
    }
    else{
      echo"<script>alert('Gagal menyimpan');document.location.href='index.php?id=1';</script>";
    }
  }
}
?>
<?php if($error==true){
?>
<div class="callout callout-danger">
          <h4>Informasi!</h4>

          <p>Mohon Isi semua data</p>
        </div>
<?php
}else{ ?>
<div class="callout callout-info">
          <h4>Informasi!</h4>

          <p>Silahkan Lakukan Pengisian Data Lama status_pkh</p>
        </div>
<?php
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
                <label>Nama Penerima</label>
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
                  <option value="Kermaik">Keramik</option>
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
                <br>
                <label>status_pkh</label>
                <select class="form-control select2" name="status_pkh" style="width: 100%;">
                  <option></option>
                  <option value="PENERIMA">PENERIMA</option>
                  <option value="BUKAN">BUKAN</option>
                </select>
              </div>
              <br>
              <button type="submit" name="simpan" class="btn btn-info pull-right" style="width: 100%;height: 40px;">Simpan Data</button>
              <br>