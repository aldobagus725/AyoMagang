@extends('layouts.app')
@section('content')
 <head>
    <style>
        #login-student::before{
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            display: block;
            background-image: url({{ asset('img/carousel/4.jpg') }});
            filter: brightness(70%);
            background-repeat: no-repeat;
            background-size:cover;
            width: 100%;
            height: 100%;
        }
            #login-company::before{
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            display: block;
            background-image: url({{ asset('img/carousel/3.jpg') }});
            filter: brightness(70%);
            background-repeat: no-repeat;
            background-size:cover;
            width: 100%;
            height: 100%;
        }
/*
        #login-superadmin::before{
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            display: block;
            background-image: url({{ asset('img/carousel/1.jpg') }});
            filter: brightness(70%);
            background-repeat: no-repeat;
            background-size:cover;
            width: 100%;
            height: 100%;
        }
*/
    </style>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pt.css') }}">
    <link rel="shortcut icon" href="{{ asset('/ico/favicon.png') }}">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    </head>
<!--at this point, superadmin login can be done anywhere-->
    <body class="wow fadeIn">
        <div class='easytransitions'>
            <div class='easytransitions_transition'>
                <div class='div easytransitions_transition__part-1 none'></div>
                <div class='div easytransitions_transition__part-2 none'></div>
                <div class='div easytransitions_transition__part-3 none'></div>
                <div class='div easytransitions_transition__part-4 none'></div>
                <div class='div easytransitions_transition__part-5 none'></div>
                <div class='div easytransitions_transition__part-6 none'></div>
                <div class='div easytransitions_transition__part-7 none'></div>
                <div class='div easytransitions_transition__part-8 none'></div>
            </div>
            <!--Student Login-->
          <section class='active_slide' data-transition='wipe_right' id="login-student">
              <div class="container-fluid" >
                  <div class="container" style="padding-top:40px;">
                      <div class="row align-items-center justify-content-start text-left">
                          <div class="col wow fadeInLeft" style="color:white;">
                              <img src="{{ asset('img/logo/logo_putih_pas.png') }}" style="width:30%;">
                              <p style="font-weight:350!important;color:white!important;font-size:24px;">Mencari Magang Akademik Menjadi Lebih Mudah!</p>
                          </div>
                      </div>
                      <div class="row align-items-center justify-content-start text-left">
                          <div class="col-sm-4 wow fadeInLeft">
                              <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                                  <div class="card-body" style="color:white;">
                                      <h1 style="color:white;font-weight:276;font-size:40px;">Student Login</h1>
                                      <form method="post" action="{{ route('login') }}">
                                          @csrf
                                          <div class="form-group" style="padding-top:20px;">
                                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Anda">
                                              @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                          <div class="form-group" style="padding-bottom:20px;">
                                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Anda">
                                              @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong style="color:white!important">{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                  <label class="form-check-label" for="remember">
                                                     {{ __('Remember Me') }}
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary">{{ __('Masuk') }}</button>
                                              @if (Route::has('password.request'))
                                                  <a class="btn btn-link btn-secondary" href="{{ route('password.request') }}" style="text-decoration: none;color:white;">
                                                    {{ __('Lupa Password? Reset disini!') }}
                                                  </a>
                                              @endif
                                          </div>
                                          <div class="form-group">
                                              <p style="color:white;font-size:19px;">
                                                  Ingin mendaftar ? Klik di <a href="{{ route('register') }}" class="" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                                  Atau Ingin Posting job? Klik di <a href="#" class="easytransitions_navigation__right" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
                                              </p>
                                          </div>
                                    </form>
                                    <br>
                                    <a href="http://localhost:8000"><img src="{{ asset('img/logo/logo%20putih.png') }}" style="padding-bottom:20px;"></a>
                                    <h6>Copyright &copy; 2020 Ayo Magang</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        <!--Company Login-->
          <section data-transition='wipe_left'>
            <div class="container-fluid" id="login-company">
                <div class="container" style="padding-top:40px;">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col wow fadeInLeft" style="color:white;">
                            <img src="{{ asset('img/logo/logo_putih_pas.png') }}" style="width:30%;">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-end text-right">
                        <div class="col-sm-4 wow fadeInLeft">
                            <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                                <div class="card-body" style="color:white!important;">
                                    <h1 style="color:white;font-weight:276;font-size:40px;">Company Login</h1>
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group" style="padding-top:20px;">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Anda">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group" style="padding-bottom:20px;">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Anda">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ __('Masuk') }}</button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link btn-secondary" href="{{ route('password.request') }}" style="text-decoration: none;color:white;">
                                                    {{ __('Lupa Password? Reset disini!') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <p style="color:white;font-size:19px;">
                                                Ingin mendaftar ? Klik di <a href="{{ route('register') }}" class="" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                                Atau Ingin Cari job? Klik di <a href="#" class="easytransitions_navigation__left" style="text-decoration: none; color:white;"><b>Sini</b></a>
                                            </p>
                                        </div>
                                    </form>
                                    <br>
                                    <a href="http://localhost:8000"><img src="{{ asset('img/logo/logo%20putih.png') }}" style="padding-bottom:20px;"></a>
                                    <h6>Copyright &copy; 2020 Ayo Magang</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        <!--SuperAdmin login, for easy access only-->
<!--
          <section data-transition='split_vertical'>
            <div class="container-fluid" id="login-superadmin">
                <div class="container" style="padding-top:40px;">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col wow fadeInLeft" style="color:white;">
                            <img src="{{ asset('img/logo/logo_putih_pas.png') }}" style="width:30%;">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-sm-4 wow fadeInLeft">
                            <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                                <div class="card-body" style="color:white!important;">
                                    <h1 style="color:white;font-weight:276;font-size:40px;">SuperAdmin Login</h1>
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group" style="padding-top:20px;">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Anda">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group" style="padding-bottom:20px;">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Anda">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ __('Masuk') }}</button>
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link btn-secondary" href="{{ route('password.request') }}" style="text-decoration: none;color:white;">
                                                    {{ __('Lupa Password? Reset disini!') }}
                                                </a>
                                            @endif
                                        </div>
                                    </form>
                                    <br>
                                    <a href="http://localhost:8000"><img src="{{ asset('img/logo/logo%20putih.png') }}" style="padding-bottom:20px;"></a>
                                    <h6>Copyright &copy; 2020 Ayo Magang</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
-->
        </div>
    </body>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
        jQuery(document).ready(function() { 
            new WOW().init();
        });
    </script>
@endsection
