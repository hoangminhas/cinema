@extends('layoutFrontend.master')
@section('title', 'Infor')
@section('content')
    <form id="form" action="#" method="get">
        <h1>Japan Anti Viruss Cinema</h1><br>
        {{-- <input id="email" type="email" placeholder="Nhập email để nhận các ưu đãi mới nhất" name="register"><br><br>
    <input id="submit" type="button" name="register" value="Đăng ký"> --}}
    </form>
    <div class="container mr-4">
        <form action="" method="POST">
            @csrf
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Password</label>
                <input type="password" name="password" class="form-control" id="validationCustom01" required>
                <p style="color: red">{{ Session::has('msg') ? Session::get('msg') : '' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">New Password</label>
                <input type="password" name="newpassword" class="form-control" id="validationCustom01" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Confirm New Password</label>
                <input type="password" name="newconfirmpassword" class="form-control" id="validationCustom01" required>
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success">Change Password</button>
                    </div>
                    <div class="col">
                        <a class="btn btn-secondary" href="{{ route('infor') }}">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
