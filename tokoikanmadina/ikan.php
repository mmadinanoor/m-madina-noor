<?php
include("header.php");
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
													<a href="beli.php?id=<?=$row["id"]?>">
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
														<div class="">
                                                            <a href="edit.php?id=<?=$row["id"]?>" class="btn btn-success">Edit</a>
                                                            <a href="hapus.php?id=<?=$row["id"]?>" class="btn btn-danger">Hapus</a>
                                                        </div>
													</div>
												</div>
											</div>
										</div>
									<?php endwhile ?>
										<div class="col-lg-6 col-md-6">
											<div class="single-product">
												<div class="product-img">
													<a href="tambah.php" class="text-center">
                                                        <!-- Generator: Adobe Illustrator 22.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                        <svg fill="#00bb00" width="400" height="400" version="1.1" id="lni_lni-circle-plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                                        <g>
                                                            <path d="M42.2,29.7C42.2,29.7,42.2,29.7,42.2,29.7l-8,0l0-7.9c0-1.2-1-2.2-2.3-2.2c0,0,0,0,0,0c-1.2,0-2.2,1-2.2,2.3l0,7.9l-7.9,0
                                                                c-1.2,0-2.2,1-2.2,2.3c0,1.2,1,2.2,2.3,2.2c0,0,0,0,0,0l7.9,0l0,7.9c0,1.2,1,2.2,2.3,2.2c0,0,0,0,0,0c1.2,0,2.2-1,2.2-2.3l0-7.9
                                                                l7.9,0c1.2,0,2.2-1,2.2-2.3C44.4,30.7,43.4,29.7,42.2,29.7z"/>
                                                            <path d="M32,1.8C15.3,1.8,1.8,15.3,1.8,32c0,16.7,13.6,30.3,30.3,30.3c16.7,0,30.3-13.6,30.3-30.3C62.3,15.3,48.7,1.8,32,1.8z
                                                                M32,57.8C17.8,57.8,6.3,46.2,6.3,32S17.8,6.3,32,6.3S57.8,17.8,57.8,32S46.2,57.8,32,57.8z"/>
                                                        </g>
                                                        </svg>

													</a>
												</div>
											</div>
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

	<script>
	$('a.beliikan').click(function (e) {
		$('.modal-body').html('<input min="1" style="border: 3px solid #ccc;" type="number" name="" value="1" id="jml">');
		$('#exampleModal').modal('show');
	});

	$('#beli').click(function (e) {
		$('.modal-title').html("Informasi Pembelian")
		$('.modal-body').html('Ikan berhasil dibeli, Silahkan mengunjungi toko')
		$(this).attr("data-dismiss", "modal")
		$(this).text("OK")
	});
	</script>
<?php
include("footer.php");
?>