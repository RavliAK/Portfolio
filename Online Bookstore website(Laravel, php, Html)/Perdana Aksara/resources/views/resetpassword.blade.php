@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin">
        <h1 class="h3 mb-10 fw-normal">{{ $user->name }}, please insert new password</h1>
            <form action="/resetpassword/{{ $user->id }}" method="post">
                @method('put')
                  @csrf
            <div class="form-floating">
              <input type="password" name="password" class="form-control rounded-bottom  @error('password')is-invalid @enderror" id="password" placeholder="Password" required >
              <label for="password">new Password</label>
            </div>
              @error('password')
              <div class="invalid-feedback">
                {{$message}}
                </div>
                @enderror
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">set new password</button>
            
          </form>
        </main>

    </div>
</div>
@endsection