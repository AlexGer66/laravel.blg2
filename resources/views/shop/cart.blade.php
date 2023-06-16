@extends('layouts/shop')
@section('title')
    {{ $title }}
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




        <section class="py-5">
            <div class="m-5 ">

                @if (!empty($product))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Категория</th>
                                <th>Фото</th>

                                <th>магазин</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($products as $product) --}}
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}/slug-- {{ $product->slug }}/</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        {{ $product->status }}
                                    </td>
                                    <td>{{ $product->categorys_name }}</td>
                                    <td><img width="50px" src="{{ asset($product->img) }}" alt=""></td>


                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{-- {{ route('shop.shou', ['id' => $product->id]) }} --}}">xx</a>
                                    </td>

                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                @endif
                <div class="m-3">
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
