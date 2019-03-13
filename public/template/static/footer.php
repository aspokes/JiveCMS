<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
						<div class="footer-single">
							<img src="../media/img/footer-logo.svg" alt="" width="200">
							<p>Kwahu Professionals Network (KPN) is a non partisan association of Professionals hailing from the Kwahu area of the Republic of Ghana.</p>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="footer-single">
							<h6>Subscribe </h6>
							<form action="#" class="subscribe">
								<input type="text" name="subscribe" id="subscribe">
								<input type="submit" value="&#8594;" id="subs">
							</form>
							<p>get informed on all our events. </p>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
						<div class="footer-single">
							<h6>Explore</h6>
							<ul>
								<li><a href="/page/about-us.html">About Us</a></li>
								<li><a href="/page/events.html">Events</a></li>
								<li><a href="/page/gallery.html">Gallery</a></li>
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
						<div class="footer-single">
							<h6>Support</h6>
							<ul>
								<li><a href="">Contact Us</a></li>
								<li><a href="#">Market Blog</a></li>
								<li><a href="#">Help Center</a></li>
								<li><a href="#">Pressroom</a></li>
							</ul>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="copyright text-center">
							Copyright © 2018 <a href="#">Kpn</a>. All rights reserved.
						</p>
					</div>
				</div>
			</div>
		</footer>
		
		<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>

		<!-- Essential jQuery Plugins
		================================================== -->
		
		<!-- Single Page Nav -->
        <script src="../media/js/jquery.singlePageNav.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="../media/js/bootstrap.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="../media/js/jquery.fancybox.pack.js"></script>
		<!-- jquery.mixitup.min -->
        <script src="../media/js/jquery.mixitup.min.js"></script>
		<!-- jquery.parallax -->
        <script src="../media/js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.countTo -->
        <script src="../media/js/jquery-countTo.js"></script>
		<!-- jquery.appear -->
        <script src="../media/js/jquery.appear.js"></script>
		<!-- Contact form validation -->
		<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script> -->
		<!-- Google Map -->
        <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
		<!-- jquery easing -->
        <script src="../media/js/jquery.easing.min.js"></script>
		<!-- jquery easing -->
        <script src="../media/js/wow.min.js"></script>
		<script>
			var wow = new WOW ({
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       120,          // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true        // act on asynchronously loaded content (default is true)
			  }
			);
			wow.init();
		</script> 
		<!-- Custom Functions -->
        <script src="../media/js/custom.js"></script>
		<?php if($wm_title=='Events'){ ?>
		<script type="text/javascript">
		
			$(function(){

				$('#loading').hide();
				localStorage.setItem('LastCount',0);
				var count = localStorage.getItem('LastCount');
					if(count > 0){
						var reccount = localStorage.getItem('LastCount');
					}else{
						var reccount = 0;
					}
					
					$.ajax({
						type:'POST',
						url:'../public/template/scripts/gallery.ajax.php',
						data:{recordCount:reccount},
						success:function(res){ 
							var foto = res.data;
							for(var i=0; i<foto.length; i++){
								$('#gallery').append('<div class="mix work-item '+foto[i].GAL_CATERGORY+'" style="display:inline-block;"><img src="../media/img/gallery/'+foto[i].GAL_PHOTO_SMALL+'"><figcaption class="overlay"><a class="fancybox" rel="works" title="Write Your Image Caption Here" href="../media/img/gallery/'+foto[i].GAL_PHOTO_LARGE+'"><i class="fa fa-eye fa-lg"></i></a></figcaption></div>');
							}

							$('#showmore').show();
							$('#loading').hide();
							localStorage.setItem('LastCount',res.count);
						}
					});

			});
			$('#showmore').on('click',function(){
					$('#showmore').hide();
					$('#loading').show();
					var count = localStorage.getItem('LastCount');
					if(count > 0){
						var reccount = localStorage.getItem('LastCount');
					}else{
						var reccount = 0;
					}
					
					$.ajax({
						type:'POST',
						url:'../public/template/scripts/gallery.ajax.php',
						data:{recordCount:reccount},
						success:function(res){ 
							var foto = res.data;
							for(var i=0; i<foto.length; i++){
								$('#gallery').append('<figure class="mix work-item '+foto[i].GAL_CATERGORY+'" style="display:inline-block;"><img src="../media/img/gallery/'+foto[i].GAL_PHOTO_SMALL+'"><figcaption class="overlay"><a class="fancybox" rel="works" title="Write Your Image Caption Here" href="../media/img/gallery/'+foto[i].GAL_PHOTO_LARGE+'"><i class="fa fa-eye fa-lg"></i></a></figcaption></figure>');
							}

							$('#showmore').show();
							$('#loading').hide();
							localStorage.setItem('LastCount',res.count);
						}
					});
				});
				
			</script>
			<?php } ?>
    </body>
</html>