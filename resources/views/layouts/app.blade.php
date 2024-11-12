<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'متجر الكتب')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { font-family: Almarai, sans-serif; }
        body { background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; }
        .header { background-color: #0056b3; padding: 20px; text-align: center; color: #fff; }
        .header a { color: #d1ecf1; margin: 0 10px; text-decoration: none; font-weight: bold; }
        .header a:hover { color: #f8f9fa; }
        .category-section, .container { margin-top: 40px; }
        .category-title, .book-title { color: #0056b3; }
        .book-card, .book-details { background-color: #e9f2ff; border-radius: 10px; color: #333; }
        .btn-primary, .btn-details { background-color: #007bff; border: none; color: white; }
        .btn-primary:hover, .btn-details:hover { background-color: #0056b3; }
    </style>
</head>
<body dir="rtl">
    <!-- Header -->
    <header class="header">
        <h1>متجر قرّاء</h1>
        <div>
            @guest
                <a href="{{ route('login') }}"><i class="bi bi-person-circle"></i> تسجيل الدخول</a>
            @else
                <a href="{{ route('admin.dashboard') }}"><i class="bi bi-person-circle"></i> حساب المستخدم</a>
            @endguest
            <a href="#"><i class="bi bi-cart"></i> سلة المشتريات</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
