<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Welcome</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Modak&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">


    <!-- Styles -->
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        .container {
            height: 100vh;
            width: 100%;
            position: relative;
            background: url(style/images/background.jpg);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container .box {
            height: 86vh;
            width: 75%;
            padding: 0 20px;
            background-color: rgba(225, 225, 225, 0.1);
            z-index: 10;
            border: 1.5px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            display: flex;
            backdrop-filter: blur(30px);
            box-shadow: -15px 17px 17px rgba(10, 10, 10, 0.15);
        }

        .container nav {
            height: 7%;
            width: 90%;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 15px auto;
            padding: 20px;
        }

        .container .logo {
            font-family: 'Modak', Modak;
            font-size: 20px;
            font-weight: 500;
            text-decoration: none;
            color: #333333;
            margin-left: 10px;
            position: relative;
        }


        .container .logo::after {
            content: attr(data-last-letter);
            color: #79CD7B;
            position: absolute;
        }

        /* .container .logo::first-letter {
            color: #333333;
            font-size: 25px;
        } */

        .container .btn {
            padding: 8px 20px;
            border-radius: 20px;
            background-color: #79CD7B;
            border: 1px solid #79CD7B;
            font-weight: 300;
            text-decoration: none;
            transition: 0.3s;
            font-family: 'Montserrat', sans-serif;
            color: #ffff;
            font-weight: bold;
            font-size: 12px;
            letter-spacing: 2px;
            margin-left: auto;
            margin-right: 0;
        }

        .container .btn:hover {
            background-color: #ffff;
            color: #79CD7B;
        }

        .content {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-top: 8%;
            padding-left: 30px;
        }

        .content .section-1 {
            position: relative;
            width: 50%;
            margin-left: 2%;
        }

        .content .section-1 h1 {
            font-family: 'Rubik Mono One', sans-serif;
            margin-bottom: 10px;
            font-size: 26px;
            font-weight: 500;
            color: #ffff;
            white-space: nowrap;
        }

        .content .section-1 h3 {
            font-family: 'Varela Round', sans-serif;
            font-size: 20spx;
            letter-spacing: 2px;
            color: #ffff;
            margin-bottom: 30px;
        }

        .content .section-1 p {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            color: #ffff;
            margin-bottom: 70px;
            text-align: justify;
        }

        .content .section-2 {
            width: 50%;
            position: relative;
        }

        .content .section-2 img {
            width: 60%;
            border-radius: 50%;
            margin-top: -10%;
            margin-right: 5%;
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <nav>
                <a href="#" class="logo">IslamiQ</a>
                <a href="{{ route('login') }}" class="btn">Login</a>
            </nav>
            <div class="content">
                <div class="section-1">
                    <h1>Halo,Selamat Datang Anda</h1>
                    <h3>Di website aplikasi IslamiQ</h3>
                    <p> Kamu bisa menikmati layanan aplikasi IslamiQ untuk mendukung proses pembelajaran
                        Pendidikan Agama Islam di Sekolah Dasar. Jelajahi semua fitur yang ada seperti
                        upload materi dan latihan soal, serta melihat report hasil pembelajaran siswa untuk mengukur tingkat kepahaman siswa.
                        Yuk coba aplikasi IslamiQ sekarang!
                    </p>
                </div>
                <div class="section-2">
                    <img src="style/images/islamiq.png">
                </div>
            </div>
        </div>
    </div>
</body>

</html>