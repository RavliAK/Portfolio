@extends('layouts.main')

@section('container')
<!doctype html>
<html lang="en">
  <style>
  img {
    border-radius: 50%;
  }
  </style>
  <body>
    
<main>
  {{-- <h1 class="visually-hidden">Hidden text how to</h1> --}}
  <h1 class="text-center display-4 fw-bold">Our Team</h1>

  <hr class = my-5>
  <div class="px-4 py-5 my-5 text-center">
    <img src="/img/download.jpeg" alt="NOD" width="200">
    <h1>Nicholas Owen</h1>
    <h3>NIM:2201811630</h3>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Web Developer Collaborator</p>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1>Ravli Avdala Kahfi</h1>
    <h3>NIM:2201813081</h3>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Web Developer Collaborator</p>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1>Ruben Marton Rezer</h1>
    <h3>NIM:2201744941</h3>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Web Developer Collaborator</p>
    </div>
  </div>     
  </body>
</html>
@endsection