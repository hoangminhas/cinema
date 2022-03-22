@extends('layoutFrontend.master')
@section('title', 'Infor')
@section('content')
    <form id="form" action="#" method="get">
        <h1 >Japan Anti Viruss Cinema</h1><br>
        {{-- <input id="email" type="email" placeholder="Nhập email để nhận các ưu đãi mới nhất" name="register"><br><br>
        <input id="submit" type="button" name="register" value="Đăng ký"> --}}
    </form>
    <div class="container mb-3 mr-5">

        <fieldset>
            <legend>Infor</legend> <br>
            <h3>Name : {{ $user->name }}</h3> <br>
            <h3>Email : {{ $user->email }}</h3> <br>
            <h3>Login With : {{ $user->social_type ?? 'none' }}</h3> <br>
            <h3>Lịch sử giao dịch : </h3>
            <h3><a href="{{route('password')}}">Đổi Mật Khẩu</a></h3>
        </fieldset>

    </div>
@endsection
