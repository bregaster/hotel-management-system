<?php
    require_once('db.php');
    $sql = "SELECT * FROM kota WHERE kode_negara='$_POST[negara]'";
    $result = mysqli_query( $con, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<option value='$row[kode_kota]'>$row[nama_kota]</option>";
    }
?>

