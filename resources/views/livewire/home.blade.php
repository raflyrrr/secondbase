<div class="container">
    <div class="banner">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src=" {{url('assets/slider/logo.png')}} " class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{url('assets/slider/logo.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{url('assets/slider/logo.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>

    <section class="pilih-batch mt-4">
        <h3><strong>Pilih Batch</strong></h3>
        <div class="row mt-3">
            @foreach ($categories as $batch)
            <div class="col mt-3">
                <a href=" {{route('products.batch',$batch->id)}} ">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <img src=" {{url('assets/batch')}}/{{ $batch->gambar }} " class="img-fluid">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5 class="text-dark"><strong> {{$batch->nama}} </strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <section class="sold-fast mt-5">
        <h3><strong>Sold Fast</strong>
            <a href=" {{ route('products') }} " class="btn btn-dark float-right"> <i class="fas fa-eye"></i> More</a>
        </h3>
        <div class="row mt-4">
            @foreach ($products as $sold)
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src=" {{url('assets/sold')}}/{{ $sold->gambar }} " class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong> {{$sold->nama}} </strong></h5>
                                <h5>Rp. {{number_format( $sold->harga) }}</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href=" {{ route('products.detail' ,$sold->id)}} " class="btn btn-dark btn-block">Detail</a>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>




</div>