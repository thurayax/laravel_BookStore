
<!-- resources/views/admin/categories/index.blade.php -->
@extends('layouts.appdash')

@section('content')
<div class="container">
    <h1>قائمة الفئات</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">إضافة فئة جديدة</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>الوصف</th>
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
