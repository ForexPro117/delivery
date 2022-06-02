@extends('header')
<title>{{$ann->announcement_name}}</title>
<link rel="stylesheet" href="{{ asset('css/ann.css') }}">
@section('bodyContent')

    <div class="container d-flex flex-column align-items-center mt-5">
        <h2 style="color: #6e6e6e;">Объявление:<span> {{$ann->announcement_name}}</span></h2>

        <div id="carouselExampleIndicators" class="carousel slide item" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @if($ann->countPhotos<2)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                    @for($j=1;$j<$ann->countPhotos;$j++)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{$j}}"
                                aria-label="Slide {{$j+1}}"></button>
                    @endfor
                @endif
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('storage/'.$ann->photo0)}}" class="d-block w-100" alt="...">
                </div>
                @for($j=1;$j<$ann->countPhotos;$j++)
                    <div class="carousel-item">
                        <img src="{{asset('storage/'.$ann['photo'.$j])}}" class="d-block w-100" alt="...">
                    </div>
                @endfor

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="d-flex flex-row justify-content-around">
            @for($i=0;$i<$ann->countPhotos;$i++)
                <img style="margin-left: 10px" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"
                     width="120" height="40" src="{{asset('storage/'.$ann['photo'.$i])}}">
            @endfor
        </div>@extends('header')
        <title>{{$ann->announcement_name}}</title>
        <link rel="stylesheet" href="{{ asset('css/ann.css') }}">
        @section('bodyContent')

            <div class="container d-flex flex-column align-items-center mt-5">
                <h2 style="color: #6e6e6e;">Объявление:<span> {{$ann->announcement_name}}</span></h2>

                <div id="carouselExampleIndicators" class="carousel slide item" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @if($ann->countPhotos<2)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            @for($j=1;$j<$ann->countPhotos;$j++)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{$j}}"
                                        aria-label="Slide {{$j+1}}"></button>
                            @endfor
                        @endif
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('storage/'.$ann->photo0)}}" class="d-block w-100" alt="...">
                        </div>
                        @for($j=1;$j<$ann->countPhotos;$j++)
                            <div class="carousel-item">
                                <img src="{{asset('storage/'.$ann['photo'.$j])}}" class="d-block w-100" alt="...">
                            </div>
                        @endfor

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="d-flex flex-row justify-content-around">
                    @for($i=0;$i<$ann->countPhotos;$i++)
                        <img style="margin-left: 10px; object-fit: cover" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"
                             width="90" height="40" src="{{asset('storage/'.$ann['photo'.$i])}}">
                    @endfor
                </div>
            </div>
            <div class="container d-flex flex-column align-items-start mt-5">
                <label>Разместил: <span>{{$user->lastname}} {{$user->name}}</span></label>
                <label>Телефон: <span>{{$user->phone}}</span></label>

                <label>Дата создания: {{date('d-m-y H:i',strtotime($ann->created_at))}}</label>
            </div>
            <div class="container d-flex flex-column align-items-center mt-2">
                <label >Описание</label>
                <label class="box">{{$ann->description}}</label>
            </div>
        @endsection

    </div>
    <div class="container d-flex flex-column align-items-start mt-5">
        <label>Разместил: <span>{{$user->lastname}} {{$user->name}}</span></label>
        <label>Телефон: <span>{{$user->phone}}</span></label>

        <label>Дата создания: {{date('d-m-y H:i',strtotime($ann->created_at))}}</label>
    </div>
    <div class="container d-flex flex-column align-items-center mt-2">
        <label >Описание</label>
        <label class="box">{{$ann->description}}</label>
    </div>
@endsection
