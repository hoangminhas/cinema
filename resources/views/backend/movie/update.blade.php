@extends('layoutbackend.index')
@section('title', 'Update Movie')
@section('content')
    <div class="container mt-3">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Phim</label>
                <input type="text" name="name" value="{{ $movie->name }}" value="{{ old('name') }}" required
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')"
                    class="form-control" id="formGroupExampleInput" placeholder="Tên Phim" class="form-control"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thời Lượng</label>
                <input type="text" name="duration" value="{{ $movie->duration }}" value="{{ old('duảtion') }}" required
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')"
                    class="form-control" id="formGroupExampleInput" placeholder="Tên Phim" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm Tắt</label>
                <textarea name="summary" id="" cols="30" rows="6" required oninvalid="this.setCustomValidity('Vui Long Nhap')"
                    oninput="this.setCustomValidity('')" class="form-control" id="formGroupExampleInput"
                    placeholder="Tóm Tắt Phim">{{ $movie->summary }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Date_start</label> <br>
                <input type="date"  value="{{ old('date') }}" oninvalid="this.setCustomValidity('Vui Long Nhap')"
                    oninput="this.setCustomValidity('')" name="date_start">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Date_end</label> <br>
                <input type="date"  value="{{ old('date') }}" oninvalid="this.setCustomValidity('Vui Long Nhap')"
                    oninput="this.setCustomValidity('')" name="date_end">
            </div>
            <div>
                @foreach ($categories as $category)
                    {{-- {{dd( $movie->categories)}} --}}
                    <input id="{{ $category->name }}" value="{{ $category->id }}"
                        {{ $movie->categories->contains('id', $category->id) ? 'checked' : '' }} name="category[]"
                        type="checkbox">
                    <label for="{{ $category->name }}" style="padding-right: 20px">{{ $category->name }}</label>
                @endforeach
            </div>
            <p style="color: brown">{{ $errors->has('category') ? $errors->first('category') : '' }}</p>
            <div>
                @foreach ($seats as $seat)
                    <input type="checkbox" checked value="{{$seat->id}}" hidden>
                @endforeach
            </div>
            <div class="row mt-2">
                <div class="col-2"> <button type="submit" class="btn btn-info round btn-min-width mr-1 mb-1">Update
                        Movie</button></div>
                <div class="col-2"><a class="btn btn-secondary round btn-min-width mr-1 mb-1"
                        href="{{ route('movie.index') }}">Back</a></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
            </div>
        </form>
    </div>
@endsection
