<html>
    <head>
        <title>AyoMagang</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ayomagang.css') }}">
        <link rel="shortcut icon" href="{{ asset('ico/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            a:hover{transition: .3s;}
            li.nav-item{font-size: 18px;padding: 7px 7px 7px 7px;}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-no-bg">
            <div class="container">
                <a class="navbar-brand" href="http://localhost:8000/">
                    <img src="{{ asset('img/logo/logo%20putih.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#home">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#collaboration">Kerjasama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#about">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#footer">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="{{ route('login') }}">Masuk</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="{{ route('register') }}">Daftar</a> 
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid px-0" id=home>
            <div id="carouselAyoMagang" class="carousel slide" data-ride="carousel" data-interval="6000" data-pause="false">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active crimg1">
                        <div class="container">
                            <div class="d-flex align-items-center justify-content-start min-vh-100 text-center">
                                <div class="card rounded border-0" style="background-color: rgba(255,255,255,0)">
                                    <div class="card-body">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-sm-6 text-left wow fadeInLeft">
                                               <img src="{{ asset('img/logo/logo%20ayo%20magang%20putih.png') }}" width="80%;">
                                            </div>
                                            <div class="col-sm-6 text-right wow fadeInRight">
                                                <h2 style="font-weight:bold;font-size:40px;color:white;">Mencari Magang Akademik <br>Menjadi Lebih Mudah!</h2><br>
                                                <h6 style="font-size:24px;padding-bottom:40px;color:white">Ayo Eksplor!</h6><br>
                                                <a href="#" class="btn btn-info">Cari Magang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item crimg4">
                        <div class="container">
                            <div class="d-flex align-items-center justify-content-start min-vh-100 text-center">
                                <div class="card rounded border-0" style="background-color: rgba(255,255,255,0)">
                                    <div class="card-body text-left">
                                        <div class="row">
                                            <div class="col">
                                                <h2 style="font-weight:bold;font-size:40px;color:white;">For Student</h2><br>
                                                <h6 style="font-size:20px;padding-bottom:40px;color:white;line-height:1.2;">
                                                    Bagi kalian yang ingin magang, kerja praktek<br>
                                                    atau praktek kerja lapangan, AyoMagang<br>
                                                    membantu kamu untuk mencari tempat magang<br>
                                                    sesuai dengan keahlianmu!<br>
                                                    <br>
                                                    
                                                    Banyak pilihan perusahaan yang <br>
                                                    siap menerima kamu untuk magang!<br>
                                                    <br>
                                                    
                                                    Kalian juga bebas untuk mengatur <br> 
                                                    pencarian sesuai kebutuhanmu! <br>
                                                    Sistem kita juga membantu menyediakan <br> 
                                                    preferensi sesuai profil kamu!
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item crimg5">
                        <div class="container">
                            <div class="d-flex align-items-center justify-content-end min-vh-100">
                                <div class="card rounded border-0" style="background-color: rgba(255,255,255,0)">
                                    <div class="card-body text-right">
                                        <div class="row">
                                            <div class="col">
                                                <h2 style="font-weight:bold;font-size:38px;color:white;">For Employers</h2><br>
                                                <h6 style="font-size:24px;padding-bottom:40px;color:white;line-height:1.5;">
                                                    Buat anda yang mencari anak magang,<br> 
                                                    selain jadi recruiter, anda juga bisa promosi<br>
                                                    dan ekspose lebih luas terhadap brand anda!</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselAyoMagang" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselAyoMagang" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="collaboration">
            <div class="row">
                <div class="col">
                    <h2 class="text-center" style="padding-top:30px">Partner Kami</h2>
                </div>
            </div>
            <div class="container">
                <hr>
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col">
                        <img src="{{ asset('img/partner/stikom.png') }}" width="50%">
                    </div>
                    <div class="col">
                        <img src="{{ asset('img/partner/help.png') }}" width="75%">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="about">
            <div class="row">
                <div class="col">
                    <h1 class="text-center" style="padding-top:50px">Tentang Kami</h1>
                </div>
            </div>
            <div class="container">
                <hr>
                <div class="row align-items-center" style="padding-top:50px;">
                    <div class="col">
                        <img src="{{ asset('img/carousel/2.jpg') }}" width="100%" class="rounded shadow">
                    </div>
                    <div class="col">
                        <p class="text-justify">
                            Ayo Magang adalah aplikasi web yang membantu kamu siswa atau mahasiswa praktek
                            dalam mencari perusahaan sebagai tempat magang akademik kalian!<br><br>

                            Aplikasi web kami sudah dilengkapi dengan teknologi terbaru, menggunakan
                            properti web yang ringan, sehingga kalian bisa dengan cepat mengakses informasi
                            yang kalian butuhkan!<br><br>

                            Kamu juga sudah bekerja sama dengan banyak perusahaan, sehingga kalian memiliki
                            banyak pilihan dalam mencari perusahaan sesuai jurusan ataupun preferensi kalian.<br><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <strong>Address:</strong>
                        <ul>
                            <li>Office Bali:<br>
                                Jl. Raya Puputan No. 86 Renon – Denpasar, Telp: (0361) 244445
                            </li>
                            <li>Office Malaysia:<br>
                                No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur, Malaysia
                            </li>
                        </ul>
                        <strong>Work Hours:</strong>
                        <ul>
                            <li>Monday - Friday</li>
                            <li>08.00-17.00</li>
                            <li>Weekends &amp; Days off is OFF</li>
                        </ul>
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <h5>G-Maps ITB STIKOM Renon Bali:</h5> 
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15776.77683037235!2d115.2266653!3d-8.673073119485599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe8413f111e0aa096!2sSTIKOM%20Bali!5e0!3m2!1sen!2sid!4v1600933336258!5m2!1sen!2sid" width="100%" height="155" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            <br>
                            <br>
                        <h5>G-Maps HELP University Malaysia:</h5>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7826783601554!2d101.66895621457626!3d3.15193729770496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49aca5c7421b%3A0xb7242dad56a6c240!2sHELP%20University!5e0!3m2!1sen!2sid!4v1600933498924!5m2!1sen!2sid" width="100%" height="155" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-sm-4">
                        <strong>Email:</strong>
                        <ul>
                            <li>aldobagus@hotmail.co.id</li>
                            <li>luhwulandari@gmail.com</li>
                        </ul>
                        <strong>Nomor Telepon:</strong>
                        <ul>
                            <li>+6282146931611</li>
                        </ul>
                        <h5>Social Media:</h5>
                        <br>
                           <a href="{{ route('login') }}">Super Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('fontawesome/js/all.js') }}"></script>
    
<!--
        <script src="https://kit.fontawesome.com/dded24fbf6.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://use.fontawesome.com/releases/v5.14.0/js/conflict-detection.js"></script>
-->
</html>