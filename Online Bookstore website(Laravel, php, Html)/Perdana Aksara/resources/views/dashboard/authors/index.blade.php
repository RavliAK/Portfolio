@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Book Authors</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6">
    <a href="/dashboard/authors/create" class="btn btn-primary mb-3">Create New Author</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Author Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($authors as $author)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$author->name}}</td>
              <td>
              <form action="/dashboard/authors/index/{{$author->slug}}" method="post" class="d-inline">
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