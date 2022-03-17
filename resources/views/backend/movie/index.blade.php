@extends('layoutbackend.index')
@section('title', 'LIST MOVIE')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-3">
                <h2 style="text-align: center">LISTMOVIE</h2>
            </div>
            <div class="col-9" style="text-align: right"><a href="{{ route('movie.store') }}"
                class="btn btn-md btn-info box-shadow-2 round btn-min-width pull-right">CREATEMOVIE</a></div>
        </div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr style="text-align: center">
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tên Phim</th>
                    <th scope="col">Thể Loại</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $key => $movie)
                    <tr style="width: 200px ; height: 100px">
                        <th style="text-align: center">{{ $key + 1 }}</th>
                        <td><img src="{{ asset('storage/' . $movie->image) }}" width="100px" alt=""></td>
                        <td>{{ $movie->name }}</td>
                        {{-- <td style="text-align: center">{{$movie->categoryname}}</td> --}}
                        <td>
                            @foreach ($movie->categories as $category)
                                <p class="btn btn-sm btn-outline-danger round">{{ $category->name }}</p>
                            @endforeach
                        </td>
                        <td style="text-align: center"><a class="btn btn-sm btn-outline-danger round"
                                onclick="return confirm('Bạn có chắc muốn xóa phim {{ $movie->name }} này không?')"
                                href="{{ route('movie.delete', $movie->id) }}">Delete</a></td>
                        <td style="text-align: center"><a class="btn btn-sm btn-outline-success round"
                                href="{{ route('movie.edit', $movie->id) }}">Update</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
