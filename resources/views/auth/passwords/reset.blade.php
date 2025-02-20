@extends('layouts2.app')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Setel Ulang Kata Sandi</h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus readonly>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <input type="password" name="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="passwordInput" placeholder="Password" name="password">
                                                <button type="button" id="togglePassword"
                                                    class="btn btn-sm  position-absolute"
                                                    style="right: 30px; top: 50%; transform: translateY(-50%);">
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
                                                    class="form-control form-control-user" id="repeatPasswordInput"
                                                    placeholder="Confirmasi Password"
                                                    name="password_confirmation">
                                                <button type="button" id="toggleRepeatPassword"
                                                    class="btn btn-sm  position-absolute"
                                                    style="right: 30px; top: 50%; transform: translateY(-50%);">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <button type="submit"class="btn btn-primary btn-user btn-block">
                                            Reset Password
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
