@extends('layouts.app')
@section('title', 'Login')
@section('content')

    <div class="container mt2 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('login') }}" method="POST" role="form" data-toggle="validator" class="margin-bottom-0"
                    autocomplete="off">
                    @csrf
                    <p class='subtitle'>Access the news</p>
                    <div class="box-login">
                        <div class="mt-2 mb-3 row">
                            <label for="Email" class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email"
                                    class="form-control form-control-sm  @error('email') is-invalid @enderror"
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
                            <div class="col-sm-8">
                                <input type="password"
                                    class="form-control form-control-sm  @error('password') is-invalid @enderror"
                                    name="password" id="password" required />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <a href="#">Forgot my password</a>
                        </div>
                        <div class="mt-2 mb-3 row">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn-form-login-can me-md-2" type="reset">Cancel</button>
                                <button class="btn-form-login-suc" type="submit">Access</button>
                            </div>
                        </div>
                    </div>
                    <p class="mt-5">There are many variations of passages of Lorem Ipsum available, but the majority
                        have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even It uses a dictionary of over 200 Latin words, combined with a handful of model
                        sentence.
                    </p>
            </div>
            </form>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority
                            have suffered alteration in some form, by injected humour, or randomised words which don't look
                            even It uses a dictionary.
                        </p>
                        <p class='subtitle'>Why do we use it</p>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad minima, excepturi voluptates, iure dolor consequuntur iste, quibusdam molestiae fugit eum est maxime! Nihil reiciendis molestiae doloremque fugit neque dolorem consequatur. slightly believable. If you are going to use a passage of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil non numquam quidem?
                            Iusto nesciunt. predefined chunks as necessary, making this the first true generator on
                            the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model
                            sentence.All the Lorem Ipsum generators on the
                            Internet tend to repeat.
                        </p>
                        <img class="img-fluid" src="{{asset('/images/news/new5.png')}}" alt="New">
                        <p class="desc-img">(Kimberly Nava; by Ilustrator 2022)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
    {{-- Notificaciones del controlador --}}
    @if (Session::has('register'))
        <script>
            Swal.fire(
                'Excelent!',
                'Register success!',
                'success'
            )
        </script>
    @endif
    {{-- Mostrar y ocultar contraseñaa --}}
    <script type="text/javascript" src="{{ asset('/js/form_validate.js') }}"></script>
@endsection
@endsection
