<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        <a href="{{ route('entri-barang') }}"
            class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm rounded-pill" wire:navigate>
            <i class="fas fa-plus mr-2"></i> Entri Data
        </a>
    </div>

    @include('alerts.success')
    @include('alerts.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "><i class="fas fa-box mr-3"></i>Data Barang</h6>
        </div>
        <div class="card-body">
            {{-- <div wire:poll.1ms> --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Barang</th>
                            <th>Jenis Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class=" align-middle">{{ $barang->kode_barang }}</td>
                                <td class=" align-middle">{{ $barang->jenis ? $barang->jenis->nama_jenis : '-' }}
                                </td>
                                <td class=" align-middle">{{ $barang->nama_barang }}</td>
                                <td class=" align-middle">{{ $barang->stok_barang }}</td>
                                <td class=" align-middle">{{ $barang->satuan ? $barang->satuan->nama_satuan : '-' }}
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('detail-barang', $barang->id_barang) }}"
                                        class="btn btn-success mr-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-title="Lihat Detail" wire:navigate>
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="{{ route('edit-barang', $barang->id_barang) }}"
                                        class="btn btn-warning mr-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-title="Edit Data" wire:navigate>
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button wire:click.prevent="confirmDelete({{ $barang->id_barang }})"
                                        class="btn btn-danger rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
            tooltipTriggerEl))
    });
</script>
<script>
    window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
            title: `Apakah Anda yakin ingin menghapus data barang ini?`,
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteConfirmed', event.detail.id);
            } else {
                // Hancurkan DataTable sebelum memperbarui
                $('#dataTable').DataTable().destroy();

                // Tunggu Livewire memperbarui tabel, lalu inisialisasi ulang DataTable
                setTimeout(() => {
                    $('#dataTable').DataTable();
                }, 100);
            }
        });
    });

    window.addEventListener('delete-failed', event => {
        Swal.fire({
            icon: 'error', // Ikon untuk alert, bisa diubah jadi 'error', 'warning', dll.
            title: 'Gagal Menghapus!',
            text: event.detail.message,
            confirmButtonText: 'OK'
        }).then(() => {
            // Hancurkan DataTable sebelum memperbarui
            $('#dataTable').DataTable().destroy();

            // Tunggu Livewire memperbarui tabel, lalu inisialisasi ulang DataTable
            setTimeout(() => {
                $('#dataTable').DataTable();
            }, 100);
        });
    });

    window.addEventListener('delete-success', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Terhapus!',
            text: 'Data telah dihapus.',
            confirmButtonText: 'OK'
        }).then(() => {
            location.reload();
            // // Hancurkan DataTable sebelum memperbarui
            // $('#dataTable').DataTable().destroy();

            // // Tunggu Livewire memperbarui tabel, lalu inisialisasi ulang DataTable
            // setTimeout(() => {
            //     $('#dataTable').DataTable();
            // }, 100);
        });
    });
</script>
