:
<?php

include('koneksi.php');  

if($_POST['tambah']=='TAMBAH')
{
    $tmbh_sql = 'INSERT INTO karyawan (id,nama,umur,kelas) VALUES (null, "'.$_POST['nama'].'", '.$_POST['umur'].' , "'.$_POST['kelas'].'")';
    $tmbh_que = mysql_query($tmbh_sql);
    
    if($tmbh_que){
        echo'TAMBAH DATA BERHASIL!!';    
    }
    else{
        echo'GAGAL TAMBAH DATA!!';    
    }
}
?>

<html>
<head>
<title>coba saja</title>
</head>

<body>
<table width="885" height="55" border="1">
  <tr>
    <th width="48" scope="col">ID</th>
    <th width="200" scope="col">NAMA</th>
    <th width="161" scope="col">UMUR</th>
    <th width="221" scope="col">KELAS</th>
    <th width="221" scope="col">AKSI</th>
  </tr>
  
<?php
    $data_sql = 'select * from siswa';
    $data_que = mysql_query($data_sql);
    // Fungsi While di bawah adalah proses penampilan data yang di ambil dari database.
    while($data = mysql_fetch_array($data_que)){
        echo'<tr>
    <td>'.$data['id'].'</td>
    <td>'.$data['nama'].'</td>
    <td>'.$data['umur'].'</td>
    <td>'.$data['kelas'].'</td>
    <td><a href="hapus.php?id='.$data['id'].'">HAPUS</a> - <a href="edit.php?id='.$data['id'].'">EDIT</a> </td>
  </tr>';
            
    }
?>
  
</table><br />
<form action="" method="post">
Nama : <input type="text" name="nama"  /><br />
Umur : <input type="text" name="umur"  /><br />
Kelas : <input type="text" name="kelas" /><br />
<input type="submit" name="tambah" value="TAMBAH" />
</form>
</body>
</html>