<?php
    include ('koneksi.php');
    require_once  ('excel_reader2.php');
    
    if ($_POST['upload'] == "upload") {
        $type         =explode(".",$_FILES['namafile']['name']);
        
        if (empty($_FILES['namafile']['name'])) {
            ?>
                <script language="JavaScript">
                    alert('Oops! Please fill all / select file ...');
                    document.location='./';
                </script>
            <?php
        }
        else if(strtolower(end($type)) !='xls'){
            ?>
                <script language="JavaScript">
                    alert('Oops! Please upload only Excel XLS file ...');
                    
                </script>
            <?php
        }
        
        else{
        $target = basename($_FILES['namafile']['name']) ;
        move_uploaded_file($_FILES['namafile']['tmp_name'], $target);
    
        $data    =new Spreadsheet_Excel_Reader($_FILES['namafile']['name'],false);
    
        $baris = $data->rowcount($sheet_index=0);
    
        for ($i=2; $i<=$baris; $i++){
            $id_baru        =$data->val($i, 1);
            $nama_penerima    =$data->val($i, 2);
            $jml_tanggungan    =$data->val($i, 3);
            $kpl_rumah_tangga        =$data->val($i, 4);
            $anak_usia_dini    =$data->val($i, 5);
            $anak_sekolah    =$data->val($i, 6);
            $jenis_lantai        =$data->val($i, 7);
            $jml_penghasilan    =$data->val($i, 8);
            $stts_kepemilikan_rumah    =$data->val($i, 9);
            $status_pkh    =$data->val($i, 10);

            
            $a =  mysqli_query ($kon, "INSERT INTO tbl_training (id_training,nama_penerima,jml_tanggungan,kpl_rumah_tangga,anak_usia_dini,anak_sekolah,jenis_lantai,jml_penghasilan,stts_kepemilikan_rumah,status_pkh) values ('".$id_baru."','".$nama_penerima."','".$jml_tanggungan."','".$kpl_rumah_tangga."','".$anak_usia_dini."','".$anak_sekolah."','".$jenis_lantai."','".$jml_penghasilan."','".$stts_kepemilikan_rumah."','".$status_pkh."')");       
        }
    
            if($a){
                ?>
                  <script language="JavaScript">
                        alert('Good! Import Excel XLS file success...');
                        document.location='./';
                    </script>
                <?php
            }
            else{
                ?>
                  <script language="JavaScript">
                        alert('<b>Oops!</b> 404 Error Server.');
                        document.location='./';
                    </script>
                    
                <?php
            }
        unlink($_FILES['namafile']['name']);
        }
    }
?>