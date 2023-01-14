<?php
include("header.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM ikan WHERE id = $id");
    echo "<script>window.location.href = 'ikan.php'</script>";
}else{
    echo "<script>window.location.href = 'ikan.php'</script>";
}