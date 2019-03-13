<?php include 'static/header.php'; ?>		
		
		
        <!--Home Slider ==================================== -->
		
		<section id="slider">

			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
				<!-- Indicators bullet -->
				<ol class="carousel-indicators">
				<?php $i=0; foreach($sliders as $slide){?>
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i++; ?>" class="<?php echo (($slide->SL_IMAGE_ORDER=='1'))?'active':'';?>"></li>
				<?php } ?>
				</ol>
				<!-- End Indicators bullet -->				
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php foreach($sliders as $slide){?>
					<!-- single slide -->
					<div class="item <?php echo (($slide->SL_IMAGE_ORDER=='1'))?'active':'';?>" style="background-image: url(../media/img/slides/<?php echo $slide->SL_IMAGE; ?>);">
					<div class="img-overlay"></div>
						<div class="carousel-caption">
							<h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated"><?php echo $slide->SL_MAIN_TITLE; ?></h2>
							<h3 data-wow-duration="1000ms" class="wow slideInLeft animated"><span class="color"><?php echo $slide->SL_SUB_TITLE; ?></h3>
							<p data-wow-duration="1000ms" class="wow slideInRight animated"><?php echo $slide->SL_SU_TITLE_TWO; ?></p>
						</div>
					</div>
					<!-- end single slide -->
					<?php } ?>
					
				</div>
				<!-- End Wrapper for slides -->
				
			</div>
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
		
        <!--
        Features
        ==================================== -->
		
		<section id="features" class="features">
			<div class="container">
				<div class="row">
					<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
						<h2>Kwahu Professionals Network</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>

					<!-- service item -->
					<div class="col-md-12 wow fadeInLeft" data-wow-duration="500ms">
						<div class="service-item">
							<div class="service-desc">
								<p>Kwahu Professionals Network (KPN) is a non partisan association of Professionals hailing from the Kwahu area of the Republic of Ghana.
								Members of this professional association realise the importance of utilizing the knowledge and skills we possess in our various fields of careers to advance our shared interest and also recognize the need to contribute to the socio-economic welfare and sustainable development of Kwahu and Kwahus throughout Ghana and globally. <b><a href="http://k-pn.com/web/page/about-us.html"> read more....</a></b></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
        <!--
        End Features
        ==================================== -->
		
		
        <!--
        Our Works
        ==================================== -->
		
		<section id="works" class="works clearfix">
			<div class="container">
				<div class="row">
				
					<div class="sec-title text-center">
						<h2>Events</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center">
						<p>Latest event held by the network... </p>
					</div>
					
				</div>
			</div>
			
			<div class="project-wrapper">
			<?php /*echo "<pre>"; var_dump($photos);*/ foreach($photos as $foto=>$data){ ?>
			
				<figure class="mix work-item  <?php echo $data["GAL_CATERGORY"]; ?>">
					<img src="../media/img/gallery/<?php echo $data["GAL_PHOTO_SMALL"]; ?>" alt="">
					<figcaption class="overlay">
						<a class="fancybox" rel="works" title="Write Your Image Caption Here" href="../media/img/gallery/<?php echo $data["GAL_PHOTO_LARGE"]; ?>"><i class="fa fa-eye fa-lg"></i></a>
						<!-- <h4>Labore et dolore magnam</h4>
						<p>Photography</p> -->
					</figcaption>
				</figure>
			<?php } ?>
			</div>
		

		</section>
		
        <!--
        End Our Works
        ==================================== -->
		
        <!--
        Meet Our Team
        ==================================== -->		
		
		<!-- <section id="team" class="team">
			<div class="container">
				<div class="row">
		
					<div class="sec-title text-center wow fadeInUp animated" data-wow-duration="700ms">
						<h2>Executives</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center wow fadeInRight animated" data-wow-duration="500ms"></div> -->
				<?php //foreach($team as $rows){ ?>
					<!-- single member -->
					<!-- <figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
						<div class="member-thumb">
							<img src="../media/img/team/<?php //echo $rows->TEAM_PHOTO;?>" alt="Team Member" class="img-responsive">
							<figcaption class="overlay"> -->
								<!-- <h5>voluptatem quia voluptas </h5>
								<p>sit aspernatur aut odit aut fugit,</p> -->
								<!-- <ul class="social-links text-center">
									<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
									<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
								</ul>
							</figcaption>
						</div>
						<h4 style="text-transform:uppercase;"><?php //echo $rows->TEAM_FIRSTNAME.' '.$rows->TEAM_LASTNAME;?></h4>
						<span style="text-transform:uppercase;"><?php //echo $rows->TEAM_ROLE;?></span>
					</figure> -->
					<!-- end single member -->
				<?php // } ?>
					
				</div>
			</div>
		</section>
		
        <!--
        End Meet Our Team
        ==================================== -->
		
		<!--
        Some fun facts
        ==================================== -->		
		
		<section id="facts" class="facts">
			<div class="parallax-overlay">
				<div class="container">
					<div class="row number-counters">
						
						<div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
							<h2 style="color:#fff">Some Fun Facts</h2>
							<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
						</div>
						
						<!-- first count item -->
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
							<div class="counters-item">
								<i class="fa fa-clock-o fa-3x"></i>
								<strong data-to="3">0</strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p>Social Events</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
							<div class="counters-item">
								<i class="fa fa-users fa-3x"></i>
								<strong data-to="20">0</strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p>Members</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
							<div class="counters-item">
								<i class="fa fa-rocket fa-3x"></i>
								<strong data-to="1">0</strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p> Projects Done </p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
							<div class="counters-item">
								<i class="fa fa-trophy fa-3x"></i>
								<strong data-to="1">0</strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p>Awards Won</p>
							</div>
						</div>
						<!-- end first count item -->
				
					</div>
				</div>
			</div>
		</section>
		
        <!--
        End Some fun facts
        ==================================== -->
		
		
		<!--
        Contact Us
        ==================================== -->		
		
		<section id="contact" class="contact">
			<div class="container">
				<div class="row mb50">
				
					<div class="sec-title text-center mb50 wow fadeInDown animated" data-wow-duration="500ms">
						<h2>Let’s Invest</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center wow rubberBand animated" data-wow-duration="1000ms">
						<p>We look forward to partnering you and many other prominent sons and daughters of Kwahu to push the Kwahu agenda to the national front and serve as a conduit for development oriented initiatives for Kwahu and the young people of this great mountainous land of ours.</p>
					</div>
					
					<!-- contact address -->
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft animated" data-wow-duration="500ms">
						<div class="contact-address">
							<h3>Contact us now!</h3>
							<p><?php echo $sitepostaddress; ?></p>
							<p><?php echo $sitelocation; ?></p>
							<p><?php echo $sitecontact; ?></p>
						</div>
					</div>
					<!-- end contact address -->
					
					<!-- contact form -->
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="contact-form">
							<h3>Say hello!</h3>
							<form action="#" id="contact-form">
								<div class="input-group name-email">
									<div class="input-field">
										<input type="text" name="name" id="name" placeholder="Name" class="form-control">
									</div>
									<div class="input-field">
										<input type="email" name="email" id="email" placeholder="Email" class="form-control">
									</div>
								</div>

								<div class="input-group name-email">
									<div class="input-field">
										<input type="text" name="phonenumber" id="phonenumber" placeholder="Phone number" class="form-control">
									</div>
									<div class="input-field">
										<input type="text" name="location" id="location" placeholder="Location" class="form-control">
									</div>
								</div>
								
								<div class="input-group">
									<textarea name="message" id="message" placeholder="Message" class="form-control" style="z-index:1;"></textarea>
								</div>
								<div class="input-group">
									<input type="button" id="form-submit" class="pull-right" value="Send message">
								</div>
							</form>
						</div><div id="snackbar"><!---message goes here---></div>
					</div>
					<!-- end contact form -->
					<script>
						$('#form-submit').on('click',function(){
							var name = $('#name').val();
							var email = $('#email').val();
							var phonenumber = $('#phonenumber').val();
							var location = $('#location').val();
							var message = $('#message').val();
							$.ajax({
								type:'POST',
								url:'../public/template/scripts/contact.ajax.php',
								data:{name:name,email:email,phonenumber:phonenumber,location:location,message:message},
								success:function(res){ 
									var x = document.getElementById("snackbar");
									x.className = "show";
									x.innerHTML=res;
									setTimeout(function(){ 
										x.className = x.className.replace("show", ""); 
										document.location.reload(true);
									}, 3000);
								}
							});
						})
					</script>
					
				</div>
			</div>
			
		</section>
		
        <!--
        End Contact Us
        ==================================== -->
		
		
<?php include 'static/footer.php';?>