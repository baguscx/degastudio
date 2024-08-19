<x-app-layout>
    <div class="container mt-5">
        <form action="{{route('pesan.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="phone">Nomor Telepon:</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="tipe">Pilih Tipe:</label>
                        <select id="tipe" name="tipe" class="form-control" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="Foto">Foto</option>
                            <option value="Video">Video</option>
                            <option value="Bundling">Bundling</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nama-paket">Pilih Nama Paket:</label>
                        <select id="nama-paket" name="nama" class="form-control" required>
                            <option value="">-- Pilih Nama Paket --</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="harga">Harga:</label>
                        <input type="text" id="harga" name="harga" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" readonly></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="order_date">Pilih Tanggal:</label>
                        <input type="date" id="order_date" name="order_date" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>

        <div class="col-md-12 mt-5">
            <div class="form-group mb-3">
                <label for="ordered-dates">Tanggal Sudah Dipesan:</label>
                <ul id="ordered-dates" class="list-group">
                    @foreach($orderedDates as $date)
                        <li class="list-group-item">{{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        const pakets = @json($pakets);
        const orderedDates = @json($orderedDates);

        document.getElementById('tipe').addEventListener('change', function() {
            const tipe = this.value;
            const namaPaketSelect = document.getElementById('nama-paket');
            namaPaketSelect.innerHTML = '<option value="">-- Pilih Nama Paket --</option>';

            // Filter paket berdasarkan tipe yang dipilih
            const filteredPakets = pakets.filter(paket => paket.tipe === tipe);

            // Tambahkan opsi ke dropdown nama-paket berdasarkan tipe yang dipilih
            filteredPakets.forEach(paket => {
                const option = document.createElement('option');
                option.value = paket.nama;
                option.textContent = paket.nama;
                option.setAttribute('data-harga', paket.harga.toLocaleString('id-ID'));
                option.setAttribute('data-deskripsi', paket.deskripsi);
                namaPaketSelect.appendChild(option);
            });
        });

        document.getElementById('nama-paket').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            const deskripsi = selectedOption.getAttribute('data-deskripsi');

            document.getElementById('harga').value = harga;
            document.getElementById('deskripsi').value = deskripsi;
        });

        document.getElementById('order_date').addEventListener('change', function() {
            const selectedDate = this.value;
            if (orderedDates.includes(selectedDate)) {
                alert("Tanggal yang dipilih sudah dipesan, silakan pilih tanggal lain.");
                this.value = ""; // Clear the selected date
            }
        });
    </script>
</x-app-layout>
