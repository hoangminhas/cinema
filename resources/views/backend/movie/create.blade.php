@extends('layoutbackend.index')
@section('title', 'Create Movie')
@section('content')
    <div class="container mt-3">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên Phim</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')"
                    class="form-control" id="formGroupExampleInput" placeholder="Tên Phim">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thời Lượng</label>
                <input type="text" name="duration" required value="{{ old('duration') }}"
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')"
                    class="form-control" id="exampleInputPassword1" placeholder="Thời Lượng Phim">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm Tắt</label>
                <textarea name="summary" id="" cols="20" rows="7" required value="{{ old('summary') }}"
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')"
                    class="form-control" id="exampleInputPassword1" placeholder="Tóm Tắt Phim"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">date_start</label> <br>
                <input type="date" value="" required value="{{ old('date') }}"
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')" name="date_start">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Date_end</label> <br>
                <input type="date" value="" required value="{{ old('date') }}"
                    oninvalid="this.setCustomValidity('Vui Long Nhap')" oninput="this.setCustomValidity('')" name="date_end">
            </div>
            <div>
                @foreach ($categories as $category)
                    <input id="{{ $category->name }}" value="{{ $category->id }}" name="category[]" type="checkbox">
                    <label for="{{ $category->name }}" style="padding-right: 20px">{{ $category->name }}</label>
                @endforeach
            </div>
            <p style="color: brown">{{ $errors->has('category') ? $errors->first('category') : '' }}</p>
            <div class="row mt-2">
                <div class="col-2"> <button type="submit"
                        class="btn btn-success round btn-min-width mr-1 mb-1">Create Movie</button></div>
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
