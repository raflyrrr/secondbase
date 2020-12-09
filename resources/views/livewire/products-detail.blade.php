<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{route('home')}} " class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{route('products')}} " class="text-dark">List Batch</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src=" {{url('assets/sold')}}/{{ $product->gambar }} " class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{$product->nama}}</strong>
            </h2>
            <h4>Rp. {{number_format($product->harga)}}
                @if($product->is_ready ==1)
                <span class="badge badge-success"> <i class="fas fa-check"></i> Ready</span>
                @else
                <span class="badge badge-danger"><i class="fas fa-times"></i> Sold</span>
                @endif
            </h4>
            <hr>
            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang">
                        <table class="table" style="border-top :hidden">
                            <tr>
                                <td>Jumlah :</td>
                                <td><input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}"autofocus>

                                    @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror</td>
                            </tr>
                            <tr>
                                <td>Batch :</td>
                                <td>
                                    <img src=" {{url('assets/batch')}}/{{ $product->category->gambar }} " class="img-fluid" width="150">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{session('message')}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-block"> <i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>