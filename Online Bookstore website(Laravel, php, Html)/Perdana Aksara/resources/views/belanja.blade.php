@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/belanja">
      @if(request('category'))
      <input type ="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if(request('author'))
      <input type ="hidden" name="author" value="{{ request('author') }}">
      @endif
      {{-- 2 condition diatas biar search masih berfungsi di halaman category dan author --}}

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value ="{{ request('search') }}"> 
        <button class="btn btn-warning" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

{{-- hero post --}}
@if($books->count())
{{-- kondisi menampilkan card dibawah jika postingan tidak kosong --}}
{{-- <div class="card mb-3">
@if($books[0]->image)
            <div style="max-height: 350px;overflow:hidden;">
            <img src="{{asset('storage/' . $books[0]->image)}}" class="card-img-top" alt="{{ $books[0]->category->name }}" class="img-fluid">
            </div>
            @else

            <img src="https://source.unsplash.com/1200x400?{{ $books[0]->category->name }}" class="card-img-top" alt="{{ $books[0]->category->name }}">
            @endif
    
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/belanja/{{ $books[0]->slug }}" class="text-decoration-none text-dark">{{ $books[0]->title }}</a></h3>
      <p>
        <small class="text-muted">
          By. <a href="/belanja?author={{ $books[0]->author->slug}}"class="text-decoration-none">{{ $books[0]->author->name}}</a> in <a href="/belanja?category={{ $books[0]->category->slug }}" class="text-decoration-none">{{ $books[0]->category->name }}</a>{{ $books[0]->created_at->diffForHumans() }}
        </small></p>
        
      <p class="card-text">{{ $books[0]->excerpt }}</p>

      <p>
        <small class="text-muted">
          Rp.{{ $books[0]->price }}
        </small></p>
      <a href="/belanja/{{ $books[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
      
    </div>
  </div>card untuk menampilkan post --}}


  
  {{-- postingan lainnya --}}
  <div class="container">
      <div class="row -md-3 mb-3">
          @foreach($books as $book)
          <div class="col-md-3 mb-3 bg-secondary">
            <div class="card bg-dark text-white h-100" >
                <div class="position-absolute bg-dark px-3 py-2 " style="background-color: rgba(0,0,0,0.7)"><a href="/belanja?category={{ $book->category->slug }}"class = "text-white text-decoration-none">{{ $book->category->name }}</a></div>
                @if($book->image)
            
            <img src="{{asset('storage/' . $book->image)}}" class="card-img-top" alt="{{ $book->category->name }}" class="img-fluid">
            
            @else

            <img src="https://source.unsplash.com/300x300?{{ $book->category->name }}" class="card-img-top " alt="{{ $book->category->name }}">
            @endif
                
                <div class="card-body">
                  <h5 class="card-title ">{{ $book->title }}</h5>
                  <p>
                    <small class="text-white">Ditulis oleh : <a href="/belanja?author={{ $book->author->slug }}"class="text-decoration-none">{{ $book->author->name }}</a>
                    </small></p>
                    <p><small class='text-white'>Terbit tahun : {{ $book->year }}</small></p>
 
                  <p>
                    <small class="text-white">
                      Harga : Rp.{{ number_format($book->price, '2', ',', '.') }}
                    </small></p>
                  <a href="/belanja/{{ $book->slug }}" class="btn btn-warning btn-sm mt-1">Details</a>
                  
                  <form action="/belanja/{{$book->slug}}" method="post" class="d-inline">
                   @csrf 
                  <button class="btn btn-warning btn-sm mt-1" onclick ="return confirm('Add item to Cart?')">Add to Cart</button>
                </form>
                </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>



    @else
    <p class="text-center fs-4">No post found.</p> 
    {{-- kondisi kalo gk ada post --}}
      @endif

      <div class="d-flex justify-content-end">
      {{ $books->links() }}
    </div>
    {{-- buat ganti halaman pagination --}}
@endsection

