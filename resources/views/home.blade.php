@extends('layouts.app')

@section('title', 'الصفحة الرئيسية لمتجر الكتب')

@section('content')
<main class="category-section">
    @foreach($categories as $category)
        <section>
            <h2 class="category-title">{{ $category->name }}</h2>
            <div class="row">
                @foreach($category->books as $book)
                    <div class="col-md-3 mb-4">
                        <div class="card book-card">
                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">المؤلف: {{ $book->author }}</p>
                                <p class="card-text">السعر: {{ $book->price }} ريال</p>
                                <a href="{{ route('book_details', ['id' => $book->id]) }}" class="btn btn-details">التفاصيل</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
</main>
@endsection