@extends('header')
<title>Авторизация</title>
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Авторизация</h1>
        <form method="POST" class="mt-4" style="width: 30%" action="{{ route('loginPOST') }}">
            @csrf
            <div class="mb-3">
                <label for="Email" class="form-label fw-bolder">Код сотрудника</label>
                <input type="text" class="form-control" name="code"
                       placeholder="12345678">
                @error('code')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label fw-bolder">Пароль</label>
                <input type="password" class="form-control" name="password"
                       placeholder="Ваш пароль">
                @error('password')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>

            <div class="mt-3 d-flex justify-content-between align-items-center ">
                <button type="submit" class="btn btn-primary">Войти</button>
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="remember">
                    <label class="form-check-label" >Запомнить меня</label>
                </div>
            </div>
        </form>
    </div>
@endsection



