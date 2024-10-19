@extends('layouts.app')
@section('page_header', __('profile'))
@section('app')

<form action="" method="post">
    @csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-2">
                <label for="" class="form-label">Есімі</label>
                <input type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name}}">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Тегі</label>
                <input type="text" class="form-control" name="last_name" value="{{Auth::user()->last_name}}">
            </div>
            <button class="btn btn-primary ms-auto" type="submit">Сақтау</button>
        </div>
    </div>
</form>

<div class="card mb-3">
    <div class="card-body">
        <div class="mb-2">
            <label for="" class="form-label">Құпиясөз</label>
            <input type="password" class="form-control"  disabled>
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Құпиясөзді растау</label>
            <input type="password" class="form-control" disabled>
        </div>
        <button class="btn btn-primary" disabled>Сақтау</button>
    </div>
</div>
@endsection
