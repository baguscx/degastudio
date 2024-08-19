<x-app-layout>
    <div class="container mt-5">
        <h2>Daftar Paket</h2>

        <div class="card">
            <div class="card-header">
                Daftar Paket
            </div>
            <div class="card-body">

                <!-- Table for listing packages -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pakets as $index => $paket)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $paket->nama }}</td>
                                    <td>{{ $paket->tipe }}</td>
                                    <td>Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                                    <td>{{ $paket->deskripsi }}</td>
                                    <td>
                                        <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
