<x-app-layout>
    <div class="container mt-5">
        <h2>Detail Pesanan</h2>

        <div class="card">
            <div class="card-header">
                Pesanan pada {{ \Carbon\Carbon::parse($pesan->tanggal)->format('d-m-Y') }}
            </div>
            <div class="card-body">

                @if (Auth::user()->hasRole('user'))
                    <div class="alert alert-info">
                        <strong>Pembayaran:</strong><br>
                        BCA 1234567890 a/n Degastudio
                    </div>
                @endif

                <!-- Table with striped rows and fixed column width -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 30%;">Keterangan</th>
                                <th scope="col" style="width: 70%;">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{ $pesan->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Telepon</th>
                                <td>{{ $pesan->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tipe</th>
                                <td>{{ $pesan->tipe }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Paket</th>
                                <td>{{ $pesan->paket }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Harga</th>
                                <td>Rp {{ number_format($pesan->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal & Jam Pemesanan</th>
                                <td>{{ \Carbon\Carbon::parse($pesan->tanggal)->format('d-m-Y').' | '.$pesan->jam}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status Pembayaran</th>
                                <td>
                                    @if($pesan->payment_status == 'success')
                                        <span class="text-success">{{ $pesan->payment_status }}</span>
                                    @elseif($pesan->payment_status == 'pending')
                                        <span class="text-warning">{{ $pesan->payment_status }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="catatan">Catatan</th>
                                <td>{{ $pesan->catatan }}</td>
                            </tr>
                            @if($pesan->bukti_pembayaran)
                                <tr>
                                    <th scope="row">Bukti Pembayaran</th>
                                    <td>
                                        <img src="{{ '/images/bukti_pembayaran/' . $pesan->bukti_pembayaran }}" alt="Bukti Pembayaran" class="img-fluid" style="max-width: 150px;">
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                @if (Auth::user()->hasRole('user'))
                <form action="{{ route('pesan.uploadBukti', $pesan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Upload Bukti Pembayaran</button>
                </form>
                <a href="{{ route('riwayat') }}" class="btn btn-sm btn-primary mt-3">Kembali ke Riwayat Pemesanan</a>
                @endif
                @if (Auth::user()->hasRole('admin'))
                <a href="{{ route('daftar.pesanan') }}" class="btn btn-sm btn-primary mt-3">Kembali ke Daftar Pemesanan</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
