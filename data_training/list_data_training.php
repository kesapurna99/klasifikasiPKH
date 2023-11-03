<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
          <!--  <a href="index.php?id=2" class="btn btn-primary">Input Data Training</a> -->
           <a href="index.php?id=16" class="btn btn-primary">Upload Data Training</a><br><br>
            <br>
              <body>

            <div class="box-body table-responsive no-padding">
            <table class="table table-hover table4">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jumlah Tanggungan</th>
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
					$a="select * from tbl_training where nama_penerima like '%".$_POST['nama_penerima']."%'";
					$b=mysqli_query($kon,$a);
					$no=1;
					while($data=mysqli_fetch_object($b))
					{
            if($data->status_pkh=="PENERIMA"){
              $label = '<small class="label label-success"> '.$data->status_pkh.'</small>';
            
            }else{
              $label = '<small class="label label-danger">'.$data->status_pkh.'</small>';
			
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
            <td width="30px">
              <div style="width:80px">
                <a href="index.php?id=10&type=edit&id_training=<?php echo $data->id_training; ?>" class=""><i class="fas fa-pen-square"></i> </a> &nbsp;&nbsp;&nbsp;
                <a href="index.php?id=11&type=hapus&id_training=<?php echo $data->id_training; ?>" onclick="return confirm('Yakin Ingin Menghapus?');" class=""><i class="far fa-trash-alt"></i></a>
              </div>
            </td>
					</tr>
          
				<?php
					$no++; }
				?>   
        </tbody>
     </table>

            
  

