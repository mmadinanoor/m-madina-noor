<?php
include("header.php");
$dt = [];

if(isset($_POST["edit"])){
    $id = $_GET["id"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $desc = $_POST["desc"];
    $img = $_POST["img"];
    $setImg = "";
    if(!empty($img)){
        $setImg = ", img = '$img'";
    }
    mysqli_query($conn, "UPDATE ikan SET nama = '$nama', harga = $harga, deskripsi = '$desc' $setImg WHERE id = $id");
    echo "<script>window.location.href = 'ikan.php'</script>";
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * FROM ikan WHERE id = $id");
    $dt = mysqli_fetch_array($res);
    if(!isset($dt)){
        echo "<script>window.location.href = 'ikan.php'</script>";
    }
}else{
    echo "<script>window.location.href = 'ikan.php'</script>";
}
?>

	<!--====== BANNER PART START ======-->
	<section class="banner-area bg_cover">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="banner-content">
						<h1 class="text-white">Toko Ikan Madina</h1>
						<nav aria-label="breadcrumb">
							<a class="text-light">Murah meriah mantap</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== BANNER PART END ======-->


	<!--====== CATEGORY PART START ======-->
	<section class="category-area pb-110">
		<div class="container">

			<!-- category wrapper -->
			<div class="category-wrapper">
				<div class="row">

					<!-- left-wrapper  -->
					<div class="col">
						<div class="left-wrapper">
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
									<div class="row">
                                        <div class="bg-secondary text-light rounded">
                                            <form method="POST" action="edit.php?id=<?=$id?>" autocomplete="off">
                                                <div class="my-3">
                                                    <label for="nama" class="form-label">Nama Ikan</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?=$dt['nama']?>" required>
                                                </div>
                                                <div class="my-3">
                                                    <label for="gambar" class="form-label">Gambar (Opsional)</label>
                                                    <div class="bg-white text-center">
                                                        <img id="tampilanImg" width="300px" height="300px" src="<?=$dt['img']?>" alt="">
                                                        <input type="file" class="form-control" id="gambar">
                                                    </div>
                                                    <input type="hidden" id="urlGambar" name="img">
                                                </div>
                                                <div class="my-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga" value="<?=$dt['harga']?>" placeholder="Masukkan Angka Tanpa Titik" required>
                                                </div>
                                                <div class="my-3">
                                                    <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                                                    <input type="text" class="form-control" id="desc" name="desc" value="<?=$dt['deskripsi']?>">
                                                </div>
                                                <button type="submit" name="edit" class="btn btn-primary my-3">Submit</button>
                                            </form>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== CATEGORY PART END ======-->


	<script>
    const convertBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(file);

            fileReader.onload = () => {
                resolve(fileReader.result);
            };

            fileReader.onerror = (error) => {
                reject(error);
            };
        });
    };

    const getUrl = async (event) => {
        const file = event.target.files[0];
        const base64 = await convertBase64(file);
        $('#tampilanImg').attr("src", base64);
        $('#urlGambar').val(base64); 
    };

    $('#gambar').change(function(e){
        getUrl(e)
    })
	</script>
<?php
include("footer.php");
?>