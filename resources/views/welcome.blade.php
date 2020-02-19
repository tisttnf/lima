<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Link and Match Proyek 2
                </div>

                <div class="links">
                    {{-- <hr> --}}
                    {{-- <a href="{{ route('project.index') }}">User</a>
                    <a href="{{ route('project.index') }}">Project Owner</a>
                    <a href="{{ route('project.index') }}">Dosen</a>
                    <a href="{{ route('project.index') }}">Asisten Dosen</a>
                    <a href="{{ route('project.index') }}">Mahasiswa</a>
                    <a href="{{ route('project.index') }}">Admin</a> --}}
                    {{-- <hr> --}}
                    {{-- <a href="{{ route('project.index') }}">Absen</a> --}}
                    <hr>
                    <a href="{{ route('prodi.index') }}">Prodi</a>
                    <a href="{{ route('semester.index') }}">Semester</a>
                    <a href="{{ route('peran.index') }}">Peran</a>
                    <hr>
                    <a href="{{ route('project.index') }}">Project</a>
                    {{-- <a href="{{ route('mvpproject.index') }}">MVP Project</a> --}}
                    {{-- <a href="{{ route('sprintproject.index') }}">Sprint Project</a> --}}
                    {{-- <a href="{{ route('logproject.index') }}">Log Project</a> --}}
                    <hr>
                    <a href="{{ route('tim.index') }}">Tim</a>
                    <a href="{{ route('membertim.index') }}">Member Tim</a>
                    <hr>
                    <a href="{{ route('timskor.index') }}">Tim Skor</a>
                    <a href="{{ route('membertimskor.index') }}">Member Tim Skor</a>
                    <hr>
                </div>
            </div>
        </div>
    </body>
</html>
