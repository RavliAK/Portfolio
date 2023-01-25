@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monthly Report</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif
<p class="mt-3">
  Month:
  <input type="number" value="{{ 8 }}" class="form-control-sm d-inline" id="month"name="month">
  year:
  <input type="year" value="{{ 2022 }}" class="form-control-sm d-inline" id="year"name="year">

  
<div class="table-responsive col-lg-8">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Change Date</a>
  </p>
  <p class="visually-hidden">
      {{  $totqty=0;}}{{$totinc=0; }}
  </p>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Book Name</th>
              <th scope="col">price</th>
              <th scope="col">quantity</th>
              <th scope="col">Total Income</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($transactions as $transaction)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$transaction->book->title}}</td>
              <td>Rp.{{number_format($transaction->book->price,'2', ',', '.')}}</td>
              <td>{{$transaction->qty}}</td>
              <td>Rp.{{number_format($transaction->book->price * $transaction->qty,'2', ',', '.')}}</td>
            </tr>
            <p class="visually-hidden">
              {{$totqty = $totqty+$transaction->qty;}}
            {{ $totinc = $totinc+($transaction->book->price * $transaction->qty);}} </p>
            @endforeach
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $totqty }}</td>
            <td>Rp.{{ number_format($totinc,'2', ',', '.') }}</td>
          </tbody>
        </table>
      </div>
@endsection