<x-app-layout>
    <div class="container mt-5">
        <h2>Riwayat Pemesanan dan Pembayaran</h2>

        @if($pesans->isEmpty())
            <p>Anda belum memiliki riwayat pemesanan.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Tipe</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesans as $pesan)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($pesan->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $pesan->tipe }}</td>
                                <td>{{ $pesan->paket }}</td>
                                <td>Rp {{ number_format($pesan->harga, 0, ',', '.') }}</td>
                                <td>
                                    {{-- Assuming there is a payment status field --}}
                                    {{-- Replace with actual payment status if available --}}
                                    @if($pesan->payment_status == "success")
                                        <span class="text-success">Success</span>
                                    @elseif($pesan->payment_status == "pending")
                                        <span class="text-warning">Menunggu Konfirmasi</span>
                                        <a href="{{ route('bayar', $pesan->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                    @elseif($pesan->payment_status == "unpaid")
                                        <span class="text-warning">Belum Dibayar</span> |
                                        <a href="{{ route('bayar', $pesan->id) }}" class="btn btn-sm btn-primary">Bayar Sekarang</a>
                                    @endif
                                    {{-- <span class="badge badge-warning">Belum Dibayar</span> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
