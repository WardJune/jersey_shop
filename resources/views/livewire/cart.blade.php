<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-0">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>
  </nav>
  @if (session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Desc</th>
            <th scope="col">Nameset</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @php $i = 1 @endphp
          @forelse ($orderDetails as $orderDetail)
          <tr>
            <th scope="row">{{ $i++}}</th>
            <td><img width="200" src="{{ url("assets/jersey/".$orderDetail->product->image)}}" alt=""></td>
            <td>{{$orderDetail->product->name}}</td>
            <td>@if ($orderDetail->nameset == 1)
              Name : {{$orderDetail->name}} <br>
              Number : {{$orderDetail->number}}
              @else
              -
              @endif
            </td>
            <td>
              {{$orderDetail->jumlah_pesanan}}
            </td>
            <td>
              Rp. {{number_format($orderDetail->product->price)}}
            </td>
            <td>
              <strong>
                Rp. {{number_format($orderDetail->total)}}
              </strong>
            </td>
            <td><span wire:click='destroy({{ $orderDetail->id }})' class="fas fa-trash text-danger"></span>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" align="center">
              Empty Cart
            </td>
          </tr>
          @endforelse
          @if (!empty($order))

          <tr align="right">
            <td colspan="6"><strong>Total Price :</strong></td>
            <td colspan="6"><strong>Rp. {{number_format($order->total)}}</strong></td>
            <td></td>
          </tr>
          <tr align="right">
            <td colspan="6"><strong>unique Id :</strong></td>
            <td colspan="6"><strong>{{$order->uniqueId}}</strong></td>
            <td></td>
          </tr>
          <tr align="right">
            <td colspan="6"><strong>Total Yang harus dibayarkan :</strong></td>
            <td colspan="6"><strong>Rp. {{number_format($order->total)}}</strong></td>
            <td></td>
          </tr>
          <tr align="right">
            <td colspan="6"></td>
            <td colspan="2"><a href=" " class="btn btn-warning btn-block"><span class="fas fa-arrow-right"></span>
                CheckOut</a>
            </td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>