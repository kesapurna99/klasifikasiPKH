<?php
 $nama = "";
 $presensi = "";
 $ipk = "";
 $a1 = "";
 $a2 = "";
 $semester = "";
 $asisten = "";

 if($_GET['type'] == 'hapus'){
    $sql    = "delete from tbl_data_lama where npm = ".$_GET['npm'];
    $q      = mysqli_query($kon,$sql); 
    echo"<script>alert('Data Berhasil Dihapus');document.location.href='index.php?id=1';</script>";
}
 ?>