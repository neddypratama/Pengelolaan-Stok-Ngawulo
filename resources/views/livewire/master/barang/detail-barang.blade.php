<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Barang</h1>
        <a href="{{ route('data-barang') }}" class="btn btn-secondary rounded-pill px-4" wire:navigate>
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Card Detail -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="row g-0  justify-content-center">
            <!-- Gambar Barang -->
            {{-- <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4">
                <img src="{{ asset('storage/barang/' . $barang->gambar) }}" 
                    alt="Gambar {{ $barang->nama_barang }}" class="img-fluid rounded-3 shadow-sm" style="max-height: 250px;">
            </div> --}}

            <!-- Detail Barang -->
            <div class="col-md-7">
                <div class="card-body">
                    <h4 class="text-dark fw-bold mb-2">{{ $barang->nama_barang }}</h4>
                    <p class="text-muted">Kode Barang: <span class="fw-semibold">{{ $barang->kode_barang }}</span></p>

                    <!-- Informasi Barang -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-2"><i class="fas fa-box-open text-primary"></i> <strong>Stok Barang:</strong> {{ $barang->stok_barang }}</p>
                            <p class="mb-2"><i class="fas fa-balance-scale text-success"></i> <strong>Satuan:</strong> {{ $barang->satuan->nama_satuan }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2"><i class="fas fa-list text-warning"></i> <strong>Jenis Barang:</strong> {{ $barang->jenis->nama_jenis }}</p>
                            <p class="mb-2"><i class="fas fa-calendar text-info"></i> <strong>Dibuat:</strong> {{ optional($barang->created_at)->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
