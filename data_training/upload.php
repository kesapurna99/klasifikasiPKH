<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Form Input Data Rekomendasi Asisten Laboratorium Komputer</h3> -->
              <form action="import_excel.php" method="POST" enctype="multipart/form-data" >
              <div class="box-tools">
                <br>
                <div>
                <label>Masukan File</label>
                <input type="file" name="namafile" class="form-control">
                </div>
                <br>
              </div>
              <br>
              <button type="submit" name="upload" value="upload" class="btn btn-info pull-right" style="width: 100%;height: 40px;">Simpan Data</button>
              <br>