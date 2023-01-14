<?php
include("header.php");
//$_SESSION['keranjang_ikan'] = array();
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
									<?php endforeach ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<a href="checkout.php" rel="nofollow" class="main-btn btn-success">Checkout</a>
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