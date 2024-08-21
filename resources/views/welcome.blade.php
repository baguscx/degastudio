
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Dega Studio</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('asli/css/linearicons.css')}}">
            <link rel="stylesheet" href="{{url('https://cdn.linearicons.com/free/1.0.0/icon-font.min.css')}}">
			<link rel="stylesheet" href="{{asset('asli/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('asli/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('asli/css/nice-select.css')}}">
			<link rel="stylesheet" href="{{asset('asli/css/owl.carousel.css')}}">
			<link rel='stylesheet' href="{{asset('asli/css/simplelightbox.min.css')}}">
			<link rel="stylesheet" href="{{asset('asli/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('asli/css/main.css')}}">

		</head>
		<body>
			<!-- Start Header Area -->
			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="#home"><img src="{{asset('images/logoo.png')}}" alt=""></a>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="#home">Home</a>
									<a href="#about">About Me</a>
									<a href="#gallery">Gallery</a>
									<a href="#blog">Blog</a>
                                    @if (Auth::check())
                                        @if(Auth::user()->hasRole('admin'))
                                            <a href="{{route('paket')}}">Paket</a>
                                            <a href="{{route('daftar.pesanan')}}">Daftar Pesanan</a>
                                        @elseif(Auth::user()->hasRole('user'))
                                            <a href="{{route('pesan')}}">Pesan</a>
                                            <a href="{{route('riwayat')}}">Riwayat Pesan</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif		</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="slider"><div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				        <div class="carousel-inner" role="listbox">
				          <!-- Slide One - Set the background image for this slide in the line below -->
				          <div class="carousel-item active" style="background-image: url('{{asset('images/slide1.jpg')}}')">
				            <div class="carousel-caption d-md-block">
				              <h2 class="text-uppercase">Enggagement Moment</h2>
							  <p>
							  	Tunangan menjadi langkah penting dalam perkembangan suatu hubungan <br>
								  sepasang kekasih yang memiliki niat besar untuk hidup bersama membangun <br> sebuah rumah tangga dan menjadi suami istri.

							  </p>
				            </div>
				          </div>
				          <!-- Slide Two - Set the background image for this slide in the line below -->
				          <div class="carousel-item" style="background-image: url('{{asset('images/slide2.jpg')}}')">
				            <div class="carousel-caption d-md-block">
				              <h2 class="text-uppercase">Little Maid Moment</h2>
							  <p>
							  	 Semoga usai menjalankan salah satu syariat Islam, kamu jadi anak yang punya <br>kepribadian baik serta jadi pintu pembawa kebahagiaan bagi keluarga.
							  </p>
				            </div>
				          </div>
				          <!-- Slide Three - Set the background image for this slide in the line below -->
				          <div class="carousel-item" style="background-image: url('{{asset('images/slide3a.jpg')}}')">
				            <div class="carousel-caption d-md-block">
				              <h2 class="text-uppercase">Event Moment</h2>
							  <p>
							  	Reuni adalah tentang mengingat, tertawa, dan menciptakan kenangan baru.<br> Di sini, buka hanya bertemu, tetapi merasakan kembali masa lalu.
							  </p>
				            </div>
				          </div>
				        </div>
				        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				          <span class="sr-only">Previous</span>
				        </a>
				        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				          <span class="carousel-control-next-icon" aria-hidden="true"></span>
				          <span class="sr-only">Next</span>
				        </a>
				      </div>
				</div>
			</section>
			<!-- End banner Area -->


			<!-- Start About Area -->
			<section class="About-area section-gap" id="about">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-lg-6 about-left">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
						<div class="col-lg-6 about-right">
							<h1>
								We Believe that <br>
								Interior beautifies the
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that.
							</p>
							<button class="submit-btn primary-btn mt-20 text-uppercase ">Hire me now<span class="lnr lnr-arrow-right"></span></button>
						</div>
					</div>
				</div>
			</section>
			<!-- End About Area -->

			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="gallery">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 pb-30 header-text">
							<h1 class="text-white">My Recent Photos</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="gal">
						<a href="img/p1.jpg"><img src="img/p1.jpg" alt=""></a>
						<a href="img/p2.jpg"><img src="img/p2.jpg" alt=""></a>
						<a href="img/p3.jpg"><img src="img/p3.jpg" alt=""></a>
						<a href="img/p4.jpg"><img src="img/p4.jpg" alt=""></a>
						<a href="img/p5.jpg"><img src="img/p5.jpg" alt=""></a>
						<a href="img/p6.jpg"><img src="img/p6.jpg" alt=""></a>
						<a href="img/p7.jpg"><img src="img/p7.jpg" alt=""></a>
						<a href="img/p8.jpg"><img src="img/p8.jpg" alt=""></a>
						<a href="img/p9.jpg"><img src="img/p9.jpg" alt=""></a>
						<a href="img/p10.jpg"><img src="img/p10.jpg" alt=""></a>
						<a href="img/p11.jpg"><img src="img/p11.jpg" alt=""></a>
						<a href="img/p12.jpg"><img src="img/p12.jpg" alt=""></a>
						<a href="img/p13.jpg"><img src="img/p13.jpg" alt=""></a>
						<a href="img/p14.jpg"><img src="img/p14.jpg" alt=""></a>
						<a href="img/p15.jpg"><img src="img/p15.jpg" alt=""></a>
						<a href="img/p16.jpg"><img src="img/p16.jpg" alt=""></a>

					</div>
				</div>
			</section>

			<!-- Start callto Area -->
			<section class="callto-area pt-50 pb-50">
				<div class="container">
					<div class="row">
						 <div class="col-lg-9 callto-left">
						 	<h1 class="text-uppercase">Not sure about my charge?</h1>
						 </div>
						 <div class="col-lg-3 callto-right">
						 	<a href="#" class="btn-white btn text-uppercase">Donate Now</a>
						 </div>
					</div>
				</div>
			</section>
			<!-- End callto Area -->

			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 pb-30 header-text">
							<h1>Our Recent Blogs</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="single-blog col-lg-4 col-md-4">

							<img class="f-img img-fluid mx-auto" src="img/b1.jpg" alt="">
							<h4>
								<a href="#">Portable Fashion for young women</a>
							</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea.
								 commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>
							<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
								<div>
									<img class="img-fluid" src="img/user.png" alt="">
									<a href="#"><span>Mark Wiens</span></a>
								</div>
								<div class="meta">
									13th Dec
									<span class="lnr lnr-heart"></span> 15
									<span class="lnr lnr-bubble"></span> 04
								</div>
							</div>
						</div>
						<div class="single-blog col-lg-4 col-md-4">
							<img class="f-img img-fluid mx-auto" src="img/b2.jpg" alt="">
							<h4>
								<a href="#">Summer ware are coming</a>
							</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea.
 								commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>
							<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
								<div>
									<img class="img-fluid" src="img/user.png" alt="">
									<a href="#"><span>Mark Wiens</span></a>
								</div>
								<div class="meta">
									13th Dec
									<span class="lnr lnr-heart"></span> 15
									<span class="lnr lnr-bubble"></span> 04
								</div>
							</div>
						</div>
						<div class="single-blog col-lg-4 col-md-4">
							<img class="f-img img-fluid mx-auto" src="img/b3.jpg" alt="">
							<h4>
								<a href="#">Summer ware are coming</a>
							</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
							</p>
							<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
								<div>
									<img class="img-fluid" src="img/user.png" alt="">
									<a href="#"><span>Mark Wiens</span></a>
								</div>
								<div class="meta">
									13th Dec
									<span class="lnr lnr-heart"></span> 15
									<span class="lnr lnr-bubble"></span> 04
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end blog Area -->

			<!-- Start contact Area -->
			<section class="contact-area" id="contact">
				<div class="container-fluid">
					<div class="row d-flex justify-content-end align-items-center">
						<div class="col-lg-5 col-md-12 contact-left no-padding">
							<img class="img-fluid" src="img/contact-img.jpg" alt="">
						</div>
						<div class="col-lg-7 col-md-12 contact-right no-padding">
							<h1>Send me Message</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.
							</p>
							<form class="booking-form" id="myForm" action="contact.php">
								 	<div class="row">
								 		<div class="col-lg-12 d-flex flex-column">
							 				<input name="name" placeholder="Your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your name'" class="form-control mt-20" required="" type="text" required>
								 		</div>
							 			<div class="col-lg-12 d-flex flex-column">
											<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mt-10" required="" type="email">
										</div>
										<div class="col-lg-12 flex-column">
											<textarea class="form-control mt-20" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										</div>

										<div class="col-lg-12 d-flex justify-content-end send-btn">
											<button class="submit-btn primary-btn mt-20 text-uppercase ">confirm booking<span class="lnr lnr-arrow-right"></span></button>
										</div>

										<div class="alert-msg"></div>
									</div>
					  		</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End contact Area -->

			<!-- start footer Area -->
			<footer class="footer-area">
				<div class="container">
					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2017 All rights reserved   |   This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js')}}" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="{{asset('asli/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="{{asset('asli/js/vendor/bootstrap.min.js')}}"></script>
			<script src="{{asset('asli/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('asli/js/owl.carousel.min.js')}}"></script>
			<script src="{{asset('asli/js/jquery.nice-select.min.js')}}"></script>
			<script src="{{asset('asli/js/jquery.sticky.js')}}"></script>
			<script src="{{asset('asli/js/parallax.min.js')}}"></script>
			<script src="{{url('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
			<script type="text/javascript" src="{{asset('asli/js/simple-lightbox.min.js')}}"></script>
			<script src="{{asset('asli/js/main.js')}}"></script>
		</body>
	</html>
