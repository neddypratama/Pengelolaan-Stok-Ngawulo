<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        <a href="{{ route('data-barang') }}"
            class="d-none d-sm-inline-block btn btn-md btn-secondary pr-3 shadow-sm rounded-pill">
            <i class="fas fa-chevron-left mr-2"></i></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Entri Data Barang</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save" >
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
            </form>
        </div>
    </div>
</div>
