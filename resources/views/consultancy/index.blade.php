@extends('consultancy.layouts.app')
@section('header')
<!DOCTYPE html>
<html lang="en">
  <head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Shan Consultancy</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<!-- Bootstrap Icons (already likely included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    #pricing {
      background: #f9f9f9;
      padding: 60px 0;
    }
  
    .pricing-item {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.06);
      padding: 25px;
      text-align: center;
      transition: all 0.4s ease;
    }
  
    .pricing-item.featured {
      border: 2px solid #0d6efd;
    }
  
    .pricing-item .icon {
      font-size: 40px;
      color: #0d6efd;
      margin-bottom: 15px;
    }
  
    .pricing-item h3 {
      font-size: 24px;
      font-weight: bold;
    }
  
    .pricing-item h4 {
      font-size: 28px;
      color: #0d6efd;
      margin-bottom: 15px;
    }
  
    .pricing-item ul {
      list-style: none;
      padding: 0;
      margin: 20px 0;
    }
  
    .pricing-item ul li {
      margin-bottom: 10px;
      font-size: 14px;
    }
  
    .pricing-item ul li.na {
      color: #ccc;
    }
  
    .buy-btn {
      background-color: #0d6efd;
      color: white;
      padding: 10px 25px;
      border-radius: 25px;
      display: inline-block;
      text-decoration: none;
      transition: background 0.3s ease;
    }
    .swal2-popup.colored-toast {
        background-color: #4ade80; /* Green */
        color: white;
        font-weight: bold;
        font-family: 'Segoe UI', sans-serif;
    }
    .buy-btn:hover {
      background-color: #084298;
    }
  
    .swiper-button-next,
    .swiper-button-prev {
      color: #0d6efd;
    }
  </style>
  <!-- Favicons -->
  <link href="consultancy/assets/img/favicon.png" rel="icon">
  <link href="consultancy/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="consultancy/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="consultancy/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="consultancy/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="consultancy/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="consultancy/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="consultancy/assets/css/main.css" rel="stylesheet">

  </head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:consultancy@gmail.com">consultancy@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+92 300 1234567</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="consultancy/assets/img/logo.png" alt=""> 
          <h1 class="sitename">Shan Consultancy</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Home<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a>
            
            <li><a href="#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>
@endsection

  @section('main')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span>Welcome to </span><span class="accent">Shan Consultancy</span></h2>
            <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{ asset('consultancy/assets/img/hero-img.svg') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>

      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-easel"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-gem"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-geo-alt"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-command"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
              </div>
            </div><!--End Icon Box -->

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo</h3>
            <img src="{{ asset('consultancy/assets/img/about.jpg') }}" class="img-fluid rounded-4 mb-4" alt="">
            <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
            <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p>

              <div class="position-relative mt-4">
                <img src="{{ asset('consultancy/assets/img/about-2.jpg') }}" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-1.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-2.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-3.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-4.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-5.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-6.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-7.png') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('consultancy/assets/img/clients/client-8.png') }}" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-5">
            <img src="{{ asset('consultancy/assets/img/stat.png') }}" alt="" class="img-fluid">
          </div>

          <div class="col-lg-7">

            <div class="row gy-4">

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-emoji-smile flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-journal-richtext flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-headset flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-people flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Stats Section -->

  

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <h3>Nesciunt Mete</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Eosle Commodi</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Ledo Markt</h3>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <h3>Asperiores Commodit</h3>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <h3>Velit Doloremque</h3>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <h3>Dolori Architecto</h3>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->
   

    <!-- Pricing Section -->
    <section id="pricing">
      <div class="container section-title text-center" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
    
      <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <div class="swiper pricingSwiper">
          <div class="swiper-wrapper">
    
            @foreach($packages as $package)
            <div class="swiper-slide">
              <div class="pricing-item {{ $loop->iteration == 2 ? 'featured' : '' }}">
                <h3>{{ $package->name }}</h3>
                <div class="icon">
                  @if($loop->iteration == 1)
                    <i class="bi bi-box"></i>
                  @elseif($loop->iteration == 2)
                    <i class="bi bi-rocket"></i>
                  @else
                    <i class="bi bi-send"></i>
                  @endif
                </div>
                <h4><sup>RS:</sup>{{ $package->price }}<span> / month</span></h4>
                <ul>
                  <li><i class="bi bi-check"></i> Quam adipiscing vitae proin</li>
                  <li><i class="bi bi-check"></i> Nec feugiat nisl pretium</li>
                  <li><i class="bi bi-check"></i> Nulla at volutpat diam uteera</li>
                  <li class="na"><i class="bi bi-x"></i> Pharetra massa massa ultricies</li>
                  <li class="na"><i class="bi bi-x"></i> Massa ultricies mi quis hendrerit</li>
                </ul>
                <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
              </div>
            </div>
            @endforeach
    
          </div>
    
          <!-- Swiper Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </section>
    

   

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>He indeed desires something that results from his needs, fleeing from it, yet he is truly of a refined character</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>St no # 3 house no # 123 Zahir Pir, Rahim Yar Khan, Pakistan</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+92 300 1234567</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>consultancy@gmail.com.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h3>Open Hours:</h3>
                  <p>Mon-Sat: 11:00:AM - 11:00:PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            @if(session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
@endif

<form action="{{ route('contact.store') }}" method="post" class="php-email-form"  >
  @csrf
  <div class="row gy-4">
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" placeholder="Your Name" autocomplete="on" required>
    </div>

    <div class="col-md-6">
      <input type="email" name="email" class="form-control" placeholder="Your Email" autocomplete="on" required>
    </div>

    <div class="col-md-12">
      <input type="text" name="subject" class="form-control" placeholder="Subject" autocomplete="on" required>
    </div>

    <div class="col-md-12">
      <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
    </div>

    <div class="col-md-12 text-center">
      <div class="loading">Loading</div>
      <div class="error-message"></div>
      <div class="sent-message">Your message has been sent. Thank you!</div>

      <button type="submit" class="btn btn-primary">Send Message</button>
    </div>
  </div>
</form>

          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
    
  @endsection

  @section('footer')
  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Shan Consultancy</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>St no # 3 house no # 123</p>
          <p>Zahir Pir, Rahim Yar Khan</p>
          <p>Pakistan</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+92 300 1234567</span></p>
          <p><strong>Email:</strong> <span>consultancy@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Shan Consultancy</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">Ahsan Mirza</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
    
  @endsection

 @section('scripts')
 <!-- Vendor JS Files -->
 <script src="consultancy/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="consultancy/assets/vendor/php-email-form/validate.js"></script>
 <script src="consultancy/assets/vendor/aos/aos.js"></script>
 <script src="consultancy/assets/vendor/glightbox/js/glightbox.min.js"></script>
 <script src="consultancy/assets/vendor/swiper/swiper-bundle.min.js"></script>
 <script src="consultancy/assets/vendor/purecounter/purecounter_vanilla.js"></script>
 <script src="consultancy/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
 <script src="consultancy/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

 <!-- Main JS File -->
 <script src="consultancy/assets/js/main.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Swiper Init -->
 <script>
   new Swiper('.pricingSwiper', {
     slidesPerView: 1,
     spaceBetween: 20,
     loop: true,
     navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
     },
     autoplay: {
       delay: 5000,
       disableOnInteraction: false,
     },
     breakpoints: {
       768: { slidesPerView: 2 },
       1024: { slidesPerView: 3 }
     }
   });
 </script>
   <script src="{{ asset('assets/js/app.js') }}"></script> <!-- Laravel route -->

   @if(session('success'))
       <script>
           document.addEventListener('DOMContentLoaded', function () {
               const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   iconColor: 'white',
                   customClass: {
                       popup: 'colored-toast'
                   },
                   showConfirmButton: false,
                   timer: 3000,
                   timerProgressBar: true
               });
   
               Toast.fire({
                   icon: 'success',
                   title: '{{ session('success') }}'
               });
           });
       </script>
   @endif
   
 @endsection
