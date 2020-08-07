@extends('site.layout')

@section('title', 'Site')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Chamando arquivo css paraa modficar template -->
    <link rel="stylesheet" href="{{ asset('assets/css/template-home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    @section('content')
<!-- slider_area_start -->
<div class="slider_area">
  <div class="single_slider  d-flex align-items-center slider_bg_1">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-xl-7 col-md-6">
                  <div class="slider_text">
                      <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" >Seja bem vindo<br>
                          </h3>
                      <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">Gerencie seus dados da melhor forma </p>
                      <div class="row">
                        <div class="video_service_btn wow fadeInLeft col-md-3" data-wow-duration="1s" data-wow-delay=".1s">
                            <a href="{{'register'}}" class="boxed-btn3 l-1">Cadastrar</a>
                        </div>
                        <div class="video_service_btn wow fadeInLeft col-md-5" data-wow-duration="1s" data-wow-delay=".1s">
                            <a href="{{'login'}}" class="boxed-btn3 l-2">Já sou membro</a>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-5 col-md-6">
                  <div class="phone_thumb wow fadeInDown" data-wow-duration="1.1s" data-wow-delay=".2s">
                      <img src="{{asset('assets/images/img/ilstrator/phone.png')}}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- slider_area_end -->

<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
</body>
</html>