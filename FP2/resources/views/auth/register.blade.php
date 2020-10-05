@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<head>
    <style>
        #register-student::before{
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            display: block;
            background-image: url({{ asset('img/carousel/5.jpg') }});
            filter: brightness(65%);
            background-repeat: no-repeat;
            background-size:cover;
            width: 100%;
            height: 100%;
        }
            #register-company::before{
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            display: block;
            background-image: url({{ asset('img/carousel/2.jpg') }});
            filter: brightness(70%);
            background-repeat: no-repeat;
            background-size:cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pt.css') }}">
    <link rel="shortcut icon" href="{{ asset('/ico/favicon.png') }}">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    </head>
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
            <!--Student register-->
          <section class='active_slide' data-transition='wipe_right' id="register-student">
              <div class="container-fluid" >
                  <div class="container" style="padding-top:40px;">
                      <div class="row align-items-center justify-content-start text-left">
                          <div class="col wow fadeInLeft" style="color:white;">
                              <img src="{{ asset('img/logo/logo_putih_pas.png') }}" style="width:30%;">
                          </div>
                      </div>
                      <div class="row align-items-center justify-content-start text-left">
                          <div class="col-sm-4 wow fadeInLeft">
                              <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                                  <div class="card-body" style="color:white;">
                                      <h1 style="color:white;font-weight:276;font-size:40px;">Student Register</h1>
                                      <form method="post" action="{{ route('register') }}">
                                          @csrf
                                          <div class="form-group" style="padding-top:32px;">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Lengkap Anda">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                          </div>
                                          <div class="form-group">
                                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Anda">
                                              @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Baru Anda">
                                              @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                            <div class="form-group" style="padding-bottom:20px;">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password Baru Anda">
                                                
                                                <input id="usertype" type="text" class="form-control @error('usertype') is-invalid @enderror" name="usertype" value="Student" required autocomplete="usertype" hidden>
                                            </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
                                          </div>
                                          <div class="form-group">
                                              <p style="color:white;font-size:19px;">
                                                 Sudah Punya Akun? Klik di <a href="{{ route('login') }}" class="" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                                 Atau mau daftar jadi employer? Klik di <a href="#" class="easytransitions_navigation__right" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
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
        <!--Company register-->
          <section data-transition='wipe_left'>
            <div class="container-fluid" id="register-company">
                <div class="container" style="padding-top:40px;">
                    <div class="row align-items-center justify-content-start text-left">
                        <div class="col wow fadeInLeft" style="color:white;">
                            <img src="{{ asset('img/logo/logo_putih_pas.png') }}" style="width:30%;">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-start text-left">
                        <div class="col-sm-4 wow fadeInLeft">
                            <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                                <div class="card-body" style="color:white!important;">
                                    <h1 style="color:white;font-weight:276;font-size:40px;">Company Login</h1>
                                    <form method="post" action="{{ route('login') }}">
                                        @csrf
                                          <div class="form-group" style="padding-top:32px;">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Perusahaan Anda">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                          </div>
                                          <div class="form-group">
                                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Anda / Perusahaan Anda">
                                              @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Baru Anda">
                                              @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                          </div>
                                            <div class="form-group" style="padding-bottom:20px;">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password Baru Anda">
                                                
                                                <input id="usertype" type="text" class="form-control @error('usertype') is-invalid @enderror" name="usertype" value="Company" required autocomplete="usertype" hidden>
                                            </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
                                          </div>
                                          <div class="form-group">
                                              <p style="color:white;font-size:19px;">
                                                 Sudah Punya Akun? Klik di <a href="{{ route('login') }}" class="" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                                 Atau mau daftar jadi intern / magang?? Klik di <a href="#" class="easytransitions_navigation__left" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
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
