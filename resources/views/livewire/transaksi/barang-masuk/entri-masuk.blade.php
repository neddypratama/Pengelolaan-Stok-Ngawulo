<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang Masuk</h1>
        <a href="{{ route('barang-masuk') }}"
            class="d-none d-sm-inline-block btn btn-md btn-secondary pr-3 shadow-sm rounded-pill">
            <i class="fas fa-chevron-left mr-2"></i></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Entri Data Barang Masuk</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control" wire:model="kode_masuk" readonly>
                        </div>
                        <div class="form-group">
                            <label for="barang">Nama Barang</label>
                            <select class="form-control  @error('id_barang') is-invalid @enderror"
                                wire:model="id_barang" name="id_barang">
                                <option value="">Pilih barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                            @error('id_barang')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok_sebelumnya">Stok Sebelumnya</label>
                            <div class="input-group" style="width: 100%">
                                <input type="number" class="form-control" id="stok_sebelumnya" name="stok_sebelumnya"
                                    readonly>
                                <div class="input-group-append">
                                    <input type="text" class="form-control bg-secondary text-white" id="satuan"
                                        name="satuan" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                wire:model="tanggal_masuk">
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah Masuk</label>
                            <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror"
                                wire:model="jumlah_masuk" min="0" name="jumlah_masuk" value="0">
                            @error('jumlah_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_stok">Total Stok</label>
                            <input type="number" class="form-control" id="total_stok" name="total_stok" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button class="btn btn-secondary text-white">Batal</button>
            </form>
            {{-- <form wire:submit.prevent="save">
                <div class="row">
                    <!-- Form Input (7 Kolom) -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" wire:model="kode_barang" readonly>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number"
                                        class="form-control @error('stok_barang') is-invalid @enderror"
                                        wire:model="stok_barang" min="0">
                                    @error('stok_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="mb-3">
                                    <label class="form-label">Satuan</label>
                                    <select class="form-control @error('id_satuan') is-invalid @enderror"
                                        wire:model="id_satuan">
                                        <option value="">Pilih Satuan</option>
                                        @foreach ($satuans as $satuan)
                                            <option value="{{ $satuan->id_satuan }}">{{ $satuan->nama_satuan }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_satuan')
                                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kosong untuk Estetika (5 Kolom) -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                wire:model="nama_barang">
                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <select class="form-control  @error('id_jenis') is-invalid @enderror" wire:model="id_jenis">
                                <option value="">Pilih Jenis</option>
                                @foreach ($jeniss as $jenis)
                                    <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama_jenis }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form> --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectBarang = document.querySelector('select[name="id_barang"]');
        const stokSebelumnyaInput = document.getElementById('stok_sebelumnya');
        const satuanInput = document.getElementById('satuan');
        const jumlahMasukInput = document.querySelector('input[name="jumlah_masuk"]');
        const totalStokInput = document.getElementById('total_stok');
        console.log(selectBarang);

        selectBarang.addEventListener('change', function() {
            const barangId = this.value;

            if (barangId) {
                fetch(`/get-barang/${barangId}`)
                    .then(response => response.json())
                    .then(data => {
                        totalStokInput.value = data.stok;
                        stokSebelumnyaInput.value = data.stok;
                        satuanInput.value = data.satuan;
                    })
                    .catch(error => console.error('Error fetching data:', error));
            } else {
                stokSebelumnyaInput.value = '';
                satuanInput.value = ''; // Default satuan
            }
        });

        jumlahMasukInput.addEventListener('input', updateTotalStok);

        function updateTotalStok() {
            const stokSebelumnya = parseFloat(stokSebelumnyaInput.value) || 0;
            const jumlahMasuk = parseFloat(jumlahMasukInput.value) || 0;
            totalStokInput.value = stokSebelumnya;

            if (jumlahMasuk === 0) {
                totalStokInput.value = stokSebelumnya; // Jika jumlah belum diisi, stok total = stok sebelumnya
            } else {
                totalStokInput.value = stokSebelumnya +
                jumlahMasuk; // Jika jumlah diisi, stok total = stok sebelumnya + jumlah masuk
            }
        }
    });
</script>
