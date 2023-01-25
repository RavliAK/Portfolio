@extends('layouts.main')

@section('container')
<!doctype html>
<html lang="en">
  
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      {{-- <img class="d-block mx-auto mb-4" src="/img/logo-prenada.png" alt="" width="72" height="57"> --}}
      <h2>Konfirmasi pesanan</h2>
      <p class="lead">Silahkan masukan informasi dibawah</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Keranjang</span>
          <span class="badge bg-primary rounded-pill">{{ $transactions->count() }}</span>
        </h4>
        <p class="visually-hidden">
        {{ $total = 0; }}
        </p>
        @foreach($transactions as $transaction)
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div class="row-9">
            <div class="col-9">
              <h6 class="my-0">{{ $transaction->book->title}}</h6>
              <small class="text-muted">Category : {{ $transaction->book->category->name}}</small>
              <span class="text-muted"> | Rp.{{ number_format($transaction->book->price, '2', ',', '.')}}</span>


              
              <div class="row-3">
               <div class="d-flex align-items-center">
               <form action="/cart/quantity/{{ $transaction->id }}" method="post" class="d-inline">
                 
                 @csrf
                 @method('put')

                 <p class="mt-3">

                <input type="number" value="{{ $transaction->qty }}" class="form-control-sm d-inline" id="quantity" data-id="{{ $transaction->id }}" name="quantity">
 
                </p>
                <button type = "submit" class="btn btn-outline-primary btn-sm btn-icon">
                 <i data-feather="update"></i>Update Quantity
                 </button>
               </div>
             </form>
              
              <div class="d-flex align-items-center">
             <form action="/cart/{{ $transaction->id }}" method="post" class="d-inline">
               @csrf
               @method('delete')
               <button type = "submit" class="btn btn-outline-danger btn-sm btn-icon" onclick ="return confirm('Remove from cart?')">
               <i data-feather="delete"></i>Remove from Cart
               </button>
             </form>
           </div> 
         </div> 
            </div>
            </div>
            <div class="col-4">
            @if($transaction->book->image)
            
            <img src="{{asset('storage/' . $transaction->book->image)}}" class="card-img-top" alt="{{ $transaction->book->category->name }}" class="img-fluid">
            
            @else

            <img src="https://source.unsplash.com/300x300?{{ $transaction->book->category->name }}" class="img-fluid rounded-float-end " alt="{{ $transaction->book->category->name }}">
            @endif
            
            </div>

          </li>
          
          <p class="visually-hidden">
          {{  $total = $total + ($transaction->book->price*$transaction->qty);}}
          </p>
          @endforeach
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Kode Promo</h6>
              <small>Aksara2022</small>
            </div>
            <span class="text-success">−Rp.</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (Rp.{{ number_format($total, '2', ',', '.') }})</span>
            <strong></strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input name="promo" type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Pakai</button>
          </div>
        </form>
      </div>
      
      <div class="col-md-7 col-lg-8">
        <h3 class ="mb-3">Metode Pemesanan</h3>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery-tab-pane" type="button" role="tab" aria-controls="delivery-tab-pane" aria-selected="true">Delivery</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pickup-tab" data-bs-toggle="tab" data-bs-target="#pickup-tab-pane" type="button" role="tab" aria-controls="pickup-tab-pane" aria-selected="false">Pick Up</button>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab" tabindex="0">
            
            <h4 class="mb-3 mt-3">Data Pembeli</h4>
            <form action="/order" method="post">
              @csrf
          <div class="row g-3">
            <div class="col-12">
              <label for="name" class="form-label">Nama</label>
              <input  type="text" class="form-control" id="name" placeholder="" value={{auth()->user()->name}} disabled>
              <div class="invalid-feedback">
                Valid first name is .
            </div>
            </div>
            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" value={{ auth()->user()->username }} disabled >
              <div class="invalid-feedback">
                  Your username is .
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" value={{ auth()->user()->email }} disabled>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input name="address" type="text" class="form-control" id="address" placeholder="1234 Main St" >
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input name="address2" type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-12">
              <label for="kurir" class="form-label">Pilih Kurir</label>
              <select class="form-select" name="kurir" id="kurir" >
                <option value="">Pilih...</option>
                <option>Gojek</option>
                <option>Grab</option>
                <option>JNE</option>
                <option>SiCepat</option>
                <option>Tiki</option>
                <option>Pos Indonesia</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid answer.
              </div>
            </div>

            <div class="col-md-5">
              <label for="provinsi" class="form-label">Provinsi</label>
              <input type="text" class="form-control" name="provinsi" id="provinsi" >
              <div class="invalid-feedback">
                Please select a valid answer.
              </div>
            </div>

            <div class="col-md-4">
              <label for="kota" class="form-label">Kota</label>
              <input type="text" class="form-control" name="kota" id="kota" >
              <div class="invalid-feedback">
                Please provide a valid answer.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Kode Pos</label>
              <input name="zip" type="text" class="form-control" id="zip" placeholder="" >
              <div class="invalid-feedback">
                Zip code .
              </div>
            </div>
          </div>

          <div class="form-check mt-3">
            <input name="save-info" type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

        
          <input type="hidden" name="price" value="{{$total}}">
          <input type="hidden" name="method" value="delivery">
          
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Payment</button>
            </form>
          </div>


          <div class="tab-pane fade" id="pickup-tab-pane" role="tabpanel" aria-labelledby="pickup-tab" tabindex="0">
            
            <h4 class="mb-3 mt-3">Data Pembeli</h4>
            <form action="/order" method="post">
              @csrf
          <div class="row g-3">
            <div class="col-12">

              <label for="name" class="form-label">Nama</label>
              <input  type="text" class="form-control" id="name" placeholder="" value={{auth()->user()->name}} disabled >
              <div class="invalid-feedback">
                Valid first name is .
            </div>
            </div>
            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" value={{ auth()->user()->username }} disabled>
              <div class="invalid-feedback">
                  Your username is .
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" value={{ auth()->user()->email }} disabled >
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <select class="form-select" name="kota" id="kota" >
              <option value="">Choose...</option>
              <option>Jakarta</option>
              <option>Bandung</option>
              <option>Medan</option>
              <option>Yogyakarta</option>
              <option>Pekanbaru</option>
              <option>Makassar</option>
              <option>Palembang</option>
              <option>Surabaya</option>
              <option>Lampung</option>
              <option>Bali</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid answer.
            </div>
          <div class="form-check">
            <input  name="save-info" type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>
          
          <p class="lead">Untuk saat ini gerai Perdana Aksara tersedia di wilayah Jakarta, Bandung, Medan, Yogyakarta, Pekanbaru, Makassar, Palembang, surabaya, Lampung dan Bali</p>
          </div>

          <hr class="my-4">
          <input type="hidden" name="price" value="{{$total}}">
          <input type="hidden" name="method" value="pickup">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Payment</button>
            </form>
        </div>
        

          </div>

          
        </form>
      </div>
    </div>
  </main>

  
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
 {{-- <script>
  
    const quantity = document.querySelectorAll('#quantity')

    quantity.addEventListener('change', function(){
      fetch('/cart/quantity/' +quantity.data-id+ '?quantity=' +quantity.value)
    });

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    });
    function decrementQuantity(qty, rowId) {
    qty=qty - 1;

    axios.patch(`/cart`, {
      quantity.value:qty
    })

    .then(function (response) {
      window.location.href = '{{ route('cart') }}'
    })

    .catch(function (error) {
      window.location.href = '{{ route('cart') }}'
    });
  }
  
</script> --}}
@endsection