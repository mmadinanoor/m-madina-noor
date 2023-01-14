<?php
include("header.php");
if(isset($_GET["id"])){
    if(isset($_GET["jml"])){
        $id = $_GET["id"];
        $jml = $_GET["jml"];
        $_SESSION['keranjang_ikan'][$id] = $jml;
        if(isset($_GET["to"])){
            echo "<script>window.location.href = '".$_GET["to"].".php'</script>";
        }else{
            echo "<script>window.location.href = 'store.php'</script>";
        }
    }else{
        echo "Jumlah Ikan tidak ada";
        echo "<script>window.location.href = 'store.php'</script>";
    }
}else{
    echo "ID Ikan tidak ada";
    echo "<script>window.location.href = 'store.php'</script>";
}