<!-- resources/views/cart.blade.php -->
@extends('layouts.app')

@section('title', 'سلة المشتريات')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">سلة المشتريات</h2>
    @if($cart && count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>الإجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $details)
                        <tr>
                            <td>{{ $details['title'] }}</td>
                            <td>${{ $details['price'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>${{ $details['price'] * $details['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-right">
            <h4>إجمالي السعر: ${{ $total }}</h4>
        </div>
    @else
        <p>السلة فارغة.</p>
    @endif
</div>
@endsection
