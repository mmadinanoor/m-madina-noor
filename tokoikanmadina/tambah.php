<?php
include("header.php");
if(isset($_POST["tambah"])){
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $desc = $_POST["desc"];
    $img = $_POST["img"];
    mysqli_query($conn, "INSERT INTO ikan (nama, harga, deskripsi, img) VALUES ('$nama', $harga, '$desc', '$img')");
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
                                            <form method="POST" autocomplete="off">
                                                <div class="my-3">
                                                    <label for="nama" class="form-label">Nama Ikan</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="my-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <div class="bg-white text-center">
                                                        <img hidden id="tampilanImg" width="300px" height="300px" src="<?=$dt['img']?>" alt="">
                                                        <input type="file" class="form-control" id="gambar">
                                                    </div>
                                                    <input type="hidden" id="urlGambar" name="img">
                                                </div>
                                                <div class="my-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Angka Tanpa Titik" required>
                                                </div>
                                                <div class="my-3">
                                                    <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                                                    <input type="text" class="form-control" id="desc" name="desc">
                                                </div>
                                                <button type="submit" name="tambah" class="btn btn-primary my-3">Submit</button>
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
        $('#tampilanImg').removeAttr("hidden");
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