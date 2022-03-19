@extends('layoutbackend.index')
@section('title', 'List Foods')
@section('content')
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-3">
                <h2 style="text-align: center">Update Foods</h2>
            </div>
            {{-- <div class="col-9" style="text-align: right"><a href="{{ route('food.store') }}"
                    class="btn btn-md btn-info box-shadow-2 round btn-min-width pull-right">Create Food</a></div> --}}
        </div>
        <div class="row ml-5">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Foods</label>
                        <input type="text" name="name" value="{{$food->name}}" class="form-control" placeholder="Tên">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="price" value="{{$food->price}}" class="form-control" placeholder="Giá">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="exampleInputEmail1">Image</label> <br>
                    <input type="file" name="image">
                </div>
                <div class="row mt-2">
                    <div class="col-4"> <button type="submit"
                            class="btn btn-success round btn-min-width mr-1 mb-1">Update Food</button></div>
                    <div class="col-4"><a class="btn btn-secondary round btn-min-width mr-1 mb-1"
                            href="{{ route('food.index') }}">Back</a></div>

                </div>

            </form>
        </div>
    </div>
@endsection
