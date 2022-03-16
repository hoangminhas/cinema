@extends('layout.index')
@section('title','CREATEMOVIE')
@section('content')
<div class="container">
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
            <input   value="{{$category->id}}" type="checkbox">
            <label style="padding-right: 20px">{{$category->name}}</label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection



