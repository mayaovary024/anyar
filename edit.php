
<?php
include('config.php'); // Include file config.php

if($_POST['simpan']=='SIMPAN'){  // Jike Request POST di terima

    // Query SQL untuk Update Data
    $simpan_sql = "UPDATE karyawan SET nama = '".$_POST['nama']."', jabatan = '".$_POST['jabatan']."', umur = ".$_POST['umur']." WHERE id = ".$_POST['id']; 
    $simpan_que = mysql_query($simpan_sql);

    if($simpan_que){  // Jika Update Sukses maka tampilkan pesan.
        echo'UPDATE SUKSES!!!';
    }
    else{  // Jika Update Gagal maka tampilkan pesan.
        echo'GAGAL UPDATE!!';    
    }
}

if($_GET['id'] !=''){ // Jika Request GET di terima
    // Nah disini sekalian sebagai fungsi untuk menampilkan data yang akan di Edit
    $edit_sql = 'select * from siswa where id='.$_GET['id'];  ////SQL QUERY untuk mengambil data berdasarkan ID
    $edit_que = mysql_query($edit_sql);
    $edit = mysql_fetch_array($edit_que);    
}
?>
<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td width="56" >ID</td>
    <td width="128" ><input type="text" name="id" value="<?php echo $edit['id'];  //Menampilkan value database dari kolom ID ?>" readonly="readonly"></td>
  </tr>
  <tr>
    <td width="56" >nama</td>
    <td width="128" ><input type="text" name="nama" value="<?php echo $edit['nama'];  //Menampilkan value database dari kolom nama ?>"></td>
  </tr>
  <tr>
    <td>umur</td>
    <td><input type="text" name="umur" value="<?php echo $edit['umur']; //Menampilkan value database dari kolom umur  ?>"></td>
  </tr>
  <tr>
    <td>kelas</td>
    <td><input type="text" name="kelas" value="<?php echo $edit['jabatan']; //Menampilkan value database dari kolom kelas ?>"></td>
  </tr>
</table>
<input type="submit" name="simpan" value="SIMPAN">
</form>

<a href="index.php">KEMBALI</a>