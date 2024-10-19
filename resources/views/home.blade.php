@extends('layouts.app')
@section('page_header', __('home'))
@section('app')
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex gap-2">
                <span class="my-auto avatar avatar-lg bg-primary rounded-circle"></span>
                <div class="my-auto lh-1">
                    @if (Auth::user()->username)
                        <span class="small text-muted" id="login">{{'@'.Auth::user()->username}}</span> <br>
                    @endif
                    <span class="h5 fw-semibold" id="name">{{Auth::user()->first_name}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2 mb-3">
        <div class="my-auto">
            <span class="h5 fw-semibold">
                @lang('courses.your')
            </span>
        </div>
        <div class="my-auto ms-auto">
            <button class="btn btn-sm btn-primary">
                <i class="ti ti-chevron-right"></i>
            </button>
        </div>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
        <div class="col">
            <div class="card">
                <div class="card-body p-0">
                    <img src="https://img.freepik.com/premium-photo/3d-isometric-web-banner-businessman-reading-book-digital-tablet-online-library-ebook-concept_1029473-802841.jpg?uid=R155039525&semt=ais_hybrid" alt="" class="img-fluid rounded border">

                    <div class="p-2">
                        <span class="card-title fw-semibold">MobileDev</span>
                        <button class="btn btn-primary mt-2 w-100">Жалғыстыру</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
