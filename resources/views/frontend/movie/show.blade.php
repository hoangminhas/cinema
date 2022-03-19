@extends('layoutFrontend.master')
@section('title', 'this movie')
@section('head')
    <style>
        h2{
            font-size: xxx-large;
            animation-name: h2;
            animation-duration: 4.5s;
            animation-iteration-count: infinite;
        }

        @keyframes h2 {
            0%{
                color: yellow;
            }
            20%{
                color: orangered;
            }
            40%{
                color: green;
            }
            60%{
                color: blue;
            }
            80%{
                color: indigo;
            }
            100%{
                color: purple;
            }
        }
    </style>
@endsection
@section('content')

<h2 style="margin-top: 120px; text-align: center">Nội dung phim</h2>
<hr style="margin-bottom: 70px">

<div class="row" style="margin: auto; width: 90%">
    <div class="col-5">
        <img width="85%" height="325px" style="display: block; margin: auto" src="{{asset("$movie->image")}}" alt="movie">
    </div>
    <div class="col-7">
        <h3 style="text-align: center">{{$movie->name}}</h3>
        <p>Tóm tắt: {{$movie->summary}}</p>
        <p>Thời lượng: {{$movie->duration}} phút</p>
        <p>Ngày phát hành: {{$movie->date}}</p>
        <p>Thể loại:
            @foreach($movie->categories as $category)
                <span style="border-radius: 20px" class="btn btn-{{$category->color}}">{{$category->name}}</span>
            @endforeach
        </p>
        <p>Ngôn ngữ: Tiếng Anh - Phụ đề Tiếng Việt</p>
        <img src="{{asset("img/frontend/signal/signal1.png")}}" alt="sign1">
        <img src="{{asset("img/frontend/signal/signal2.png")}}" alt="sign2">
        <img src="{{asset("img/frontend/signal/signal3.png")}}" alt="sign3">
        <a class="btn btn-danger" href="{{route('showFormOrder', $movie->id)}}">Đặt vé</a>
    </div>
</div>
@endsection
