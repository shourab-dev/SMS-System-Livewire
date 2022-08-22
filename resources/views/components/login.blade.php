<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            {{ config('app.name') }} - Login
        </title>

        <!-- Styles -->
        @livewireStyles
        <link rel="shortcut icon" href="assets/img/favicon.png">

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">

        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/all.min.css') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
        <!-- Scripts -->
    </head>

    <body>
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox">
                        <div class="login-left">
                            <img class="img-fluid" src="{{ asset('backend/assets/img/logo-white.png') }}" alt="Logo">
                        </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                @if(isset($loginPanel))
                                <h1>{{ $loginPanel }} Login</h1>
                                @endif
                                <p class="account-subtitle">Access to our dashboard</p>
                                <x-jet-validation-errors class="mb-4" />

                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif


                                {{-- slot --}}
                                {{ $slot }}
                                {{-- slot ends --}}

                                <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @stack('modals')

            @livewireScripts
            <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

            <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <script src="{{ asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

            <script src="{{ asset('backend/assets/js/script.js') }}"></script>
    </body>

    </html>
</div>