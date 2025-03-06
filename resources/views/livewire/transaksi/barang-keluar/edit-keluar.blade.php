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
            <h5 class="m-0 font-weight-bold text-primary">Edit Data Barang Keluar</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
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
        const jumlahkeluarInput = document.querySelector('input[name="jumlah_keluar"]');
        const totalStokInput = document.getElementById('total_stok');

        function fetchBarangData(barangId) {
            if (barangId) {
                fetch(`/get-barang/${barangId}`)
                    .then(response => response.json())
                    .then(data => {
                        stokSebelumnyaInput.value = data.stok;
                        satuanInput.value = data.satuan;
                        totalStokInput.value = data.stok;
                        jumlahkeluarInput.value = 0;
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

        jumlahkeluarInput.addEventListener('input', function() {
            const stokSebelumnya = parseFloat(stokSebelumnyaInput.value) || 0;
            const jumlahkeluar = parseFloat(jumlahkeluarInput.value) || 0;
            totalStokInput.value = jumlahkeluar === 0 ? stokSebelumnya : stokSebelumnya - jumlahkeluar;
        });
    });
</script>
