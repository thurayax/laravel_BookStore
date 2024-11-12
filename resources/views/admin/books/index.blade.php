<!-- resources/views/admin/books/index.blade.php -->
@extends('layouts.appdash')

@section('content')
<div class="container">
    <h1>قائمة الكتب</h1>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">إضافة كتاب جديد</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>العنوان</th>
                <th>المؤلف</th>
                <th>السعر</th>
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>${{ $book->price }}</td>
                    <td>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
</form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
