@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order Detail</h1>
      </div>


<div>
<p>customer name: {{ $order->user->name }}</p>
<p>customer username: {{ $order->user->username }}</p>
<p>customer email: {{ $order->user->email }}</p>
@if($order->address)
<p>Order delivery</p>
<p>delivery address: {{ $order->address}}</p>
<p>alt delivery address: {{ $order->address2}}</p>
<p>Kurir: {{ $order->kurir }}</p>
<p>provinsi: {{ $order->provinsi }}</p>
<p>Kota: {{ $order->kota }}</p>
<p>Zip {{ $order->zip }}</p>
@else
<p>Order pickup</p>
<p>Kota: {{ $order->kota }}</p>
@endif
<div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th scope="col" onclick="sortTable(0)">No</th>
              <th scope="col" onclick="sortTable(1)">Book Name</th>
              <th scope="col" onclick="sortTable(2)">Price</th>
              <th scope="col" onclick="sortTable(3)">Quantity</th>
              <th scope="col" onclick="sortTable(4)">Price*Quantity</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($transactions as $transaction)
              <p class="visually-hidden">
                {{  $tprice = $transaction->book->price*$transaction->qty;}}
                </p>
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$transaction->book->title}}</td>
              <td>Rp.{{number_format($transaction->book->price, '2', ',', '.')}}</td>
              <td>{{$transaction->qty}}</td>
              <td>Rp.{{number_format($tprice, '2', ',', '.')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
            <p>Total Harga: Rp.{{number_format($order->price, '2', ',', '.')}}</p>
         
         
        <p>Payment Detail</p>
        <p>Payment method:{{ $order->pmethod }}</p>
       @if ($order->pmethod === 'credit' || $order->pmethod === 'debit')
        <p>Name: {{ $order['card-name'] }}</p>
        <p>Number: {{ $order['card-number'] }}</p>
        <p>Exp: {{ $order['card-expiration'] }}</p>
        <p>CVV: {{ $order['card-cvv'] }}</p>
        @else
        <p>no hp: {{ $order['no-hp'] }}</p>
       @endif
  
      <script>
        function sortTable(n) {
          var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
          table = document.getElementById("myTable");
          switching = true;
          // Set the sorting direction to ascending:
          dir = "asc";
          /* Make a loop that will continue until
          no switching has been done: */
          while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
              // Start by saying there should be no switching:
              shouldSwitch = false;
              /* Get the two elements you want to compare,
              one from current row and one from the next: */
              x = rows[i].getElementsByTagName("TD")[n];
              y = rows[i + 1].getElementsByTagName("TD")[n];
              /* Check if the two rows should switch place,
              based on the direction, asc or desc: */
              if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                  // If so, mark as a switch and break the loop:
                  shouldSwitch = true;
                  break;
                }
              } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                  // If so, mark as a switch and break the loop:
                  shouldSwitch = true;
                  break;
                }
              }
            }
            if (shouldSwitch) {
              /* If a switch has been marked, make the switch
              and mark that a switch has been done: */
              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
              // Each time a switch is done, increase this count by 1:
              switchcount ++;
            } else {
              /* If no switching has been done AND the direction is "asc",
              set the direction to "desc" and run the while loop again. */
              if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
              }
            }
          }
        }
        </script>

@endsection