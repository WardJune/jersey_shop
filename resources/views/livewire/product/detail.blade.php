<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-0">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a
          href="{{ route('product.liga',$product->liga->slug) }}">{{$product->liga->name}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
  </nav>
  @if (session('success'))
  <div class="alert alert-success">
    {{session('success')}}
  </div>
  @endif
  <div class="row">
    <div class="col-md-6">
      <img class="img-thumbnail" src='{{url("assets/jersey/$product->image")}}' alt="">
    </div>
    <div class="col-md-5">
      <h4><strong>{{$product->name}}</strong></h4>
      <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-muted">Rp. {{ number_format($product->price)}}</h3>
        <h4>
          @if ($product->is_ready == 1)
          <div class="badge badge-success">Stock Available</div>
          @else
          <div class="badge badge-secondary">Out of Stock</div>
          @endif
        </h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form wire:submit.prevent='addToCart'>
            <table class="table table-borderless">
              <tr>
                <th scope='row'>League</th>
                <td>:</td>
                <td><img class="img-thumbnail" width="50" src="{{ url("assets/liga/".$product->liga->image)}}" alt="">
                </td>
              </tr>
              <tr>
                <th scope='row'>Type</th>
                <td>:</td>
                <td>{{$product->type}}</td>
              </tr>
              <tr>
                <th scope='row'>Weight</th>
                <td>:</td>
                <td>{{$product->weight}}</td>
              </tr>
              <tr>
                <th scope='row'>Quantity</th>
                <td>:</td>
                <td>
                  <div class="d-flex">
                    <a wire:click='decrement'
                      class="btn btn-secondary @if ($value <=1 || $value == 0) disabled @endif"><span
                        class="fas fa-minus"></span></a>
                    <input @if ( $value==0) disabled @endif wire:keydown.enter='check' wire:model='value' type="number"
                      class="form-control w-25 text-center border-0" name=" name">
                    <a wire:click='increment' class="btn btn-secondary @if ( $value==0) disabled @endif"><span
                        class="fas fa-plus "></span>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="3" class=" @if ($value> 1 || $value == 0) text-muted
                @endif ">
                  <h5><strong>Name Set (custom name and number)</strong></h5>
                </td>
              </tr>
              <tr>
                <th scope='row' class="@if ($value> 1 || $value == 0) text-muted
                @endif">Harga</th>
                <td>:</td>
                <td class="@if ($value> 1 || $value == 0) text-muted
                @endif">Rp. {{number_format($product->namesetPrice)}}</td>
              </tr>
              <tr>
                <th scope="row" class=" @if ($value> 1 || $value == 0) text-muted
                @endif ">Name Set</th>
                <td>:</td>
                <td><input wire:model='name_set' type="name"
                    class="form-control @error('name_set') is-invalid @enderror" @if ($value> 1 || $value == 0) disabled
                  @endif >
                </td>
              </tr>
              <tr>
                <th scope="row" class=" @if ($value> 1 || $value == 0) text-muted
                @endif ">Number</th>
                <td>:</td>
                <td><input wire:model='number_set' type="number"
                    class="form-control @error('number_set') is-invalid @enderror" @if ($value> 1 ||
                  $value== 0) disabled
                  @endif>
                </td>
              </tr>
              <tr>
                <td colspan="3"><button @if ($product->is_ready == 0 || $value == 0)
                    disabled
                    @endif class="btn btn-dark btn-block"><span class="fas fa-shopping-cart"></span> Add to
                    Chart</button>
                </td>
              </tr>
          </form>
          {{-- <tr>
            <td colspan="3"><button @if ($product->is_ready == 0)
                disabled
                @endif class="mt-n3 btn btn-outline-dark btn-block"><span class="fas fa-shopping-bag"></span> Buy
                Now</button>
            </td>
          </tr> --}}
          </table>
        </div>
      </div>
    </div>
  </div>
</div>