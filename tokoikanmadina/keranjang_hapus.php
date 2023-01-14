<?php
include("header.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    //var_dump($_SESSION["keranjang_ikan"][$id]);
    // return;
    unset($_SESSION["keranjang_ikan"][$id]);
    echo "<script>window.location.href = 'keranjang.php'</script>";
    
}else{
    var_dump($_SESSION["keranjang_ikan"]);
    //echo "<script>window.location.href = 'keranjang.php'</script>";
}