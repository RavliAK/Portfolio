@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
        <h1 class="mb-3">{{ $book["title"] }}</h1>

        <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span></a>Back to All products</a>
        <a href="/dashboard/posts/{{$book->slug}}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>Edit</a>
        <form action="/dashboard/posts/index/{{$book->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick ="return confirm('Are you sure?')">
                <span data-feather="x-circle"></span>Delete
                </button>
              </form>

            @if($book->image)
            <div style="max-height: 350px;overflow:hidden;">
            <img src="{{asset('storage/' . $book->image)}}" class="card-img-top" alt="{{ $book->category->name }}" class="img-fluid">
            </div>
            @else

        <img src="https://source.unsplash.com/1200x400?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}" class="img-fluid">
            @endif

            <article class="my-3 fs-5">
            {!! $book->body !!}
        </article>

        </div>
    </div>
</div>
@endsection