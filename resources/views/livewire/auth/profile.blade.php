<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
    </div>

    @include('alerts.success')
    @include('alerts.alert')

    <div class="row">
        <div class="col-6">
            <div class="card shadow mt-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="editProfile" id="update-form">
                        <div class="form-group">
                            <input type="text" name="name"
                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                id="exampleInputname" placeholder="Nama Lengkap" wire:model.defer="name">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                id="exampleInputEmail" placeholder="Alamat Email" wire:model.defer="email">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block"
                            id="save-button">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mt-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Ubah Password</h6>
                </div>
                <div class="card-body">
                    <!-- Ubah Password -->
                    <form wire:submit.prevent="ubahPassword">
                        <div class="form-group">
                            <div class="position-relative">
                                <input type="password"
                                    class="form-control form-control-user @error('password_old') is-invalid @enderror"
                                    id="password_oldInput" placeholder="Password Lama" wire:model.defer="password_old">
                                <button type="button" class="btn btn-sm position-absolute"
                                    style="right: 30px; top: 50%; transform: translateY(-50%);"
                                    onclick="togglePassword('password_oldInput', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password_old')
                                <span class="text-danger small d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="position-relative">
                                <input type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="passwordInput" placeholder="Password Baru" wire:model.defer="password">
                                <button type="button" class="btn btn-sm position-absolute"
                                    style="right: 30px; top: 50%; transform: translateY(-50%);"
                                    onclick="togglePassword('passwordInput', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-danger small d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="position-relative">
                                <input type="password"
                                    class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmationInput" placeholder="Konfirmasi Password"
                                    wire:model.defer="password_confirmation">
                                <button type="button" class="btn btn-sm position-absolute"
                                    style="right: 30px; top: 50%; transform: translateY(-50%);"
                                    onclick="togglePassword('password_confirmationInput', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger small d-block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("update-form");
        const saveButton = document.getElementById("save-button");
        const nameInput = document.querySelector("input[name='name']");
        const emailInput = document.querySelector("input[name='email']");

        if (!form || !saveButton || !nameInput || !emailInput) return;

        // Simpan nilai awal dari input
        let initialValues = {
            name: nameInput.value.trim(),
            email: emailInput.value.trim()
        };

        function checkChanges() {
            const isChanged =
                nameInput.value.trim() !== initialValues.name ||
                emailInput.value.trim() !== initialValues.email;

            saveButton.disabled = !isChanged;
        }

        // Event listener untuk input perubahan
        nameInput.addEventListener("input", checkChanges);
        emailInput.addEventListener("input", checkChanges);

        // Pastikan tombol dalam keadaan disable saat pertama kali load
        saveButton.disabled = true;
    });

    function togglePassword(inputId, button) {
        let input = document.getElementById(inputId);
        if (!input) return;

        let icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
