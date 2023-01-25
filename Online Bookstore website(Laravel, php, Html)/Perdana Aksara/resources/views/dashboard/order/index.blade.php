@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Book Orders</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th scope="col" onclick="sortTable(0)">#</th>
              <th scope="col" onclick="sortTable(1)">Customer Name</th>
              <th scope="col" onclick="sortTable(2)">Status</th>
              <th scope="col" onclick="sortTable(3)">kota</th>
              <th scope="col" onclick="sortTable(4)">price</th>
              <th scope="col" onclick="sortTable(5)">pmethod</th>
              <th scope="col" >Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($orders as $order)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$order->user->name}}</td>
              <td>{{$order->status}}</td>
              <td>{{$order->kota}}</td>
              <td>{{$order->price}}</td>
              <td>{{$order->pmethod}}</td>
              <td>
                <a href="/dashboard/order/{{$order->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
              <form action="/dashboard/orders/index/{{$order->id}}" method="post" class="d-inline">
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