<!doctype html>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css%22%3E

<!-- trix editor -->
<link rel="stylesheet" type="text/css" href="/css/trix.css">
<script type="text/javascript" src="/js/trix.js"></script>

<!-- My Style -->
{{-- <body class="bg-black text-white"> --}}
<link rel = "stylesheet" href="/css/style.css">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
   
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
   
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="/img/PRENADA_COVER.jpg" alt="" width="72" height="57">
      <h2>Pembayaran</h2>
      <p class="lead">Pilih metode pembayaran anda.</p>
    </div>



<h4 class="mb-3">Metode Pembayaran(delivery)</h4>
<p class="lead">Total (Rp.{{ number_format($order->price, '2', ',', '.') }})</span></p>


          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="credit-tab" data-bs-toggle="tab" data-bs-target="#credit-tab-pane" type="button" role="tab" aria-controls="credit-tab-pane" aria-selected="true">Credit Card</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="debit-tab" data-bs-toggle="tab" data-bs-target="#debit-tab-pane" type="button" role="tab" aria-controls="debit-tab-pane" aria-selected="false">Debit Card</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="gopay-tab" data-bs-toggle="tab" data-bs-target="#gopay-tab-pane" type="button" role="tab" aria-controls="gopay-tab-pane" aria-selected="false">GoPay</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="ovo-tab" data-bs-toggle="tab" data-bs-target="#ovo-tab-pane" type="button" role="tab" aria-controls="ovo-tab-pane" aria-selected="false">OVO</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="dana-tab" data-bs-toggle="tab" data-bs-target="#dana-tab-pane" type="button" role="tab" aria-controls="dana-tab-pane" aria-selected="false">Dana</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="mbanking-tab" data-bs-toggle="tab" data-bs-target="#mbanking-tab-pane" type="button" role="tab" aria-controls="mbanking-tab-pane" aria-selected="false">M-Banking</button>
            </li>
            
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="credit-tab-pane" role="tabpanel" aria-labelledby="credit-tab" tabindex="0">
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf
                <div class="row gy-3">
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
                    <div class="invalid-feedback">
                      Credit card number is 
                    </div>
                  </div>
      
                  <div clhidass="col-md-3">
                    <label for="cc-expiration" class="form-label">Expiration</label>
                    <input  name="card-expiration" type="text" class="form-control" id="cc-expiration" placeholder="" >
                    <div class="invalid-feedback">
                      Expiration date 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">CVV</label>
                    <input  name="card-cvv" type="text" class="form-control" id="cc-cvv" placeholder="" >
                    <div class="invalid-feedback">
                      Security code 
                    </div>
                  </div>

                  {{-- <input type="hidden" name="price" value="{{$total}}"> --}}
<input type="hidden" name="pmethod" value="credit">          
<input type="hidden" name="pinput" value="card">
<button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="debit-tab-pane" role="tabpanel" aria-labelledby="debit-tab" tabindex="0">
              
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}"> 
                    
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
                    <div class="invalid-feedback">
                      Debit card number is 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="dc-expiration" class="form-label">Expiration</label>
                    <input  name="card-expiration" type="text" class="form-control" id="dc-expiration" placeholder="" >
                    <div class="invalid-feedback">
                      Expiration date 
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="dc-cvv" class="form-label">CVV</label>
                    <input  name="card-cvv"type="text" class="form-control" id="dc-cvv" placeholder="" >
                    <div class="invalid-feedback">
                      Security code 
                    </div>
                  </div>
                </div>
                <input type="hidden" name="pmethod" value="debit">
                <input type="hidden" name="pinput" value="card">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
              </form>
              </div>

            </div>
            <div class="tab-pane fade" id="gopay-tab-pane" role="tabpanel" aria-labelledby="gopay-tab" tabindex="0">
              
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                    @csrf
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input  name="no-hp" type="text" class="form-control" id="no-hp" placeholder="" >
                    <small class="text-muted">ex:08123456789</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>          
                </div>
                <input type="hidden" name="pmethod" value="gopay">
                <input type="hidden" name="pinput" value="phone">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>
              </div>

            </div>
            <div class="tab-pane fade" id="ovo-tab-pane" role="tabpanel" aria-labelledby="ovo-tab" tabindex="0">
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                  @csrf

                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input  name="no-hp" type="text" class="form-control" id="no-hp" placeholder="" >
                    <small class="text-muted">ex:08123456789</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>          
                </div>
                {{-- <input type="hidden" name="address" value="{{order()->address()}}"> --}}
                {{-- <input type="hidden" name="price" value="{{$total}}"> --}}
                <input type="hidden" name="pmethod" value="ovo">
          <input type="hidden" name="pinput" value="phone">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
            </form>
              </div>

            </div>
            <div class="tab-pane fade" id="dana-tab-pane" role="tabpanel" aria-labelledby="dana-tab" tabindex="0">
              
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                    @csrf
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="no-hp" class="form-label">No. HP</label>
                    <input  name="no-hp"type="text" class="form-control" id="no-hp" placeholder="" >
                    <small class="text-muted">ex:08123456789</small>
                    <div class="invalid-feedback">
                      Name on card is 
                    </div>
                  </div>          
                </div>
                <input type="hidden" name="pmethod" value="dana">
                <input type="hidden" name="pinput" value="phone">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout<a class="nav-link" href="/email"></a></button>
              </form>
              </div>

            </div>
            <div class="tab-pane fade" id="mbanking-tab-pane" role="tabpanel" aria-labelledby="mbanking-tab" tabindex="0">
              
              <div class="card card-body">
                <form action="/order/paid/{{$order->id}}" method="post">
                  @method('put')
                    @csrf
                <h5>Virtual Account Bank:</h5>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="BCA">
                  <label class="form-check-label" for="flexRadioDefault1">
                    BCA
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Mandiri"checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Mandiri
                  </label>
                </div>
                
            </div>
            {{-- <input type="hidden" name="price" value="{{$total}}"> --}}
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
              <button type = "submit" class="btn btn-outline-primary btn-sm btn-icon" onclick ="return confirm('Remove from cart?')">
              <i data-feather="cart"></i>Go back to cart
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