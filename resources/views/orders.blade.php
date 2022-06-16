@extends('layouts.app')

@section('title')
      Мои заказы
@endsection

@section('content')

<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Дата</th>
            <th class="text-center">Товары</th>
            <th class="text-center">Количество</th>
            <th class="text-center">Стоимость</th>
            <th class="text-center">Сумма заказа</th>
            <th class="text-center">Повторить заказ</th>
        </tr>
    </thead>
    <tbody>
        
        @forelse ($orders as $idx => $order)
                <tr>
                    <td class="text-center">{{ $idx + 1 }}</td>
                    <td class="text-center">{{ $order->created_at }}</td>
                    <td class="text-center">  
                        @php
                        $products = $order->products;
                        $summ = 0;
                        @endphp  
                        @foreach ($products as $product)
                          <table ><td >{{ $product->name }} </td></table>
                        @php
                        $productSum = $product->pivot->price * $product->pivot->quantity;
                        $summ = $summ + $productSum;                   
                        @endphp
                        @endforeach
                    </td>
                    <td class="text-center">
                          @foreach ($products as $product)       
                          <table><td>{{ $product->pivot->quantity }} шт. </td></table>
                          @endforeach
                    </td>
                    <td class="text-center">
                          @foreach ($products as $product)       
                          <table><td>{{ $product->price }} руб. </td></table>
                          @endforeach
                    </td>
                    <td class="text-center">{{$summ}} руб.</td>
                    <td class="text-center">
                        <form method="post" action="{{ route('repeatOrder') }}">
                            @csrf
                            <input class="text-center" type="hidden" name="order_id" value="{{ $order->id }}"/>
                            <button class="btn btn-success" type="submit">Добавить в корзину</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">Сделайте свой первый <a href="{{ route('home') }}">заказ!</a></td>
                </tr>
        @endforelse
    </tbody>
</table>

@endsection    