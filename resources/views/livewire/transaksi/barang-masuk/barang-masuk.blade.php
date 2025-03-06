<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Masuk</h1>
        <a href="{{ route('entri-masuk')}}" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm rounded-pill" wire:navigate><i
                class="fas fa-plus mr-2"></i> Entri Data</a>
    </div>

    @include('alerts.success')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "><i class="fas fa-box mr-3"></i>Data Barang Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Barang</th>
                            <th>Jumlah Masuk</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                            <th>Aksi</th>
                            <th>Aksi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        @foreach ($masuks as $masuk)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $masuk->kode_masuk }}</td>
                                <td class="align-middle">{{ $masuk->tanggal_masuk }}</td>
                                <td class="align-middle">{{ $masuk->barangMasuk ? $masuk->barangMasuk->nama_barang : '-' }}</td>
                                <td class="align-middle">{{ $masuk->jumlah_masuk }}</td>
                                <td class="align-middle">{{ $masuk->barangMasuk && $masuk->barangMasuk->satuan ? $masuk->barangMasuk->satuan->nama_satuan : '-' }}</td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('edit-masuk', $masuk->id_masuk) }}"
                                        class="btn btn-warning mr-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-title="Edit Data" wire:navigate>
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button wire:click.prevent="confirmDelete({{ $masuk->id_masuk }})"
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
            }
            // Hancurkan DataTable sebelum memperbarui
            $('#dataTable').DataTable().destroy();

            // Tunggu Livewire memperbarui tabel, lalu inisialisasi ulang DataTable
            setTimeout(() => {
                $('#dataTable').DataTable();
            }, 100);
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
            icon: 'success', // Ikon untuk alert, bisa diubah jadi 'error', 'warning', dll.
            title: 'Berhasil Terhapus!',
            text: 'Data telah dihapus.',
            // timer: 2000,
            confirmButtonText: 'OK'
        }).then(() => {
            // // Hancurkan DataTable sebelum memperbarui
            // $('#dataTable').DataTable().destroy();

            // // Tunggu Livewire memperbarui tabel, lalu inisialisasi ulang DataTable
            // setTimeout(() => {
            //     $('#dataTable').DataTable();
            // }, 100);
            location.reload();
        });
    });
</script>
