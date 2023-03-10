@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New User</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/users" class="mb-5" enctype="multipart/form-data">
      <!-- multipart form data harus supaya bisa upload file(img dll) -->
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value ="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
</div>

<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value ="{{old('username')}}">
    @error('username')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
</div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value ="{{old('email')}}">
    @error('email')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
</div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value ="{{old('password')}}">
    @error('password')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
</div>

  <div class="mb-3">
    <label for="is_admin" class="form-label">Role</label>
    <select class="form-select" name="is_admin">
        <option value="">1=admin 0=user</option>
            <option>1</option>
            <option>0</option>
    </select>
    
</div>



      <button type="submit" class="btn btn-primary">Create User</button>
    </form>

</div>

{{-- <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/dashboard/users/checkSlug?name=' +name.value).then(response =>response.json()).then(data =>slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    })

    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
    }
</script> --}}
@endsection