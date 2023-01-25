@extends('layouts.main')

@section('container')

<div class="container">
  <h1>Transaction History</h1>
  <div class="accordion mt-5" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
              Menunggu Konfirmasi Pembayaran
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">

              @foreach($ordersP as $order)
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  {{-- <div class="col-md-4">
                    <img src="/img/PRENADA_COVER.jpg" class="img-fluid rounded-start" alt="gambar">
                  </div> --}}
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Transaksi {{ $order->id }}</h5>
                      <p class="card-text">Total harga : Rp.{{ number_format($order->price, '2', ',', '.') }}</p>
                      
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Barang | Harga | kuantitas</li>
                        @foreach($order->transactions as $transaction)
                        <li class="list-group-item">{{ $transaction->book->title }} | Rp.{{ number_format($transaction->book->price, '2', ',', '.') }} | {{ number_format($transaction->qty, '0', ',', '.') }}  </li>
                         @endforeach 
                      <p class="card-text"><small class="text-muted">Tanggal transaksi : {{ $order->created_at }}</small></p>
                      <a href="/history/{{ $order->id }}" class="btn btn-warning btn-sm mt-1">Invoice</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Sedang Berlansung
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">

              @foreach($ordersO as $order)
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="/img/PRENADA_COVER.jpg" class="img-fluid rounded-start" alt="gambar">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text"> ID Transaksi :{{ $order->id }}</p>
                      <p class="card-text">Total harga : Rp.{{ number_format($order->price, '2', ',', '.') }}</p>
                      
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Barang | Harga | kuantitas</li>
                        @foreach($order->transactions as $transaction)
                        <li class="list-group-item">{{ $transaction->book->title }} | Rp.{{ number_format($transaction->book->price, '2', ',', '.') }} | {{ number_format($transaction->qty, '0', ',', '.') }}  </li>
                         @endforeach 
                      <p class="card-text"><small class="text-muted">Tanggal transaksi : {{ $order->created_at }}</small></p>
                      <a href="/history/{{ $order->id }}" class="btn btn-warning btn-sm mt-1">Invoice</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
        
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Transaksi Berhasil
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                
            @foreach($ordersD as $order)
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/img/PRENADA_COVER.jpg" class="img-fluid rounded-start" alt="gambar">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text"> ID Transaksi :{{ $order->id }}</p>
                  <p class="card-text">Total harga : Rp.{{ number_format($order->price, '2', ',', '.') }}</p>
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama Barang | Harga | kuantitas</li>
                        @foreach($order->transactions as $transaction)
                        <li class="list-group-item">{{ $transaction->book->title }} | Rp.{{ number_format($transaction->book->price, '2', ',', '.') }} | {{ number_format($transaction->qty, '0', ',', '.') }}  </li>
                     @endforeach 
                  <p class="card-text"><small class="text-muted">Tanggal transaksi : {{ $order->created_at }}</small></p>
                  <a href="/history/{{ $order->id }}" class="btn btn-warning btn-sm mt-1">Invoice</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
              </div>
            </div>
          </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Dibatalkan
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">

              @foreach($ordersC as $order)

              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="/img/PRENADA_COVER.jpg" class="img-fluid rounded-start" alt="gambar">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text"> ID Transaksi :{{ $order->id }}</p>
                      <p class="card-text">Total harga : Rp.{{ number_format($order->price, '2', ',', '.') }}</p>
                    
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Barang | Harga | kuantitas</li>
                        @foreach($order->transactions as $transaction)
                        <li class="list-group-item">{{ $transaction->book->title }} | Rp.{{ number_format($transaction->book->price, '2', ',', '.') }} | {{ number_format($transaction->qty, '0', ',', '.') }}  </li>
                         @endforeach 
                      <p class="card-text"><small class="text-muted">Tanggal transaksi : {{ $order->created_at }}</small></p>
                      <a href="/history/{{ $order->id }}" class="btn btn-warning btn-sm mt-1">Invoice</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>



        

@endsection