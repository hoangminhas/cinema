@extends('layoutFrontend.master')
@section('title', 'Phim dang chieu')
@section('content')

{{--    Show list movies dang chieu--}}
    <div class="col-12">
        <h2>Phim Đang Chiếu</h2>
        <div class="row">
            @foreach ($currentMovies as $movie)
                <div class="col-4" style="margin: 15px 0px">
                    <div class="card" style="width: 25rem; height: 33em">
                        <img style="width: 25rem; height: 20em" src="{{asset('storage/'.$movie->image)}}" class="card-img-top" alt="movie">
                        <div class="card-body">
                            <h5 class="card-title">{{$movie->name}}</h5>
                            <p class="card-text">{{ $movie->duration }} phút</p>
                            <p class="card-text">
                                Thể loại:
                                @foreach($movie->categories as $category)
                                    <span>{{$category->name}}</span>
                                @endforeach
                            </p>
                            <a href="{{route('showFormOrder', $movie->id)}}" class="btn btn-danger">Đặt Vé</a>
                            <a href="{{route('current.movie.show',$movie->id)}}" class="btn btn-info">Chi tiết</a>
                        </div>
                    </div>
                </div><br><br>
            @endforeach
        </div>
    </div>

{{--    Show list movies sap chieu--}}
    <div class="col-12">
        <h2>Phim Sắp Chiếu</h2>
        <div class="row">

            @foreach ($upCummingMovies as $movie)
                    <div class="col-4" style="margin: 15px 0px">
                        <div class="card" style="width: 25rem; height: 33em">
                            <img style="width: 25rem; height: 20em" src="{{asset('storage/'.$movie->image)}}" class="card-img-top" alt="movie">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->name }}</h5>
                                <p class="card-text">{{ $movie->duration }} phút</p>
                                <p class="card-text">
                                    Thể loại:
                                    @foreach($movie->categories as $category)
                                        <span>{{$category->name}}</span>
                                    @endforeach
                                </p>
                                <a href="{{route('current.movie.show',$movie->id)}}" class="btn btn-info">Chi tiết</a>
                            </div>
                        </div>
                    </div><br><br>
            @endforeach
        </div>
    </div>
<script>
    @if(\Illuminate\Support\Facades\Session::has('msg'))
        alert("{{\Illuminate\Support\Facades\Session::get('msg')}}")
    @endif
</script>
@endsection
