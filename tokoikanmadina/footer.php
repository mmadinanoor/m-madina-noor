<!--====== FOOTER PART START ======-->
<footer class="footer-area">
		<div class="widget-wrapper">
			<div class="map-img">
				<img src="assets/images/footer/map-img.svg" alt="">
			</div>
			<div class="container">
				<div class="row">

					<div class="col-xl-4 col-md-7">
						<div class="footer-widget about">
							<a href="index.php" class="d-inline-block mb-30">
								<img src="assets/images/logo/logo.svg" alt="">
							</a>
							<p class="text-white mb-25">Sebuah tempat online untuk membeli berbagai ikan.</p>
							<ul class="social">
								<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
								<li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
								<li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
								<li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="col-xl-4 col-md-5 order-md-1 order-xl-4 col-sm-6">
						<div class="footer-widget">
							<h4>Contact Us</h4>
							<ul>
								<li>
									<span>Phone:</span>
									+62852 1111 1111
								</li>
								<li>
									<span>Email:</span>
									mamamamad@gmail.com
								</li>
								<li>
									<span>Location:</span>
									Banjarmasin, Kalimantan Selatan
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="copy-right"></div>
	</footer>
	<!--====== FOOTER PART ENDS ======-->

	<!--====== BACK TOP TOP PART START ======-->
	<a href="#" class="back-to-top btn-hover"><i class="lni lni-chevron-up"></i></a>
	<!--====== BACK TOP TOP PART ENDS ======-->


	<!--====== Bootstrap js ======-->
	<script src="assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>

	<!--====== Tiny slider js ======-->
	<script src="assets/js/tiny-slider.js"></script>

	<!--====== wow js ======-->
	<script src="assets/js/wow.min.js"></script>

	<!--====== glightbox js ======-->
	<script src="assets/js/glightbox.min.js"></script>

	<!--====== Selectr js ======-->
	<script src="assets/js/selectr.min.js"></script>

	<!--====== Nouislider js ======-->
	<script src="assets/js/nouislider.js"></script>
	
	<!--====== Main js ======-->
	<script src="assets/js/main.js"></script>

	<script>
        //======== select js
		new Selectr('#sort', {
			searchable: false,
			width: 300
		});

		var snapSlider = document.getElementById('slider-snap');

			noUiSlider.create(snapSlider, {
				start: [199, 789],
				// snap: true,
				connect: true,
				range: {
					'min': 99,
					'max': 999
				}
			});

			var snapValues = [
					document.getElementById('slider-snap-value-lower'),
					document.getElementById('slider-snap-value-upper')
				];

				snapSlider.noUiSlider.on('update', function (values, handle) {
					snapValues[handle].innerHTML = values[handle]
				});
	</script>

</body>

</html>

<?php
mysqli_close($conn);
?>