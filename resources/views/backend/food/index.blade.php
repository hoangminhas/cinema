@extends('layoutbackend.index')
@section('title', 'List Foods')
@section('content')
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-3">
                <h2 style="text-align: center">List Foods</h2>
            </div>
            <div class="col-6" style="text-align: right"><a href="{{ route('food.store') }}"
                    class="btn btn-md btn-info box-shadow-2 round btn-min-width pull-right">Create Food</a></div>
        </div>
        <div class="card-content collapse show"></div>
        <div class="card-body">
            <div class="media-list">
                @foreach ($foods as $food)
                    <div class="media">
                        <a class="media-left" href="">
                            <img src="{{ asset('storage/' . $food->image) }}" alt="Generic placeholder image"
                                style="width: 200px;height: 200px;" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><span>{{ $food->name }}</span>
                                <span class="dropdown">
                                    <button id="btnSearchDrop14" type="button"
                                        class="btn btn-sm btn-icon btn-pure font-medium-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ft-more-vertical"></i>
                                    </button>
                                    <span aria-labelledby="btnSearchDrop14" class="dropdown-menu mt-1 dropdown-menu-right">
                                        <a class="dropdown-item btn btn-sm btn-outline-danger round"
                                            onclick="return confirm('Bạn có chắc muốn xóa phim {{ $food->name }} này không?')"
                                            href="{{ route('food.delete', $food->id) }}"><i
                                                class="ft-edit-2"></i>Delete</a>
                                        <a class="dropdown-item btn btn-sm btn-outline-success round"
                                            href="{{ route('food.edit', $food->id) }}">
                                            <i class="ft-trash-2"></i>Update</a>
                                    </span>
                                </span>
                            </h4>
                            <h5>Giá : {{ $food->price }}</h5>

                        </div>
                        {{-- <div class="meida-right">
                        </div> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
