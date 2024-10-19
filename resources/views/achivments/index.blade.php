@extends('layouts.app')
@section('page_header', __('achivments'))
@section('app')
<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex gap-2">
            <div class="my-auto">
                <img width="100px" src="https://img.freepik.com/premium-photo/3d-cartoon-hand-holding-gold-medal-with-star_1296140-1149.jpg?size=338&ext=jpg" alt="">
            </div>
            <div class="my-auto">
                <span class="fw-bold h5">
                    Білім жұлдызы
                </span> <br>
                <span class="small text-muted">Курс материалдарын толық меңгергені үшін</span>

                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: 25%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex gap-2">
            <div class="my-auto">
                <img width="100px" src="https://img.freepik.com/premium-photo/blue-purple-calculator-with-blue-yellow-keypad_980716-417517.jpg?semt=ais_hybrid" alt="">
            </div>
            <div class="my-auto">
                <span class="fw-bold h5">
                    Сарапшы
                </span> <br>
                <span class="small text-muted">барлық тапсырмаларды уақытында орындағаны үшін</span>

                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: 40%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
