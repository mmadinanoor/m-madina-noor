<?php
include("header.php");
if(isset($_POST["bayar"])){
	$_SESSION['keranjang_ikan'] = array();
	$_SESSION['sudah_bayar'] = true;
}
if(empty($_SESSION['keranjang_ikan'])){
    echo "<script>window.location.href = 'store.php'</script>";
}
$keranjang = $_SESSION['keranjang_ikan'];
$result = mysqli_query($conn, "SELECT * FROM ikan");
$arr = [];
while($row = mysqli_fetch_array($result)){
    $arr[$row["id"]] = $row;
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
									<?php $total = 0 ?>
									<?php foreach($keranjang as $id=>$jml): ?>
										<div class="col-lg-6 col-md-6">
											<div class="single-product">
												<div class="product-img">
													<a>
														<img height="400px" src="<?=$arr[$id]["img"]?>" alt="">
													</a>
												</div>
									
												<div class="product-content">
													<h3 class="name"><a href="product-details.html"><?=$arr[$id]["nama"]?></a></h3>
													<?php if($arr[$id]["deskripsi"] != ""): ?>
														<ul class="address">
															<li>
																<span><i class="lni lni-information"></i> <?=$arr[$id]["deskripsi"]?></span>
															</li>
														</ul>
													<?php endif ?>
													<div class="product-bottom">
														<h3 class="price">Rp. <?=str_replace(",",".",number_format($arr[$id]["harga"]))?> x <?=$jml?></h3>
                                                        <div class="">
                                                            <button class="btn btn-success keranjang-edit" ikan-id="<?=$id?>" ikan-jml="<?=$jml?>">Edit</button>
                                                            <button class="btn btn-danger keranjang-hapus" ikan-id="<?=$id?>" ikan-jml="<?=$jml?>">Hapus</button>
                                                        </div>
													</div>
                                                    <h3 class="text-primary">Rp. <?=str_replace(",",".",number_format($arr[$id]["harga"] * $jml))?></h3>
												</div>
											</div>
										</div>
									<?php $total += $arr[$id]["harga"] * $jml?>
									<?php endforeach ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="bg-light rounded">
						<form method="post">
							<div class="row">
								<div class="col">
									<div class="flex justify-center flex-col pt-3">
										<label class="text-xs">Nama</label>
										<input type="text" class="focus:outline-none bg-gray-800 placeholder-gray-300 text-sm border-b border-gray-600 py-4" name="nama" placeholder="Masukkan Nama Anda" required>
									</div>
									<div class="flex justify-center flex-col pt-3">
										<label class="text-xs">Nomor Telepon</label>
										<input type="text" class="focus:outline-none bg-gray-800 placeholder-gray-300 text-sm border-b border-gray-600 py-4" name="notelp" placeholder="Masukkan Nomor Telepon" required>
									</div>
									<div class="flex justify-center flex-col pt-3">
										<label class="text-xs">Alamat Lengkap</label>
										<input type="text" class="focus:outline-none bg-gray-800 placeholder-gray-300 text-sm border-b border-gray-600 py-4" name="alamat" placeholder="Masukkan Alamat Lengkap" required>
									</div>
									<div class="flex justify-center flex-col pt-3">
										<label class="text-xs">Kode Pos</label>
										<input type="number" class="focus:outline-none bg-gray-800 placeholder-gray-300 text-sm border-b border-gray-600 py-4" name="kodepos" placeholder="Masukkan Kode Pos" required>
									</div>
								</div>
								<div class="col">
									<div class="row pl-5">
										<div class="col">
											<div class="my-4">
												<h4>Total</h4>
											</div>
											<div class="my-4">
												<h4>Metode Pembayaran</h4>
											</div>
										</div>
										<div class="col">
											<div class="my-4">
												<h4>: Rp. <?=str_replace(",",".",number_format($total))?></h4>
											</div>
											<div class="my-4">
												<div class="mx-2">
													<input type="radio" class="btn-check" name="payment" value="gopay" id="gopay" checked>
													<label class="btn btn-light" for="gopay">
														<img src="assets/images/payments/gopay.png" alt="GoPay" style="width: 50px; height: 50px;">
													</label>
													<input type="radio" class="btn-check" name="payment" value="shopeepay" id="shopeepay">
													<label class="btn btn-light" for="shopeepay">
														<img src="assets/images/payments/shopeepay.png" alt="ShopeePay" style="width: 50px; height: 50px;">
													</label>
													<input type="radio" class="btn-check" name="payment" value="dana" id="dana">
													<label class="btn btn-light" for="dana">
														<img src="assets/images/payments/dana.jpg" alt="DANA" style="width: 50px; height: 50px;">
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="text-center">
										<input type="submit" name="bayar" rel="nofollow" class="main-btn btn-success w-75 p-3 mt-4" id="bayar" value="Bayar">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== CATEGORY PART END ======-->

	<!-- Modal -->
	<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Jumlah</h5>
					<button type="button" class="btn-close lni lni-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary" id="edit">Edit</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
					<button type="button" class="btn-close lni lni-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-danger" id="hapus">Hapus</button>
				</div>
			</div>
		</div>
	</div>

	<script>
	$('.keranjang-edit').click(function (e) {
		$('#modalEdit .modal-body').html('<input min="1" style="border: 3px solid #ccc;" type="number" name="" value="'+$(this).attr("ikan-jml")+'" id="ikan_jml"><input type="hidden" id="ikan_id" value="'+$(this).attr("ikan-id")+'">');
        $('#modalEdit').modal('show');
	});

	$('.keranjang-hapus').click(function (e) {
		$('#modalHapus .modal-body').html('Apakah anda yakin ingin menghapus?<input type="hidden" id="ikan_id" value="'+$(this).attr("ikan-id")+'">');
		$('#modalHapus').modal('show');
	});

	$('#edit').click(function (e) {
		$('#modalEdit .modal-title').html("Informasi Pembelian")
		var ikan_id = $("#ikan_id").val()
		var ikan_jml = $("#ikan_jml").val()
		$('#modalEdit .modal-body').html('Berhasil diedit')
		$(this).attr("data-dismiss", "modal")
		$(this).text("OK")
		setTimeout(function(){
			window.location = "keranjang_add.php?to=keranjang&id="+ikan_id+"&jml="+ikan_jml
		},1000)
	});

    $('#hapus').click(function (e) {
		$('#modalHapus .modal-title').html("Informasi Pembelian")
		var ikan_id = $("#ikan_id").val()
		$('#modalHapus .modal-body').html('Berhasil dihapus')
		$(this).attr("data-dismiss", "modal")
		$(this).text("OK")
		setTimeout(function(){
			window.location = "keranjang_hapus.php?id="+ikan_id
		},1000)
	});
	</script>
<?php
include("footer.php");
?>