<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{route('home')}} " class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href=" {{route('keranjang')}} " class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href=" {{ route('keranjang') }} " class="btn btn-sm btn-dark"> <i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="row" mt-4>
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p> Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <strong>Rp. {{number_format($total_harga)}}</strong></p>
            <div class="media">
                <img class="mr-3" src=" {{url('assets/bca.svg')}} " alt="Bank BCA" width="60">
                <div class="media-body">
                    <h5 class="mt-0">Bank BCA</h5>
                    No. Rekening 012345-123-123-123 atas nama <strong>Marhani Khurnia Sari</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">
                <div class="form-group">
                    <label for="">No. Hp</label>
                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value=" {{old('nohp')}} " required autocomplete="name">

                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" type="number" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout</button>
            </form>

        </div>
    </div>

</div>