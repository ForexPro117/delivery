@extends('header')
<title>Регистрация</title>
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Регистрация</h1>
    <form method="POST"  class="mt-4" style="width: 30%" action="{{ route('registerPOST') }}">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control " name="code"
                   placeholder="Электронная почта">
            @error('email')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" name="role">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            @error('role')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="name"
                   placeholder="ФИО">
            @error('name')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
        <div class="mb-2">
            <input type="password" class="form-control" name="password"
                   placeholder="Пароль">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password_confirmation"
                   placeholder="Повторите пароль">
            @error('password')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
        <div class="mt-3 d-flex justify-content-center align-items-center ">
            <button type="submit" class="btn btn-primary buton">Регистрация</button>

        </div>
    </form>
</div>
@endsection
