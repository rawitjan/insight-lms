@extends('telegram-webapp::main')

@section('lang', str_replace('_', '-', app()->getLocale()))

@section('head')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
@endsection

@section('title', config('app.name', 'Laravel'))

@section('content')
<div class="container-fluid p-3">
    <div class="d-flex gap-3 mb-3">
        <a class="btn btn-primary my-auto" href="/"><i class="ti ti-home"></i></a>
        <button class="btn bg-body-tertiary my-auto w-100 border">@yield('page_header')</button>
        <a class="btn btn-primary my-auto ms-auto" href="/profile"><i class="ti ti-user"></i></a>
    </div>

    @yield('app')

    <script>
        window.onload = function() {
            const tg = window.Telegram.WebApp;

            const user = tg.initDataUnsafe.user;

            fetch('/auth/telegram/callback', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(user)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>

    <div class="card rounded-bottom-0 fixed-bottom footer" style="">
        <div class="card-body text-center lh-1">
            <div class="d-flex g-2 text-center w-100">
                <a class="text-decoration-none my-auto w-100 text-center" href="/achivments">
                    <i class="ti ti-target-arrow fs-1"></i> <br>
                    <span class="small text-muted">@lang('achivments')</span>
                </a>
                <a class="text-decoration-none my-auto w-100 text-center" href="/profile">
                    <i class="ti ti-user fs-1"></i> <br>
                    <span class="small text-muted">@lang('profile')</span>
                </a>
                <a class="text-decoration-none my-auto w-100 text-center" href="/rating">
                    <i class="ti ti-medal fs-1"></i> <br>
                    <span class="small text-muted">@lang('rating')</span>
                </a>
            </div>
        </div>
    </div>

    <style>
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          text-align: center;
        }
        </style>
</div>
@endsection
