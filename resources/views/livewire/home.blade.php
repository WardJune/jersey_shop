<div class="container bg-white">
  <img src="{{ url('assets/slider/slider1.png') }}" alt="" class="img-fluid animate__animated animate__fadeIn">

  <section class="ligas mt-4 animate__animated animate__fadeIn">
    <h2 class="mb-3"><strong>Pilih Liga</strong></h2>
    <div class="row">
      @foreach($ligas as $liga)
      <div class="col-md-3">
        <div class="card border-0 shadow">
          <div class="card-body text-center">
            <a href="{{route('product.liga', $liga->slug)}}">
              <img src='{{ url("assets/liga/$liga->image") }}' alt="" class="img-fluid">
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <section class="Best Products mt-4 animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="mb-3"><strong>Best Products</strong></h2>
      <a class="btn btn-dark" href="{{route('product.index')}}">See all</a>
    </div>
    <div class="row">
      @foreach($products as $product)
      <div class="col-md-3 mb-3">
        <div class="card rounded-lg jersey">
          <div class="card-body text-center">
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
  </section>
</div>