@extends('header')
<title>История</title>
<link rel="stylesheet" href="{{ asset('css/items.css') }}"
@section('bodyContent')

    <h3 class="container mt-4">Ваши активные объявления</h3>
    <div class="container d-flex flex-row flex-wrap mt-5">
        @for($i=0;$i<count($ann);$i++)
            <div class="border card" id="card{{$ann[$i]->id}}">
                <div id="carouselExampleIndicators{{$i}}" class="carousel slide" data-interval="false">
                    <div class="carousel-indicators">
                        @if($ann[$i]->countPhotos<2)
                            <button type="button" data-bs-target="#carouselExampleIndicators{{$i}}" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleIndicators{{$i}}" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            @for($j=1;$j<$ann[$i]->countPhotos;$j++)
                                <button type="button" data-bs-target="#carouselExampleIndicators{{$i}}"
                                        data-bs-slide-to="{{$j}}"
                                        aria-label="Slide {{$j+1}}"></button>
                            @endfor
                        @endif
                    </div>
                    <div class="carousel-inner">
                        <a href="/announcement/{{$ann[$i]->id}}" {{--target="_blank"--}}>
                            <div class="carousel-item active">
                                <img src="{{asset('storage/'.$ann[$i]->photo0)}}" class="d-block w-100" alt="...">
                            </div>
                            @for($j=1;$j<$ann[$i]->countPhotos;$j++)
                                <div class="carousel-item">
                                    <img src="{{asset('storage/'.$ann[$i]['photo'.$j])}}" class="d-block w-100" alt="...">
                                </div>
                            @endfor
                        </a>
                    </div>
                    <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators{{$i}}"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators{{$i}}"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <a href="/announcement/{{$ann[$i]->id}}" {{--target="_blank"--}}><label class="text">{{$ann[$i]->announcement_name}}</label> </a>
                @if($ann[$i]->price == null)
                    <label class="price">Бесплатно</label>
                @else
                    <label class="price">{{$ann[$i]->price}} ₽</label>
                @endif
                <label class="text-other">Ижевск</label>
                <div class="d-flex justify-content-between">
                    <label class="text-other">{{date('d-m-y H:i',strtotime($ann[$i]->created_at))}}</label>
                    <label onclick="deleteAnn({{$ann[$i]->id}})" class="text">Удалить</label>
                </div>
            </div>
        @endfor
    </div>
    <script src="{{asset("js/script.js")}}"></script>
@endsection
