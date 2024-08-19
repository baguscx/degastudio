<x-app-layout>
    <div class="container mt-5">
        <h2>Daftar Pesanan</h2>

        <div class="card">
            <div class="card-header">
                Daftar Pesanan
            </div>
            <div class="card-body">
                <!-- Table for listing orders -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesans as $index => $pesan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pesan->user->name }}</td>
                                    <td>{{ $pesan->phone }}</td>
                                    <td>{{ $pesan->tipe }}</td>
                                    <td>{{ $pesan->paket }}</td>
                                    <td>Rp {{ number_format($pesan->harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pesan->tanggal)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($pesan->payment_status == 'success')
                                            <span class="text-success">{{ $pesan->payment_status }}</span>
                                        @elseif($pesan->payment_status == 'pending')
                                            <span class="text-warning">{{ $pesan->payment_status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('detail.pesanan', $pesan->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        {{-- <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination if needed -->
                {{-- {{ $pesans->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
