@extends('layouts.auth')

@section('content')
    <div class="vh-100">
        <div class="d-flex w-100 h-100">
            <div class="m-auto">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <form id="telegramForm" method="post" action="{{ route('login.telegram.handle') }}" class="d-none">
        @csrf
        <textarea name="tgWebAppData" id="tgWebAppData" hidden></textarea>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fragment = Telegram.WebApp.initData
            if (fragment) {

                console.log("Фрагмент найден:", fragment);

                document.getElementById('tgWebAppData').value = fragment;
                document.getElementById('telegramForm').submit();
            } else {
                console.error('Фрагмент URL отсутствует');
            }
        });
    </script>
@endsection
