@extends('layouts2.app')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        {{-- @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif --}}
                        @if (session($key ?? 'resent'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'success', // Ikon untuk alert, bisa diubah jadi 'error', 'warning', dll.
                                        title: 'Berhasil',
                                        text: 'Tautan verifikasi baru telah dikirim ke alamat email Anda.',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            </script>
                        @endif
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Verifikasi Alamat Email Anda</h1>
                                        <p class="mb-4 text-left">
                                            Sebelum melanjutkan, harap periksa email Anda untuk mendapatkan tautan
                                            verifikasi.
                                            Jika Anda tidak menerima email.
                                        </p>
                                    </div>
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit"class="btn btn-primary btn-user btn-block">
                                            klik di sini untuk meminta verifikasi
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
