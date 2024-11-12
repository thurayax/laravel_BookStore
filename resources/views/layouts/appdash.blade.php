<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Almarai" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        * {
            font-family: Almarai, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
        }
        .navbar-custom {
            background: #0056b3;
        }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: #fff !important;
        }
        .navbar-custom .navbar-brand:hover, .navbar-custom .nav-link:hover {
            color: #d1ecf1 !important;
        }
        .search-box {
            position: relative;
            width: 250px;
            margin: 0 auto;
        }
        .search-box input[type="search"] {
            width: 100%;
            padding-right: 40px;
            border-radius: 20px;
            border: 1px solid #ddd;
            background-color: #d1ecf1;
            color: #0056b3;
            font-size: 1rem;
        }
        .search-box .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #0056b3;
            cursor: pointer;
        }
        .dashboard {
            background: #004080;
            color: white;
            min-height: 100vh;
        }
        .dashboard .nav-link {
            color: #d1ecf1;
            transition: background 0.3s ease;
        }
        .dashboard .nav-link:hover, .dashboard .nav-link.active {
            background-color: #0056b3;
            border-radius: 8px;
        }
        .content-area {
            background-color: #e9f2ff;
            border-radius: 10px;
            padding: 20px;
            color: #333;
        }
        footer {
            background: #0056b3;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body dir="rtl">
    <div id="app">
        <!-- الهيدر -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-custom text-white">
                <div class="container-fluid">
                    <a class="navbar-brand" href=""><i class="bi bi-book-half"></i> قرّاء</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <div class="search-box me-auto">
                            <input type="search" placeholder="ابحث في لوحة التحكم">
                            <i class="bi bi-search search-icon"></i>
                        </div>
                       <!-- قسم حساب المستخدم -->
<ul class="navbar-nav ms-auto">
    <li class="nav-item">
        @guest
            <!-- إذا لم يكن المستخدم مسجل الدخول -->
            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person-circle"></i> تسجيل الدخول</a>
        @else
            <!-- إذا كان المستخدم مسجل الدخول -->
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-person-circle"></i> حسابي</a>
        @endguest
    </li>
</ul>

                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="container-fluid mt-4">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 dashboard">
                    <div class="d-flex flex-column align-items-start px-3 pt-3 min-vh-100">
                        <ul class="nav flex-column mb-4">
                            <li class="nav-item">
                                <a href="/" class="nav-link"><i class="bi-house me-2"></i> الرئيسية</a>
                            </li>
                            <li><a href="{{ route('admin.books.index') }}" class="nav-link"><i class="bi-table me-2"></i> الكتب</a></li>
                            <li><a href="{{ route('admin.categories.index') }}" class="nav-link"><i class="bi-grid me-2"></i> الفئات</a></li>
                            <li><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="bi-people me-2"></i> العملاء</a></li>
                            </ul>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-sm-8 p-4 content-area">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- الفوتر -->
        <footer class="mt-auto py-3 text-center text-white">
            <p>&copy; 2024 مكتبة الكتب. جميع الحقوق محفوظة.</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
