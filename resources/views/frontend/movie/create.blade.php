@extends('layoutFrontend.master')
@section('title', 'Order')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .check-with-label:checked + .label-for-check {
            background-color: hotpink;
        }
    </style>
@endsection
@section('content')

    <div class="col-12" style="margin-bottom: 150px">
        <div class="row">
            <div style="margin-left: 30%" class="col-8">
                <form action="{{route('orderTicket')}}" method="post">
                    @csrf
                    <h2 style="color: red">Order Ticket</h2>
                    <label>Chọn ngày:
                        <input type="datetime-local" name="date">
                    </label><br><br>
                    <select name="name" id="seat-type">
                        <option value="#" disabled selected>--Chon Loai Ghe--</option>
                            @foreach(\App\Models\SeatType::all() as $seattypes)
                            <option value="{{$seattypes->name}}">{{$seattypes->name}}</option>
                            @endforeach
                    </select><br><br>
                    <p>Chọn ghế:
{{--                        <select name="name" id="select">--}}
{{--                            <option value="#" disabled selected>--Available--</option>--}}
{{--                            @foreach($seats as $seat)--}}
{{--                                @if($seat->status == "null")--}}
{{--                                    <option class="seat" price="{{$seat->seattype->price}}"--}}
{{--                                            seatType="{{$seat->seatType->name}}"--}}
{{--                                            value="{{$seat->name}}">{{$seat->name}}</option>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                    </p>

                    <div style="width: 35%">
                        @foreach($seats as $key => $seat)
                            <input style="display: none" class="check-with-label seat" id="{{$key}}" type="checkbox"
                                   name="seats[]" value="{{$seat->name}}" data-price="{{$seat->seattype->price}}">
                            <label class="label-for-check" for="{{$key}}" style="color: dimgray; border: 2px solid orange">
                                {{$seat->name}}
                            </label>
                        @endforeach
                    </div>

                    <p>Giá: <span id="price-span"></span></p>
                    <span>Đồ ăn:
                        <input id="yes" type="radio" name="f&d" value="yes">
                        <label for="yes">Yes</label>
                        <input id="no" type="radio" name="f&d" value="no">
                        <label for="no">No</label>
                    </span><br>

                    <div id="foods" class="col-9">
                        <h3>Food & Drink</h3>
                        <div class="row">
                            @foreach($foods as $food)
                                <div class="col-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$food->image}}" alt="food">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$food->name}}</h5>
                                            <p class="card-text">Giá: {{$food->price}} vnd</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Order</button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Food&Drinks</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($foods as $food)
                                        <ul>
                                            <li>{{$food->name}}</li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('.seat').on('change',function () {
                let totalPrice = 0;
                $('.seat:checkbox:checked').each(function () {
                    totalPrice += parseInt($(this).attr('data-price'));
                });
                $("#price-span").html(totalPrice.toLocaleString("it-IT", {style:"currency", currency:"VND"}));
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

            $("#seat-type")


            //checkbox
            // $('input[type="checkbox"]').mousedown(function() {
            //     if (!$(this).is(':checked')) {
            //         this.checked = confirm("Are you sure?");
            //         $(this).trigger("change");
            //     }
            // });
        });
    </script>

@endsection
