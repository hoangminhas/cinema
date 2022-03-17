@extends('layoutbackend.index')
@section('title','CREATEMOVIE')
@section('content')
<div class="container mt-3">
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Phim</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Thời Lượng</label>
          <input type="text" name="duration" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tóm Tắt</label>
            <input type="text" name="summary" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">DATE</label>
            <input type="datetime-local" name="date" class="form-control">
          </div>
          <div>
            @foreach ($categories as $category)
            <input   value="{{$category->id}}" name="category[]" type="checkbox">
            <label style="padding-right: 20px">{{$category->name}}</label>
            @endforeach
        </div>
        <div class="row">
            <div class="col-2"> <button type="submit" class="btn btn-try-builder btn-bg-gradient-x-purple-red btn-glow white">Create Movie</button></div>
            <div class="col-2"><a href="{{route('movie.index')}}">Back</a></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
        </div>



      </form>
</div>
@endsection



