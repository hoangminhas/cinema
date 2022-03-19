@extends('layoutFrontend.master')
@section('title', 'Phim dang chieu')
@section('content')

    <div class="col-12">
    <h2>Phim Đang Chiếu</h2>
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-4" style="margin: 15px 0px">
                    <div class="card" style="width: 25rem; height: 40em">
                        <img src="{{$movie->image}}" class="card-img-top" alt="movie">
                        <div class="card-body">
                            <h5 class="card-title">{{$movie->name}}</h5>
                            <p class="card-text">{{$movie->summary}}</p>
                            <p class="card-text">Ngày phát hành: {{$movie->created_at}}</p>
                            <p class="card-text">
                                Thể loại: @foreach($movie->categories as $category)
                                              <span>{{$category->name}}</span>
                                @endforeach
                            </p>
                            <a href="{{route('current.movie.show',$movie->id)}}" class="btn btn-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div><br><br>
            @endforeach
        </div>
    </div>

    <div class="col-12">
        <h2>Phim Sắp Chiếu</h2>
        <div class="row">

            @foreach($movies as $movie)
                @if($movie->date > now())
                <div class="col-4" style="margin: 15px 0px">
                    <div class="card" style="width: 25rem; height: 35em">
                        <img src="{{$movie->image}}" class="card-img-top" alt="movie">
                        <div class="card-body">
                            <h5 class="card-title">{{$movie->name}}</h5>
                            <p class="card-text">{{$movie->summary}}</p>
                        </div>
                    </div>
                </div><br><br>
                @endif
            @endforeach
        </div>
    </div>

@endsection
