<x-app-layout>
    <div class="container mt-5">
                @if ($bayar)
                    <div class="alert alert-warning">
                        <strong>Pemberitahuan:</strong><br>
                        Anda Memiliki Pesanan yang belum dibayar. Silahkan lakukan pembayaran sebelum tanggal pemesanan. Klik <a href="{{ route('riwayat') }}">Disini</a>
                    </div>
                @endif
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
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="order_date">Pilih Tanggal:</label>
                        <input type="date" id="order_date" name="order_date" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="jam">Pilih Jam:</label>
                        <select id="jam" name="jam" class="form-control" required>
                            <option value="">-- Pilih Jam --</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="catatan">Catatan:</label>
                        <textarea id="catatan" name="catatan" class="form-control"></textarea>
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
    <li class="list-group-item">Tanggal: {{ \Carbon\Carbon::parse($date['tanggal'])->format('d-m-Y') }} - Jam: {{ $date['jam'] }}</li>
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
            const jamSelect = document.getElementById('jam');

            // Filter jam yang sudah dipesan pada tanggal yang dipilih
            const unavailableTimes = orderedDates.filter(item => item.tanggal === selectedDate).map(item => item.jam);

            // Reset pilihan jam
            jamSelect.querySelectorAll('option').forEach(option => {
                option.disabled = false;
            });

            // Disable jam yang sudah dipesan
            unavailableTimes.forEach(time => {
                const option = jamSelect.querySelector(`option[value="${time}"]`);
                if (option) {
                    option.disabled = true;
                }
            });

            if (unavailableTimes.includes(jamSelect.value)) {
                alert("Jam yang dipilih sudah dipesan, silakan pilih jam lain.");
                jamSelect.value = ""; // Clear the selected time
            }
        });

    </script>
</x-app-layout>
