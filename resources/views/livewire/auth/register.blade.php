<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                        </div>

                        <form wire:submit.prevent="registerUser">
                            @csrf
                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <input type="text" name="name"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    placeholder="Nama Lengkap" value="{{ old('name') }}" wire:model.defer="name">
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" name="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    placeholder="Alamat Email" value="{{ old('email') }}" wire:model.defer="email">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <div class="position-relative">
                                    <input type="password" name="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="passwordInput" placeholder="Password" wire:model.defer="password">
                                    <button type="button" id="togglePassword" class="btn btn-sm  position-absolute"
                                        style="right: 30px; top: 50%; transform: translateY(-50%);" >
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Repeat Password -->
                            <div class="form-group">
                                <div class="position-relative">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-user"
                                        id="repeatPasswordInput" placeholder="Confirmasi Password" wire:model.defer="password_confirmation">
                                    <button type="button" id="toggleRepeatPassword" class="btn btn-sm  position-absolute"
                                        style="right: 30px; top: 50%; transform: translateY(-50%);">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Tombol Register -->
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar Akun
                            </button>

                            <hr>

                            <!-- Login dengan Google -->
                            <a href="{{ route('google-redirect') }}" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Daftar dengan Google
                            </a>
                        </form>
                        <hr>

                        <!-- Sudah Punya Akun? -->
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>