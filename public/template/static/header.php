<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta charec set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- Page Title -->
        <title><?php echo (($wm_title=='Home'))?'Welcome to KPN':'KPN : '.$wm_title;?></title>		
		<!-- Meta Description -->
        <meta name="description" content="kpn">
        <meta name="keywords" content="kpn, profesionals, ghana, kwahu, network">
        <meta name="author" content="Qwesi Gyan">
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Google Font -->
		
		<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'> -->

		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="../media/css/font-awesome.min.css">
		<!-- Twitter Bootstrap css -->
        <link rel="stylesheet" href="../media/css/bootstrap.min.css">
		<!-- jquery.fancybox  -->
        <link rel="stylesheet" href="../media/css/jquery.fancybox.css">
		<!-- animate -->
        <link rel="stylesheet" href="../media/css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="../media/css/main.css">
		<!-- media-queries -->
        <link rel="stylesheet" href="../media/css/media-queries.css">
        
        <!-- Main jQuery -->
        <script src="../media/js/jquery-1.11.1.min.js"></script>
		<!-- Modernizer Script for old Browsers -->
        <script src="../media/js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body id="body">
	
		<!-- preloader -->
		<div id="preloader">
			<img src="../media/img/preloader.gif" alt="Preloader">
		</div>
		<!-- end preloader -->

        <!-- 
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
                    <a class="navbar-brand" href="<?php echo $siteRoot;?>home/home.html">
						<h1 id="logo">
							<img src="../media/img/logo.svg" alt="logo" width="100">
						</h1>
					</a>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <?php foreach($menu as $nav){?>
                            <li class="nav-item <?php echo (($site==$nav->MENP_PAGE_SLUG))?'active':''?>">
								<a class="nav-link" href="<?php echo $siteRoot.$nav->PG_TEMPLATE_NAME.'/'.$nav->MENP_PAGE_SLUG.'.html'; ?>" class="link"><?php echo $nav->MENP_PAGE_NAME; ?><span class="sr-only">(current)</span></a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
							<a class="nav-link" target="_blank" href="https://photos.app.goo.gl/cP6gSpGfSyXnK9oM6" >Gallery</a>
                        </li>
                        <li class="nav-item">
							<a class="nav-link" href="<?php echo $siteRoot;?>portal/" >Register Now</a>
                        </li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->