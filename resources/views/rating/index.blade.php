@extends('layouts.app')
@section('page_header', __('rating'))
@section('app')
<div class="row mb-2">
    <div class="col-2">
        <div class="btn btn-primary pe-none w-100 h-100">№</div>
    </div>
    <div class="col-7">
        <div class="btn btn-primary pe-none w-100 h-100">Аты жөні</div>
    </div>
    <div class="col-3">
        <div class="btn btn-primary pe-none w-100 h-100">b</div>
    </div>
</div>
@php
    $n = 0;
@endphp
@foreach (App\Models\User::all() as $user)
@php
    $n++;
@endphp
<div class="row mb-2">
    <div class="col-2">
        <div class="btn btn-light border pe-none w-100 h-100">{{$n}}</div>
    </div>
    <div class="col-7">
        <div class="btn btn-light border pe-none w-100 h-100">{{$user->first_name}} {{$user->last_name}}</div>
    </div>
    <div class="col-3">
        <div class="btn btn-light border pe-none w-100 h-100">{{rand(0, 100)}}</div>
    </div>
</div>
@endforeach
@endsection
