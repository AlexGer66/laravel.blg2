@extends('layouts/shop')
@section('content')
    <div class="m-5 ">

        @if (!empty($products))
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
                    @foreach ($products as $product)
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
                                    href="{{ route('shop.shou', ['slug' => $product->slug]) }}">смотреть</a>
                                    <a
                                    class="btn  btn-sm"
                                    href="{{ route('shop.addtocart', ['id' => $product->id]) }}">купмть</a>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="m-3">

            {{ $products->links() }}
        </div>
    @endsection
