@extends('layouts.main')

@section('container')
{{-- 
@if(session()-> has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}

@if(session()-> has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('loginError')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
  <div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Please input your email</h1>
            <form action="/reset" method="post">
              @csrf
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value ="{{ old ('email') }}">
              <label for="email">Email address</label>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Send mail</button>
            
          </form>
        </main>

    </div>
</div>
@endsection