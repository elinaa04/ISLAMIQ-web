<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - IslamiQ</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Modak&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>

<body>
    @yield('navbar')
    @yield('sidebar')

    <div class="content">
        @yield('breadcrumbs')
        @yield('content')
    </div>

    <style>
        @media (max-width: 575px) {
            .col-md-12 {
                flex-direction: column;
                align-items: center;
            }

            .col-sm-8 {
                margin-right: 0 !important;
            }

            .profil-img {
                margin: 0 !important;
            }

            .profil .card {
                min-height: 100%;
                display: flex;
                flex-direction: column;
            }

            .profil .card-body {
                flex: 1;
            }

            .card-footer {
                margin-top: auto;
            }

            .edit-profil .card {
                height: auto !important;
            }

            .card-body {
                padding: 10px;
            }

            .card-footer a {
                margin: 0 !important;
            }

            .card-footer button {
                margin: 0 auto;
            }

            .delete {
                align-items: center;
                margin: 0 !important;
            }
        }

        @media (max-width:767px) {
            .delete {
                align-items: center;
                margin: 0 !important;
            }

        }

        @media (max-width:868px) {
            .col-md-12 {
                width: 80%;
                margin: 0 auto;
            }
        }

        @media (max-width: 575px) {
            .profil .card {
                height: auto;
            }
        }

        /* Bagian logo sidebar */
        .navbar-brand-container .navbar-brand {
            font-size: 30px;
        }

        .navbar-brand-container .navbar-brand .brand-image {
            border-radius: 50%;
            margin-right: 30px;
            max-width: 40px;
            max-height: 40px;
            margin-left: -55px;
        }

        /* Bagian text nya judul per menu */
        .custom-font {
            font-family: 'Varela Round', sans-serif;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* untuk bagian home notif */
        .notification {
            position: fixed;
            top: 0;
            left: 60%;
            transform: translateX(-50%);
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #d9d9d9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .notification.show {
            opacity: 1;
        }

        .col-md-4 .card {
            border-radius: 10px;
        }

        /* Bagian report */
        .col-md-4 .card h3 {
            font-family: 'Varela Round', sans-serif;
            font-size: 20px;
            margin-top: 15px;
            margin-left: 15px;
        }

        .col-md-4 .card p {
            font-family: 'Varela Round', sans-serif;
            font-size: 40px;
            margin-top: 15px;
            margin-left: 15px;
            color: #000;
        }

        .col-md-4 img {
            margin-top: 20px;
            margin-right: 30px;
            margin-left: -15px;
        }
    </style>
</body>

</html>