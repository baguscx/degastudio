<x-app-layout>
    <div class="container mt-5 mb-5">
        <form action="{{route('store-paket')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Paket</label>
                <select class="form-control" id="tipe" name="tipe">
                    <option value="" selected disabled>Pilih Paket</option>
                    <option value="Foto">Foto</option>
                    <option value="Video">Video</option>
                    <option value="Bundling">Bundling</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
