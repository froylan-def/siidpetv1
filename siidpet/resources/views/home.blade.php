@extends('layouts.app')

@section('content')

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="file"></span>
            Usuarios
            </a>
        </li>
        </ul>
    </div>
</nav>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Overview</li>
    </ol>
</nav>
<h1 class="h2"> Usuarios </h1>
<p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>


<div class="container">
    <div class="row justify-content-center">
        <app-component> </app-component>
    </div>
</div>

<footer class="pt-5 d-flex justify-content-between">
    <span>Copyright © 2023 </span>
    <ul class="nav m-0">
        <li class="nav-item">
            <a class="nav-link text-secondary" aria-current="page" href="#">Privacidad</a>
        </li>
        </ul>
</footer>
@endsection
