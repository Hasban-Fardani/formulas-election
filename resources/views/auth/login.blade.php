<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('css')
</head>

<body>
    <main class="py-4 min-vh-100 min-vw-100 d-flex flex-column align-items-center justify-content-center">
        <div class="d-flex flex-column align-items-center mb-4 ">
            <img src="{{ asset('logo-formulas-11.png') }}" alt="logo" width="150px" class="rounded-circle mb-2">
            <h1 class="text-center fw-bold">{{ config('app.name', 'Laravel') }}</h1>
        </div>
        <div class="card bg-white w-100" style="max-width: 500px">
            <h2 class="text-center mt-3">{{ __('Login') }}</h2>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nis" class="text-start">{{ __('NIS') }}</label>
                        <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror"
                            name="nis" value="{{ old('nis') }}" required autofocus>

                        @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="text-start">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-primary ">
                            {{ __('Login') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>
