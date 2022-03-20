@extends('layoutFrontend.master')
@section('title', 'Order')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .check-with-label:checked + .label-for-check {
            background-color: hotpink;
        }

        .not-null + .label-for-check{
            background-color: grey;
            pointer-events: none;
        }

        .screen {
            background-color: #fff;
            width: 40%;
            height: 70px;
            margin: 15px 10px;
            transform: rotateX(-45deg);
            /*box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);*/
            box-shadow: 10px 15px 20px 5px #8899a6;
        }

        .container-screen {
            perspective: 700px;
        }

        #movie-screen {
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
            padding-left: 20px;
        }
    </style>
@endsection
@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-10">
                <div style="margin-left: 450px">
                    <form action="{{route('orderTicket')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        <input type="hidden" name="movie_id" value="{{$movie->id}}">
                        <h2 style="color: red">Order Ticket</h2><br><br>
                        <p>Phim: {{$movie->name}}</p>
                        <label for="date">Chọn ngày:
                            <select name="date" id="date-select">
                                <option value="#" disabled selected>--Chọn Ngày--</option>
                                @foreach($dateRange as $date)
                                    <option value='{{$date->format('Y-m-d')}}'>{{$date->format('Y-m-d')}}</option>
                                @endforeach
                            </select>
                        </label><br>
                        <p>Chọn ghế: </p>
                        <div class="container-screen">
                            <div class="screen">
                                <span id="movie-screen">Movie Screen</span>
                            </div>
                        </div>
                        <br>
                        <div id="normal" class="seats" style="width: 50%">
                            @foreach($seats as $key => $seat)
                                @if($seat->pivot->status == "null")
                                    <input style="display: none" class="check-with-label seat"
                                       id="{{$key}}" type="checkbox" name="seats[]" value="{{$seat->id}}"
                                       data-name="{{$seat->name}}" data-price="{{$seat->seattype->price}}">
                                @else
                                    <input  style="display: none" class="check-with-label not-null seat"
                                           id="" type="checkbox" name="seats[]" value="{{$seat->id}}"
                                           data-name="{{$seat->name}}" data-price="{{$seat->seattype->price}}">
                                @endif
                                <label class="label-for-check" for="{{$key}}"
                                       style="color: dimgray; border: 2px solid orange">
                                    {{$seat->name}}
                                </label>
                            @endforeach
                        </div>
                        <br>

                        <p>Giá: <span id="price-span"></span></p>
                        <p>Số lượng ghế: <span class="seats-span"></span></p>
                        <p>Đồ ăn:
                        <input id="yes" type="radio" name="f&d" value="yes">
                        <label for="yes">Yes</label>
                        <input id="no" type="radio" name="f&d" value="no">
                        <label for="no">No</label>
                        </p><br>

                        <div id="foods" class="col-10">
                            <h3>Food & Drink</h3>
                            <div class="row">
                                @foreach($foods as $food)
                                    <div class="col-4">
                                        <div class="card">
                                            <img class="card-img-top" src="{{$food->image}}" alt="food">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$food->name}}</h5>
                                                <p class="card-text">Giá: {{$food->price}} vnd</p>
                                                <div class="row d-flex justify-content-center">
                                                    <button type="button">-</button>
                                                    <span>0</span>
                                                    <button type="button">+</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                            Order
                        </button>
                        <a class="btn" style="background-color: #8899a6" href="{{route('current.movie.index')}}">Back</a>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Thông tin thanh toán</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Khách hàng: {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                        <p>Ngày: <span id="pickDate"></span></p>
                                        <p>Ghế: <span id="seats-name-span"></span></p>
                                        <p>Số lượng: <span class="seats-span"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </label>
                    </form>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('.seat').on('change', function () {
                let totalPrice = 0;
                let totalSeat = 0;
                let seats = "";
                $('.seat:checkbox:checked').each(function () {
                    totalPrice += parseInt($(this).attr('data-price'));
                    totalSeat++;
                    seats += $(this).attr('data-name') + " ";
                });
                $("#price-span").html(totalPrice.toLocaleString("it-IT", {style: "currency", currency: "VND"}));
                $(".seats-span").html(totalSeat);
                $("#seats-name-span").html(seats);

            });

            $("#foods").hide();

            $("input[type='radio']").click(function () {
                var inputVal = $(this).attr('value');
                if (inputVal == "yes") {
                    $("#foods").show();
                } else {
                    $("#foods").hide();
                }
            });

            $("#date-select").on('change', function () {
                var pickDate = $(this).children("option:selected").val();
                $("#pickDate").html(pickDate);
            });

        });
    </script>

@endsection
