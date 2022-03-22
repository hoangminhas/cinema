<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/frontendcss/movie/ticketSir.css")}}">
</head>
<body>

<div class="cardWrap ">
    <div class="card cardLeft">
        <h1>VLC <span>Cinema</span></h1>
        <div class="title">
            <h2>How I met your Mother</h2>
            <span>movie</span>
        </div>
        <div class="name">
            <h2>{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
            <span>name</span>
        </div>
        <div class="seat">
            <h2>156</h2>
            <span>seat</span>
        </div>
        <div class="time">
            <h2>12:00</h2>
            <span>time</span>
        </div>

    </div>
    <div class="card cardRight">
        <div class="eye"></div>
        <div class="number">
            <h3>156</h3>
            <span>seat</span>
        </div>
        <div class="barcode"></div>
    </div>
</div>

<a href="{{route('current.movie.index')}}">
    <button>Quay lai trang chu</button></a>
</body>
</html>







