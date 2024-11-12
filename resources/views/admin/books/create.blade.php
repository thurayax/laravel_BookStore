<!-- resources/views/admin/books/create.blade.php -->
@extends('layouts.appdash')

@section('content')
<div class="container">
    <h1>إضافة كتاب جديد</h1>
    <form action="{{ route('admin.books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">عنوان الكتاب</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">المؤلف</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">الكمية</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover_image">رابط صورة الغلاف</label>
            <input type="text" name="cover_image" id="cover_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">الفئة</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">اختر الفئة</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">إضافة الكتاب</button>
    </form>
</div>
@endsection
