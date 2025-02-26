<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis Barang</h1>
        <a href="{{ route('jenis-barang') }}"
            class="d-none d-sm-inline-block btn btn-md btn-secondary pr-3 shadow-sm rounded-pill">
            <i class="fas fa-chevron-left mr-2"></i></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Entri Data Jenis Barang</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row">
                    <!-- Form Input (7 Kolom) -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">ID Jenis Barang</label>
                            <input type="text" class="form-control" wire:model="id_jenis" readonly>
                        </div>
                    </div>

                    <!-- Kolom Kosong untuk Estetika (5 Kolom) -->
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Nama Jenis Barang</label>
                            <input type="text" class="form-control @error('nama_jenis') is-invalid @enderror"
                                wire:model="nama_jenis">
                            @error('nama_jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
