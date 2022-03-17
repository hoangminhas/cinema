@extends('layoutbackend.index')
@section('title', 'LIST MOVIE')
{{-- <td>
    <span class="dropdown">
        <button id="btnSearchDrop14" type="button" class="btn btn-sm btn-icon btn-pure font-medium-2" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">
            <i class="ft-more-vertical"></i>
        </button>
        <span aria-labelledby="btnSearchDrop14" class="dropdown-menu mt-1 dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <i class="ft-trash-2"></i> Edit</a>
            <a href="#" class="dropdown-item">
                <i class="ft-edit-2"></i> Delete</a>
            <a href="#" class="dropdown-item">
                <i class="ft-plus-circle primary"></i> Projects</a>
            <a href="#" class="dropdown-item">
                <i class="ft-plus-circle info"></i> Team</a>
            <a href="#" class="dropdown-item">
                <i class="ft-plus-circle warning"></i> Clients</a>
            <a href="#" class="dropdown-item">
                <i class="ft-plus-circle success"></i> Friends</a>
        </span>
    </span>
</td> --}}
@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-3">
                <h2 style="text-align: center">LISTMOVIE</h2>
            </div>
            <div class="col-9" style="text-align: right"><a href="{{ route('movie.store') }}"
                    class="btn btn-md btn-info box-shadow-2 round btn-min-width pull-right">CREATEMOVIE</a></div>
        </div>
        <table
            class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-middle dataTable no-footer">
            <thead>
                <tr role="row" style="text-align: center">
                    <th class="sorting_asc" scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tên Phim</th>
                    <th scope="col">Thể Loại</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $key => $movie)
                    <tr style="width: 200px ; height: 100px">
                        <th style="text-align: center">{{ $key + 1 }}</th>
                        <td><img src="{{ asset('storage/' . $movie->image) }}" width="100px" alt=""></td>
                        <td>{{ $movie->name }}</td>
                        <td>
                            @foreach ($movie->categories as $category)
                                <p class="btn btn-sm btn-outline-{{ $category->color }} round">{{ $category->name }}</p>
                            @endforeach
                        </td>
                        <td>
                            <span class="dropdown">
                                <button id="btnSearchDrop14" type="button" class="btn btn-sm btn-icon btn-pure font-medium-2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ft-more-vertical"></i>
                                </button>
                                <span aria-labelledby="btnSearchDrop14" class="dropdown-menu mt-1 dropdown-menu-right">
                                    <a class="dropdown-item btn btn-sm btn-outline-danger round"
                                        onclick="return confirm('Bạn có chắc muốn xóa phim {{ $movie->name }} này không?')"
                                        href="{{ route('movie.delete', $movie->id) }}"><i
                                            class="ft-edit-2"></i>Delete</a>
                                    <a class="dropdown-item btn btn-sm btn-outline-success round"
                                        href="{{ route('movie.edit', $movie->id) }}">
                                        <i class="ft-trash-2"></i>Update</a>

                                </span>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
