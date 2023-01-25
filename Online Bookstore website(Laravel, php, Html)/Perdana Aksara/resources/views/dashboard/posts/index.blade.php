@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Products</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Insert New Product</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($books as $book)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$book->title}}</td>
              <td>{{$book->category->name}}</td>

              @if($book->image)
            <td>
            <img src="{{asset('storage/' . $book->image)}}" width="100" height="150" class="img" alt="{{ $book->category->name }}" >
            </td>
            @else
<td>
        <img src="https://source.unsplash.com/100x150?{{ $book->category->name }}" class="img-fluid rounded-float-end" alt="{{ $book->category->name }}" class="img-fluid"></td>
            @endif


              <td><a href="/dashboard/posts/{{$book->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/posts/{{$book->slug}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

              <form action="/dashboard/posts/index/{{$book->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick ="return confirm('Are you sure?')">
                <span data-feather="x-circle"></span>
                </button>
              </form>
              
            </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection