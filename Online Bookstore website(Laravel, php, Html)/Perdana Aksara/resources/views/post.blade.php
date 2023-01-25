

@extends('layouts.main')

@section('container')


<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
        <h1 class="mb-3">{{ $book["title"] }}</h1>
        @if($reviews->count() !== 0)
        @for($x=0;$x<$reviews->average('rating');$x++)
        <i class="bi bi-star-fill inline" style='color: yellow'></i>
        @endfor
        <h3 class="mb-3"> Rating: {{ $reviews->average('rating') }}/5
        @endif

        <p>By.
             <a href="/belanja?author={{ $book->author->slug }}" class="text-decoration-none">{{ $book->author->name }}</a>
            in <a href="/belanja?category={{ $book->category->slug }}" class="text-decoration-none">{{ $book->category->name }}</a> published in  {{ $book->year }}</p>

        @if($book->image)
            <div style="max-height: 350px;overflow:hidden;">
            <img src="{{asset('storage/' . $book->image)}}" class="card-img-top" alt="{{ $book->category->name }}" class="img-fluid">
            </div>
            @else

        <img src="https://source.unsplash.com/1200x400?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}" class="img-fluid">
            @endif

            <h4 class="mt-3">Sinopsis:</h4>
        <article class="my-3 fs-5">
            {!! $book->excerpt !!}
        </article>
        @if($transaction->exists())
        {{-- tambah ->whereNotNull('order_id') sebelum exists --}}
        <form method="post" action="/belanja/{{$book->slug}}/reply" class="mb-5">
            @csrf
        <p class="mt-3">
        <label for="rating">Rate this book (1-5):</label>
        <input type="number" value="" class="form-control-sm d-inline" id="rating" data-id="" name="rating" min="1" max="5"></p>
        <label for="reply">Write your review</label>
        <input id="reply" type="hidden" name="reply"
        value="">
        <trix-editor input="reply"></trix-editor>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        @else
        <h1>buy this book to write a review</h1>
        @endif


        <p>
            <small class="text-muted">
              Rp.{{ number_format($book->price, '2', ',', '.') }}
            </small></p>
            <form action="/belanja/{{$book->slug}}" method="post" class="d-inline">
                @csrf 
               <button class="btn btn-warning btn-sm mt-1" onclick ="return confirm('Add item to Cart?')">Add to Cart</button>
             </form>
        @if($reviews->count() !== 0)
        <h1>Reviews</h1>
             @foreach ($reviews as $review)
             <div class="card" style="width: 46rem;">
                <div class="card-body">
                  <h5 class="card-header">{{  $review->user->username }}'s review</h5>
                  <p class="card-body">rated:{{ $review->rating }}/5</p>
                  <p class="card-footer">review:{!! $review->reply !!}</p>
                  
                </div>
              </div>
             @endforeach
             @else
             <h3> no reviews has been submitted </h3>
             @endif
        </div>
    </div>
</div>






{{-- klo pake !! artinya script yg ada di dalem body bakal dijalanin(misalnya <p> 
    </p>) --}}
    {{-- text-decoration-none buat ilangin underscore --}}


<a href="/belanja" class="d-block">Lanjut Belanja</a>
@endsection
