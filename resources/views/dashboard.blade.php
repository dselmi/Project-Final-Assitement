@extends('layouts.backend')

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
        <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3 text-center text-danger">Loi organique n° 2017-58 du 11 août 2017, relative à l’élimination de la violence à l’égard des femmes</h1>
        <!--<nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">App</li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>-->
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
   <video width="100%" height="700" controls preload="auto"poster="images/loi.PNG" style="margin-top: -90px;">
      <source src=”https://youtu.be/GioPnw75kJY” type=video/ogg> <source src="images/loi.mp4" type=video/mp4>
    </video>

  <!-- END Page Content -->
@endsection
