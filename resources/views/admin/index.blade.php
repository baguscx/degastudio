<x-app-layout>
    <body>

        <div class="container">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name;}}" readonly>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{Auth::user()->phone;}}" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="date">Tanggal Pemesanan</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="package">Pilih Paket</label>
                        <select name="package" id="package" class="form-control" required>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="harga">Harga</label>
                        <input type="harga" name="harga" id="harga" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="rincian">Rincian</label>
                        <textarea name="rincian" id="rincian" class="form-control"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        </div>

    </body>
</x-app-layout>
