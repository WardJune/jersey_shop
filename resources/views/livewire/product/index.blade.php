<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-0">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
    </ol>
  </nav>
  <div class="row mb-3">
    <div class="col">
      <h2>{{$title}}</h2>
    </div>
    <div class="col-md-4">
      <div class="input-group mb-3">
        <input wire:model='keyword' type="text" class="form-control" placeholder="Search" aria-label="Username"
          aria-describedby="basic-addon1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><span class="fas fa-search"></span></span>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-2">
    @foreach($products as $product)
    <div class="col-md-3 mb-3">
      <div class="card rounded-lg jersey">
        <div class="card-body text-center d-flex flex-column justify-content-between">
          <img src='{{ url("assets/jersey/$product->image") }}' alt="" class="img-fluid mb-2">
          <div class="row">
            <div class="col-md-12">
              <h5>{{ $product->name }}</h5>
              <h5 class="text-muted">Rp. {{ number_format($product->price) }}</h5>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-md-12">
              <a href="{{route('product.detail', $product->id)}}" class="btn btn-block btn-dark">Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {{$products->links()}}
</div>