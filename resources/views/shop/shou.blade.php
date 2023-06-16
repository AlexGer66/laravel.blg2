@extends('layouts/shop')
@section('title')
    {{ $title }} {{ $product->slug }}
@endsection
{{-- @php
    dd();
@endphp --}}
@section('content')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <div class="m-5 ">
        <div class="mb-3
        ">{{ $title }}</div>
        <button class="btn btn-info mb-2" onclick="goBack()">Go Back</button>

        @if (!empty($product))
            
    
    <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($product->img) }}"
                    alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: {{ $product->id }} </div>
                <h1 class="display-5 fw-bolder">{{ $product->title }}</h1>
                <div class="fs-5 mb-5">
                    <span
                        class="text-decoration-line-through">{{ !$product->old_price == 0 ? '$' . $product->old_price : '' }}</span>
                    <span>${{ $product->price }}</span>
                </div>
                <div class="fs-5 mb-5">{{ $product->status }}</div>
                <div class="fs-5 mb-5">{{ 'категория ' . $product->categorys_name }}</div>
                <div class="fs-5 mb-5">{{ $product->status }}</div>
                <p class="lead">{!! $product->content !!}</p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" />
                        <a class="btn btn-info btn-sm" href="{{ route('shop.addtocart', ['id' => $product->id]) }}">купиьт</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>@endif
@endsection
<!-- Navigation-->

<!-- Product section-->




<!-- Related items section-->

<!-- Footer-->

<!-- Bootstrap core JS-->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
<!-- Core theme JS-->
{{-- <script src="js/scripts.js"></script>
 --}}
