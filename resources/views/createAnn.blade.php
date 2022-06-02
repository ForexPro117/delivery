@extends('header')
<title>Размещение объявления</title>
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Размещение объявления</h1>
        <form method="POST" class="mt-4" style="width: 60%" action="{{route('ann')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bolder">Название объявления</label>
                <input type="text" autocomplete="on" class="form-control" name="name"
                       placeholder="Введите название">
                @error('name')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bolder">Добавьте стоимость</label>
                <input type="text"  class="form-control" name="price"
                       placeholder="₽">
                @error('price')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bolder">Добавьте описание объявления</label>
                <textarea class="form-control" name="description" placeholder="Ваше описание"
                          rows="5"></textarea>
                @error('description')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="file" class="form-label fw-bolder">Прикрепите фотографии</label>
                <input type="file" class="form-control" name="images[]"  multiple>
                @error('images')
                <label class="text-danger">{{ $message }}</label>
                @enderror
                @error('images.*')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mt-3 d-flex justify-content-between align-items-center ">
                <button type="submit" style="width: 100%" class="btn btn-primary">Разместить</button>
            </div>
        </form>
    </div>
@endsection
