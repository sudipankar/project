<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Website Title -->
	<title>My Health E-Book</title>
	<!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

	<!-- SEO Meta Tags -->
	<meta name="description" content="Get your ebook in front of potential online readers and persuade them to download it.">
	<meta name="keywords" content="ebook, whitepaper, case study, report, guide, cook book, ebook download, business report, corporate, download form, landing page, bootstrap, responsive">
<?php echo $site_url=URL::to('/');?>
	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,700" rel="stylesheet">
	<link href="<?php echo $site_url;?>/public/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $site_url;?>/public/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $site_url;?>/public/css/swiper.css" rel="stylesheet">
	<link href="<?php echo $site_url;?>/public/css/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo $site_url;?>/public/css/styles.css" rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href="<?php echo $site_url;?>/public/images/favicon.png">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body data-spy="scroll" data-target=".navbar-fixed-top">

	<!-- Preloader -->
	<!-- <div class="spinner-wrapper">
		<div class="spinner">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div> -->


	<!-- NAVIGATION -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            
			<div class="row">
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
						<span class="sr-only">Toggle 88navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="header"><img src="http://myhealthebook.net/public/images/just-tree.png" alt="logo"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="navbar-collapse collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a class="page-scroll" href="#header">DOWNLOAD</a></li>
						<li><a class="page-scroll" href="#description">DESCRIPTION</a></li>
						<li><a class="page-scroll" href="#summary">SUMMARY</a></li>
						<li><a class="page-scroll" href="#reviews">REVIEWS</a></li>
						<li><a class="page-scroll" href="#author">AUTHOR</a></li>
						<li><a class="page-scroll" href="#collection">COLLECTION</a></li>
						<li><a class="popup-with-move-anim" href="#questionnaire">QUESTIONNAIRE</a></li>
						@guest
							<li><a class="popup-with-move-anim" href="#login-form">LOGIN</a></li>
							<li><a class="popup-with-move-anim" href="#register-form">REGISTER</a></li>
						@endguest
						@auth
							<li><a class="" href="{{  route('logout')  }}">LOGOUT</a></li>
							<li><a class="" href="{{  route('dashboard')  }}">DASHBOARD</a></li>
						@endauth
					</ul>
				</div>

			</div>
        </div>
    </div> <!-- end of navigation -->


	<!-- HEADER -->
	<header id="header">
		<div class="header-content">
			<div class="container">
			    <div class="row">
					<div class="col-md-5">
						<img class="img-responsive" src="http://myhealthebook.net/public/images/woman-holding-book-41.png" alt="header image">
					</div>
					<div class="col-md-7">
						<div class="text-pane">
							<h1 class="h1-header">Ebook HTML Landing Page</h1>
							<p class="p-largest">Download our ebook today and enjoy the latest winning strategies in sales and marketing straight from Kobe's panel of experts</p>
							<a class="button-solid-large-white popup-with-move-anim" href="#lightbox-form">Download</a>
						</div>
					</div>
				</div>
			</div> <!-- end of container -->
		</div> <!-- end of header-content -->
	</header> <!-- end of header -->

	<!-- Magnific Popup Lightbox Form Content -->
	<!-- mfp-hide class is required to keep the content hidden until the visitor clicks the button -->
	<div id="questionnaire" class="lightbox-form-container zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-md-12">
				<h3><span class="que_title">Questionnaire</span></h3>
				<hr />
					<p class="que_desc"><strong>Profession: </strong></p>
					<div class="form-group que_content">
						<select name="profession" id="select_profession" style="color:#000;">
							<option value="" selected>-- Select Profession --</option>
							<?php foreach ($professions as $index => $profession){?>
								<option value="<?php echo $profession->id;?>"><?php echo $profession->cat_name;?></option>
							<?php }?>
						</select>
					</div>
					<input type="hidden" name="ques_id" id="ques_id" value="0" />
					<button type="button" id="btn_next" class="form-control-submit-button">Next</button>
			</div>
		</div>
	</div> <!-- end of magnific popup lightbox form content -->

	<!-- Login form -->
	<div id="login-form" class="lightbox-form-container zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-md-12">
				<h2>Login Form</h2>
				<form id="login_form" method="post" action="{{ route('userlogin') }}" data-toggle="validator">
					@csrf
					<p><strong>Email *</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="email" name="email" placeholder="Email" required>
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Password *</strong></p>
					<div class="form-group">
						<input type="password" class="form-control-input" id="password" name="password" placeholder="Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<button type="submit" class="form-control-submit-button">Login</button>
					<div class="form-message">
						<div id="msgSubmit" class="h3 text-center hidden"></div>
					</div>
				</form>
			</div>
		</div>
	</div> <!-- /Login form -->


	<!-- Register form -->
	<div id="register-form" method="post" action="{{ route('register_user') }}" class="lightbox-form-container zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-md-12">
				<h2>Register Form</h2>
				<form id="register_form" action="{{ route('register_user') }}" method="post" data-toggle="validator">
					@csrf
					<p><strong>Email *</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="email" name="email" placeholder="Email" required>
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Password *</strong></p>
					<div class="form-group">
						<input type="password" class="form-control-input" id="password" name="password" placeholder="Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Confirm Password *</strong></p>
					<div class="form-group">
						<input type="password" class="form-control-input" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Name *</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="name" name="name" placeholder="Full Name" required>
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Address Line 1</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="address1" name="address1" placeholder="Address Line #1">
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Address Line 2</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="address2" name="address2" placeholder="Address Line #2">
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>City</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="city" name="city" placeholder="City">
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>State</strong></p>
					<div class="form-group">
						<input type="text" class="form-control-input" id="state" name="state" placeholder="State">
						<div class="help-block with-errors"></div>
					</div>

					<p><strong>Country</strong></p>
					<div class="form-group">
						<select name="country" id="country" class="form-control">
							<option value="0" selected>-- Select --</option>
							@foreach($countries as $index => $country)
								<option value="{{ $country->id }}">{{ $country->name }}</option>
							@endforeach
						</select>
						<div class="help-block with-errors"></div>
					</div>

					<button type="submit" class="form-control-submit-button">Submit</button>
					<div class="form-message">
						<div id="msgSubmit" class="h3 text-center hidden"></div>
					</div>
				</form>
			</div>
		</div>
	</div> <!-- /Login form -->


	<!-- CUSTOMERS -->
<!--	<div class="customers">
		<div class="container">
-->
			<!-- Image Swiper - Customers Logos -->
		<!--	<div class="swiper-container swiper1">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="image-container">
							<img class="img-responsive" src="http://placehold.it/175x40/495164/fff/" alt="event gallery">
						</div>
					</div>
				</div> 
			</div> --> <!-- end of image swiper customers logos -->
	<!--	</div>
	</div> --> <!-- end of customers -->


	<!-- DESCRIPTION -->
	<div id="description" class="description">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="text-pane">
						<h3>Description</h3>
						<hr class="underline-small-primary-color">
						<p>Kobe's latest ebook is a curated collection of sales and marketing strategies put together by knowledgeable entrepreneurs and marketers. They will help you grow your business faster and guide you around hidden startup traps.</p>
						<h3>Key Takeaways</h3>
						<hr class="underline-small-primary-color">
						<ul class="numbered-list">
							<li class="numbered-list-item"><strong>Better Marketing:</strong> <span class="numbered-list-item-text">learn new online and offline marketing strategies to set your business up for market dominance</span></li>
							<li class="numbered-list-item"><strong>Improved Sales:</strong> <span class="numbered-list-item-text">make sales easier with our guide for small and medium businesses from industry experts</span></li>
							<li class="numbered-list-item"><strong>More Control:</strong> <span class="numbered-list-item-text">take control over your business processes and find affordable ways to optimize your operations flow</span></li>
						</ul>
					</div>
				</div>
				<div class="col-md-5">

					<!-- Image Swiper - Description -->
					<div class="swiper-container swiper2">
						<div class="swiper-wrapper">
							<div class="swiper-slide"><a href="http://placehold.it/684x976/fff/079cd6/" class="popup-link" data-effect="fadeIn"><img class="img-responsive" src="http://placehold.it/684x976/fff/079cd6/" alt="description image"></a></div>
							<div class="swiper-slide"><a href="http://placehold.it/684x976/fff/079cd6/" class="popup-link" data-effect="fadeIn"><img class="img-responsive" src="http://placehold.it/684x976/fff/079cd6/" alt="description image"></a></div>
							<div class="swiper-slide"><a href="http://placehold.it/684x976/fff/079cd6/" class="popup-link" data-effect="fadeIn"><img class="img-responsive" src="http://placehold.it/684x976/fff/079cd6/" alt="description image"></a></div>
						</div>

						<!-- Add Arrows -->
						<div class="swiper-button-next"><i class="fa fa-chevron-circle-right fa-3x"></i></div>
						<div class="swiper-button-prev"><i class="fa fa-chevron-circle-left fa-3x"></i></div>
					</div> <!-- end of image swiper - description -->
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of description -->


	<!-- SUMMARY -->
	<div id="summary" class="summary">
		<div class="container">
			<h2 class="text-center">SUMMARY</h2>
			<hr class="underline-large-white">
			<div class="row">
				<div class="col-md-3">
					<div class="summary-pane">
						<div class="icon-wrapper">
							<i class="fa fa-rocket"></i>
							<i class="circle-icon"></i>
						</div>
						<h4>I. Understand The Market Context</h4>
						<p>Understanding your competition and your economic environment is of utmost importance</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="summary-pane">
						<div class="icon-wrapper">
							<i class="fa fa-group"></i>
							<i class="circle-icon"></i>
						</div>
						<h4>II. Create A Good Action Plan</h4>
						<p>Now that you know your position in the customer's mind, it's time to create that great action plan</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="summary-pane">
						<div class="icon-wrapper">
							<i class="fa fa-cloud"></i>
							<i class="circle-icon"></i>
						</div>
						<h4>III. Learn To Spot Opportunities</h4>
						<p>When is the perfect time to launch a new product? Find your answer in our latest downloadable ebook</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="summary-pane">
						<div class="icon-wrapper">
							<i class="fa fa-flag"></i>
							<i class="circle-icon"></i>
						</div>
						<h4>IV. Execute Your Strategical Plan</h4>
						<p>In the last chapter of Kobe ebook you will learn how to take action on your well devised business plan</p>
					</div>
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of summary -->


	<!-- REVIEWS -->
	<div id="reviews" class="reviews clearfix">
		<div class="reviews-image-pane">

		</div>
		<div class="reviews-text-pane">
			<div class="reviews-text-pane-container">
				<h2>REVIEWS</h2>
				<hr class="underline-large-primary-color">
				<div id="quote" class="carousel slide" data-ride="carousel" data-interval="4000">
					<ol class="carousel-indicators">
						<li data-target="#quote" data-slide-to="0" class="active"></li>
						<li data-target="#quote" data-slide-to="1"></li>
						<li data-target="#quote" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img class="img-circle" src="http://placehold.it/110x110/07a2d2/fff/" alt="reader reviews">
							<p class="p-large">"Wow! I still can't believe this ebook is available for free. Found tons of useful sales and marketing tips presented in an easy to read and accessible format for entrepreneurs of all ages."</p>
							<h5>Mary Fitzgerald</h5>
							<p class="job-title">GENERAL MANAGER</p>
						</div>
						<div class="item">
							<img class="img-circle" src="http://placehold.it/110x110/07a2d2/fff/" alt="reader reviews">
							<p class="p-large">"Everything I needed to take my startup to the next level was neatly covered in Kobe's latest ebook. I recommend it to all business owners and managers. Trust me, you won't be wasting your time."</p>
							<h5>Sully McLane</h5>
							<p class="job-title">PROJECT MANAGER</p>
						</div>
						<div class="item">
							<img class="img-circle" src="http://placehold.it/110x110/07a2d2/fff/" alt="reader reviews">
							<p class="p-large">"Just downloaded the ebook and it's a very good read! Kobe's ebook is packed with useful strategies and real life case studies that will challenge the way you think about sales and marketing today."</p>
							<h5>Simone Finley</h5>
							<p class="job-title">MARKETING MANAGER</p>
						</div>
					</div>
				</div> <!-- end of quote -->
			</div>
		</div> <!-- end of reviews-text-pane -->
	</div> <!-- end of reviews -->


	<!-- AUTHOR -->
	<div id="author" class="author clearfix">
		<div class="author-image-pane">
		</div>
		<div class="author-text-pane">
			<div class="author-text-pane-holder clearfix">
				<h2 class="text-center">AUTHOR</h2>
				<hr class="underline-large-primary-color">
				<p>Kobe's author is one of our long time partners and industry expert with proven experience in both small companies and large corporations. She loves to share what strategies worked for her and which didn't.</p>
				<ul class="fa-ul">
					<li><i class="fa-li fa fa-check-square-o"></i>Worked for the highly acclaimed GeoVr startup</li>
					<li><i class="fa-li fa fa-check-square-o"></i>Founded the popular AR company VisionPlus</li>
					<li><i class="fa-li fa fa-check-square-o"></i>Teamed up with Kobe to publish ebooks</li>
				</ul>
				<p>Although she is considered knowledgeable in all business aspects, her skills excel in:</p>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
						Product Development 100%
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
						Team Management 90%
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
						Web Development 95%
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end of author -->


	<!-- STATISTICS -->
	<div class="statistics">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="number-container">
					<p><span class="counter">250</span></p>
					<p>Happy Readers</p>
					</div>
					<div class="number-container">
					<p><span class="counter">480</span></p>
					<p>Delivered Projects</p>
					</div>
					<div class="number-container">
					<p><span class="counter">642</span></p>
					<p>Quote Proposals</p>
					</div>
					<div class="number-container">
					<p><span class="counter">120</span></p>
					<p>Case Studies</p>
					</div>
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of statistics -->


	<!-- COLLECTION -->
	<div id="collection" class="collection">
		<div class="container text-center">
			<h2>COLLECTION</h2>
			<hr class="underline-large-white">
			<div class="row">
				<div class="col-sm-4">
					<div class="collection-container first">
						<a class="popup-with-move-anim" href="#collection-1">
							<div class="image-container">
								<img class="img-responsive" src="http://myhealthebook.net/public/images/Fotolia_71018678_Subscription_Monthly_M.jpg" alt="collection image">
							</div>
						</a>
						<div class="text-container">
							<h4>Ebook Company</h4>
							<p>Guide to publishing your first ebook from writing tips to publishing tricks</p>
							<a class="button-solid-white popup-with-move-anim" href="#collection-1">Details</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="collection-container middle">
						<a class="popup-with-move-anim" href="#collection-2">
							<div class="image-container">
								<img class="img-responsive" src="http://myhealthebook.net/public/images/Fotolia_91164628_Subscription_Monthly_M.jpg" alt="collection image">
							</div>
						</a>
						<div class="text-container">
							<h4>Make More Sales</h4>
							<p>A curated collection of sales strategies for small and large businesses</p>
							<a class="button-solid-white popup-with-move-anim" href="#collection-2">Details</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="collection-container">
						<a class="popup-with-move-anim" href="#collection-3">
							<div class="image-container">
								<img class="img-responsive" src="http://myhealthebook.net/public/images/pancakes.jpg" alt="collection image">
							</div>
						</a>
						<div class="text-container">
							<h4>Invest In Marketing</h4>
							<p>Online marketing and traditional tips & tricks for young business owners</p>
							<a class="button-solid-white popup-with-move-anim" href="#collection-3">Details</a>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end of container -->
	</div> <!-- end of collection -->

	<!-- Magnific Popup Collection Details Content -->
	<!-- mfp-hide class is required to keep the content hidden until the visitor clicks the button -->
	<div id="collection-1" class="collection-details-container zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-md-7">
				<img class="img-responsive" src="http://placehold.it/800x1142/d5d5d5/373f51/" alt="product image">
			</div>
			<div class="col-md-5">
				<h3>The Ebook Company</h3>
				<hr>
				<h4>Free</h4>
				<p>This ebook will guide you through all the necessary steps for successfully publishing your ebook. From writing tips to how to better understand your audience.</p>
				<table>
					<tr><td class="icon-cell"><i class="fa fa-desktop"></i></td><td>Short & easy read</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-bullhorn"></i></td><td>About 30 pages</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-picture-o"></i></td><td>Real case studies</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-envelope-o"></i></td><td>Resources list</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-font-awesome"></i></td><td>Demo scenarios</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-code"></i></td><td>Ideas collection</td></tr>
				</table>
				<div class="clearfix"></div>
				<a class="button-outline-white mfp-close as-button" href="#collection">Back</a> <a class="button-solid-primary-color" href="#your-link-here">Download</a>
			</div>
		</div>
	</div>
	<div id="collection-2" class="collection-details-container zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-md-7">
				<img class="img-responsive" src="http://placehold.it/800x1142/d5d5d5/373f51/" alt="product image">
			</div>
			<div class="col-md-5">
				<h3>How To Make More Sales</h3>
				<hr>
				<h4>Free</h4>
				<p>Read through our latest collection of sales strategies for small and medium sized businesses. The ebook is perfect for young business owners and managers.</p>
				<table>
					<tr><td class="icon-cell"><i class="fa fa-desktop"></i></td><td>Easy to read format</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-bullhorn"></i></td><td>Accessible language</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-picture-o"></i></td><td>Terms are explained</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-envelope-o"></i></td><td>35 pages of information</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-font-awesome"></i></td><td>Real life scenarios</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-code"></i></td><td>Industry expert authors</td></tr>
				</table>
				<a class="button-outline-white mfp-close as-button" href="#collection">Back</a> <a class="button-solid-primary-color" href="#your-link-here">Download</a>
			</div>
		</div>
	</div>
	<div id="collection-3" class="collection-details-container zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-md-7">
				<img class="img-responsive" src="http://placehold.it/800x1142/d5d5d5/373f51/" alt="speakers image">
			</div>
			<div class="col-md-5">
				<h3>Invest In Marketing</h3>
				<hr>
				<h4>Free</h4>
				<p>We've compiled an awesome collection of online and traditional marketing tips & tricks. Success is guaranteed if you can implement our recommendations.</p>
				<table>
					<tr><td class="icon-cell"><i class="fa fa-desktop"></i></td><td>101 tips and tricks</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-bullhorn"></i></td><td>25 pages of information</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-picture-o"></i></td><td>Experienced authors</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-envelope-o"></i></td><td>5 real case studies</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-font-awesome"></i></td><td>Resources lists</td></tr>
					<tr><td class="icon-cell"><i class="fa fa-code"></i></td><td>Business success stories</td></tr>
				</table>
				<a class="button-outline-white mfp-close as-button" href="#collection">Back</a> <a class="button-solid-primary-color" href="#your-link-here">Download</a>
			</div>
		</div>
	</div>
	<!-- end of magnific popup collection details content -->


	<!-- ENDORSEMENT -->
	<div class="endorsement">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12">
					<p class="p-large">We're constantly developing new and interesting ebooks for commercial and non-profit use. Stay on top of everything related to sales and marketing withe Kobe's collection of free ebooks.</p>
					<p class="p-large text-center"><strong>Rose Henderson - Kobe Publishing</strong></p>
					<a class="button-solid-primary-color page-scroll" href="#header">Download</a>
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of endorsement -->


	<!-- FOOTER -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<!-- Social Icons Container -->
					<div class="social-icons-container">
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x facebook"></i>
								<i class="fa fa-facebook fa-stack-1x"></i>
							</a>
						</span>
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x twitter"></i>
								<i class="fa fa-twitter fa-stack-1x"></i>
							</a>
						</span>
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x google-plus"></i>
								<i class="fa fa-google-plus fa-stack-1x"></i>
							</a>
						</span>
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x instagram"></i>
								<i class="fa fa-instagram fa-stack-1x"></i>
							</a>
						</span>
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x linkedin"></i>
								<i class="fa fa-linkedin fa-stack-1x"></i>
							</a>
						</span>
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x dribbble"></i>
								<i class="fa fa-dribbble fa-stack-1x"></i>
							</a>
						</span>
						<span class="fa-stack fa-lg">
							<a href="#your-link-here">
								<i class="fa fa-circle fa-stack-2x pinterest"></i>
								<i class="fa fa-pinterest fa-stack-1x"></i>
							</a>
						</span>
					</div> <!-- end of social icons container -->

					<!-- Copyright Notice -->
					<div class="copyright">
						<span>Copyright 2019 © MyHealthEbook - Nutrition and Wellness Counselling</span> 
					</div>
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of footer -->


	<!-- SCRIPTS -->
	<script src="<?php echo $site_url;?>/public/js/jquery-2.2.4.min.js" type="text/javascript"></script> <!-- jQuery v2.2.4 - necessary for Bootstrap's JavaScript plugins -->
	<script src="<?php echo $site_url;?>/public/js/bootstrap.min.js" type="text/javascript"></script> <!-- Bootstrap v3.3.7 -->
	<script src="<?php echo $site_url;?>/public/js/jquery.easing.min.js" type="text/javascript"></script> <!-- jQuery Easing v1.3 for smooth scrolling between anchors -->
	<script src="<?php echo $site_url;?>/public/js/swiper.min.js" type="text/javascript"></script> <!-- Swiper v3.4.2 for image gallery swiper -->
	<script src="<?php echo $site_url;?>/public/js/jquery.magnific-popup.js" type="text/javascript"></script> <!-- Magnific Popup v1.1.0 for lightboxes -->
	<script src="<?php echo $site_url;?>/public/js/waypoints.min.js" type="text/javascript"></script> <!-- jQuery Waypoints v2.0.3 required by Counter-Up -->
	<script src="<?php echo $site_url;?>/public/js/jquery.counterup.min.js" type="text/javascript"></script> <!-- Counter-Up v1.0 for statistics -->
	<script src="<?php echo $site_url;?>/public/js/validator.min.js" type="text/javascript"></script> <!--  Validator.js v0.11.8 Bootstrap plugin that validates the registration form -->
	<script src="<?php echo $site_url;?>/public/js/scripts.js" type="text/javascript"></script> <!-- Custom scripts -->

<script>
$(document).ready(function() {
	var questionnaire;
	var current_que;
	var ques_index;
	var cat_id;
	var responses = new Array();
	$("#btn_next").hide();
	$("#select_profession").change(function() {
		alert('pp');
		ques_index = 0;
		cat_id = $(this).val();
		$.ajax({
			url:'<?php echo $site_url;?>/get_questionnaire/'+ cat_id,
			type:'GET',
			// data:'_token = {{ csrf_token() }}',
			success:function(data) {
				alert(data);
				// $('div.list_item').remove();
				if ($.trim(data)) {
					questionnaire = data;
					$("#select_profession").hide();
					$(".que_title").text('Fill Details');
        				$(".que_desc").text('');
        				var form_html = '';
                        form_html += '<p><strong>Gender *</strong></p>\
                        					<div class="form-group">\
                        						<input type="radio" class="form-control-radio" name="gender" id="male" value="male" /> Male\
                        						<input type="radio" class="form-control-radio" name="gender" id="female" value="female" /> Female\
                        						<div class="help-block with-errors"></div>\
                        					</div>\
    				                        <p><strong>Age *</strong></p>\
                        					<div class="form-group">\
                        						<input type="number" class="form-control-input" id="age" name="age" placeholder="Enter Age" required>\
                        						<div class="help-block with-errors"></div>\
                        					</div>\
    				                        <p><strong>Height *</strong></p>\
                        					<div class="form-group">\
                        						<input type="number" class="form-control-input" id="height_feet" name="height_feet" placeholder="Feets" required> Feet\
                        						<input type="number" class="form-control-input" id="height_inches" name="height_inches" placeholder="Inches" required> Inches\
                        						<div class="help-block with-errors"></div>\
                        					</div>\
    				                        <p><strong>Weight *</strong></p>\
                        					<div class="form-group">\
                        						<input type="text" class="form-control-input" id="weight_kg" name="weight_kg" placeholder="Kilos" required> Kilos\
                        						<input type="text" class="form-control-input" id="weight_gram" name="weight_gram" placeholder="Grams" required> Grams\
                        						<div class="help-block with-errors"></div>\
                        					</div>\
                        					<button type="button" name="get_started_btn" id="get_started_btn" class="form-control-submit-button">Get Sarted</button>';
        				alert(form_html);
						$('.que_content').html(form_html);
        				// $("#btn_next").show();
				// 	current_que = questionnaire[ques_index];
				// 	playground(current_que);
				} else {
					var no_rows = '<p>No question for this profession</p>';
					$(".que_title").text('--');
					$(".que_desc").text('--');
					$('.que_content').append(no_rows);
				}
			},
			error: function(err) {
				alert(JSON.stringify(err));//
			}
		});
	});
	
	$(document).on("click", "#get_started_btn", function() {
	    playground(questionnaire[ques_index]);
	});

	$(document).on("click", "#btn_next", function() {
		var ques_id = $("#ques_id").val();
		var answer_val = '';
		var answer_id = 0;
		var selected_ans = $(".select_option:checked").val();
		var current_que = questionnaire[ques_index];
		if(selected_ans) {
    		answer_id = current_que['options'][selected_ans]['id'];
    		if(current_que['ques_type'] == 3)
    		    answer_val = current_que['options'][selected_ans]['option_text'];
		}
		var temp_responses = {};
		temp_responses['quesid'] = ques_id;
		temp_responses['optionid'] = answer_id;
		responses.push(temp_responses);
		if (selected_ans && current_que['options'][selected_ans]['is_split']) {
			current_que = current_que['options'][selected_ans]['split_ques'];
			playground(current_que);
		} else {
		    if(++ques_index && ques_index < questionnaire.length && (current_que['ques_type'] == 1 || (current_que['ques_type'] == 2  && answer_id) || (current_que['ques_type'] == 3) && answer_val == 'Yes')) {
			    current_que = questionnaire[ques_index];
				playground(current_que);
			}	else {
			    if(current_que['ques_type'] == 2) {
			        ques_index += 6;
			        playground(questionnaire[ques_index]);
			    } else {
    			    $.ajax({
            			url:'/is_loggedin',
            			type:'GET',
            			// data:'_token = {{ csrf_token() }}',
            			success:function(is_loggedin) {
            			    $(".que_title").text('Payment Form');
            				$(".que_desc").text('');
            				var form_html = '<form action="" id="payment_form" name="payment_form">\
            				                    {{ method_field("post") }}';
    		              //  if(is_loggedin['userid']) {
    	                    form_html += '<input type="hidden" name="userid" value="'+ is_loggedin['userid'] +'" />';
    		              //  }
                            form_html += '<p><strong>Email *</strong></p>\
                            					<div class="form-group">\
                            						<input type="text" class="form-control-input" id="email" name="email" placeholder="Enter Email" required>\
                            						<div class="help-block with-errors"></div>\
                            					</div>\
        				                        <p><strong>Name *</strong></p>\
                            					<div class="form-group">\
                            						<input type="text" class="form-control-input" id="user_name" name="user_name" placeholder="Enter Name" required>\
                            						<div class="help-block with-errors"></div>\
                            					</div>\
        				                        <p><strong>Card Number *</strong></p>\
                            					<div class="form-group">\
                            						<input type="text" class="form-control-input" id="card_number" name="card_number" placeholder="Enter Card Number" required>\
                            						<div class="help-block with-errors"></div>\
                            					</div>\
        				                        <p><strong>Card Expiry *</strong></p>\
                            					<div class="form-group">\
                            						<input type="text" class="form-control-input" id="card_expiry" name="card_expiry" placeholder="Enter Expiry" required>\
                            						<div class="help-block with-errors"></div>\
                            					</div>\
        				                        <p><strong>CVV/CVC *</strong></p>\
                            					<div class="form-group">\
                            						<input type="text" class="form-control-input" id="card_cvv" name="card_cvv" placeholder="Enter CVV" required>\
                            						<div class="help-block with-errors"></div>\
                            					</div>\
                            					<button type="submit" class="form-control-submit-button">Pay</button>\
            				                </form>';
            				$('.que_content').html(form_html);
            				$("#btn_next").hide();
            			},
            			error: function(err) {
            				alert(JSON.stringify(err));
            			}
            		});
			    }
				// alert(JSON.stringify(responses));
			}
		}
	});
	
	$(document).on("submit", "#payment_form", function(e) {
	    e.preventDefault();
	    var form_data = $(this).serializeArray();
	    form_data.push({name: '_token', value: '{{ csrf_token() }}'});
	    form_data.push({name: 'cat_id', value: cat_id});
	    $.ajax({
	        url: '/pay_for_ebook',
	        type: 'get',
	        data: form_data,
	        dataType: "json",
	        success: function(response) {
	            if(response['status']) {
	                var ebook = response['ebook'];
	                var ebook_link = '{{ asset("/ebook_files/") }}';
	                $(".que_title").text(ebook['ebook_title']);
			        $(".que_desc").text(ebook['ebook_desc']);
			        var download_btn = '<a href="'+ ebook_link +'/'+ ebook[`ebook`] +'" download="'+ ebook[`ebook_title`] +'.pdf">Download Ebook</a>';
			        $(".que_content").html(download_btn);
	            }
	        },
	        error: function(err) {
	            alert("error");
	            alert(JSON.stringify(err));
	        }
	    });
	});

	function playground(question_data) {
		if (question_data) {
			$(".que_title").text(question_data['question_title']);
			$(".que_desc").text(question_data['question_desc']);
			var options_html = "";
			// $("#ques_id").remove(".select_option");
			$.each(question_data['options'], function(key, option) {
				options_html += '<input type="radio" class="select_option" name="options" value="'+ key +'" id="options" /> '+ option['option_text'] +'<br />';
			});
			$(".que_content").html(options_html);
			$("#btn_next").show();
			$('#btn_next').removeAttr('disabled');
			$("#ques_id").val(question_data['id']);
		}
	}
});
</script>

</body>
</html>
