<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{route('home')}} " class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Jumlah</td>
                            <td><strong>Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse($pesanan_details as $pesanan_detail)
                        <tr>
                            <td> {{$no++}} </td>
                            <td>
                                <img src=" {{url('assets/sold')}}/{{ $pesanan_detail->product->gambar }} " class="img-fluid" width="200">
                            </td>
                            <td>
                                {{ $pesanan_detail->product->nama }}
                            </td>
                            <td> {{$pesanan_detail->jumlah_pesanan}} </td>
                            <td><strong>Rp. {{number_format($pesanan_detail->product->harga)}}</td></strong>
                            <td>
                                <i wire:click="destroy( {{$pesanan_detail->id}} )" class="fas fa-trash"></i>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Data Kosong</td>
                        </tr>
                        @endforelse

                        @if(!empty($pesanan))
                        <tr>
                            <td colspan="4" align="right"> <strong>Total Harga : </strong> </td>
                            <td><strong> Rp. {{number_format($pesanan->total_harga)}}</td></strong>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td colspan="2">
                                <a href=" {{route('checkout')}} " class="btn btn-success"> <i class="fas fa-arrow-right"></i> Check Out</a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>