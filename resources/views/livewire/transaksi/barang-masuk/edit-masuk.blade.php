<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang Masuk</h1>
        <a href="{{ route('barang-masuk') }}"
            class="d-none d-sm-inline-block btn btn-md btn-secondary pr-3 shadow-sm rounded-pill" wire:navigate>
            <i class="fas fa-chevron-left mr-2"></i></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Edit Data Barang Masuk</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
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
                                <input type="number" class="form-control" wire:model="stok_sebelumnya" id="stok_sebelumnya" name="stok_sebelumnya"
                                    readonly>
                                <div class="input-group-append">
                                    <input type="text" class="form-control bg-secondary text-white" wire:model="satuan" id="satuan"
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
                            <input type="number" class="form-control" wire:model="stok_total" id="total_stok" name="total_stok" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </form>
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

        function fetchBarangData(barangId) {
            if (barangId) {
                fetch(`/get-barang/${barangId}`)
                    .then(response => response.json())
                    .then(data => {
                        stokSebelumnyaInput.value = data.stok;
                        satuanInput.value = data.satuan;
                        totalStokInput.value = data.stok;
                        jumlahMasukInput.value = 0;
                    })
                    .catch(error => console.error('Error fetching data:', error));
            } else {
                stokSebelumnyaInput.value = '0';
                satuanInput.value = '-';
                totalStokInput.value = '0';
            }
        }

        // Panggil fungsi saat pertama kali halaman dimuat jika ada barang yang sudah dipilih
        if (selectBarang.value) {
            fetchBarangData(selectBarang.value);
        }

        // Event ketika user mengganti barang
        selectBarang.addEventListener('change', function() {
            fetchBarangData(this.value);
        });

        jumlahMasukInput.addEventListener('input', function() {
            const stokSebelumnya = parseFloat(stokSebelumnyaInput.value) || 0;
            const jumlahMasuk = parseFloat(jumlahMasukInput.value) || 0;
            totalStokInput.value = jumlahMasuk === 0 ? stokSebelumnya : stokSebelumnya + jumlahMasuk;
        });
    });
</script>
