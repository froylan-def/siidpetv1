<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title> SIIDEPT </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href=' http://fonts.googleapis.com/css?family=Encode+Sans' rel='stylesheet' type='text/css'>

    <style>
      body {
        font-family: 'Encode Sans', serif;
      }
    </style>

</head>
<body class="hold-transition login-page" >
<div class="login-box" style="width: 30rem;">
 
<div class="login-logo mt-5 ">
      
      
      
    </div>
  <!-- /.login-logo -->
  <div class="card" >

  <img src="{{ asset('img/logo_tam_1.jpg') }}" class="rounded mx-auto d-block" width="100" height="100"  alt="Logo tam" >
      <a href="/" > SIIDPET </a>

    <div class="card-body login-card-body" >

      <p class="login-box-msg"> <b> Iniciar sesión </b> </p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end"> Correo: </label>
            <div class="col-md-8">
                <input placeholder="algo@tamaulipas.gob.mx" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end"> Constraseña: </label>

            <div class="col-md-8">
                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" style="background-color: #AB0033; border: 1px solid #AB0033;">
                  <i class="fa-solid fa-right-to-bracket mr-2"></i>
                    Iniciar sesión
                </button>
            </div>
        </div>
    </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>


  


    



</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>
