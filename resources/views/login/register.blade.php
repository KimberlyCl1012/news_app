@extends('layouts.app')
@section('title', 'Register')
@section('content')

    <div class="container mt-2 mb-4">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority
                            have suffered alteration in some form, by injected humour, or randomised words which don't look
                            even It uses a dictionary of over 200 Latin words, combined with a handful of model
                            sentence.
                        </p>
                        <p class='subtitle'>Why do we use it</p>
                        <p>
                            slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there
                            isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
                            Internet tend to repeat.All the Lorem Ipsum generators on the
                            Internet tend to repeat.
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil non numquam quidem?
                            Iusto nesciunt. predefined chunks as necessary, making this the first true generator on
                            the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model
                            sentence.All the Lorem Ipsum generators on the
                            Internet tend to repeat.
                            but the majority have suffered alteration in some form, by injected humour, or randomised words
                            which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                            need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem
                            Ipsum.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ route('save.recording') }}" method="POST" role="form" data-toggle="validator"
                    class="margin-bottom-0" autocomplete="off">
                    @csrf
                    <p class='subtitle'>Personal information</p>
                    <div class="box-login">
                        <div class="mt-3 mb-2 row">
                            <div class="mb-3 row">
                                <label for="Name" class="col-sm-4 col-form-label">Name:</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                     maxlength="200" pattern="[A-Z]{1}[A-Za-z ñÑáéíóúÁÉÍÓÚ \s]+"
                                        name="name" id="name" required>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="Last name" class="col-sm-4 col-form-label">Last name:</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                        name="last_name" maxlength="200" id="last_name" required>
                                </div>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="Email" class="col-sm-4 col-form-label">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        name="email" id="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Password" class="col-sm-4 col-form-label">Password:</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-sm" name="password"
                                        id="password" required />
                                </div>
                                <div class="col-sm-2">
                                    <i onclick="showPassword()" class="fa-regular fa-eye-slash eyes_icon"></i>
                                </div>
                                <div class="col-md-12 help-block with-errors text-danger mb-1"></div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Confirm password" class="col-sm-4 col-form-label">Confirm password:</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-sm" name="password_confirm"
                                        id="password_confirm" required />
                                </div>
                                <div class="col-sm-2">
                                    <i onclick="showPassword()" class="fa-regular fa-eye-slash eyes_icon"></i>
                                </div>
                                <div class="col-md-12 help-block with-errors text-danger mb-1"></div>
                            </div>
                            <div class="mt-2 mb-3 row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn-form-login-can me-md-2" type="reset">Cancel</button>
                                    <button class="btn-form-login-suc" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('js')
    <script type="text/javascript" src="{{ asset('/js/form_validate.js') }}"></script>
    {{-- Notificaciones del controlador --}}
    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'error occurred',
                text: 'The email is already in use.'
            })
        </script>
    @endif
@endsection
@endsection
