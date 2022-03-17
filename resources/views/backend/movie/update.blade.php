@extends('layoutbackend.index')
@section('title','UPDATEMOVIE')
@section('content')
<div class="container">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên Phim</label>
              <input type="text" name="name" class="form-control"  aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Thời Lượng</label>
              <input type="text" name="duration" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm Tắt</label>
                <input type="text" name="summary" class="form-control" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" name="image" class="form-control-file" >
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
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route(movie.index)}}">Back</a>
          </form>


</div>
@endsection
