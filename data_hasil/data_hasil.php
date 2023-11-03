
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <br>
              <body>
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
                  <th>Status Kelayakan</th>
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
              $label = '<small class="label label-success">LAYAK</small>';
            
            }else{
              $label = '<small class="label label-danger">TIDAK</small>';
			
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

            
  

