<?php include "static/header.php" ?>		
		
		<div class="top-banner">
			<div class="top-overlay">
				<div class="container">
				<span class="bannertxt"><?php echo $wm_title;?></span>
				</div>
			</div>
			
		</div>
        <!--
        Home Header
        ==================================== -->
		
		<!-- <section id="header" style="padding:40px 0 0 0">
        <div class="container">
			<div class="row">
            <h2 class="titleinfo"><?php //echo $wm_title;?></h2>
            </div>
		</div>
		</section> -->
		
        <!--
        End Home HeaderEnd
        ==================================== -->

		
        <!--
        Features
        ==================================== -->
		<?php if($wm_title=='Home'){ ?>
			<section id="features" class="features">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
							<h2>Features</h2>
							<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
						</div>

						<!-- service item -->
						<div class="col-md-4 wow fadeInLeft" data-wow-duration="500ms">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-github fa-2x"></i>
								</div>
								
								<div class="service-desc">
									<h3>Branding</h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
								</div>
							</div>
						</div>
						<!-- end service item -->
						
						<!-- service item -->
						<div class="col-md-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-pencil fa-2x"></i>
								</div>
								
								<div class="service-desc">
									<h3>Development</h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
								</div>
							</div>
						</div>
						<!-- end service item -->
						
						<!-- service item -->
						<div class="col-md-4 wow fadeInRight" data-wow-duration="500ms"  data-wow-delay="900ms">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-bullhorn fa-2x"></i>
								</div>
								
								<div class="service-desc">
									<h3>Consulting</h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
								</div>
							</div>
						</div>
						<!-- end service item -->
							
					</div>
				</div>
			</section>
		<?php } ?>
		
        <!--
        End Features
        ==================================== -->
		
		<!----Contact Form ------->
		<?php if($wm_title=='Contact Us'){ ?>
		<section id="contact" class="contact">
			<div class="container">
				<div class="row mb50">
					
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
		<?php } ?>
		 <!--
        End Contact form
        ==================================== -->


        <!--
        Our Works
        ==================================== -->
		
		<section id="works" class="works clearfix" style="padding:30px 0 70px 0">
			<div class="container">
				<?php echo $wm_body;?>
			</div>
		</section>
		
		<?php if($wm_title=='Events'){ ?>
			<section id="works" class="works clearfix" style="padding: 0px 0 70px 0;">
				<div class="container">
					<div class="row">
						<div class="work-filter wow fadeInRight animated" data-wow-duration="500ms">
							<ul class="text-center">
								<li><a href="javascript:;" data-filter="all" class="active filter">All</a></li>
								<li><a href="javascript:;" data-filter=".outdoor" class="filter">Out Door Events</a></li>
								<li><a href="javascript:;" data-filter=".kings" class="filter">Annual Events</a></li>
								<li><a href="javascript:;" data-filter=".events" class="filter">KPN meets Daasebre</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="project-wrapper">
					<div id="gallery" >
						<!-- gallery goes here -->
					</div>
					<div class="more-btn" id="showmore"><button type="button">Show more</button></div>
					<div class="more-btn" id="loading"><button type="button">Loading...</button></div>
				</div>
				
			</section>
		<?php } ?>
        <!--
        End Our Works
        ==================================== -->



		<?php if($wm_title=='About Us'){ ?>
		<!--
        Meet Our Team
        ==================================== -->		
		
		<section id="team" class="team">
			<div class="container">
				<div class="row">
		
					<div class="sec-title text-center wow fadeInUp animated" data-wow-duration="700ms">
						<h2>Executives</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center wow fadeInRight animated" data-wow-duration="500ms"></div>
				<?php foreach($team as $rows){ ?>
					<!-- single member -->
					<figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
						<div class="member-thumb">
							<img src="../media/img/team/<?php echo $rows->TEAM_PHOTO;?>" alt="Team Member" class="img-responsive">
							<figcaption class="overlay">
								<!-- <h5>voluptatem quia voluptas </h5>
								<p>sit aspernatur aut odit aut fugit,</p> -->
								<ul class="social-links text-center">
									<li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
									<li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
								</ul>
							</figcaption>
						</div>
						<h4 style="text-transform:uppercase;"><?php echo $rows->TEAM_FIRSTNAME.' '.$rows->TEAM_LASTNAME;?></h4>
						<span style="text-transform:uppercase;"><?php echo $rows->TEAM_ROLE;?></span>
					</figure>
					<!-- end single member -->
				<?php } ?>
					
				</div>
			</div>
		</section>
		
        <!--
        End Meet Our Team
        ==================================== -->
		<?php } ?>
		
<?php include "static/footer.php" ?>
		