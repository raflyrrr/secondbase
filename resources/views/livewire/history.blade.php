<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" {{route('home')}} " class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
        </div>
    </div>

    <div class="row" mt-4>
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse($pesanans as $pesanan)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pesanan->created_at}}</td>
                            <td> {{$pesanan->kode_pemesanan}} </td>
                            <td>
                                <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <br>
                                <img src=" {{url('assets/sold')}}/{{ $pesanan_detail->product->gambar }} " class="img-fluid" width="80">
                                {{$pesanan_detail->product->nama}}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->status == 1)
                                Belum Lunas
                                @else
                                Lunas
                                @endif
                            </td>
                            <td> <strong> Rp. {{number_format($pesanan->total_harga)}} </strong> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
            <a class="btn btn-success float-right" href="https://api.whatsapp.com/send?phone=6285894801042&text=Halo%20kak,%20saya%20ingin%20mengkonfirmasi%20pembayaran%20dengan%20kode%20produk:%20SB-%20

" role="button"target="_blank"> <i class="fab fa-whatsapp"></i> Konfirmasi Pembayaran</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p> Untuk pembayaran silahkan dapat transfer di rekening dibawah ini :
                        <div class="media">
                            <img class="mr-3" src=" {{url('assets/bca.svg')}} " alt="Bank BCA" width="60">
                            <div class="media-body">
                                <h5 class="mt-0">Bank BCA</h5>
                                No. Rekening 012345-123-123-123 atas nama <strong>Marhani Khurnia Sari</strong>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>