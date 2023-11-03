
    
   <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-tittle" id="exampleModalLabel">Masukan Data Calon Asisten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php $c = array("jml_tanggungan", "kpl_rumah_tangga", "anak_usia_dini", "anak_sekolah", "jenis_lantai","jml_penghasilan","stts_kepemilikan_rumah"); ?>
          <form action ="" method="post">
            <div class="modal-body">
              <?php foreach ($c as $c) { ?>
                <div class="form-group row">
                  <label for="<?= $c ?>" class="col-sm-2 col-form-label"><?= strtoupper($c) ?></label>
                    <div class="col-sm-10">
                      <select name="<?= $c ?>" id="<?= $c ?>" class="form-control">
                        <option value="">Pilih <?= strtoupper($c) ?></option>
                          <?php 
                            foreach (c($c) as $nilai) { ?>
                              <option value="<?= $nilai[$c] ?>"><?= $nilai[$c] ?></option>
                            <?php } ?>
                      </select>
                    </div>
                  </div>
              <?php } ?>
             </div>
           </form>  -->
             
               

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <a href="index.php?id=13" class="btn btn-primary">Input Prediksi Data Lama Asisten</a><br>
            <br>
              <body>
                 <!-- <a href="index.php?id=3" class="btn btn-primary" >INPUT DATA CALON ASISTEN</a>
                    <div class="col">
                    <?php
                        if (isset($_post["submit"])){
                          $id_hasil = $_post['id_hasil'];
                          $nama_penerima = $_post['nama_penerima'];
                          $jml_tanggungan = $_post['jml_tanggungan'];
                          $kpl_rumah_tangga = $_post['kpl_rumah_tangga'];
                          $anak_usia_dini = $_post['anak_usia_dini'];
                          $anak_sekolah = $_post['anak_sekolah'];
                          $jenis_lantai = $_post['jenis_lantai'];
                          $jml_penghasilan = $_post['jml_penghasilan'];
                          $stts_kepemilikan_rumah = $_post['stts_kepemilikan_rumah'];
                        ?>
                          <br>
                          <h4>DATA CALON ASISTEN LABORATORIUM</h4>
                          <table border="5" class="table table-hover">
                          <thead class="bg-secondary text-white">
                            <tr>
                              <th>NPM</th>
                              <th>nama_penerima</th>
                              <th>Presensi</th>
                              <th>IPK</th>
                              <th>A1</th>
                              <th>A2</th>
                              <th>Semester</th>
                              <th>Asisten</th>
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
                              <td>?</td>
                            </tr>
                          </tbody>
                          </table>
                          
                        <?php } ?> -->
            <div class="box-body table-responsive no-padding">
            <table class="table table-hover table4">
              <thead>
                <tr>
                <th>No</th>
                  <th>Nama Penerima</th>
                  <th>Jumlah tanggungan</th>
                  <th>Kepala Rumah Tangga</th>
                  <th>Anak Usia Dini</th>
                  <th>Anak Sekolah</th>
                  <th>Jenis Lantai</th>
                  <th>Jumlah Penghasilan</th>
                  <th>Status Kepemilikan Rumah</th>
                  <th>Status PKH</th>
                  <th>Action</th>
                </tr> 
                </thead>
                <tbody>
                <?php
					$a="select * from tbl_hasil where nama_penerima like '%".$_POST['nama_penerima']."%'";
					$b=mysqli_query($kon,$a);
					$no=1;
					while($data=mysqli_fetch_object($b))
					{
            if($data->status_pkh=="PENERIMA"){
              $label = '<small class="label label-success"><i class="fa fa-fw fa-check-square"></i> '.$data->status_pkh.'</small>';
            
            }else{
              $label = '<small class="label label-danger"><i class="fa fa-fw fa-close"></i> '.$data->status_pkh.'</small>';
			
            }
				?>
        
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data->nama_penerima; ?></td>
            <td><?php echo $data->jml_tanggungan; ?></td>
						<td><?php echo $data->kpl_rumah_tangga; ?></td>
            <td><?php echo $data->anak_usia_dini; ?></td>
						<td><?php echo $data->anak_sekolah; ?></td>
            <td><?php echo $data->jenis_lantai; ?></td>
            <td><?php echo $data->jml_penghasilan; ?></td>
            <td><?php echo $data->stts_kepemilikan_rumah; ?></td>
						<td><?php echo $label; ?></td>
            <td><a href="index.php?id=15&id_hasil=<?php echo $data->id_hasil; ?>" onclick="return simulasi()" class="btn btn-info">Pilih</a></td>
					</tr>
          
				<?php
					$no++; }
				?>   
        </tbody>
     </table>

            
  

