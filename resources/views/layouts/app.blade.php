<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HRGF')</title>
    <!-- Include any additional stylesheets here -->
    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .reduced {
            max-width: 400px;
            margin: auto;
        }

        .box-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 30px;
            background-color: #fff;
            color: #000;
        }

        .centered-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 400px;
            width: 100%;
            padding: 15px;
        }

        .container {
            background-color: #333;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            color: #fff;
        }
    </style>
    @yield('styles') <!-- Additional styles specific to each page -->
</head>

<body class="bg-dark text-light">
    <!-- Navbar or header can be added here if applicable -->

    @yield('content') <!-- This will inject page-specific content -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include any additional scripts here -->
    @yield('scripts') <!-- Additional scripts specific to each page -->
</body>

</html>