<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Maintenance</title>
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
            font-size: 72px;
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

        .disabled {
            pointer-events: none;
            cursor: not-allowed;
            color: #ccc;
        }

        .container {
            background-color: #343a40;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .maintenance-logo {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="container text-center">
                <img src="{{ asset('images/maintenance.png') }}" alt="Maintenance Logo" class="maintenance-logo">
                <div class="title m-b-md">
                    This page is under maintenance
                </div>
                <p>We apologize for the inconvenience. Please check back later.</p>
            </div>
        </div>
    </div>
</body>

</html>