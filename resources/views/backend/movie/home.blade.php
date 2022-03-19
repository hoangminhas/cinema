@extends('layoutbackend.index')
@section('title', 'Home')
@section('content')
    <div class="container mt-3">
        <div class="row mb-2">
            <div class="col-3 ml-2" ><h1>Movies</h1></div>
        </div>
        <div class="row">
            @foreach ($movies as $movie)
                <div class="card col-3 ml-3 mr-3" style="width: 18rem;">
                    <img class="mt-2 mb-2" src="{{ asset('storage/' . $movie->image) }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Phim: <span>{{ $movie->name }}</span></h6>
                        <h6>Thời Lượng: {{$movie->duration}} </h6>
                        <div>
                            Thể Loại :
                            @foreach ($movie->categories as $category)
                                <span class="card-text">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
