<?php
include("header.php");
$bayar = false;
if(@$_SESSION['sudah_bayar'] == true){
	unset($_SESSION["sudah_bayar"]);
	$bayar = true;
}
$result = mysqli_query($conn, "SELECT * FROM ikan");
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
									<?php while($row = mysqli_fetch_assoc($result)): ?>
										<div class="col-lg-6 col-md-6">
											<div class="single-product">
												<div class="product-img">
													<a>
														<img height="400px" src="<?=$row["img"]?>" alt="">
													</a>
													<div class="product-action">
														<a href="javascript:void(0)" class="share"><i class="lni lni-heart"></i></a>
													</div>
												</div>
									
												<div class="product-content">
													<h3 class="name"><a href="product-details.html"><?=$row["nama"]?></a></h3>
													<?php if($row["deskripsi"] != ""): ?>
														<ul class="address">
															<li>
																<span><i class="lni lni-information"></i> <?=$row["deskripsi"]?></span>
															</li>
														</ul>
													<?php endif ?>
													<div class="product-bottom">
														<h3 class="price">Rp. <?=str_replace(",",".",number_format($row["harga"]))?></h3>
														<a class="link-ad beliikan" ikan-id="<?=$row["id"]?>"
														ikan-nama="<?=$row['nama']?>" ikan-price="<?=$row['harga']?>"><i class="lni lni-cart"></i> Beli</a>
													</div>
												</div>
											</div>
										</div>
									<?php endwhile ?>
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

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Jumlah Pembelian</h5>
					<button type="button" class="btn-close lni lni-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary" id="beli">Beli</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Informasi Pembayaran</h5>
					<button type="button" class="btn-close lni lni-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Pembayaran berhasil, Ikan segera dikirim.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>

	<script>
	$('a.beliikan').click(function (e) {
		$('.modal-body').html('<input min="1" style="border: 3px solid #ccc;" type="number" name="" value="1" id="ikan_jml"><input type="hidden" id="ikan_id" value="'+$(this).attr("ikan-id")+'">');
		$('#exampleModal').modal('show');
	});

	$('#beli').click(function (e) {
		$('.modal-title').html("Informasi Pembelian")
		var ikan_id = $("#ikan_id").val()
		var ikan_jml = $("#ikan_jml").val()
		$('.modal-body').html('Ikan ditambahkan ke keranjang')
		$(this).attr("data-dismiss", "modal")
		$(this).text("OK")
		setTimeout(function(){
			window.location = "keranjang_add.php?id="+ikan_id+"&jml="+ikan_jml
		},1000)
	});

	<?php if($bayar): ?>
		$(function(){
			$('#modalBayar').modal('show');
		});
	<?php endif ?>

	</script>
<?php
include("footer.php");
?>