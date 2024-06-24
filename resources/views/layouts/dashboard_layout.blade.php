<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HRGF Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 48px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .list-group-item {
            background-color: #333;
            border-color: #495057;
            color: #ffffff;
            padding: 15px;
            margin-bottom: 10px;
        }

        .list-group-item a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            font-size: 32px;
        }

        .list-group-item a:hover {
            text-decoration: underline;
            color: #f3ca52;
        }

        .disabled {
            pointer-events: none;
            cursor: not-allowed;
            color: #ccc;
        }

        .bold-text {
            font-weight: bold;
        }

        span {
            color: #F3CA52;
        }

        #translate-btn {
            margin-bottom: 20px;
        }

        .container {
            background-color: #343a40;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
    @yield('styles') <!-- Additional styles specific to each page -->
</head>

<body class="bg-dark text-light">
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <!-- Navigation or additional buttons can be placed here -->
            <button id="translate-btn" class="btn btn-primary">Translate</button>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout </button>
            </form>
        </div>

        <div class="content">
            <div class="title m-b-md">
                @yield('dashboard-title', 'Dashboard')
            </div>
            @yield('dashboard-content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const translateBtn = document.getElementById('translate-btn');
            const listItemsEn = document.getElementById('list-items-en');
            const listItemsAr = document.getElementById('list-items-ar');

            translateBtn.addEventListener('click', function () {
                if (listItemsEn.classList.contains('d-none')) {
                    // Show English, hide Arabic
                    listItemsEn.classList.remove('d-none');
                    listItemsAr.classList.add('d-none');
                    translateBtn.textContent = 'Translate'; // Set button text back to 'Translate'
                } else {
                    // Show Arabic, hide English
                    listItemsAr.classList.remove('d-none');
                    listItemsEn.classList.add('d-none');
                    translateBtn.textContent = 'ترجمة'; // Set button text to 'ترجمة'
                }
            });
        });
    </script>
    @yield('scripts') <!-- Additional scripts specific to each page -->
</body>

</html>