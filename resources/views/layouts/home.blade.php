<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>{{ empty($title) ? config('app.name', 'Laravel') : $title }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/home.css') }}" />

  <script src="{{ asset('js/app.js') }}" defer></script>

  @yield('header')
</head>

<body>

  <header id="masthead" style="overflow:unset">
    <div class="navbar-navigation py-0 py-md-3">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-title">
            <img src="https://iharap.tri-niche.com/wp-content/uploads/iharap-logo-white.svg" alt="Iharap Logo"
              class="logo-main">
            <span>i-Harap</span>
          </a>
        </div>

        <!-- Navbar Menu Mobile -->
        <div class="navbar-menu-sm d-md-none">
          <a href="javascript:void(0)" class="nav-button">Apply Loan</a>
          <button class="btn btn-trigger-menu"><img src="https://iharap.tri-niche.com/wp-content/uploads/menu.svg"
              alt="Menu"></button>

          <div class="navbar-sidebar">
            <div class="navbar-header justify-content-between">
              <div class="dropdown">
                <button class="btn bg-transparent dropdown-toggle text-white" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-expanded="false">
                  <svg width="20" class="mr-2" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M2 8H22M12 23C18.075 23 23 18.075 23 12C23 5.925 18.075 1 12 1C5.925 1 1 5.925 1 12C1 18.075 5.925 23 12 23ZM12 23C15 23 16 18 16 12C16 6 15 1 12 1C9 1 8 6 8 12C8 18 9 23 12 23ZM2 16H22H2Z"
                      stroke="white" stroke-width="2"></path>
                  </svg>
                  En
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">English</a>
                  <a class="dropdown-item" href="#">Bahasa Melayu</a>
                </div>
              </div>
              <button class="btn-close btn btn-link"><svg class="svg-inline--fa fa-xmark" aria-hidden="true"
                  focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 320 512" data-fa-i2svg="">
                  <path fill="currentColor"
                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z">
                  </path>
                </svg><!-- <i class="fa-solid fa-times"></i> Font Awesome fontawesome.com --></button>
            </div>
            <div class="navbar-body">
              <ul class="navbar-list flex-column nav">
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="/pay-now" class="nav-link">Pay Now</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Navbar Menu Tablet -->
        <div class="navbar-menu-md d-md-flex align-items-center d-sm-none d-lg-none d-none">
          <a href="/register" class="nav-button-md">Apply Loan</a>
          <a href="/pay-now" class="pay-button-md ml-0">Pay Now</a>
          <button class="btn btn-trigger-menu-md bg-transparent"><img
              src="https://iharap.tri-niche.com/wp-content/uploads/menu.svg" alt="Menu"></button>

          <div class="navbar-sidebar">
            <div class="navbar-header justify-content-between">
              <div class="dropdown">
                <button class="btn bg-transparent dropdown-toggle text-white" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-expanded="false">
                  <svg width="20" class="mr-2" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M2 8H22M12 23C18.075 23 23 18.075 23 12C23 5.925 18.075 1 12 1C5.925 1 1 5.925 1 12C1 18.075 5.925 23 12 23ZM12 23C15 23 16 18 16 12C16 6 15 1 12 1C9 1 8 6 8 12C8 18 9 23 12 23ZM2 16H22H2Z"
                      stroke="white" stroke-width="2"></path>
                  </svg>
                  En
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">English</a>
                  <a class="dropdown-item" href="#">Bahasa Melayu</a>
                </div>
              </div>
              <button class="btn-close btn btn-link"><svg class="svg-inline--fa fa-xmark" aria-hidden="true"
                  focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 320 512" data-fa-i2svg="">
                  <path fill="currentColor"
                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z">
                  </path>
                </svg><!-- <i class="fa-solid fa-times"></i> Font Awesome fontawesome.com --></button>
            </div>
            <div class="navbar-body">
              <ul class="navbar-list flex-column nav">
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Navbar Menu Desktop -->
        <div class="navbar-menu-lg d-none d-lg-flex">
          <ul class="navbar-list nav">
            <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Contact Us</a></li>
          </ul>
          <a href="/register" class="btn btn-apply align-items-center d-flex">Apply Loan</a>
          <a href="/pay-now" class="btn btn-pay align-items-center d-flex">Pay Now</a>
          <div class="dropdown">
            <button class="btn bg-transparent dropdown-toggle text-white" type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-expanded="false">
              <svg width="20" class="mr-2" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M2 8H22M12 23C18.075 23 23 18.075 23 12C23 5.925 18.075 1 12 1C5.925 1 1 5.925 1 12C1 18.075 5.925 23 12 23ZM12 23C15 23 16 18 16 12C16 6 15 1 12 1C9 1 8 6 8 12C8 18 9 23 12 23ZM2 16H22H2Z"
                  stroke="white" stroke-width="2"></path>
              </svg>
              En
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">English</a>
              <a class="dropdown-item" href="#">Bahasa Melayu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="main-container" class="py-5 mt-4 mt-md-0" style="position: relative;">
    <img class="d-none d-md-inline img-1 img-fluid" src="https://iharap.tri-niche.com/wp-content/uploads/spa.png" alt="Test" />
    <img class="d-none d-md-inline img-2 img-fluid" src="https://iharap.tri-niche.com/wp-content/uploads/spa-2.png" alt="Test" />

    <div class="container">

      @yield('content')

    </div>
  </div>

  <footer class="footer">

    <!-- Footer on Mobile -->
    <div class="inner-footer-sm d-md-none">
      <div class="widget pb-3 mt-n3">
        <h3 class="text-white">License</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod facilis repellat ipsum eveniet. Minus aliquam
          nihil voluptatum consequatur pariatur eos ducimus, libero illum impedit repellendus sit laboriosam
          voluptatibus! Dolorem, quae?</p>
      </div>
      <div class="widget pt-4">
        <h3 class="text-white mb-5">Get In Touch</h3>
        <ul class="list-unstyled">
          <li class="mb-4">
            <a href="javascript:void(0)" style="color: rgb(255 255 255 / 50%)" class="d-flex align-items-center">
              <img src="https://iharap.tri-niche.com/wp-content/uploads/clarity_email-line.svg">
              <span class="ml-3">endokem@gmail.com</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="javascript:void(0)" class="d-flex align-items-center text-white">
              <img src="https://iharap.tri-niche.com/wp-content/uploads/bi_whatsapp.svg">
              <span class="ml-3"><u>Chat on whatsapp</u></span>
            </a>
          </li>
          <li class="mb-4">
            <a href="javascript:void(0)" class="d-flex align-items-center text-white">
              <img src="https://iharap.tri-niche.com/wp-content/uploads/clarity_phone-handset-line.svg">
              <span class="ml-3">+60 9111 3111 4233</span>
            </a>
          </li>
          <li class="mb-4 d-flex align-items-center">
            <img src="https://iharap.tri-niche.com/wp-content/uploads/fluent_location-48-regular.svg">
            <span class="ml-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
          </li>
        </ul>
      </div>
      <div class="widget py-4 text-center">
        <ul class="list-unstyled mb-3 text-center">
          <li class="text-center d-flex flex-column-justify-content-center"><a
              class="text-center mx-auto d-flex flex-column-justify-content-center text-white mb-3" href="/about">About
              Us</a></li>
          <li class="text-center d-flex flex-column-justify-content-center"><a
              class="text-center mx-auto d-flex flex-column-justify-content-center text-white mb-3"
              href="/contact-us">Contact Us</a></li>
          <li class="text-center d-flex flex-column-justify-content-center"><a
              class="text-center mx-auto d-flex flex-column-justify-content-center text-white mb-3"
              href="javascript:void(0)">FAQ</a></li>
          <li class="text-center d-flex flex-column-justify-content-center"><a
              class="text-center mx-auto d-flex flex-column-justify-content-center text-white mb-3"
              href="javascript:void(0)">Privacy Policy</a></li>
        </ul>

        <div class="d-flex mt-3 justify-content-center icon-social-media">
          <a href="javascript:void(0)"><svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false"
              data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
              data-fa-i2svg="">
              <path fill="currentColor"
                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z">
              </path>
            </svg><!-- <i class="fa-brands fa-facebook"></i> Font Awesome fontawesome.com --></a>
          <a href="javascript:void(0)"><svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false"
              data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
              data-fa-i2svg="">
              <path fill="currentColor"
                d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z">
              </path>
            </svg><!-- <i class="fa-brands fa-twitter"></i> Font Awesome fontawesome.com --></a>
          <a href="javascript:void(0)"><svg class="svg-inline--fa fa-instagram" aria-hidden="true" focusable="false"
              data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 448 512" data-fa-i2svg="">
              <path fill="currentColor"
                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
              </path>
            </svg><!-- <i class="fa-brands fa-instagram"></i> Font Awesome fontawesome.com --></a>
        </div>
      </div>
      <div class="d-flex justify-content-center pt-3  mt-3" style="">
        <a href="//www.aseanfintechgroup.com">
          <img src="https://iharap.tri-niche.com/wp-content/uploads/afg.svg" style="height: 50px">
        </a>
      </div>
      <div class="pt-4 mb-n3 text-center">© 2021 All rights reserved. i-Harap</div>
    </div>

    <!-- Footer on Tablet -->
    <div class="inner-footer d-none d-lg-none d-xs-none d-md-block">
      <div class="px-5 mx-5">
        <div class="row">
          <div class="col-5">

            <div class="footer-widget mb-5">
              <p class="heading">License</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="footer-widget">
              <p class="heading">Get in touch</p>
              <ul class="list-unstyled">
                <li class="mb-4">
                  <a href="javascript:void(0)" style="color: rgb(255 255 255 / 50%)" class="d-flex align-items-center">
                    <img src="https://iharap.tri-niche.com/wp-content/uploads/clarity_email-line.svg">
                    <span class="ml-3">endokem@gmail.com</span>
                  </a>
                </li>
                <li class="mb-4">
                  <a href="javascript:void(0)" class="d-flex align-items-center text-white">
                    <img src="https://iharap.tri-niche.com/wp-content/uploads/bi_whatsapp.svg">
                    <span class="ml-3"><u>Chat on whatsapp</u></span>
                  </a>
                </li>
                <li class="mb-4">
                  <a href="javascript:void(0)" class="d-flex align-items-center text-white">
                    <img src="https://iharap.tri-niche.com/wp-content/uploads/clarity_phone-handset-line.svg">
                    <span class="ml-3">+60 9111 3111 4233</span>
                  </a>
                </li>
                <li class="mb-4 d-flex align-items-center">
                  <img src="https://iharap.tri-niche.com/wp-content/uploads/fluent_location-48-regular.svg">
                  <span class="ml-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                </li>
              </ul>
            </div>

          </div>
          <div class="col-2">&nbsp;</div>
          <div class="col-1">&nbsp;</div>
          <div class="col-4">

            <div class="footer-widget">
              <ul class="list-unstyled mb-3">
                <li><a class="text-white mb-3 d-flex" href="/about">About Us</a></li>
                <li><a class="text-white mb-3 d-flex" href="/contact">Contact Us</a></li>
                <li><a class="text-white mb-3 d-flex" href="javascript:void(0)">FAQ</a></li>
                <li><a class="text-white mb-3 d-flex" href="javascript:void(0)">Privacy Policy</a></li>
              </ul>

              <div class="d-flex mt-3">
                <a href="javascript:void(0)"><img src="https://iharap.tri-niche.com/wp-content/uploads/Facebook.svg"
                    height="35px" style="margin-right: 1rem"></a>
                <a href="javascript:void(0)"><img src="https://iharap.tri-niche.com/wp-content/uploads/Twitter.svg"
                    height="35px" style="margin-right: 1rem"></a>
                <a href="javascript:void(0)"><img src="https://iharap.tri-niche.com/wp-content/uploads/Instagram.svg"
                    height="35px" style="margin-right: 1rem"></a>
              </div>
            </div>

          </div>
        </div>
        <div class="d-flex justify-content-center pt-5 mt-3" style="border-top: 1px solid rgba(255,255,255,.40)">
          <a href="//www.aseanfintechgroup.com">
            <img src="https://iharap.tri-niche.com/wp-content/uploads/afg.svg" style="height: 65px">
          </a>
        </div>
      </div>
      <div class="pt-3 text-center px-5 mx-5">
        <div class="container" style="">
          <div class="row">
            <div class="col-12 mb-n4 mt-4">
              <p class="pb-0 mb-0">© 2021 All rights reserved. i-Harap</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer On Desktop -->
    <div class="inner-footer d-lg-block d-md-none d-none">
      <div class="container">
        <div class="row no-gutters mb-5">
          <div class="col-md-4">
            <div class="footer-widget">
              <p class="heading">License</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="col-md-1">&nbsp;</div>
          <div class="col-md-4">
            <div class="footer-widget">
              <p class="heading">Get in touch</p>
              <ul class="list-unstyled">
                <li class="mb-4">
                  <a href="javascript:void(0)" style="color: rgba(255,255,255,.5)" class="d-flex align-items-center">
                    <img src="https://iharap.tri-niche.com/wp-content/uploads/clarity_email-line.svg">
                    <span class="ml-3">endokem@gmail.com</span>
                  </a>
                </li>
                <li class="mb-4">
                  <a href="javascript:void(0)" class="d-flex align-items-center text-white">
                    <img src="https://iharap.tri-niche.com/wp-content/uploads/bi_whatsapp.svg">
                    <span class="ml-3"><u>Chat on whatsapp</u></span>
                  </a>
                </li>
                <li class="mb-4">
                  <a href="javascript:void(0)" class="d-flex align-items-center text-white">
                    <img src="https://iharap.tri-niche.com/wp-content/uploads/clarity_phone-handset-line.svg">
                    <span class="ml-3">+60 9111 3111 4233</span>
                  </a>
                </li>
                <li class="mb-4 d-flex align-items-start">
                  <img src="https://iharap.tri-niche.com/wp-content/uploads/fluent_location-48-regular.svg">
                  <span class="ml-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-1">&nbsp;</div>
          <div class="col-md-2">
            <div class="footer-widget">
              <ul class="list-unstyled mb-3">
                <li><a class="text-white mb-3 d-flex" href="/about">About Us</a></li>
                <li><a class="text-white mb-3 d-flex" href="/contact">Contact Us</a></li>
                <li><a class="text-white mb-3 d-flex" href="javascript:void(0)">FAQ</a></li>
                <li><a class="text-white mb-3 d-flex" href="javascript:void(0)">Privacy Policy</a></li>
              </ul>

              <div class="d-flex mt-3">
                <a href="javascript:void(0)"><img src="https://iharap.tri-niche.com/wp-content/uploads/Facebook.svg"
                    height="35px" style="margin-right: 1rem"></a>
                <a href="javascript:void(0)"><img src="https://iharap.tri-niche.com/wp-content/uploads/Twitter.svg"
                    height="35px" style="margin-right: 1rem"></a>
                <a href="javascript:void(0)"><img src="https://iharap.tri-niche.com/wp-content/uploads/Instagram.svg"
                    height="35px" style="margin-right: 1rem"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center pt-5 mt-3" style="border-top: 1px solid rgba(255,255,255,.40);">
          <a href="//www.aseanfintechgroup.com">
            <img src="https://iharap.tri-niche.com/wp-content/uploads/afg.svg" style="height: 75px">
          </a>
        </div>
      </div>
      <div class="mb-n4 text-center">
        <div class="container pt-3">
          <div class="row pt-3">
            <div class="col-12">
              <p class="mt-0">© 2021 All rights reserved. i-Harap</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  @yield('footer')
</body>
</html>
