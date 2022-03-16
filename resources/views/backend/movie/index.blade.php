@extends('layout.index')
@section('title', 'LISTMOVIE')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">LISTMOVIE</div>
            <div class="col"><a href="{{route('movie.store')}}">CREATEMOVIE</a></div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tên Phim</th>
                    <th scope="col">Thể Loại</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $key => $movie)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ asset('storage/' . $movie->image) }}" width="150px" alt=""></td>
                        <td>{{ $movie->name }}</td>
                        {{-- <td>{{$movie->category}}</td> --}}
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
