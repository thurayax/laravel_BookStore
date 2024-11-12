<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل الكتاب</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { font-family: Almarai, sans-serif; }
        body { background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; }
        .header { background-color: #0056b3; padding: 20px; text-align: center; color: #fff; }
        .header a { color: #d1ecf1; margin: 0 10px; text-decoration: none; font-weight: bold; }
        .header a:hover { color: #f8f9fa; }
        .container { max-width: 700px; margin-top: 40px; }
        .book-details { background-color: #e9f2ff; padding: 20px; border-radius: 10px; color: #333; }
        .book-image { width: 100%; height: auto; border-radius: 10px; }
        .book-title { color: #0056b3; }
        .btn-primary { background-color: #007bff; border: none; }
        .btn-primary:hover { background-color: #0056b3; }
    </style>
</head>
<body dir="rtl">

    <!-- Header -->
    <header class="header">
        <h1>متجر الكتب</h1>
        <div>
            <a href="#"><i class="bi bi-person-circle"></i> حساب المستخدم</a>
            <a href="#"><i class="bi bi-cart"></i> سلة المشتريات</a>
        </div>
    </header>

    <!-- Book Details -->
    <div class="container">
        <div class="book-details">
            <h2 class="text-center book-title">{{ $book->title }}</h2>
            <div class="text-center mb-4">
                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="book-image">
            </div>
            <p><strong>المؤلف:</strong> {{ $book->author }}</p>
            <p><strong>السعر:</strong> ${{ $book->price }}</p>
            <p><strong>الكمية المتاحة:</strong> {{ $book->quantity }}</p>
            <p><strong>الفئة:</strong> {{ $book->category->name ?? 'غير محددة' }}</p>
            <form action="{{ route('cart.add', $book->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">إضافة إلى سلة المشتريات</button>
</form>

    </div>
</body>
</html>
