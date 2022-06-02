<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    <title>Work</title>
</head>
<body>
<header class="p-2 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0">

            </ul>
            <div class="text-end nav">
                @if(Auth::check())
                    <a href="/history" class="nav-link  link-light">Мои объявления</a>

                    <label class="nav-link  link-light"> {{request()->user()->name}} </label>

                    <button type="button" class=" text-white btn btn-primary mx-2"

                            onclick="location.href='{{route('ann')}}'">Разместить объявление
                    </button>
                    <button type="button" class="btn btn-outline-primary "
                            onclick="location.href='{{route('logout')}}'">
                        Выйти
                    </button>
                @else
                    <li><label data-bs-toggle="modal" data-bs-target="#ModalLogin"
                               class="nav-link mr-2 link-light nav-pointer">Вход и регистрация</label></li>
                    {{--<button type="button" class=" text-white btn btn-primary "
                            onclick="location.href='{{route('ann')}}'">Разместить объявление
                    </button>--}}
                @endauth

            </div>
        </div>
    </div>
</header>
<main>

@yield("bodyContent")
<!-- Modal -->
    @if(!Auth::check())

        @include('modalLogin')

        @include('modalReg')

    @endauth
    <script src="{{asset("js/script.js")}}"></script>
</main>

</body>
</html>
