@extends('layouts.appdash')


@section('title', 'لوحة التحكم')

@section('content')
<div class="container">
    <h2 class="mb-4">العملاء المسجلين</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>تاريخ التسجيل</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
