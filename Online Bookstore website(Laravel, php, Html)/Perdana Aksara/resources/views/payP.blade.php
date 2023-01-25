<!doctype html>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!-- trix editor -->
<link rel="stylesheet" type="text/css" href="/css/trix.css">
<script type="text/javascript" src="/js/trix.js"></script>

<!-- My Style -->
{{-- <body class="bg-black text-white"> --}}
<link rel = "stylesheet" href="/css/style.css">
   
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>




  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Pembayaran</h2>
      <p class="lead">Pilih metode pembayaran anda.</p>
    </div>



<h4 class="mb-3">Metode Pembayaran(pickup)</h4>
<p class="lead">Total (Rp.{{ number_format($order->price, '2', ',', '.') }})</p>
<p class="lead"> Lokasi Pickup: {{ $alamat }} </p>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="credit2-tab" data-bs-toggle="tab" data-bs-target="#credit2-tab-pane" type="button" role="tab" aria-controls="credit2-tab-pane" aria-selected="true">Bank Transfer</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
              <button class="nav-link" id="debit2-tab" data-bs-toggle="tab" data-bs-target="#debit2-tab-pane" type="button" role="tab" aria-controls="debit2-tab-pane" aria-selected="false">Debit Card</button>
            </li> --}}
            {{-- <li class="nav-item" role="presentation">
              <button class="nav-link" id="gopay2-tab" data-bs-toggle="tab" data-bs-target="#gopay2-tab-pane" type="button" role="tab" aria-controls="gopay2-tab-pane" aria-selected="false">GoPay</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="ovo2-tab" data-bs-toggle="tab" data-bs-target="#ovo2-tab-pane" type="button" role="tab" aria-controls="ovo2-tab-pane" aria-selected="false">OVO</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="dana2-tab" data-bs-toggle="tab" data-bs-target="#dana2-tab-pane" type="button" role="tab" aria-controls="dana2-tab-pane" aria-selected="false">Dana</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="mbanking2-tab" data-bs-toggle="tab" data-bs-target="#mbanking2-tab-pane" type="button" role="tab" aria-controls="mbanking2-tab-pane" aria-selected="false">M-Banking</button>
            </li>
             --}}
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="credit2-tab-pane" role="tabpanel" aria-labelledby="credit2-tab" tabindex="0">
              <div class="card card-body">

                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf
                  <p>1. Setelah melakukan pemesanan, silahkan melakukan pembayaran dengan melakukan transfer ke salah satu dari rekening Perdana Aksara:</p>

                    <p> Bank Mandiri: 1231221111999  a.n. PT Perdana Aksara</p>
                  <p> Bank BCA: 3121717373 a.n. PT Perdana Aksara</p>
                    <p>2. Foto/ pindai (scan)/ screenshot bukti transfer anda. Kami menganjurkan agar anda juga tetap menyimpan bukti transfer anda, sebagai bukti jika terjadi perselisihan</p>
                    
                    <p>3. Unggah (upload) foto, hasil pindaian (scan), atau screenshot bukti transfer anda ke tautan (link) yang ditunjukkan pada email konfirmasi pesanan anda.</p>
                    
                    <p>4. Tim PerdanaAksara.com akan memastikan bahwa bukti transfer yang anda upload valid dan dana yang anda kirimkan berhasil terkirim.</p>
                    
                    <p>5. Apabila pembayaran anda berhasil diverifikasi, maka anda akan menerima email pemberitahuan, dan pesanan anda dapat segera diambil dari cabang terdekat.</p>
                {{-- <div class="row gy-3">
                  <div class="col-md-6">
                    
                    <label for="cc-name" class="form-label">Name on card</label>
                    <input  name="card-name" type="text" class="form-control" id="cc-name" placeholder="" >
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>
      
                  <div class="col-md-6">
                    <label for="cc-number" class="form-label">Credit card number</label>
                    <input  name="card-number" type="text" class="form-control" id="cc-number" placeholder="" >
                    <small class="text-muted">16 digit</small>
                    <div class="invalid-feedback">
                      Credit card number is 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="cc-expiration" class="form-label">Expiration</label>
                    <input  name="card-expiration" type="text" class="form-control" id="cc-expiration" placeholder="" >
                    <small class="text-muted">Year</small>
                    <div class="invalid-feedback">
                      Expiration date 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">CVV</label>
                    <input  name="card-cvv" type="text" class="form-control" id="cc-cvv" placeholder="" >
                    <small class="text-muted">3 digit</small>
                    <div class="invalid-feedback">
                      Security code 
                    </div>
                  </div>
                </div> --}}
                
                <input type="hidden" name="pmethod" value="credit">
          <input type="hidden" name="pinput" value="card">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>

              </div>

            </div>
            {{-- <div class="tab-pane fade" id="debit2-tab-pane" role="tabpanel" aria-labelledby="debit2-tab" tabindex="0">
              
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="dc-name" class="form-label">Name on card</label>
                    <input name="card-name" type="text" class="form-control" id="dc-name" placeholder="" >
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>
      
                  <div class="col-md-6">
                    <label for="dc-number" class="form-label">Debit card number</label>
                    <input  name="card-number" type="text" class="form-control" id="dc-number" placeholder="" >
                    <small class="text-muted">16 digit</small>
                    <div class="invalid-feedback">
                      Debit card number is 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="dc-expiration" class="form-label">Expiration</label>
                    <input  name="card-expiration" type="text" class="form-control" id="dc-expiration" placeholder="" >
                    <small class="text-muted">Year</small>
                    <div class="invalid-feedback">
                      Expiration date 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="dc-cvv" class="form-label">CVV</label>
                    <input  name="card-cvv"type="text" class="form-control" id="dc-cvv" placeholder="" >
                    <small class="text-muted">3 digit</small>
                    <div class="invalid-feedback">
                      Security code 
                    </div>
                  </div>
                </div>
               
                <input type="hidden" name="pmethod" value="debit">    
          <input type="hidden" name="pinput" value="card">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button> --}}
            </form>

              </div>

            </div>
            <div class="tab-pane fade" id="gopay2-tab-pane" role="tabpanel" aria-labelledby="gopay2-tab" tabindex="0">
              
              <div class="card card-body">
  
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf

                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input  name="no-hp" type="text" class="form-control" id="no-hp" placeholder="" >
                    <small class="text-muted">ex:08123456789123</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>          
                </div>
                {{-- <input type="hidden" name="name" value="{{auth()->user()->name}}"> --}}
                {{-- <input type="hidden" name="username" value="{{auth()->user()->username}}"> --}}
                {{-- <input type="hidden" name="email" value="{{auth()->user()->email}}"> --}}
                {{-- <input type="hidden" name="price" value="{{$total}}"> --}}
                <input type="hidden" name="pmethod" value="gopay">
          <input type="hidden" name="pinput" value="phone">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>

              </div>

            </div>
            <div class="tab-pane fade" id="ovo2-tab-pane" role="tabpanel" aria-labelledby="ovo2-tab" tabindex="0">
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf
  
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input  name="no-hp" type="text" class="form-control" id="no-hp" placeholder="" >
                    <small class="text-muted">ex:08123456789123</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>          
                </div>
                {{-- <input type="hidden" name="name" value="{{auth()->user()->name}}"> --}}
                {{-- <input type="hidden" name="username" value="{{auth()->user()->username}}"> --}}
                {{-- <input type="hidden" name="email" value="{{auth()->user()->email}}"> --}}
                {{-- <input type="hidden" name="price" value="{{$total}}"> --}}
                <input type="hidden" name="pmethod" value="ovo">
          <input type="hidden" name="pinput" value="phone">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>

              </div>

            </div>
            <div class="tab-pane fade" id="dana2-tab-pane" role="tabpanel" aria-labelledby="dana2-tab" tabindex="0">
              
              <div class="card card-body">
  
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input  name="no-hp"type="text" class="form-control" id="no-hp" placeholder="" >
                    <small class="text-muted">ex:08123456789123</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>          
                </div>
                {{-- <input type="hidden" name="name" value="{{auth()->user()->name}}"> --}}
                {{-- <input type="hidden" name="username" value="{{auth()->user()->username}}"> --}}
                {{-- <input type="hidden" name="email" value="{{auth()->user()->email}}"> --}}
                {{-- <input type="hidden" name="price" value="{{$total}}">--}} 
                <input type="hidden" name="pmethod" value="dana">
          <input type="hidden" name="pinput" value="phone">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>

              </div>

            </div>
            <div class="tab-pane fade" id="mbanking2-tab-pane" role="tabpanel" aria-labelledby="mbanking2-tab" tabindex="0">
              
              <div class="card card-body">
                      
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf
                <h5>Virtual Account Bank:</h5>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bca">
                  <label class="form-check-label" for="flexRadioDefault1">
                    BCA
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="mandiri" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Mandiri
                  </label>
                </div>
                
          <input type="hidden" name="pmethod" value="virtual">
          <input type="hidden" name="pinput" value="virtual">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>

                </div>       

            </div>

          </div>

          <form action="/order/{{ $order->id }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type = "submit" class="btn btn-outline-primary btn-sm btn-icon" onclick ="return confirm('Cancel Payment?')">
            Go Back To Cart
            </button>
          </form>


        </main>

        
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      
            <script src="form-validation.js"></script>
        </body>
      </html>
      
      <footer>
        @include('partials.footer')
        </footer>