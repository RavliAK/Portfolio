@extends('layouts.main')

@section('container')
<!doctype html>
<html lang="en">
  
  <body>
    
<main>
  {{-- <h1 class="visually-hidden">Hidden text how to</h1> --}}
  <h1 class="text-center display-4 fw-bold">Help</h1>
  
  <hr class = my-5>
  <div class="px-4 py-1 my-2">
    <form method="post" action="/help" class="mb-5">
          @csrf
    <div class="col-lg-6 mx-auto">
        <h2 class="fw-bold">Halaman/fitur yang bermasalah?</h2>
        <div class="col-md-5">
            <select class="form-select" name="provinsi" id="provinsi" >
              <option value="">Pilih...</option>
              <option>Store</option>
              <option>Home</option>
              <option>Cart</option>
              <option>Login</option>
              <option>Register</option>
              <option>History</option>
              <option>Categories</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid answer.
            </div>
          </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="b-example-divider"></div>

  <div class="px-4 my-5">
    <h3 class="fw-bold">Ceritakan Masalah yang Anda Alami</h3>
  </div>
  <div class="px-4 my-5">
    @error('body')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <input id="body" type="hidden" name="body"
    value="{{old('body')}}">
<trix-editor input="body"></trix-editor>
<button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>



  </body>
</html>
@endsection