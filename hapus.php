<?php
include('config.php');

if($_GET['id'] != ''){  // Jika Request ID tidak = kosong maka lakukan proses
    
    $hpus_sql = 'delete from karyawan where id='.$_GET['id']; // SQL untuk hapus data berdasarkan ID
    $hpus_que = mysql_query($hpus_sql);
    if($hpus_que){
        echo'Data dengan ID '.$_GET['id'].' Telah Dihapus! <a href="index.php">KEMBALI</a>';    // Tampilkan Pesan
    }
}
