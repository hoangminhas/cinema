@extends('layoutbackend.index')
@section('title', 'UPDATEMOVIE')
@section('content')
    <div class="container mt-3">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Phim</label>
                <input type="text" name="name" value="{{ $movie->name }}" class="form-control"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thời Lượng</label>
                <input type="text" name="duration" value="{{ $movie->duration }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm Tắt</label>
                <input type="text" name="summary" value="{{ $movie->summary }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">DATE</label> <br>
                <input type="datetime-local" value="{{now()}}" name="date" >
            </div>
            <div>
                @foreach ($categories as $category)
                    {{-- {{dd( $movie->categories)}} --}}
                    <input value="{{ $category->id }}"
                    {{ $movie->categories->contains('id', $category->id) ? 'checked' : '' }}
                    name="category[]" type="checkbox">
                    <label style="padding-right: 20px">{{ $category->name }}</label>
                @endforeach
            </div>
            <div class="row mt-2">
                <div class="col-2"> <button type="submit" class="btn btn-info round btn-min-width mr-1 mb-1">Update Movie</button></div>
                <div class="col-2"><a class="btn btn-secondary round btn-min-width mr-1 mb-1" href="{{route('movie.index')}}">Back</a></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
            </div>
        </form>
    </div>
@endsection
