<?php
session_start();
ob_start();
include'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>admin site</title>
</head>
<body>
<h1>Site configuration</h1>
<!------------- Ganti Judul ---------------->
<?php
$sql = mysql_query("SELECT * FROM jc_setting WHERE set_id=1");
if(mysql_num_rows($sql) != 0){
    while($data = mysql_fetch_assoc($sql)){
        echo '<b>Site Name:</b> '.$data['set_content'].'';
    }
}
?> <a href="admin.php?aksi=edit&id=1">Edit</a><br>
<?php    
//edit judul
    if(@$_GET['aksi'] == "edit"){
        $id = abs((int)$_GET['id']);
        $get = mysql_query("SELECT * FROM jc_setting WHERE set_id='$id'");
        $dataGet = mysql_fetch_assoc($get);
         
        if(@$_POST['save-judul']){
            $Title  = $_POST['judul'];
             
            if($Title){
                $up = mysql_query("UPDATE jc_setting SET set_content='$Title' WHERE set_id='1'");
                if($up){
                    echo '<script language="javascript">alert("Data Successfully Saved!"); document.location="admin.php?aksi=edit&id=1";</script>';
                }else{
                    echo '<div class="error">ERROR: Fail to Save Data.</div>';
                }
            }else{
                echo '<div class="error">ERROR: Enter your new site name.</div>';
            }
        }
         
        echo '<form action="" method="post">';
        echo '<h3>Change Site Name</h3>';
        echo '<p>New Site Name:<br /><input type="text" name="judul" placeholder="Masukan Judul Web Anda Yang Baru" /></p>';
        echo '<input type="submit" name="save-judul" value="save" />';
        echo '</form>';
    }?>
     
<!------------- Ganti Deskripsi ---------------->
<hr style="margin-top:20px;"><?php
$sql = mysql_query("SELECT * FROM jc_setting WHERE set_id=2 ORDER BY set_content ASC");
if(mysql_num_rows($sql) != 0){
    while($data = mysql_fetch_assoc($sql)){
        echo '<b>Web Description:</b> '.$data['set_content'].'';
    }
}
?> <a href="admin.php?aksi=edit&id=2">Edit</a><br>
<?php    
//edit deskripsi
    if(@$_GET['aksi'] == "edit"){
        $id = abs((int)$_GET['id']);
        $get = mysql_query("SELECT * FROM jc_setting WHERE set_id='2'");
        $dataGet = mysql_fetch_assoc($get);
         
        if(@$_POST['save-desc']){
            $Description    = $_POST['deskripsi'];
             
            if($Description){
                $up = mysql_query("UPDATE jc_setting SET set_content='$Description' WHERE set_id='2'");
                if($up){
                    echo '<script language="javascript">alert("Data Has Been Saved."); document.location="admin.php?aksi=edit&id=2";</script>';
                }else{
                    echo '<div class="error">ERROR: Failed to Save Data.</div>';
                }
            }else{
                echo '<div class="error">ERROR: Enter Your Site Description.</div>';
            }
        }
         
        echo '<form action="" method="post">';
        echo '<h3>Change Web Description</h3>';
        echo '<p>Web Description:<br /><input type="text" name="deskripsi" placeholder="Masukan Deskripsi Web Anda Yang Baru" /></p>';
        echo '<input type="submit" name="save-desc" value="save" />';
        echo '</form>';
    }?>
        <div class="clear"></div>
 
</body>
</html>