<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang Keluar</h1>
        <a href="{{ route('barang-keluar') }}"
            class="d-none d-sm-inline-block btn btn-md btn-secondary pr-3 shadow-sm rounded-pill" wire:navigate>
            <i class="fas fa-chevron-left mr-2"></i></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Entri Data Barang Keluar</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control" wire:model="kode_keluar" readonly>
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
                            <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror"
                                wire:model="tanggal_keluar">
                            @error('tanggal_keluar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_keluar">Jumlah keluar</label>
                            <input type="number" class="form-control @error('jumlah_keluar') is-invalid @enderror"
                                wire:model="jumlah_keluar" min="0" name="jumlah_keluar" value="0">
                            @error('jumlah_keluar')
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
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectBarang = document.querySelector('select[name="id_barang"]');
        const stokSebelumnyaInput = document.getElementById('stok_sebelumnya');
        const satuanInput = document.getElementById('satuan');
        const jumlahkeluarInput = document.querySelector('input[name="jumlah_keluar"]');
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

        jumlahkeluarInput.addEventListener('input', updateTotalStok);

        function updateTotalStok() {
            const stokSebelumnya = parseFloat(stokSebelumnyaInput.value) || 0;
            const jumlahkeluar = parseFloat(jumlahkeluarInput.value) || 0;
            totalStokInput.value = stokSebelumnya;

            if (jumlahkeluar === 0) {
                totalStokInput.value = stokSebelumnya; // Jika jumlah belum diisi, stok total = stok sebelumnya
            } else {
                totalStokInput.value = stokSebelumnya -
                jumlahkeluar; // Jika jumlah diisi, stok total = stok sebelumnya + jumlah keluar
            }
        }
    });

    document.addEventListener("livewire:navigated", function() {
        const selectBarang = document.querySelector('select[name="id_barang"]');
        const stokSebelumnyaInput = document.getElementById('stok_sebelumnya');
        const satuanInput = document.getElementById('satuan');
        const jumlahkeluarInput = document.querySelector('input[name="jumlah_keluar"]');
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

        jumlahkeluarInput.addEventListener('input', updateTotalStok);

        function updateTotalStok() {
            const stokSebelumnya = parseFloat(stokSebelumnyaInput.value) || 0;
            const jumlahkeluar = parseFloat(jumlahkeluarInput.value) || 0;
            totalStokInput.value = stokSebelumnya;

            if (jumlahkeluar === 0) {
                totalStokInput.value = stokSebelumnya; // Jika jumlah belum diisi, stok total = stok sebelumnya
            } else {
                totalStokInput.value = stokSebelumnya -
                jumlahkeluar; // Jika jumlah diisi, stok total = stok sebelumnya + jumlah keluar
            }
        }
    });
</script>

