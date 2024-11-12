@extends('layouts.appdash')

@section('content')
<div class="container">
    <h1>{{ isset($category) ? 'تعديل الفئة' : 'إضافة فئة جديدة' }}</h1>
    <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">اسم الفئة</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">حفظ</button>
    </form>
</div>
@endsection
